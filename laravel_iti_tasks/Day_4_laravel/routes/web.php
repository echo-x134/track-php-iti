<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Models\Order;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return redirect()->route('products.index');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
    
    Route::get('/orders/{id}', function ($id) {
        $order = Order::with(['user', 'orderItems.product'])->findOrFail($id);
        return view('orders.show', compact('order'));
    })->name('orders.show');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('categories', CategoryController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class)->except(['index', 'show']);
});

require __DIR__.'/auth.php';