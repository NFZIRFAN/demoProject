<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminCustomerController;
use App\Http\Controllers\AdminManageController;
use App\Http\Controllers\AdminPlantController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PlantController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;

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
    Route::get('/customers', [AdminCustomerController::class, 'index'])->name('admin.customers.index');
    Route::delete('/customers/{id}', [AdminCustomerController::class, 'destroy'])->name('admin.customers.destroy');
    // ➕ New Edit & Update routes
    Route::get('/customers/{id}/edit', [AdminCustomerController::class, 'edit'])->name('admin.customers.edit');
    Route::put('/customers/{id}', [AdminCustomerController::class, 'update'])->name('admin.customers.update');
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
