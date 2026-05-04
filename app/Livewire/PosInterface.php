<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\Product;
use App\Models\SavedCart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Component;
use LukePOLO\LaraCart\Facades\LaraCart;

class PosInterface extends Component
{
    public string $search = '';

    public ?string $activeCategory = null;

    public ?int $selectedCustomerId = null;

    public string $paymentMethod = '';

    public string $customerName = '';

    public string $customerPhone = '';

    public string $customerEmail = '';

    public string $customerBirthday = '';

    public string $saveCartName = '';

    public ?string $successMessage = null;

    public ?string $errorMessage = null;

    public function mount(): void
    {
        $customerId = LaraCart::getAttribute('customer_id');
        if (is_numeric($customerId)) {
            $this->selectedCustomerId = (int) $customerId;
        }
    }

    public function addToCart(int $productId): void
    {
        $product = Product::query()->findOrFail($productId);

        if ($product->qty <= 0) {
            $this->errorMessage = "{$product->name} is out of stock.";

            return;
        }

        $inCartQty = 0;
        foreach (LaraCart::getItems() as $item) {
            if ((int) $item->id === $productId) {
                $inCartQty += (int) $item->qty;
            }
        }

        if ($inCartQty >= $product->qty) {
            $this->errorMessage = "Cannot add more — only {$product->qty} in stock.";

            return;
        }

        LaraCart::add($product->id, $product->name, 1, $product->price);
        $this->successMessage = null;
        $this->errorMessage = null;
    }

    public function removeItem(string $hash): void
    {
        LaraCart::removeItem($hash);
        $this->errorMessage = null;
    }

    public function incrementItem(string $hash, int $currentQty): void
    {
        foreach (LaraCart::getItems() as $item) {
            if ($item->getHash() === $hash) {
                $product = Product::query()->find((int) $item->id);
                if ($product && $currentQty >= $product->qty) {
                    $this->errorMessage = "Only {$product->qty} in stock.";

                    return;
                }
                break;
            }
        }

        LaraCart::updateItem($hash, 'qty', $currentQty + 1);
        $this->errorMessage = null;
    }

    public function decrementItem(string $hash, int $currentQty): void
    {
        if ($currentQty <= 1) {
            LaraCart::removeItem($hash);
        } else {
            LaraCart::updateItem($hash, 'qty', $currentQty - 1);
        }

        $this->errorMessage = null;
    }

    public function clearCart(): void
    {
        LaraCart::emptyCart();
        LaraCart::removeAttribute('customer_id');
        $this->selectedCustomerId = null;
        $this->successMessage = null;
        $this->errorMessage = null;
        $this->dispatch('cart-cleared');
    }

    public function updatedSelectedCustomerId(?int $value): void
    {
        if ($value) {
            LaraCart::setAttribute('customer_id', $value);
        } else {
            LaraCart::removeAttribute('customer_id');
        }
    }

    public function createCustomer(): void
    {
        $this->validate([
            'customerName' => 'required|string|max:255',
            'customerPhone' => 'nullable|string|max:20',
            'customerEmail' => 'nullable|email|max:255',
            'customerBirthday' => 'nullable|date',
        ]);

        $customer = Customer::query()->create([
            'name' => $this->customerName,
            'email' => $this->customerEmail ?: null,
            'phone' => $this->customerPhone ?: null,
            'birthday' => $this->customerBirthday ?: null,
        ]);

        $this->selectedCustomerId = $customer->id;
        LaraCart::setAttribute('customer_id', $customer->id);

        $this->customerName = $this->customerPhone = $this->customerEmail = $this->customerBirthday = '';
        $this->successMessage = 'Customer created successfully.';
        $this->dispatch('customer-created');
    }

    public function saveCart(): void
    {
        $cartItems = LaraCart::getItems();

        if (count($cartItems) === 0) {
            $this->errorMessage = 'Nothing to save — cart is empty.';

            return;
        }

        $items = [];
        foreach ($cartItems as $item) {
            $items[] = [
                'id' => $item->id,
                'name' => $item->name,
                'qty' => (int) $item->qty,
                'price' => (float) $item->price,
            ];
        }

        $customerId = LaraCart::getAttribute('customer_id');

        SavedCart::query()->create([
            'user_id' => auth()->id(),
            'customer_id' => is_numeric($customerId) ? (int) $customerId : null,
            'name' => $this->saveCartName ?: 'Cart '.now()->format('H:i'),
            'items' => $items,
        ]);

        $this->saveCartName = '';
        $this->successMessage = 'Cart saved!';
        $this->dispatch('cart-saved');
    }

    public function restoreCart(int $savedCartId): void
    {
        $savedCart = SavedCart::query()
            ->where('user_id', auth()->id())
            ->findOrFail($savedCartId);

        LaraCart::emptyCart();
        LaraCart::removeAttribute('customer_id');

        foreach ($savedCart->items as $item) {
            LaraCart::add($item['id'], $item['name'], $item['qty'], $item['price']);
        }

        if ($savedCart->customer_id) {
            LaraCart::setAttribute('customer_id', $savedCart->customer_id);
            $this->selectedCustomerId = $savedCart->customer_id;
        } else {
            $this->selectedCustomerId = null;
        }

        $this->successMessage = "Cart '{$savedCart->name}' restored.";
        $this->dispatch('cart-restored');
    }

    public function deleteSavedCart(int $savedCartId): void
    {
        SavedCart::query()
            ->where('user_id', auth()->id())
            ->findOrFail($savedCartId)
            ->delete();
    }

