<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('/users', function () {
        return response()->json(User::all());
    });

    Route::get('/products', function () {
        return response()->json(Product::with('category')->get());
    });

    Route::get('/categories', function () {
        return response()->json(Category::all());
    });
});