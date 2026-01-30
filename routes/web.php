<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', [\App\Http\Controllers\IndexController::class, 'index']);

Auth::routes([ 'verify' => true ]);

Route::middleware(['auth', 'verified', 'checkSession'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Cart routes
    Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
    Route::post('/cart/update', [CartController::class, 'updateItem'])->name('cart.update');
    Route::post('/cart/remove', [CartController::class, 'removeItem'])->name('cart.remove');
    Route::get('/cart/clear', [CartController::class, 'clearCart'])->name('cart.clear');
    Route::post('/cart/customer', [CartController::class, 'attachCustomer'])->name('cart.customer');

    Route::post('/customer', [CustomerController::class, 'store'])->name('customer.store');

    Route::post('/order/checkout', [OrderController::class, 'store'])->name('order.checkout');
});


