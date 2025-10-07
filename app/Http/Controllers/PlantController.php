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
        return view('displayPlant', compact('plant'));
    }
}
