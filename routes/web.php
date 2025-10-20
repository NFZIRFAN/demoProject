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


//checkout route 
Route::post('/checkout', [CheckoutController::class, 'showCheckout'])->name('checkout.show');
Route::post('/checkout/process', [CheckoutController::class, 'processPayment'])->name('payment.process');
Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');

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
