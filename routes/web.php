<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminCustomerController;
use App\Http\Controllers\AdminManageController;
use App\Http\Controllers\AdminPlantController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PlantController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\AdminFAQController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminOrderHistoryController;
use App\Http\Controllers\TopDealsController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ToyyibpayController;
use App\Http\Controllers\ReorderHistoryController;
use App\Http\Controllers\LowStockController;
use App\Http\Controllers\ChatbotController;

Route::post('/faq/chat', [ChatbotController::class, 'chat']);


Route::get('/admin/low-stock-check', [LowStockController::class, 'checkAll']);
Route::get('/admin/low-stock-check/{plant}', [LowStockController::class, 'checkSingle']);



Route::get('/admin/reorder-history',
    [ReorderHistoryController::class, 'index']
)->name('admin.reorder-history.index');

Route::delete('/admin/reorder-history/{id}',
    [ReorderHistoryController::class, 'destroy']
)->name('admin.reorder-history.destroy');



// Fetch plant reorder data dynamically
Route::get('/admin/reorder-data/{id}', [AdminPlantController::class, 'getReorderData'])
    ->name('admin.reorder.data');

// Submit reorder
Route::post('/admin/reorder/{id}', [AdminPlantController::class, 'submitReorder'])
    ->name('admin.reorder.submit');


Route::get('/admin/reorder-history',
    [ReorderHistoryController::class, 'index']
)->name('admin.reorder.history');

// Fetch latest orders (for live dashboard)
Route::get('/admin/orders/live', [AdminController::class, 'liveOrders'])->name('admin.orders.live');

Route::get('/admin/order-counts', [AdminController::class, 'orderCounts'])
    ->name('admin.order.counts');

/* Route::get('/admin/check-low-stock', [App\Http\Controllers\AdminPlantController::class, 'checkLowStock']); */

    
/*Route::post('/admin/reorder/{id}', [AdminPlantController::class, 'confirmReorder'])
    ->name('admin.reorder')
    ->middleware('web'); */

// Checkout page
Route::get('/checkout', [CheckoutController::class, 'showCheckout'])
    ->name('checkout.show');

Route::post('/checkout', [CheckoutController::class, 'store'])
    ->name('checkout.store');

Route::get('/payment/toyyibpay/{order}', [ToyyibpayController::class, 'createBill'])
    ->name('payment.toyyibpay');

Route::get('/payment/status', [ToyyibpayController::class, 'paymentStatus'])
    ->name('payment.status');

Route::post('/payment/callback', [ToyyibpayController::class, 'callback'])
    ->name('payment.callback');


// Success page
Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');



Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('suppliers', [SupplierController::class, 'index'])->name('suppliers.index');
    Route::get('suppliers/create', [SupplierController::class, 'create'])->name('suppliers.create');
    Route::post('suppliers', [SupplierController::class, 'store'])->name('suppliers.store');
    Route::get('suppliers/{id}/edit', [SupplierController::class, 'edit'])->name('suppliers.edit');
    Route::put('suppliers/{id}', [SupplierController::class, 'update'])->name('suppliers.update');
    Route::delete('suppliers/{id}', [SupplierController::class, 'destroy'])->name('suppliers.destroy');
});

Route::get('/top-deals', [TopDealsController::class, 'index'])->name('top-deals');

Route::get('/admin/orders/counts', [App\Http\Controllers\AdminController::class, 'orderCounts'])->name('admin.orders.counts');


Route::get('/order/{id}/invoice/download', [OrderController::class, 'downloadPdf'])->name('order.downloadPdf');


// Admin routes
Route::get('/admin/orders', [AdminOrderHistoryController::class, 'index'])->name('admin.orders.index');
Route::put('/admin/orders/update-delivery/{id}', [AdminOrderHistoryController::class, 'updateDeliveryStatus'])->name('admin.orders.updateDelivery');

// Customer routes
Route::get('/my-orders', [OrderController::class, 'history'])->name('orders.history');
Route::get('/orders/delivery-statuses', [OrderController::class, 'deliveryStatuses'])->name('orders.deliveryStatuses');


// DISPLAY FROM TABLE PRODUCTS
Route::get('/plant-details/{id}', [ProductController::class, 'show'])->name('plantDetails.show');

    Route::get('/orders', [OrderController::class, 'history'])->name('orders.history');
    Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');


Route::get('/order/{id}/download', [OrderController::class, 'downloadPdf'])->name('order.download');


// General shop page
Route::get('/shop', [PlantController::class, 'index'])->name('shop.index');

// Category-specific pages
Route::get('/shop/category/{category}', [PlantController::class, 'showCategory'])->name('shop.category');

Route::middleware(['web'])->group(function () {
    Route::post('/order/store', [OrderController::class, 'store'])->name('order.store');
    Route::get('/order/invoice/{id}', [OrderController::class, 'invoice'])->name('order.invoice');
});



Route::prefix('admin')->group(function () {
    Route::get('/faqs', [AdminFAQController::class, 'index'])->name('admin.faq.index');
    Route::get('/faqs/add', [AdminFAQController::class, 'create'])->name('admin.faq.create'); // 👈 new route
    Route::post('/faqs/store', [AdminFAQController::class, 'store'])->name('admin.faq.store');
    Route::get('/faqs/edit/{id}', [AdminFAQController::class, 'edit'])->name('admin.faq.edit');
    Route::put('/faqs/update/{id}', [AdminFAQController::class, 'update'])->name('admin.faq.update');
    Route::delete('/faqs/delete/{id}', [AdminFAQController::class, 'destroy'])->name('admin.faq.delete');
});


