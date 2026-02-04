<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TopDealsController extends Controller
{
    public function index()
    {
        $mostPurchased = DB::table('inventory')
            ->join('order_items', 'inventory.id', '=', 'order_items.plant_id')
            ->select(
                'inventory.id',
                'inventory.name',
                'inventory.image',
                'inventory.price',
                DB::raw('SUM(order_items.quantity) as total_sold')
            )
            ->groupBy('inventory.id', 'inventory.name', 'inventory.image', 'inventory.price')
            ->orderByDesc('total_sold')
            ->take(4)
            ->get();

        return view('top-deals', compact('mostPurchased'));
    }
}

