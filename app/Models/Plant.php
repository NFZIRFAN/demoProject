<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    use HasFactory;

    // 🔥 Add this line
    protected $table = 'inventory';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'image',
        'price',
        'description',
        'stock_quantity',
        'reorder_level',
        'category',
        'plant_care',
        'supplier_id', // ✅ ADD THIS
    ];

    public function products()
{
    return $this->hasMany(Product::class);
}

public function jitParameters()
{
    $z = 1.645; // 95% service level

    /*
    ======================================================
    PLANT ITEMS CALCULATION
    ======================================================
    */
    $plantMinDemand = 5;
    $plantMaxDemand = 15;

    // Daily demand (d) = (min + max) / 2
    $plantD = ($plantMinDemand + $plantMaxDemand) / 2; // 10 units/day

    // Lead time (L)
    $plantL = 5; // days

    // Demand deviation (Sd) = (max - min) / 4
    $plantSd = ($plantMaxDemand - $plantMinDemand) / 4; // 2.5

    // Lead time deviation (SL)
    $plantSL = 1.5;

    // Unit cost
    $plantUnitCost = 25;

    // Annual demand (A) = d × 365
    $plantA = $plantD * 365; // 10 × 365 = 3650

    // Ordering cost (O)
    $plantO = 30;

    // Holding cost (C) = unit cost × 0.2
    $plantC = $plantUnitCost * 0.2; // 25 × 0.2 = 5

    // EOQ = sqrt((2 × A × O) / C)
    $plantEOQ = ceil(sqrt((2 * $plantA * $plantO) / $plantC));
    // √(2*3650*30 /5) = 210

    // Safety Stock σL = √(L × Sd² + d² × SL²)
    $plantSigmaL = sqrt(($plantL * pow($plantSd, 2)) + 
    (pow($plantD, 2) * pow($plantSL, 2))); // √(5*6.25 + 100*2.25) = 16.01

    // SS = z × σL
    $plantSS = round($z * $plantSigmaL); // 1.645 × 16.01 ≈ 27

    // ROP = d × L + SS
    $plantROP = round(($plantD * $plantL) + $plantSS); // 10*5 + 27 = 77

    /*
    ======================================================
    NON-PLANT ITEMS CALCULATION
    ======================================================
    */
    $nonPlantMinDemand = 2;
    $nonPlantMaxDemand = 5;

    // Daily demand (d)
    $nonPlantD = ($nonPlantMinDemand + $nonPlantMaxDemand) / 2; // 3.5 units/day

    // Lead time (L)
    $nonPlantL = 10;

    // Demand deviation (Sd)
    $nonPlantSd = ($nonPlantMaxDemand - $nonPlantMinDemand) / 4; // 0.75

    // Lead time deviation (SL)
    $nonPlantSL = 3;

    // Unit cost
    $nonPlantUnitCost = 15;

    // Annual demand (A)
    $nonPlantA = $nonPlantD * 365; // 3.5 × 365 ≈ 1278

    // Ordering cost (O)
    $nonPlantO = 30;

    // Holding cost (C)
    $nonPlantC = $nonPlantUnitCost * 0.2; // 15 × 0.2 = 3

    // EOQ
    $nonPlantEOQ = round(sqrt((2 * $nonPlantA * $nonPlantO) / $nonPlantC)); // √(2*1278*30/3) ≈ 160

    // Safety Stock σL
    $nonPlantSigmaL = sqrt(($nonPlantL * pow($nonPlantSd, 2)) + (pow($nonPlantD, 2) 
    * pow($nonPlantSL, 2))); // √(10*0.5625 + 12.25*9) = 10.76

    // SS = z × σL
    $nonPlantSS = round($z * $nonPlantSigmaL); // 1.645 × 10.76 ≈ 18

    // ROP = d × L + SS
    $nonPlantROP = round(($nonPlantD * $nonPlantL) + $nonPlantSS); // 3.5*10 + 18 = 53

    /*
    ======================================================
    RETURN BOTH PLANT & NON-PLANT CALCULATIONS WITH NOTES
    ======================================================
    */
    return [
        'plant' => [
            'd'   => $plantD,      // 10.00 units/day
            'L'   => $plantL,      // 5 days
            'A'   => $plantA,      // 3650 units/year
            'Sd'  => $plantSd,     // 2.5
            'SL'  => $plantSL,     // 1.5
            'EOQ' => $plantEOQ,    // 210 units
            'SS'  => $plantSS,     // 27 units
            'ROP' => $plantROP,    // 77 units
        ],
        'non_plant' => [
            'd'   => $nonPlantD,   // 3.50 units/day
            'L'   => $nonPlantL,   // 10 days
            'A'   => $nonPlantA,   // 1278 units/year
            'Sd'  => $nonPlantSd,  // 0.75
            'SL'  => $nonPlantSL,  // 3
            'EOQ' => $nonPlantEOQ, // 160 units
            'SS'  => $nonPlantSS,  // 18 units
            'ROP' => $nonPlantROP, // 53 units
        ],
    ];
}


    /**
     * Checks if reorder is required based on stock and ROP
     */
   public function isReorderRequired()
{
    $jit = $this->jitParameters();
    $category = strtolower(trim($this->category));

    if (in_array($category, ['indoor', 'indoor plant', 'outdoor', 'outdoor plant'])) {
        // Safe access to plant ROP
        $rop = $jit['plant']['ROP'] ?? 0;
    } else {
        // Safe access to non-plant ROP
        $rop = $jit['non_plant']['ROP'] ?? 0;
    }

    return $this->stock_quantity <= $rop;
}

    public function resetLowStockEmail()
    {
        $this->low_stock_email_sent = false;
        $this->save();
    }

// In App\Models\Plant.php
public function supplier()
{
    return $this->belongsTo(\App\Models\Supplier::class, 'supplier_id', 'supplier_id');
}

}
