<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Plant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Order;

class AdminController extends Controller
{
    // Show login form
    public function showLoginForm()
    {
        return view('admin.login');
    }

    // Handle login
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $admin = Admin::where('email', $request->email)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            $request->session()->put('admin_id', $admin->id);
            $request->session()->put('admin_name', $admin->name);

            return redirect()->route('admin.dashboard')->with('success', 'Welcome Admin!');
        }

        return back()->withErrors(['email' => 'Invalid admin credentials'])->withInput();
    }

    // Show dashboard
    public function dashboard(Request $request)
{
    if (!$request->session()->has('admin_id')) {
        return redirect()->route('admin.login')->with('error', 'Please login first.');
    }

    // All plants for low stock display
    $plants = Plant::orderBy('created_at', 'desc')->get();

    $mostPurchased = DB::table('order_items')
        ->join('inventory', 'order_items.plant_id', '=', 'inventory.id')
        ->select('order_items.plant_id', 'order_items.plant_name', 'order_items.price', 'inventory.image', DB::raw('SUM(order_items.quantity) as total_sold'))
        ->groupBy('order_items.plant_id', 'order_items.plant_name', 'order_items.price', 'inventory.image')
        ->orderByDesc('total_sold')
        ->limit(4)
        ->get();

    // Dashboard statistics
    $totalRevenue = DB::table('orders')->sum('total');
    $totalOrders = DB::table('orders')->count();
    $totalCustomers = DB::table('customers')->count();

    // Count by delivery status automatically
$pendingDelivery = DB::table('orders')->where('delivery_status', 'Pending Delivery')->count();
$outForDelivery = DB::table('orders')->where('delivery_status', 'Out for Delivery')->count();
$completedDelivery = DB::table('orders')->where('delivery_status', 'Completed')->count();

$lowStockPlants = $plants->filter(fn($plant) => $plant->isReorderRequired());
$lowStockCount = $lowStockPlants->count();

    return view('admin.dashboard', compact(
        'plants', 
        'mostPurchased', 
        'totalRevenue', 
        'totalOrders', 
        'totalCustomers',
        'pendingDelivery',
        'outForDelivery',
        'completedDelivery',
        'lowStockPlants',
        'lowStockCount' // ✅ ADD THIS
    ));
}
    // Logout
    public function logout(Request $request)
    {
        $request->session()->forget(['admin_id', 'admin_name']);
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login')->with('success', 'Logged out successfully');
    }

    public function orderCounts()
{
    $pendingDelivery = Order::where('delivery_status', 'Pending Delivery')->count();
    $outForDelivery = Order::where('delivery_status', 'Out for Delivery')->count();
    $completedDelivery = Order::where('delivery_status', 'Completed')->count();

    return response()->json([
        'pendingDelivery' => $pendingDelivery,
        'outForDelivery' => $outForDelivery,
        'completedDelivery' => $completedDelivery,
    ]);
}

public function liveOrders()
{
    // Fetch latest 500 orders
    $orders = Order::orderBy('created_at', 'desc')->limit(500)->get();

    // Count delivery statuses
    $pendingDelivery = Order::where('delivery_status', 'Pending Delivery')->count();
    $outForDelivery = Order::where('delivery_status', 'Out for Delivery')->count();
    $completedDelivery = Order::where('delivery_status', 'Completed')->count();

    return response()->json([
        'orders' => $orders,
        'pendingDelivery' => $pendingDelivery,
        'outForDelivery' => $outForDelivery,
        'completedDelivery' => $completedDelivery
    ]);
}
 

}
