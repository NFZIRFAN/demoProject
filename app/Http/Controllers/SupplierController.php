<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    // Display all suppliers
    public function index()
    {
        $suppliers = Supplier::all();
        return view('admin.listsupplier', compact('suppliers'));
    }

    // Show add supplier form
    public function create()
    {
        return view('admin.addsupplier');
    }

    // Store new supplier
    public function store(Request $request)
    {
        $request->validate([
            'supplier_name' => 'required|string|max:255',
            'phone_number'  => 'required|string|max:20',
            'email'         => 'required|email|unique:suppliers,email',
            'address'       => 'required|string|max:255',
            'delivery_time' => 'required|integer|min:1',
            'supplier_type' => 'required|in:plant,non_plant',
            
        ]);

        Supplier::create($request->all());
        return redirect()->route('admin.suppliers.index')->with('success', 'Supplier added successfully!');
    }

    // Show edit supplier form
    public function edit($id)
    {
        $supplier = Supplier::findOrFail($id);
        return view('admin.editsupplier', compact('supplier'));
    }

    // Update supplier
    public function update(Request $request, $id)
    {
        $supplier = Supplier::findOrFail($id);

        $request->validate([
            'supplier_name' => 'required|string|max:255',
            'phone_number'  => 'required|string|max:20',
            'email'         => 'required|email|unique:suppliers,email,' . $id . ',supplier_id',
            'address'       => 'required|string|max:255',
            'delivery_time' => 'required|integer|min:1',
            'supplier_type' => 'required|in:plant,non_plant',
        ]);

        $supplier->update($request->all());
        return redirect()->route('admin.suppliers.index')->with('success', 'Supplier updated successfully!');
    }

    // Delete supplier
    public function destroy($id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();
        return redirect()->route('admin.suppliers.index')->with('success', 'Supplier deleted successfully!');
    }
}
