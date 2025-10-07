<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminManageController extends Controller
{
    // Show all admins
    public function index()
    {
        if (!session('admin_id')) {
            return redirect()->route('admin.login')->with('error', 'Please login first.');
        }

        $admins = Admin::orderBy('created_at', 'desc')->get();
        return view('admin.manageAdmin', compact('admins')); // ✅ use manageAdmin.blade.php
    }

    // Show form to create admin
    public function create()
    {
        return view('admin.createAdmin'); // ✅ use createAdmin.blade.php
    }

    // Store new admin
    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|email|unique:admins,email',
            'password'  => 'required|min:6',
            'ic_number' => 'required|string|max:20',
            'address'   => 'required|string|max:255',
        ]);

        Admin::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'ic_number' => $request->ic_number,
            'address'   => $request->address,
        ]);

        return redirect()->route('admin.admins.index')->with('success', 'New admin added successfully!');
    }

    // Show form to edit admin
    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admin.updateAdmin', compact('admin')); // ✅ use updateAdmin.blade.php
    }

    // Update admin
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|email|unique:admins,email,' . $id,
            'password'  => 'nullable|min:6',
            'ic_number' => 'required|string|max:20',
            'address'   => 'required|string|max:255',
        ]);

        $admin = Admin::findOrFail($id);
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->ic_number = $request->ic_number;
        $admin->address = $request->address;

        if ($request->filled('password')) {
            $admin->password = Hash::make($request->password);
        }

        $admin->save();

        return redirect()->route('admin.admins.index')->with('success', 'Admin updated successfully!');
    }

    // Delete admin
    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);

        // Prevent self-delete
        if ($admin->id == session('admin_id')) {
            return back()->with('error', 'You cannot delete yourself.');
        }

        $admin->delete();
        return redirect()->route('admin.admins.index')->with('success', 'Admin deleted successfully.');
    }
}
