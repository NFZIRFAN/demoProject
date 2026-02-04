<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\LowStockNotification;
use App\Models\Supplier;

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
    $categories = Plant::distinct()->pluck('category');

    // Pass all suppliers for dropdown
    $suppliers = \App\Models\Supplier::all();

    $defaultSupplier = null;
    if ($categories->contains('Indoor') || $categories->contains('Outdoor')) {
        $defaultSupplier = Supplier::where('supplier_type', 'plant')->first();
    } else {
        $defaultSupplier = Supplier::where('supplier_type', 'non_plant')->first();
    }

    return view('admin.addPlant', compact('categories', 'suppliers', 'defaultSupplier'));
}



   public function store(Request $request)
{
    $request->validate([
        'name'           => 'required|string|max:255',
        'price'          => 'required|numeric|min:0',
        'description'    => 'nullable|string',
        'plant_care'     => 'nullable|string',
        'stock_quantity' => 'required|integer|min:0',
        'category'       => 'required|string|max:100',
        'image'          => 'required|mimes:jpeg,jpg,png,gif,svg,webp,bmp,tiff|max:5120',
        'supplier_id'    => 'nullable|exists:suppliers,supplier_id', // NEW
    ]);

    $path = $request->file('image')->store('plants', 'public');

   $supplierId = $request->input('supplier_id');

// Only auto-assign if supplier is empty or null
if (empty($supplierId)) {
    $category = strtolower(trim($request->category));
    $type = in_array($category, ['indoor', 'indoor plant', 'outdoor', 'outdoor plant']) ? 'plant' : 'non_plant';
    $supplierId = Supplier::where('supplier_type', $type)->first()?->supplier_id;
}


    Plant::create([
        'name'           => $request->name,
        'price'          => $request->price,
        'description'    => $request->description,
        'plant_care'     => $request->plant_care,
        'stock_quantity' => $request->stock_quantity,
        'category'       => $request->category,
        'image'          => $path,
        'supplier_id'    => $supplierId,
    ]);

    return redirect()->route('admin.plants.index')->with('success', 'Plant added successfully!');
}


public function edit($id)
{
    $plant = Plant::findOrFail($id);
    $categories = Plant::distinct()->pluck('category');
    $suppliers = \App\Models\Supplier::all();

    return view('admin.editPlant', compact('plant', 'categories', 'suppliers'));
}


// Update plant safely
public function update(Request $request, $id)
{
    $plant = Plant::findOrFail($id);

    $request->validate([
        'name'           => 'required|string|max:255',
        'price'          => 'required|numeric|min:0',
        'description'    => 'nullable|string',
        'plant_care'     => 'nullable|string',
        'stock_quantity' => 'required|integer|min:0',
        'category'       => 'required|string|max:100',
        'image'          => 'nullable|mimes:jpeg,jpg,png,gif,svg,webp,bmp,tiff|max:5120',
        'supplier_id' => 'required|exists:suppliers,supplier_id',

    ]);

    Plant::withoutEvents(function() use ($plant, $request) {

        $plant->name           = $request->name;
        $plant->price          = $request->price;
        $plant->description    = $request->description;
        $plant->plant_care     = $request->plant_care;
        $plant->stock_quantity = $request->stock_quantity;
        $plant->category       = $request->category;

       // Determine supplier type
$category = strtolower(trim($request->category));
$type = in_array($category, ['indoor', 'indoor plant', 'outdoor', 'outdoor plant'])
        ? 'plant'
        : 'non_plant';

// ✅ Use selected supplier if provided, otherwise auto-assign
$plant->supplier_id = $request->input('supplier_id')
    ?: Supplier::where('supplier_type', $type)->first()?->supplier_id;


        // Handle image if uploaded
        if ($request->hasFile('image')) {
            $plant->image = $request->file('image')->store('plants', 'public');
        }

        $plant->save();
    });

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
    
 

/*public function checkLowStock()
{
    $plants = Plant::where('low_stock_email_sent', false)->get();

    foreach ($plants as $plant) {
        if ($plant->isReorderRequired()) {
            Notification::route('mail', 'nafizirfan03@gmail.com')
                        ->notify(new LowStockNotification($plant));

            $plant->low_stock_email_sent = true;
            $plant->save();
        }
    }

    return 'Low stock check completed.';
}*/

public function showReorderForm($id)
{
    $plant = Plant::findOrFail($id);
    $jit = $plant->jitParameters();

    $category = strtolower(trim($plant->category));
    $jitData = in_array($category, ['indoor', 'indoor plant', 'outdoor', 'outdoor plant'])
                ? $jit['plant']
                : $jit['non_plant'];

    return view('admin.reorderForm', compact('plant', 'jitData'));
}


public function submitReorder(Request $request, $id)
{
    $plant = Plant::findOrFail($id);
    $jit = $plant->jitParameters();

    $category = strtolower(trim($plant->category));
    $jitData = in_array($category, ['indoor', 'indoor plant', 'outdoor', 'outdoor plant'])
        ? $jit['plant']
        : $jit['non_plant'];

    $reorderQty = $jitData['EOQ'];

    // Save to ReorderHistory
    \App\Models\ReorderHistory::create([
        'plant_id'               => $plant->id,
        'product_name'           => $plant->name,
        'category'               => $plant->category,
        'supplier_name'          => $request->supplier,
        'reorder_quantity'       => $reorderQty,
        'reorder_date'           => now(),
        'expected_delivery_date' => $request->delivery_date,
    ]);

    Plant::withoutEvents(function() use ($plant, $jitData) {
        $plant->stock_quantity += $jitData['EOQ'];  // Access nested EOQ
        $plant->low_stock_email_sent = false;       // reset email flag
        $plant->save();
    });
    return redirect()->back()->with('success', 'Reorder confirmed and added to stock!');
}



public function getReorderData($id)
{
    $plant = Plant::findOrFail($id);
    $jit = $plant->jitParameters();

    // Determine plant / non-plant
    $category = strtolower(trim($plant->category));
    $type = in_array($category, ['indoor', 'indoor plant', 'outdoor', 'outdoor plant'])
        ? 'plant'
        : 'non_plant';

    // 🔴 PUT THIS HERE
    $supplier = Supplier::where('supplier_type', $type)->first();

    $jitData = $type === 'plant'
        ? $jit['plant']
        : $jit['non_plant'];

    return response()->json([
        'name'           => $plant->name,
        'stock'          => $plant->stock_quantity,
        'eoq'            => $jitData['EOQ'],
        'supplier_name'  => $supplier?->supplier_name ?? 'No Supplier Found',
        'delivery_time'  => $supplier?->delivery_time ?? 7,
    ]);
}

}
