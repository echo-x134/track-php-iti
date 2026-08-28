<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CartController extends Controller
{
    public function index(Request $request): View
    {
        $cartItems = Cart::with('product')
            ->where('user_id', $request->user()->id)
            ->get();

        return view('cart.index', compact('cartItems'));
    }

    public function store(Request $request, Product $product): RedirectResponse
    {
        $validated = $request->validate([
            'quantity' => ['nullable', 'integer', 'min:1'],
        ]);
        $quantity = $validated['quantity'] ?? 1;

        if ($product->quantity < $quantity) {
            return back()->withErrors(['quantity' => 'The requested quantity is not available.']);
        }

        $cartItem = Cart::firstOrNew([
            'user_id' => $request->user()->id,
            'product_id' => $product->id,
        ]);
        $newQuantity = $cartItem->exists ? $cartItem->quantity + $quantity : $quantity;

        if ($newQuantity > $product->quantity) {
            return back()->withErrors(['quantity' => 'The requested quantity is not available.']);
        }

        $cartItem->quantity = $newQuantity;
        $cartItem->save();

        return back()->with('success', 'Product added to your cart.');
    }

    public function update(Request $request, Cart $cart): RedirectResponse
    {
        abort_unless($cart->user_id === $request->user()->id, 403);

        $validated = $request->validate([
            'quantity' => ['required', 'integer', 'min:1'],
        ]);

        if ($validated['quantity'] > $cart->product->quantity) {
            return back()->withErrors(['quantity' => 'The requested quantity is not available.']);
        }

        $cart->update(['quantity' => $validated['quantity']]);

        return back()->with('success', 'Cart updated.');
    }

    public function destroy(Request $request, Cart $cart): RedirectResponse
    {
        abort_unless($cart->user_id === $request->user()->id, 403);
        $cart->delete();

        return back()->with('success', 'Product removed from your cart.');
    }
}
