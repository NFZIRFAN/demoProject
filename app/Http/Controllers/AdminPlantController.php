<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use Illuminate\Http\Request;

class AdminPlantController extends Controller
{
    // Show Admin Dashboard (Plant List) with Search
    public function index(Request $request)
    {
        $query = Plant::query();

        // Search filter
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where('name', 'LIKE', "%{$search}%")
                  ->orWhere('category', 'LIKE', "%{$search}%");
        }

        // You can use ->paginate(10) if you want pagination
        $plants = $query->get();

        return view('admin.listPlant', compact('plants'));
    }

    // Show Add Plant Form
    public function create()
    {
        return view('admin.addPlant');
    }

    // Store plant into DB
    public function store(Request $request)
    {
        $request->validate([
            'name'           => 'required|string|max:255',
            'price'          => 'required|numeric|min:0',
            'description'    => 'nullable|string',
            'stock_quantity' => 'required|integer|min:0',
            'reorder_level'  => 'required|integer|min:0',
            'category'       => 'required|string|max:100',
            'image'          => 'required|mimes:jpeg,jpg,png,gif,svg,webp,bmp,tiff|max:5120',
        ]);

        // store image
        $path = $request->file('image')->store('plants', 'public');

        Plant::create([
            'name'           => $request->name,
            'price'          => $request->price,
            'description'    => $request->description,
            'stock_quantity' => $request->stock_quantity,
            'reorder_level'  => $request->reorder_level,
            'category'       => $request->category,
            'image'          => $path,
        ]);

        return redirect()->route('admin.plants.index')->with('success', 'Plant added successfully!');
    }

    // Show Edit Form
    public function edit($id)
    {
        $plant = Plant::findOrFail($id);
        return view('admin.editPlant', compact('plant'));
    }

    // Update plant
    public function update(Request $request, $id)
    {
        $plant = Plant::findOrFail($id);

        $request->validate([
            'name'           => 'required|string|max:255',
            'price'          => 'required|numeric|min:0',
            'description'    => 'nullable|string',
            'stock_quantity' => 'required|integer|min:0',
            'reorder_level'  => 'required|integer|min:0',
            'category'       => 'required|string|max:100',
            'image'          => 'nullable|mimes:jpeg,jpg,png,gif,svg,webp,bmp,tiff|max:5120',
        ]);

        $plant->name           = $request->name;
        $plant->price          = $request->price;
        $plant->description    = $request->description;
        $plant->stock_quantity = $request->stock_quantity;
        $plant->reorder_level  = $request->reorder_level;
        $plant->category       = $request->category;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('plants', 'public');
            $plant->image = $path;
        }

        $plant->save();

        return redirect()->route('admin.plants.index')->with('success', 'Plant updated successfully!');
    }

    // Delete plant
    public function destroy($id)
    {
        $plant = Plant::findOrFail($id);
        $plant->delete();

        return redirect()->route('admin.plants.index')->with('success', 'Plant deleted successfully!');
    }

    // Show plants to customer
    public function customerView()
    {
        $plants = Plant::latest()->get();
        return view('customer.dashboard', compact('plants'));
    }
}
