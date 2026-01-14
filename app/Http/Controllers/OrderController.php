<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use LukePOLO\LaraCart\Facades\LaraCart;

class OrderController extends Controller
{
    public function store(Request $request) {
        $cartItems = LaraCart::getItems();
        $customer = Customer::query()->where('id', LaraCart::getAttribute('customer_id'))->first();
    }
}
