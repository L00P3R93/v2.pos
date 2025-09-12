<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;
use LukePOLO\LaraCart\Facades\LaraCart;

class CartController extends Controller
{
    public function addToCart(Request $request): View {
        $product = Product::query()->findOrFail($request->id);

        Laracart::add(
            $product->id,
            $product->name,
            1,
            $product->price,
        );

        $cartItems = Laracart::getItems();
        $customers = Customer::all();
        return view('components.order.cart', compact('cartItems', 'customers'));
    }

    public function removeItem(Request $request): View {
        $itemHash = $request->itemHash;
        LaraCart::removeItem($itemHash);
        $cartItems = LaraCart::getItems();
        $customers = Customer::all();
        return view('components.order.cart', compact('cartItems', 'customers'));
    }

    public function clearCart(): View {
        // Empty will only empty the contents
        LaraCart::emptyCart();
        LaraCart::removeAttribute('customer_id');
        $cartItems = LaraCart::getItems();
        $customers = Customer::all();
        return view('components.order.cart', compact('cartItems', 'customers'));
    }

    public function updateItem(Request $request): View {
        $itemHash = $request->itemHash;
        $quantity = $request->quantity;
        LaraCart::updateItem($itemHash, 'qty', $quantity);
        $cartItems = LaraCart::getItems();
        $customers = Customer::all();
        return view('components.order.cart', compact('cartItems', 'customers'));
    }

    public function attachCustomer(Request $request): View {
        $customer_id = $request->id;
        LaraCart::setAttribute('customer_id', $customer_id);
        $cartItems = LaraCart::getItems();
        $customers = Customer::all();
        return view('components.order.cart', compact('cartItems', 'customers'));
    }
}
