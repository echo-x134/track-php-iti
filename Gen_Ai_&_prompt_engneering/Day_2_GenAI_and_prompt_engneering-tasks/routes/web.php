<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\Order;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    if (auth()->user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }

    return redirect()->route('products.index');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/{product}', [CartController::class, 'store'])->name('cart.store');
    Route::patch('/cart/{cart}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/{cart}', [CartController::class, 'destroy'])->name('cart.destroy');

    Route::get('/orders/{id}', function ($id) {
        $order = Order::with(['user', 'orderItems.product'])->findOrFail($id);

        return view('orders.show', compact('order'));
    })->name('orders.show');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/chatbot', [ChatbotController::class, 'index'])->name('chatbot.index');
    Route::post('/chatbot', [ChatbotController::class, 'respond'])->name('chatbot.respond');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('categories', CategoryController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class)->except(['index', 'show']);
});

require __DIR__.'/auth.php';
