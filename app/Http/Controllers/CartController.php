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
    // Check if customer is logged in
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

    // 🔒 Stop if out of stock
if ($plant->stock_quantity <= 0) {
    return $request->ajax()
        ? response()->json([
            'success' => false,
            'message' => 'This product is out of stock.'
        ])
        : redirect()->back()->with('error', 'This product is out of stock.');
}


    // Check if item already exists in cart
    $cartItem = Cart::where('customer_id', $customerId)
        ->where('plant_id', $plant->id)
        ->first();

    if ($cartItem) {

    $newQuantity = $cartItem->quantity + $quantity;

    // 🔒 Prevent exceeding stock
    if ($newQuantity > $plant->stock_quantity) {
        return $request->ajax()
            ? response()->json([
                'success' => false,
                'message' => 'Quantity exceeds available stock.'
            ])
            : redirect()->back()->with('error', 'Quantity exceeds available stock.');
    }

    $cartItem->quantity = $newQuantity;
    $cartItem->save();
}

    else {

    if ($quantity > $plant->stock_quantity) {
        return $request->ajax()
            ? response()->json([
                'success' => false,
                'message' => 'Quantity exceeds available stock.'
            ])
            : redirect()->back()->with('error', 'Quantity exceeds available stock.');
    }

    Cart::create([
        'customer_id' => $customerId,
        'plant_id'    => $plant->id,
        'quantity'    => $quantity,
    ]);
}


    // Get updated total quantity of all items in cart
    $cartCount = Cart::where('customer_id', $customerId)->sum('quantity');
    session(['cart_count' => $cartCount]);

    // Return JSON if AJAX, else redirect back
    if ($request->ajax()) {
        return response()->json([
            'success'   => true,
            'message'   => 'Plant added to cart!',
            'cartCount' => $cartCount
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
