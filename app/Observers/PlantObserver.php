<?php

namespace App\Observers;

use App\Models\Plant;
use App\Models\Product;
use Illuminate\Support\Facades\Notification;
use App\Notifications\LowStockNotification;

class PlantObserver
{
    /**
     * Handle the Plant "created" event.
     */
    public function created(Plant $plant): void
    {
        Product::create([
            'plant_id'     => $plant->id,
            'name'         => $plant->name,
            'price'        => $plant->price,
            'description'  => $plant->description,
            'category'     => $plant->category,
            'image'        => $plant->image,
            'plant_care'   => $plant->plant_care,
            'stock_quantity' => $plant->stock_quantity,
        ]);
    }

    /**
     * Handle the Plant "updated" event.
     */
   public function updated(Plant $plant): void
{
    // Sync to Product
    $product = Product::where('plant_id', $plant->id)->first();
    if ($product) {
        $product->update([
            'name'           => $plant->name,
            'price'          => $plant->price,
            'description'    => $plant->description,
            'category'       => $plant->category,
            'image'          => $plant->image,
            'plant_care'     => $plant->plant_care,
            'stock_quantity' => $plant->stock_quantity,
        ]);
    }

    // Optional: reset low-stock flag if stock goes above ROP
    $category = strtolower(trim($plant->category));
    $jit = $plant->jitParameters();

    if (in_array($category, ['indoor', 'indoor plant', 'outdoor', 'outdoor plant'])) {
        $jitData = $jit['plant'];
    } else {
        $jitData = $jit['non_plant'];
    }

    if ($plant->stock_quantity > $jitData['ROP']) {
        $plant->low_stock_email_sent = false;
        $plant->save();
    }
}

    /**
     * Handle the Plant "deleted" event.
     */
    public function deleted(Plant $plant): void
    {
        Product::where('plant_id', $plant->id)->delete();
    }

    
}
