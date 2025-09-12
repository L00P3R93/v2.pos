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
    public function index(): View
    {
        $categories = Category::query()->where('is_visible', 1)->has('products')->limit(8)->get();
        $allProducts = Product::query()->where('is_visible', 1)->has('categories')->limit(10)->get();
        $customers = Customer::all();
        $cartItems = Laracart::getItems();
        return view('home', compact('categories', 'allProducts', 'customers', 'cartItems'));
    }
}
