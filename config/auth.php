<?php

return [

    'defaults' => [
        'guard' => 'web', // Customers use "web"
        'passwords' => 'users',
    ],

    'guards' => [
        'web' => [   // Customer guard
            'driver' => 'session',
            'provider' => 'users',
        ],

        'admin' => [ // Admin guard
            'driver' => 'session',
            'provider' => 'admins',
        ],
    ],

    'providers' => [
        'users' => [ // Customers
            'driver' => 'eloquent',
            'model' => App\Models\Customer::class,
        ],

        'admins' => [
            'driver' => 'eloquent',
            'model' => App\Models\Admin::class,
        ],
    ],

    'passwords' => [
        'users' => [ // Customers
            'provider' => 'users',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],

        'admins' => [
            'provider' => 'admins',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,

];
