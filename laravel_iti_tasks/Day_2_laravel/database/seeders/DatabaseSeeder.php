<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Youssef Hegazy',
            'email' => 'youssef@gmail.com',
            'password' => bcrypt('password123'),
        ]);

        $category = Category::create(['name' => 'Electronics']);

        $product = Product::create([
            'category_id' => $category->id,
            'name' => 'Headphones',
            'price' => 150.00,
        ]);

        $order = Order::create([
            'user_id' => $user->id,
            'total_amount' => 300.00,
            'status' => 'completed',
        ]);

        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $product->id,
            'quantity' => 2,
            'price' => 150.00,
        ]);

        Payment::create([
            'order_id' => $order->id,
            'payment_method' => 'Credit Card',
            'status' => 'completed',
        ]);
    }
}