    public function checkout(): void
    {
        $this->validate([
            'paymentMethod' => 'required|in:card,cash,cheque,deposit,points',
        ]);

        $cartItems = LaraCart::getItems();

        if (count($cartItems) === 0) {
            $this->errorMessage = 'Cart is empty.';

            return;
        }

        $customerId = LaraCart::getAttribute('customer_id');
        $customerId = is_numeric($customerId) ? (int) $customerId : null;

        try {
            DB::transaction(function () use ($customerId, $cartItems) {
                $currency = 'KES';

                $order = Order::withoutEvents(function () use ($customerId, $currency) {
                    return Order::query()->create([
                        'number' => 'OR-'.random_int(100000, 999999),
                        'customer_id' => $customerId,
                        'user_id' => auth()->id(),
                        'status' => 'new',
                        'currency' => $currency,
                        'total_price' => 0,
                        'shipping_price' => 0,
                    ]);
                });

                $total = $sort = 0;

                foreach ($cartItems as $cartItem) {
                    $productId = (int) $cartItem->id;
                    $qty = (int) $cartItem->qty;
                    $unitPrice = (float) $cartItem->price;

                    if ($qty <= 0) {
                        continue;
                    }

                    $productUpdated = Product::query()
                        ->whereKey($productId)
                        ->where('qty', '>=', $qty)
                        ->decrement('qty', $qty);

                    if (! $productUpdated) {
                        $product = Product::query()->find($productId);
                        $name = $product?->name ?? ('ID '.$productId);
                        throw new \RuntimeException("Product {$name} is out of stock.");
                    }

                    OrderItem::query()->create([
                        'order_id' => $order->id,
                        'product_id' => $productId,
                        'qty' => $qty,
                        'unit_price' => $unitPrice,
                        'sort' => $sort++,
                    ]);

                    $total += $unitPrice * $qty;
                }

                if ($total <= 0) {
                    throw new \RuntimeException('No valid items to checkout.');
                }

                $order->update(['total_price' => $total]);

                Payment::query()->create([
                    'order_id' => $order->id,
                    'user_id' => auth()->id(),
                    'reference' => 'POS-'.Str::upper(Str::random(10)),
                    'provider' => 'pos',
                    'method' => $this->paymentMethod,
                    'amount' => $total,
                    'currency' => $currency,
                ]);

                LaraCart::emptyCart();
                LaraCart::removeAttribute('customer_id');

                $this->selectedCustomerId = null;
                $this->paymentMethod = '';
                $this->successMessage = "Order {$order->number} completed!";
                $this->errorMessage = null;

                $this->dispatch('order-completed');
            });
        } catch (\Exception $e) {
            $this->errorMessage = $e->getMessage();
            $this->successMessage = null;
        }
    }

    public function updatedSearch(): void
    {
        $this->activeCategory = null;
    }

    public function setCategory(?string $slug): void
    {
        $this->activeCategory = $slug;
        $this->search = '';
    }

    #[Computed]
    public function filteredProducts()
    {
        $query = Product::query()->where('is_visible', 1)->has('categories');

        if ($this->activeCategory) {
            $query->whereHas('categories', fn ($q) => $q->where('slug', $this->activeCategory));
        }

        if ($this->search) {
            $query->where('name', 'like', '%'.$this->search.'%');
        }

        return $query->limit(24)->get();
    }

    #[Computed]
    public function categories()
    {
        return Category::query()->where('is_visible', 1)->has('products')->limit(10)->get();
    }

    #[Computed]
    public function customers()
    {
        return Customer::query()->orderBy('name')->get();
    }

    #[Computed]
    public function cartItems()
    {
        return LaraCart::getItems();
    }

    #[Computed]
    public function cartProductQtys(): array
    {
        $qtys = [];
        foreach (LaraCart::getItems() as $item) {
            $id = (int) $item->id;
            $qtys[$id] = ($qtys[$id] ?? 0) + (int) $item->qty;
        }

        return $qtys;
    }

    #[Computed]
    public function cartTotal(): string
    {
        return 'KES '.number_format((float) LaraCart::total(false));
    }

    #[Computed]
    public function cartSubtotal(): string
    {
        return 'KES '.number_format((float) LaraCart::subTotal(false));
    }

    #[Computed]
    public function cartCount(): int
    {
        return count(LaraCart::getItems());
    }

    #[Computed]
    public function todaysOrders()
    {
        return Order::query()
            ->where('user_id', auth()->id())
            ->whereDate('created_at', today())
            ->with('customer')
            ->latest()
            ->limit(20)
            ->get();
    }

    #[Computed]
    public function todaysSales()
    {
        $orders = Order::query()
            ->where('user_id', auth()->id())
            ->whereDate('created_at', today())
            ->with('payments')
            ->get();

        $byStatus = $orders->groupBy('status')->map->count();
        $revenue = $orders->sum('total_price');

        $paymentBreakdown = Payment::query()
            ->where('user_id', auth()->id())
            ->whereDate('created_at', today())
            ->selectRaw('method, COUNT(*) as count, SUM(amount) as total')
            ->groupBy('method')
            ->get();

        return [
            'revenue' => $revenue,
            'order_count' => $orders->count(),
            'by_status' => $byStatus,
            'payment_breakdown' => $paymentBreakdown,
        ];
    }

    #[Computed]
    public function savedCarts()
    {
        return SavedCart::query()
            ->where('user_id', auth()->id())
            ->with('customer')
            ->latest()
            ->get();
    }

    public function render(): View
    {
        return view('livewire.pos-interface');
    }
}
