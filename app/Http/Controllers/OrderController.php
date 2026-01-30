<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use LukePOLO\LaraCart\Facades\LaraCart;

class OrderController extends Controller
{
    public function store(Request $request) {
        $request->validate([
            'method' => ['required', 'string', 'in:card,cash,cheque,deposit,points'],
        ]);

        $cartItems = LaraCart::getItems();

        if (count($cartItems) == 0) {
            session()->flash('order_error', 'Cart is empty');
            $customers = Customer::all();
            return view('components.order.cart', compact('customers', 'cartItems'));
        }

        $customerId = LaraCart::getAttribute('customer_id');
        $customerId = is_numeric($customerId) ? (int) $customerId : null;

        try {
            DB::transaction(function() use ($request, $customerId, $cartItems) {
                $currency = 'KES';

                $order = Order::withoutEvents(function () use ($customerId, $currency) {
                   return Order::query()->create([
                       'number' => 'OR-' . random_int(100000, 999999),
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

                    if ($qty <= 0) continue;

                    // Update Product Inventory
                    $productUpdated = Product::query()
                        ->whereKey($productId)
                        ->where('qty', '>=', $qty)
                        ->decrement('qty', $qty);

                    if (!$productUpdated) {
                        $product = Product::query()->find($productId);
                        $name = $product?->name ?? ('ID ' . $productId);
                        throw new \RuntimeException("Product $name is out of stock");
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
                    throw new \RuntimeException('No valid items to checkout');
                }

                $order->update([
                    'total_price' => $total,
                ]);

                Payment::query()->create([
                    'order_id' => $order->id,
                    'user_id' => auth()->id(),
                    'reference' => 'POS-' . Str::upper(Str::random(10)),
                    'provider' => 'pos',
                    'method' => $request->string('method')->toString(),
                    'amount' => $total,
                    'currency' => $currency,
                ]);

                LaraCart::emptyCart();
                LaraCart::removeAttribute('customer_id');

                session()->flash('order_success', "Order {$order->number} created successfully");
            });
        } catch (\Exception $e) {
            session()->flash('order_error', $e->getMessage());
        }

        $cartItems = LaraCart::getItems();
        $customers = Customer::all();
        return view('components.order.cart', compact('customers', 'cartItems'));
    }
}