Route::get('/faq', function () {
    return view('faq'); // The Blade file that shows the chatbot
})->name('faq.page'); // ✅ New route name for the chatbot page

Route::post('/faq/chat', [FAQController::class, 'chat'])->name('faq.chat');




// ---------------- PLANT DETAIL ---------------- //
Route::get('/plants/{id}', [PlantController::class, 'show'])->name('plants.show');


// ---------------- HOMEPAGE ---------------- //
Route::get('/', function () {
    return view('homepage');
})->name('homepage');

// ---------------- CUSTOMER ROUTES ---------------- //
// Registration
Route::get('/register', [CustomerController::class, 'showRegisterForm'])->name('customer.register');
Route::post('/register', [CustomerController::class, 'register'])->name('customer.register.submit');

// Login
Route::get('/login', [CustomerController::class, 'showLoginForm'])->name('customer.login');
Route::post('/login', [CustomerController::class, 'login'])->name('customer.login.submit');

// Dashboard
Route::get('/dashboard', [CustomerController::class, 'dashboard'])->name('customer.dashboard');

// Profile Routes
Route::get('/profile', [CustomerController::class, 'profile'])->name('customer.profile');
Route::get('/profile/edit', [CustomerController::class, 'editProfile'])->name('customer.profile.edit');
Route::post('/profile/update', [CustomerController::class, 'updateProfile'])->name('customer.profile.update');
// Logout
Route::get('/logout', [CustomerController::class, 'logout'])->name('customer.logout');

// ---------------- CUSTOMER CART ROUTES ---------------- //
Route::get('/cart', [CartController::class, 'view'])->name('cart.view');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
// Update all quantities at once
Route::post('/cart/update-all', [CartController::class, 'updateAll'])->name('cart.updateAll');
Route::get('/cart/count', [CartController::class, 'count'])->name('cart.count');


Route::post('/wishlist/store', [WishlistController::class, 'store'])->name('wishlist.store');
Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
Route::get('/wishlist/remove/{id}', [WishlistController::class, 'remove'])->name('wishlist.remove');
Route::get('/wishlist/count', [WishlistController::class, 'count'])->name('wishlist.count');


Route::get('/plant/{id}', [App\Http\Controllers\PlantController::class, 'show'])->name('plant.show');
Route::get('/blog', [BlogController::class, 'index'])->name('blog');

// About Page Route
Route::get('/about', [App\Http\Controllers\AboutController::class, 'index'])->name('about');


//contact route
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');


Route::get('/cart/count', function() {
    $count = session()->has('customer_id')
        ? \App\Models\Cart::where('customer_id', session('customer_id'))->sum('quantity')
        : 0;
    return response()->json(['count' => $count]);
})->name('cart.count');




// ---------------- ADMIN ROUTES ---------------- //
Route::prefix('admin')->group(function () {
    // Admin login
    Route::get('/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'login'])->name('admin.login.submit');

    // Admin dashboard
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Admin logout
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');

    // Plant Management
    Route::get('/plants', [AdminPlantController::class, 'index'])->name('admin.plants.index');
    Route::get('/plants/create', [AdminPlantController::class, 'create'])->name('admin.plants.create');
    Route::post('/plants', [AdminPlantController::class, 'store'])->name('admin.plants.store');
    Route::get('/plants/{id}/edit', [AdminPlantController::class, 'edit'])->name('admin.plants.edit');
    Route::put('/plants/{id}', [AdminPlantController::class, 'update'])->name('admin.plants.update');
    Route::delete('/plants/{id}', [AdminPlantController::class, 'destroy'])->name('admin.plants.destroy');

    // Customer Management (by Admin)

 // List all customers
Route::get('/customers', [AdminCustomerController::class, 'index'])->name('admin.customers.index');

// Edit & Update customer
// Edit customer route
Route::get('/customers/{id}/edit', [AdminCustomerController::class, 'edit'])->name('admin.customers.edit');
Route::put('/customers/{id}', [AdminCustomerController::class, 'update'])->name('admin.customers.update');

// Delete customer
Route::delete('/customers/{id}', [AdminCustomerController::class, 'destroy'])->name('admin.customers.destroy');



// Settings
Route::get('/settings', function () {
    return view('admin.settings');
})->name('admin.settings');


    // Admin Management
    Route::get('/admins', [AdminManageController::class, 'index'])->name('admin.admins.index');
    Route::get('/admins/create', [AdminManageController::class, 'create'])->name('admin.admins.create');
    Route::post('/admins', [AdminManageController::class, 'store'])->name('admin.admins.store');
    Route::get('/admins/{id}/edit', [AdminManageController::class, 'edit'])->name('admin.admins.edit');
    Route::put('/admins/{id}', [AdminManageController::class, 'update'])->name('admin.admins.update');
    Route::delete('/admins/{id}', [AdminManageController::class, 'destroy'])->name('admin.admins.destroy');
});
