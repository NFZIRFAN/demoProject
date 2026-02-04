<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plant;

class ProductController extends Controller
{
    // Show all plants with products (optional listing page)
    public function index()
    {
        $plants = Plant::with('products')->get();
        return view('products.index', compact('plants'));
    }

    // Show plant details with its products
    public function show($id)
    {
        // Get the plant by ID with all related products
        $plant = Plant::with('products')->findOrFail($id);

        // Get recommended plants (same category, exclude current)
        $recommended = Plant::where('category', $plant->category)
                            ->where('id', '!=', $id)
                            ->take(4)
                            ->get();

        // Pass plant and its products to the view
        return view('productCare', compact('plant', 'recommended'));
    }
}
