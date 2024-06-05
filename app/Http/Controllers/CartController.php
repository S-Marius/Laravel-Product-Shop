<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = auth()->user()->cart;
        return view('cart.index', compact('cart'));
    }

    public function addToCart(Request $request, Product $product)
    {
        $cart = auth()->user()->cart ?? Cart::create(['user_id' => auth()->id()]);

        $cartItem = $cart->items()->where('product_id', $product->id)->first();

        if ($cartItem) {
            $cartItem->quantity += $request->input('quantity', 1);
            $cartItem->save();
        } else {
            $cart->items()->create([
                'product_id' => $product->id,
                'quantity' => $request->input('quantity', 1),
            ]);
        }

        return redirect()->route('cart.index')->with('message', 'Product added to cart');
    }

    public function removeFromCart(CartItem $cartItem)
    {
        $cartItem->delete();
        return redirect()->route('cart.index')->with('message', 'Product removed from cart');
    }
    
    public function cartCount()
    {
        $cart = auth()->user()->cart;
        $count = $cart ? $cart->items->count() : 0;
        return $count;
    }
}
