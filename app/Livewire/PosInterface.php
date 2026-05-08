<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\Product;
use App\Models\SavedCart;
use App\Services\CartService;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Lazy;
use Livewire\Component;
use Livewire\WithPagination;

#[Lazy]
class PosInterface extends Component
{
    use WithPagination;

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

    public function placeholder(): string
    {
        return <<<'HTML'
        <div class="flex flex-col h-screen overflow-hidden bg-gray-100 dark:bg-gray-950 animate-pulse">
            <div class="flex-none h-14 bg-white dark:bg-gray-900 border-b border-gray-200 dark:border-gray-800"></div>
            <div class="flex flex-1 overflow-hidden">
                <div class="flex-1 flex flex-col gap-3 p-4">
                    <div class="h-10 rounded-xl bg-gray-200 dark:bg-gray-800"></div>
                    <div class="flex gap-2">
                        <div class="h-8 w-12 rounded-lg bg-gray-200 dark:bg-gray-800"></div>
                        <div class="h-8 w-20 rounded-lg bg-gray-200 dark:bg-gray-800"></div>
                        <div class="h-8 w-16 rounded-lg bg-gray-200 dark:bg-gray-800"></div>
                        <div class="h-8 w-24 rounded-lg bg-gray-200 dark:bg-gray-800"></div>
                    </div>
                    <div class="grid grid-cols-2 sm:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 gap-3 pt-1">
                        <div class="aspect-square rounded-xl bg-gray-200 dark:bg-gray-800"></div>
                        <div class="aspect-square rounded-xl bg-gray-200 dark:bg-gray-800"></div>
                        <div class="aspect-square rounded-xl bg-gray-200 dark:bg-gray-800"></div>
                        <div class="aspect-square rounded-xl bg-gray-200 dark:bg-gray-800"></div>
                        <div class="aspect-square rounded-xl bg-gray-200 dark:bg-gray-800"></div>
                        <div class="aspect-square rounded-xl bg-gray-200 dark:bg-gray-800"></div>
                        <div class="aspect-square rounded-xl bg-gray-200 dark:bg-gray-800"></div>
                        <div class="aspect-square rounded-xl bg-gray-200 dark:bg-gray-800"></div>
                    </div>
                </div>
                <div class="hidden lg:block w-80 xl:w-[360px] bg-white dark:bg-gray-900 border-l border-gray-200 dark:border-gray-800"></div>
            </div>
        </div>
        HTML;
    }

    public function mount(): void
    {
        $this->selectedCustomerId = $this->cart()->getCustomerId();
        $this->dispatchCartState();
    }

    // ── Cart mutations ────────────────────────────────────────────────────────

    public function addToCart(int $productId): void
    {
        $product = Product::query()->findOrFail($productId);

        if ($product->qty <= 0) {
            $this->errorMessage = "{$product->name} is out of stock.";

            return;
        }

        $items = $this->cart()->getItems();
        $inCartQty = $items[$productId]['qty'] ?? 0;

        if ($inCartQty >= $product->qty) {
            $this->errorMessage = "Cannot add more — only {$product->qty} in stock.";

            return;
        }

        $this->cart()->add($productId, $product->name, (float) $product->price);
        $this->errorMessage = null;
        $this->dispatchCartState();
    }

    public function removeItem(int $productId): void
    {
        $this->cart()->remove($productId);
        $this->errorMessage = null;
        $this->dispatchCartState();
    }

    public function updateItemQty(int $productId, int $qty): void
    {
        if ($qty <= 0) {
            $this->removeItem($productId);

            return;
        }

        $product = Product::query()->find($productId);

        if ($product && $qty > $product->qty) {
            $this->errorMessage = "Only {$product->qty} in stock.";
            $this->dispatchCartState();

            return;
        }

        $this->cart()->update($productId, $qty);
        $this->errorMessage = null;
        $this->dispatchCartState();
    }

    public function clearCart(): void
    {
        $this->cart()->clear();
        $this->selectedCustomerId = null;
        $this->successMessage = null;
        $this->errorMessage = null;
        $this->dispatch('cart-cleared');
        $this->dispatchCartState();
    }

    public function updatedSelectedCustomerId(?int $value): void
    {
        $this->cart()->setCustomerId($value);
    }

    // ── Customer ──────────────────────────────────────────────────────────────

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
        $this->cart()->setCustomerId($customer->id);

