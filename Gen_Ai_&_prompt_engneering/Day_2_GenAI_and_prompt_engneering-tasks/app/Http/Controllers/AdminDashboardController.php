<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\View\View;

class AdminDashboardController extends Controller
{
    public function index(): View
    {
        return view('admin.dashboard', [
            'categoryCount' => Category::count(),
            'productCount' => Product::count(),
            'userCount' => User::count(),
            'categories' => Category::latest()->take(5)->get(),
            'products' => Product::with('category')->latest()->take(5)->get(),
            'users' => User::latest()->take(5)->get(),
        ]);
    }
}
