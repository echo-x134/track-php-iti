<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Models\Product;
use App\Models\Order;

Route::get('/', function () {
    return view('welcome');
});

// Categories & Users Routes
Route::resource('categories', CategoryController::class);
Route::resource('users', UserController::class);

// Products Routes
Route::get('/products', function () {
    $products = Product::with('category')->get();
    return view('products.index', compact('products'));
})->name('products.index');

Route::get('/products/{id}', function ($id) {
    $product = Product::with('category')->findOrFail($id);
    return view('products.show', compact('product'));
})->name('products.show');

// Orders Routes
Route::get('/orders/{id}', function ($id) {
    $order = Order::with(['user', 'orderItems.product'])->findOrFail($id);
    return view('orders.show', compact('order'));
})->name('orders.show');