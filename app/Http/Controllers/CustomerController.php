<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use LukePOLO\LaraCart\Facades\LaraCart;

class CustomerController extends Controller
{
    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $customer = Customer::query()->create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'birthday' => $request->birthday,
        ]);
        $customers = Customer::all();
        $cartItems = LaraCart::getItems();
        if ($customer) {
            LaraCart::setAttribute('customer_id', $customer->id);
            return view('components.order.cart', compact('cartItems', 'customers'))->with('customer_success', 'Customer Created');
        }
        else {
            return view('components.order.cart', compact('cartItems', 'customers'))->with('customer_error', 'Customer Not Created');
        }
    }

    public function update(Request $request) {

    }
}
