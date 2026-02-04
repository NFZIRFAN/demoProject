<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Order;
use App\Models\Cart;
use App\Models\Plant;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;
use App\Mail\PaymentSuccessMail;
use Illuminate\Support\Facades\Mail; // <-- ADD THIS




class ToyyibpayController extends Controller
{
    /**
     * Create ToyyibPay Bill (Sandbox / Demo)
     */
    public function createBill($orderId)
{
    $order = Order::findOrFail($orderId);

    $response = Http::asForm()->post(
        'https://dev.toyyibpay.com/index.php/api/createBill',
        [
            'userSecretKey' => config('services.toyyibpay.secret'),
            'categoryCode'  => config('services.toyyibpay.category'),

            'billName' => substr('Yah Nursery ' . $order->order_number, 0, 30),
            'billDescription' => 'Plant Purchase',
            'billPriceSetting' => 1,
            'billPayorInfo' => 1,
            'billAmount' => $order->total * 100,

            // ✅ THIS IS THE KEY
            'billReturnUrl' => route('payment.status', [
                'order_id' => $order->order_number
            ]),

            'callback_url' => route('payment.callback'),
            'billExternalReferenceNo' => $order->order_number,

            'billTo' => $order->first_name,
            'billEmail' => $order->email,
            'billPhone' => $order->phone,
        ]
    );

    $data = $response->json();

    if (!isset($data[0]['BillCode'])) {
        abort(500, 'ToyyibPay error: ' . json_encode($data));
    }

    return redirect('https://dev.toyyibpay.com/' . $data[0]['BillCode']);
}

    /**
     * Handle ToyyibPay Return URL (After Payment)
     */
   public function paymentStatus(Request $request)
{
    $order = Order::where('order_number', $request->order_id)->first();

    if (!$order) {
        return redirect()->route('customer.dashboard')
            ->with('error', 'Order not found.');
    }

    if ($request->status_id == 1 && $order->status !== 'Completed') {

        // Step 1: Bulk update order and stock inside a transaction
        $orderItems = [];
        DB::transaction(function () use ($order, &$orderItems) {

            $order->update(['status' => 'Completed']);

            $items = OrderItem::where('order_id', $order->id)->get(['plant_id', 'quantity']);
            $orderItems = $items->toArray();

            foreach ($items as $item) {
                Plant::where('id', $item->plant_id)->decrement('stock_quantity', $item->quantity);
            }

            Cart::where('customer_id', $order->customer_id)->delete();
            session()->forget('cart_count');
        });

        // Step 2: Run low stock checks OUTSIDE transaction (asynchronous if possible)
        $lowStock = app(\App\Http\Controllers\LowStockController::class);
        foreach ($orderItems as $item) {
            $plant = Plant::find($item['plant_id']);
            if ($plant) $lowStock->checkSingle($plant);
        }

        // Step 3: Send email to customer
        /*$user = $order->customer; // Make sure your Order model has a customer() relation
        $orderItems = OrderItem::where('order_id', $order->id)->get();

        foreach ($orderItems as $item) {
             $plant = Plant::find($item->plant_id);
            $quantity = $item->quantity;

        Mail::to($order->email)->send(
        new PaymentSuccessMail($order->customer, $order->order_number, $plant, $quantity)
    );
}*/

        // Step 4: Redirect with success popup
        return redirect()->route('customer.dashboard')
        ->with('success', 'Your order has been successfully confirmed! Check your email for details.');

    }

        // If status_id is missing or unrecognized, just show a notice without marking Failed
        return redirect()->route('customer.dashboard')
        ->with('error', 'Payment is processing. You will be notified once confirmed.');

}

    /**
     * ToyyibPay Server Callback (Logs only)
     */
    public function callback(Request $request)
    {
        $orderNumber = $request->billcode ?? null;
        $statusId = $request->status_id ?? 0;

        $order = Order::where('order_number', $orderNumber)->first();
        if ($order && $statusId == 1) {
            $order->update(['status' => 'Completed']);
            Cart::where('customer_id', $order->customer_id)->delete();
            session(['cart_count' => 0]);
        }

        \Log::info('ToyyibPay Callback Received', $request->all());
        return response('OK', 200);
    }
}
