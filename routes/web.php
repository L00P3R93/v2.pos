<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', [\App\Http\Controllers\IndexController::class, 'index']);

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'checkSession'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::post('/cart/add', [HomeController::class, 'addToCart'])->name('cart.add');
    Route::post('/cart/remove', [HomeController::class, 'removeItem'])->name('cart.remove');
    Route::get('/cart/clear', [HomeController::class, 'clearCart'])->name('cart.clear');
});
