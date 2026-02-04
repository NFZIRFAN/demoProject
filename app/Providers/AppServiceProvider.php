<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use App\Models\Plant;
use App\Observers\PlantObserver;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Share logged-in customer data with all views
    View::composer('*', function ($view) {
        $customer = null;
        if (session()->has('customer_id')) {
            $customer = Customer::find(session('customer_id'));
        }
        $view->with('customer', $customer);
    });

        Plant::observe(PlantObserver::class);

    }
    
}
