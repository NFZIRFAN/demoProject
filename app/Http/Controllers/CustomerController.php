<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Plant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // ✅ Correct place!

class CustomerController extends Controller
{
    // ---------------- REGISTER ---------------- //
    public function register(Request $request)
    {
        $request->validate([
            'firstname'   => 'required|string|max:255',
            'lastname'    => 'required|string|max:255',
            'email'       => 'required|string|email|max:255|unique:customers',
            'phonenumber' => 'required|string|max:20',
            'icnumber'    => 'required|string|max:20|unique:customers',
            'password'    => 'required|string|min:6|confirmed',
        ]);

        $customer = new Customer();
        $customer->firstname   = $request->firstname;
        $customer->lastname    = $request->lastname;
        $customer->email       = $request->email;
        $customer->phonenumber = $request->phonenumber;
        $customer->icnumber    = $request->icnumber;
        $customer->password    = Hash::make($request->password); // ✅ Hashed
        $customer->save();

        return redirect()->route('customer.login')->with('success', 'Registration successful. Please login.');
    }

    // ---------------- LOGIN ---------------- //
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);

        $customer = Customer::where('email', $request->email)->first();

        if ($customer && Hash::check($request->password, $customer->password)) {
            // ✅ Store session
            session([
                'customer_id'    => $customer->id,
                'customer_name'  => $customer->firstname,
                'customer_email' => $customer->email,
                'customer_photo' => $customer->profile_picture,
            ]);

            return redirect()->route('customer.dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }

    // ---------------- LOGOUT ---------------- //
    public function logout(Request $request)
    {
        $request->session()->forget(['customer_id', 'customer_name', 'customer_photo']);
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('homepage')->with('success', 'Logged out successfully.');
    }

    // ---------------- DASHBOARD ---------------- //
    public function dashboard(Request $request)
    {
        if (!$request->session()->has('customer_id')) {
            return redirect()->route('homepage')->with('error', 'Please login first.');
        }

        $customer = Customer::find($request->session()->get('customer_id'));
        $plants   = Plant::all();

        return view('customerDashboard', compact('plants', 'customer'));
    }

    // ---------------- PROFILE ---------------- //
    public function profile(Request $request)
    {
        if (!$request->session()->has('customer_id')) {
            return redirect()->route('customer.login')->with('error', 'Please login first.');
        }

        $customer = Customer::find($request->session()->get('customer_id'));
        return view('profile', compact('customer'));
    }

    public function editProfile(Request $request)
    {
        if (!$request->session()->has('customer_id')) {
            return redirect()->route('customer.login')->with('error', 'Please login first.');
        }

        $customer = Customer::find($request->session()->get('customer_id'));
        return view('editProfile', compact('customer'));
    }

    public function updateProfile(Request $request)
    {
        if (!$request->session()->has('customer_id')) {
            return redirect()->route('customer.login')->with('error', 'Please login first.');
        }

        $customer = Customer::find($request->session()->get('customer_id'));

        $request->validate([
            'firstname'       => 'required|string|max:255',
            'lastname'        => 'required|string|max:255',
            'phonenumber'     => 'nullable|string|max:20',
            'icnumber'        => 'nullable|string|max:20',
            'age'             => 'nullable|integer|min:1',
            'address'         => 'nullable|string|max:255',
            'postcode'        => 'nullable|string|max:10',
            'relationship'    => 'nullable|string|max:50',
            'occupation'      => 'nullable|string|max:100',
            'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'header_photo'    => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
        ]);

        $customer->firstname   = $request->firstname;
        $customer->lastname    = $request->lastname;
        $customer->phonenumber = $request->phonenumber;
        $customer->icnumber    = $request->icnumber;
        $customer->age         = $request->age;
        $customer->address     = $request->address;
        $customer->postcode    = $request->postcode;
        $customer->relationship= $request->relationship;
        $customer->occupation  = $request->occupation;

        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $customer->profile_picture = $path;
        }

        if ($request->hasFile('header_photo')) {
            $path = $request->file('header_photo')->store('header_photos', 'public');
            $customer->header_photo = $path;
        }

        $customer->save();

        session([
            'customer_photo' => $customer->profile_picture,
            'customer_name'  => $customer->firstname,
        ]);

        return redirect()->route('customer.profile')->with('success', 'Profile updated successfully!');
    }
    public function showLoginForm()
    {
        return view('login');
    }
   // ---------------- SHOW REGISTER FORM ---------------- //
public function showRegisterForm()
{
    return view('Register');
}
}

