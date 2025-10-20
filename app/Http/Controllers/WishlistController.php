<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Models\Plant;

class WishlistController extends Controller
{
    public function store(Request $request)
    {
        try {
            $customerId = session('customer_id');

            if (!$customerId) {
                return response()->json(['error' => 'Please log in first.'], 401);
            }

            $plantId = $request->plant_id;

            // 🌱 Check if plant exists
            $plant = Plant::find($plantId);
            if (!$plant) {
                return response()->json(['error' => 'Plant not found.'], 404);
            }

            // ✅ Check if item already exists in wishlist
            $exists = Wishlist::where('customer_id', $customerId)
                              ->where('plant_id', $plantId)
                              ->first();

            if ($exists) {
                return response()->json([
                    'exists' => true,
                    'message' => 'This plant is already in your wishlist 🌿'
                ]);
            }

            // ✅ Add new wishlist entry
            Wishlist::create([
                'customer_id' => $customerId,
                'plant_id' => $plantId
            ]);

            $count = Wishlist::where('customer_id', $customerId)->count();

            return response()->json([
                'success' => true,
                'message' => 'Added to wishlist ❤️',
                'count' => $count
            ]);

        } catch (\Exception $e) {
            // ✅ Catch any unexpected error so frontend always gets JSON
            return response()->json([
                'error' => 'Something went wrong. Try again later.',
                'debug' => $e->getMessage() // remove this line in production
            ], 500);
        }
    }

    public function index()
    {
        if (!session()->has('customer_id')) {
            return redirect()->route('customer.login');
        }

        $wishlists = Wishlist::with('plant')
            ->where('customer_id', session('customer_id'))
            ->get();

        return view('wishlist', compact('wishlists'));
    }

    public function remove($id)
    {
        $wishlist = Wishlist::find($id);

        if ($wishlist) {
            $wishlist->delete();
            return redirect()->route('wishlist.index')
                             ->with('success', 'Removed from wishlist successfully!');
        }

        return redirect()->route('wishlist.index')
                         ->with('error', 'Item not found!');
    }

    public function count()
    {
        if (!session()->has('customer_id')) {
            return response()->json(['count' => 0]);
        }

        $count = Wishlist::where('customer_id', session('customer_id'))->count();
        return response()->json(['count' => $count]);
    }
}
