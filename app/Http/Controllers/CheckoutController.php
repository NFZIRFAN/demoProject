<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;

class CheckoutController extends Controller
{
    /**
     * Show checkout page
     */
    public function showCheckout()
    {
        $customerId = session('customer_id');

        if (!$customerId) {
            return redirect()->route('customer.login')
                ->with('error', 'Please log in first.');
        }

        $cartItems = Cart::with('plant')
            ->where('customer_id', $customerId)
            ->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.view')
                ->with('error', 'Your cart is empty.');
        }

        $subtotal = $cartItems->sum(function ($item) {
            return $item->quantity * $item->plant->price;
        });

        $customer = session('customer');

        return view('checkout', compact('cartItems', 'subtotal', 'customer'));
    }

    /**
     * Create order and redirect to ToyyibPay sandbox
     */
    public function store(Request $request)
    {
        $customerId = session('customer_id');

        if (!$customerId) {
            return redirect()->route('customer.login');
        }

        $validated = $request->validate([
            'first_name' => 'required|string',
            'last_name'  => 'required|string',
            'email'      => 'required|email',
            'phone'      => 'required|string',
            'address_1'  => 'required|string',
            'address_2'  => 'nullable|string',
            'city'       => 'required|string',
            'state'      => 'required|string',
            'zip'        => 'required|string',
            'total'      => 'required|numeric|min:0',
            'shipping_fee' => 'required|numeric|min:0',
            'additional_info' => 'nullable|string',
        ]);

        $cartItems = Cart::with('plant')
            ->where('customer_id', $customerId)
            ->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.view')
                ->with('error', 'Cart is empty.');
        }

        // ✅ Create PENDING order
        $order = Order::create([
            'customer_id' => $customerId,
            'order_number' => 'ORD-' . now()->timestamp,
            'payment_method' => 'ToyyibPay',
            'total' => $validated['total'],
            'shipping_fee' => $validated['shipping_fee'],
            'status' => 'Pending',
            'additional_info' => $validated['additional_info'] ?? null,
            'address_1' => $validated['address_1'],
            'address_2' => $validated['address_2'] ?? null,
            'city' => $validated['city'],
            'state' => $validated['state'],
            'zip' => $validated['zip'],
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
        ]);

        foreach ($cartItems as $item) {
            $order->items()->create([
                'plant_id' => $item->plant_id,
                'plant_name' => $item->plant->name,
                'quantity' => $item->quantity,
                'price' => $item->plant->price,
                'total' => $item->quantity * $item->plant->price,
            ]);
        }

        // ❗ DO NOT clear cart here

        return redirect()->route('payment.toyyibpay', $order->id);
    }
}