        $this->customerName = $this->customerPhone = $this->customerEmail = $this->customerBirthday = '';
        $this->dispatch('customer-created');
        $this->dispatch('toast', message: 'Customer created.', type: 'success');
    }

    // ── Saved carts ───────────────────────────────────────────────────────────

    public function saveCart(): void
    {
        $items = $this->cart()->getItems();

        if (count($items) === 0) {
            $this->errorMessage = 'Nothing to save — cart is empty.';

            return;
        }

        $this->cart()->save(
            userId: auth()->id(),
            name: $this->saveCartName ?: 'Cart '.now()->format('H:i'),
            customerId: $this->selectedCustomerId,
        );

        $this->saveCartName = '';
        $this->dispatch('cart-saved');
        $this->dispatch('toast', message: 'Cart saved!', type: 'success');
    }

    public function restoreCart(int $savedCartId): void
    {
        $savedCart = SavedCart::query()
            ->where('user_id', auth()->id())
            ->findOrFail($savedCartId);

        $this->cart()->restore($savedCart->items, $savedCart->customer_id);
        $this->selectedCustomerId = $savedCart->customer_id;

        $this->dispatch('cart-restored');
        $this->dispatchCartState();
    }

    public function deleteSavedCart(int $savedCartId): void
    {
        SavedCart::query()
            ->where('user_id', auth()->id())
            ->findOrFail($savedCartId)
            ->delete();
    }

    // ── Checkout ──────────────────────────────────────────────────────────────

    public function checkout(): void
    {
        $this->validate([
            'paymentMethod' => 'required|in:card,cash,cheque,deposit,points',
        ]);

        $cartItems = $this->cart()->getItems();

        if (count($cartItems) === 0) {
            $this->errorMessage = 'Cart is empty.';

            return;
        }

        $customerId = $this->selectedCustomerId;

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
                    $productId = (int) $cartItem['id'];
                    $qty = (int) $cartItem['qty'];
                    $unitPrice = (float) $cartItem['price'];

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

                $this->cart()->clear();
                $this->selectedCustomerId = null;
                $this->paymentMethod = '';
                $this->successMessage = "Order {$order->number} completed!";
                $this->errorMessage = null;

                $this->dispatch('order-completed');
                $this->dispatchCartState();
            });
        } catch (\Exception $e) {
            $this->errorMessage = $e->getMessage();
            $this->successMessage = null;
        }
    }

    // ── Search / category ─────────────────────────────────────────────────────

    public function updatedSearch(): void
    {
        $this->activeCategory = null;
        $this->resetPage();
    }

    public function setCategory(?string $slug): void
    {
        $this->activeCategory = $slug;
        $this->search = '';
        $this->resetPage();
    }

    // ── Computed properties ───────────────────────────────────────────────────

    #[Computed]
    public function filteredProducts()
    {
        $version = Cache::get('pos.products.version', 0);
        $cacheKey = implode('.', [
            'pos.products',
            $version,
            $this->activeCategory ?? 'all',
            md5($this->search),
            $this->getPage(),
        ]);

        return Cache::remember($cacheKey, 300, function () {
            return Product::query()
                ->where('is_visible', 1)
                ->has('categories')
                ->with(['media' => fn ($q) => $q->where('collection_name', 'product-images')])
                ->when(
                    $this->activeCategory,
                    fn ($q) => $q->whereHas('categories', fn ($q) => $q->where('slug', $this->activeCategory))
                )
                ->when(
                    $this->search,
                    fn ($q) => $q->where('name', 'like', '%'.$this->search.'%')
                )
                ->paginate(24);
        });
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

    /** @return array<int, array{id:int, name:string, price:float, qty:int}> */
    #[Computed]
    public function cartItems(): array
    {
        return $this->cart()->getItems();
    }

    /** @return array<int, int> Map of product ID → qty in cart */
    #[Computed]
    public function cartProductQtys(): array
    {
        $qtys = [];

        foreach ($this->cart()->getItems() as $productId => $item) {
            $qtys[(int) $productId] = $item['qty'];
        }

        return $qtys;
    }

    #[Computed]
    public function cartTotal(): string
    {
        return 'KES '.number_format($this->cart()->getTotal());
    }

    #[Computed]
    public function cartSubtotal(): string
    {
        return 'KES '.number_format($this->cart()->getTotal());
    }

    #[Computed]
    public function cartCount(): int
    {
        return $this->cart()->getCount();
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

    // ── Helpers ───────────────────────────────────────────────────────────────

    private function cart(): CartService
    {
        return app(CartService::class);
    }

    /** Push the current server cart state to Alpine so optimistic UI stays in sync. */
    private function dispatchCartState(): void
    {
        $this->dispatch('cart-updated', items: $this->cart()->getItems());
    }
}
