<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Customer;

class ResetPasswordController extends Controller
{
    public function show($token)
    {
        return view('auth.reset-password', ['token' => $token]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'token'    => 'required',
            'email'    => 'required|email',
            'password' => 'required|confirmed|min:6',
        ]);

        $record = DB::table('password_resets')->where('email', $request->email)->first();

        if (!$record || !hash_equals($record->token, $request->token)) {
            return back()->withErrors(['email' => 'Invalid or expired reset token.']);
        }

        $customer = Customer::where('email', $request->email)->first();

        if (!$customer) {
            return back()->withErrors(['email' => 'Email not found.']);
        }

        // Update password
        $customer->password = Hash::make($request->password);
        $customer->save();

        // Delete token
        DB::table('password_resets')->where('email', $request->email)->delete();

        // Auto-login after reset
        session([
            'customer_id'    => $customer->id,
            'customer_name'  => $customer->firstname,
            'customer_photo' => $customer->profile_picture,
        ]);

        return redirect()->route('customer.dashboard')->with('success', 'Password reset successfully. You are now logged in.');
    }
}
