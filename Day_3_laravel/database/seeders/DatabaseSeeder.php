<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\Order_Item;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::factory(10)->create();

        $catElectronics = Category::create(['name' => 'Electronics', 'descripyion' => 'Latest gadgets and electronic devices']);
        $catSports       = Category::create(['name' => 'Sports', 'descripyion' => 'Fitness gear and sports equipment']);
        $catBooks        = Category::create(['name' => 'Books', 'descripyion' => 'Programming, Machine Learning, and Literature']);
        $catFashion      = Category::create(['name' => 'Fashion', 'descripyion' => 'Clothing, shoes, and stylish accessories']);
        $catHome         = Category::create(['name' => 'Home & Kitchen', 'descripyion' => 'Home appliances and kitchenware accessories']);

        $p1 = Product::create(['name' => 'HP ZBook Laptop', 'description' => 'High performance workstation for AI & Dev', 'price' => 1200.00, 'quantity' => 10, 'category_id' => $catElectronics->id]);
        $p2 = Product::create(['name' => 'Samsung Galaxy A35', 'description' => 'Great AMOLED display with good battery', 'price' => 350.00, 'quantity' => 25, 'category_id' => $catElectronics->id]);
        $p3 = Product::create(['name' => 'Wireless Gaming Mouse', 'description' => 'Ergonomic light RGB mouse', 'price' => 45.00, 'quantity' => 50, 'category_id' => $catElectronics->id]);

        $p4 = Product::create(['name' => 'Match Football Size 5', 'description' => 'Official size professional leather match ball', 'price' => 30.00, 'quantity' => 40, 'category_id' => $catSports->id]);
        $p5 = Product::create(['name' => 'Pro Running Shoes', 'description' => 'Lightweight comfortable running sneakers', 'price' => 110.00, 'quantity' => 15, 'category_id' => $catSports->id]);

        $p6 = Product::create(['name' => 'Hands-On Machine Learning', 'description' => 'Aurélien Géron Scikit-Learn & PyTorch book', 'price' => 55.00, 'quantity' => 20, 'category_id' => $catBooks->id]);
        $p7 = Product::create(['name' => 'Speed 3x3 Rubik Cube', 'description' => 'Fast smooth magnetic speed cube', 'price' => 15.00, 'quantity' => 60, 'category_id' => $catBooks->id]);

        $p8 = Product::create(['name' => 'Classic Leather Jacket', 'description' => '100% genuine black leather jacket', 'price' => 180.00, 'quantity' => 12, 'category_id' => $catFashion->id]);
        $p9 = Product::create(['name' => 'USB-C Fast Charger 65W', 'description' => 'Multi-device fast charging adapter', 'price' => 25.00, 'quantity' => 100, 'category_id' => $catHome->id]);

        $allProducts = [$p1, $p2, $p3, $p4, $p5, $p6, $p7, $p8, $p9];

        foreach ($users as $user) {
            $order = Order::create([
                'user_id' => $user->id,
            ]);

            $randomProducts = collect($allProducts)->random(2);
            foreach ($randomProducts as $prod) {
                Order_Item::create([
                    'order_id' => $order->id,
                    'product_id' => $prod->id,
                    'quantity' => rand(1, 3),
                    'price' => $prod->price,
                ]);
            }
        }
    }
}