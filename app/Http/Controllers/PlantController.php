<?php

namespace App\Http\Controllers;
use App\Models\Plant;
use Illuminate\Http\Request;

class PlantController extends Controller
{
    // Show plant detail page
   public function show($id)
{
    $plant = Plant::findOrFail($id);

    // Fetch 4 random plants as recommendations (excluding current one)
    $recommended = Plant::where('id', '!=', $id)
                        ->inRandomOrder()
                        ->take(4)
                        ->get();

    // Pass $recommended to the view
    return view('displayPlant', compact('plant', 'recommended'));
}

     // Show plants by category
    public function showCategory($category)
    {
        // Convert category slug (like 'indoor') into proper case if needed
        $formattedCategory = ucfirst($category);

        // Retrieve only plants in this category
        $plants = Plant::where('category', $category)->get();

        // If no plants found, you can handle it gracefully
        if ($plants->isEmpty()) {
             return view('category', [
                'plants' => $plants,
                'category' => $formattedCategory,
                'message' => 'No plants found in this category yet.'
            ]);
        }

         return view('category', [
            'plants' => $plants,
            'category' => $formattedCategory
        ]);
    }

}
