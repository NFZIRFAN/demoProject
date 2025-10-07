<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class AdminCustomerController extends Controller
{
    // Show all customers for admin
    public function index()
    {
        if (!session('admin_id')) {
            return redirect()->route('admin.login')->with('error', 'Please login as admin first.');
        }

        $customers = Customer::orderBy('created_at', 'desc')->get();
        return view('admin.customerAdmin', compact('customers'));
    }

    // Show edit form
    public function edit($id)
    {
        if (!session('admin_id')) {
            return redirect()->route('admin.login')->with('error', 'Please login as admin first.');
        }

        $customer = Customer::findOrFail($id);
        return view('admin.editCustomer', compact('customer'));
    }

    // Update customer
    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);

        $request->validate([
            'firstname'    => 'required|string|max:255',
            'lastname'     => 'required|string|max:255',
            'email'        => 'required|email',
            'phonenumber'  => 'required|string|max:20',
            'icnumber'     => 'required|string|max:20',
            'address'      => 'nullable|string|max:255',
            'postcode'     => 'nullable|string|max:10',
            'relationship' => 'nullable|string|max:100',
            'age'          => 'nullable|integer|min:1',
            'occupation'   => 'nullable|string|max:100',
        ]);

        $customer->update($request->all());

        return redirect()->route('admin.customers.index')->with('success', 'Customer updated successfully.');
    }

    // Delete customer
    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        return redirect()->route('admin.customers.index')->with('success', 'Customer deleted successfully.');
    }
}
