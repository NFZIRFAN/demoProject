<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Customer;
use App\Models\Cart;
use Barryvdh\DomPDF\Facade\Pdf as PDF;


class OrderController extends Controller
{
  public function store(Request $request)
{
    $customerId = session('customer_id');
    if (!$customerId) {
        return redirect()->back()->with('error', 'No customer logged in!');
    }

    $customer = Customer::find($customerId);
    if (!$customer) {
        return redirect()->back()->with('error', 'Customer not found!');
    }

    $validated = $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|email',
        'phone' => 'required|string|max:20',
        'address_1' => 'required|string|max:255',
        'address_2' => 'nullable|string|max:255',
        'city' => 'required|string|max:100',
        'state' => 'required|string|max:100',
        'zip' => 'required|string|max:10',
        'payment_method' => 'required|string',
        'total' => 'required|numeric|min:0',
        'shipping_fee' => 'required|numeric|min:0',
        'additional_info' => 'nullable|string',
    ]);

    try {
        $order = Order::create([
            'customer_id' => $customer->id,
            'order_number' => 'ORD-' . strtoupper(uniqid()),
            'payment_method' => $validated['payment_method'],
            'total' => $validated['total'],
            'shipping_fee' => $validated['shipping_fee'],
            'status' => 'Pending',
            'delivery_status' => 'Pending Delivery',
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

        $cartItems = Cart::where('customer_id', $customerId)->with('plant')->get();
        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'plant_id' => $item->plant_id,
                'plant_name' => $item->plant->name,
                'price' => $item->plant->price,
                'quantity' => $item->quantity,
                'total' => $item->plant->price * $item->quantity,
            ]);

             // Reduce stock
            $plant = $item->plant;
            $plant->stock_quantity -= $item->quantity;
            $plant->save();
        }

        // 🔔 Check low-stock emails immediately
        app()->call('App\Http\Controllers\AdminPlantController@checkLowStock');
        
        Cart::where('customer_id', $customerId)->delete();

        return redirect()->route('order.invoice', $order->id)
            ->with('success', 'Your order has been placed successfully!');

    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Error placing order: ' . $e->getMessage());
    }
}



    // ✅ Show invoice
    public function invoice($id)
    {
        $order = Order::with(['customer', 'items.plant'])->findOrFail($id);
        // dd($order, $order->additional_info);
        return view('invoice', compact('order'));
    }


public function downloadPdf($id)
{
    $order = Order::with(['customer', 'items'])->findOrFail($id);

    $pdf = PDF::loadView('invoice', compact('order'));

    return $pdf->download('Receipt_' . $order->order_number . '.pdf');
}

// Show all orders for the logged-in customer
// In OrderController.php

public function history()
{
    $customerId = session('customer_id');

    $orders = Order::where('customer_id', $customerId)
                   ->with('items.plant')
                   ->orderBy('created_at', 'desc')
                   ->paginate(8); // show 8 orders per page

    return view('historyOrder', compact('orders'));
}


// Show single order details (optional)
public function show($id)
{
    $customerId = session('customer_id');

    // Fetch all orders for sidebar/table
    $orders = Order::where('customer_id', $customerId)
                   ->with('items.plant')
                   ->orderBy('created_at', 'desc')
                   ->get();

    // Fetch the single order details
    $order = Order::with('items.plant')->findOrFail($id);

    if ($order->customer_id != $customerId) {
        abort(403);
    }

    return view('historyOrder', compact('orders', 'order'));
}
public function deliveryStatuses()
{
    $customerId = session('customer_id');
    $orders = Order::where('customer_id', $customerId)
                   ->select('id','order_number','delivery_status')
                   ->orderBy('created_at','desc')
                   ->get();

    return response()->json($orders);
}


}
