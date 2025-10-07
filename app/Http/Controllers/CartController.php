<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plant;
use App\Models\Cart;

class CartController extends Controller
{
    // 📌 View Cart
    public function view(Request $request)
    {
        $customerId = $request->session()->get('customer_id');

        if (!$customerId) {
            return redirect()->route('customer.login')
                ->with('error', 'Please login to view your cart.');
        }

        $cart = Cart::with('plant')->where('customer_id', $customerId)->get();

        $total = $cart->sum(fn($item) => $item->plant->price * $item->quantity);

        $cartCount = $cart->sum('quantity');
        session(['cart_count' => $cartCount]);

        return view('cart', compact('cart', 'total'));
    }

    // 📌 Add to Cart
    public function add(Request $request, $id)
    {
        if (!$request->session()->has('customer_id')) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Please login before adding to cart.'
                ]);
            }
            return redirect()->route('customer.login')
                ->with('error', 'Please login before adding to cart.');
        }

        $customerId = $request->session()->get('customer_id');
        $plant = Plant::findOrFail($id);
        $quantity = (int) $request->input('quantity', 1);

        $cartItem = Cart::where('customer_id', $customerId)
            ->where('plant_id', $plant->id)
            ->first();

        if ($cartItem) {
            $cartItem->quantity += $quantity;
            $cartItem->save();
        } else {
            Cart::create([
                'customer_id' => $customerId,
                'plant_id'    => $plant->id,
                'quantity'    => $quantity,
            ]);
        }

        $cartCount = Cart::where('customer_id', $customerId)->sum('quantity');
        session(['cart_count' => $cartCount]);

        if ($request->ajax()) {
            return response()->json([
                'success'   => true,
                'cartCount' => $cartCount,
                'message'   => 'Plant added to cart!'
            ]);
        }

        return redirect()->back()->with('success', 'Plant added to cart!');
    }

    // 📌 Remove Item (by cart.id)
    public function remove(Request $request, $id)
    {
        $customerId = $request->session()->get('customer_id');
        $cartItem = Cart::where('customer_id', $customerId)->where('id', $id)->first();

        if ($cartItem) {
            $cartItem->delete();
        }

        $cart = Cart::with('plant')->where('customer_id', $customerId)->get();
        $total = $cart->sum(fn($item) => $item->plant->price * $item->quantity);
        $cartCount = $cart->sum('quantity');
        session(['cart_count' => $cartCount]);

        return response()->json([
            'success'   => true,
            'total'     => $total,
            'cartCount' => $cartCount
        ]);
    }

    // 📌 Update all quantities at once
    public function updateAll(Request $request)
    {
        $customerId = $request->session()->get('customer_id');
        $quantities = $request->input('quantities', []);

        foreach ($quantities as $cartId => $qty) {
            $cartItem = Cart::where('customer_id', $customerId)->where('id', $cartId)->first();
            if ($cartItem) {
                $qty = (int)$qty;
                if ($qty > 0) {
                    $cartItem->quantity = $qty;
                    $cartItem->save();
                } else {
                    $cartItem->delete();
                }
            }
        }

        $cart = Cart::with('plant')->where('customer_id', $customerId)->get();
        $total = $cart->sum(fn($item) => $item->plant->price * $item->quantity);
        $cartCount = $cart->sum('quantity');
        session(['cart_count' => $cartCount]);

        return response()->json([
            'success'   => true,
            'total'     => $total,
            'cartCount' => $cartCount
        ]);
    }

    // 📌 Checkout
    public function checkout(Request $request)
    {
        $customerId = $request->session()->get('customer_id');
        Cart::where('customer_id', $customerId)->delete();
        session(['cart_count' => 0]);

        return redirect()->route('cart.view')->with('success', 'Checkout successful!');
    }
}
