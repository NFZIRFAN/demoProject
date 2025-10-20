<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Plant;

class CheckoutController extends Controller
{
    // ✅ Show checkout page
    public function showCheckout()
    {
        $customerId = session('customer_id');

        if (!$customerId) {
            return redirect()->route('login')->with('error', 'Please log in first to continue checkout.');
        }

        // Get cart items
        $cartItems = Cart::where('customer_id', $customerId)
            ->with('plant')
            ->get();

        // Calculate subtotal
        $subtotal = $cartItems->sum(function ($item) {
            return $item->quantity * $item->plant->price;
        });

        // Fetch shipping info (if stored in session)
        $customer = session('customer');

        return view('checkout', compact('cartItems', 'subtotal', 'customer'));
    }

    // ✅ Process payment
    public function processPayment(Request $request)
    {
        $customerId = session('customer_id');

        if (!$customerId) {
            return redirect()->route('login')->with('error', 'Please log in first.');
        }

        $cartItems = Cart::where('customer_id', $customerId)->get();

        if ($cartItems->isEmpty()) {
            return redirect()->back()->with('error', 'Your cart is empty.');
        }

        // (Optional) Payment validation can go here

        // Clear cart after successful "payment"
        Cart::where('customer_id', $customerId)->delete();

        return redirect()->route('checkout.success')->with('success', 'Payment successful! Thank you for your purchase.');
    }

    // ✅ Success page
    public function success()
    {
        return view('checkout-success')->with('success', 'Payment successful! Thank you for your purchase.');
    }
}
