<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use LukePOLO\LaraCart\Facades\LaraCart;


class HomeController extends Controller {
    public function index(): View {
        $categories = Category::query()->where('is_visible', 1)->has('products')->limit(8)->get();
        $allProducts = Product::query()->where('is_visible', 1)->has('categories')->limit(10)->get();
        $customers = Customer::all();
        $cartItems = Laracart::getItems();
        return view('home', compact('categories', 'allProducts', 'customers', 'cartItems'));
    }

    public function addToCart(Request $request) {
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

    public function removeItem(Request $request) {
        $itemHash = $request->itemHash;
        LaraCart::removeItem($itemHash);
        $cartItems = LaraCart::getItems();
        $customers = Customer::all();
        return view('components.order.cart', compact('cartItems', 'customers'));
    }

    public function clearCart() {
        // Empty will only empty the contents
        LaraCart::emptyCart();
        $cartItems = LaraCart::getItems();
        $customers = Customer::all();
        return view('components.order.cart', compact('cartItems', 'customers'));
    }
}
