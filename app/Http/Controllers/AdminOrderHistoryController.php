<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class AdminOrderHistoryController extends Controller
{
    public function index() {
        $orders = Order::orderBy('created_at','desc')->get();
        return view('admin.listOrder', compact('orders'));
    }

    public function updateDeliveryStatus(Request $request, $id) {
        $request->validate([
            'delivery_status' => 'required|string|in:Pending Delivery,Out for Delivery,Completed'
        ]);

        $order = Order::findOrFail($id);
        $order->delivery_status = $request->delivery_status;
        $order->save();

        return response()->json([
            'success' => true,
            'delivery_status' => $order->delivery_status
        ]);
    }
}

