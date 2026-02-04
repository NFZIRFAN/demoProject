<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReorderHistory extends Model
{
    protected $fillable = [
        'plant_id',
        'product_name',
        'category',
        'supplier_name',
        'reorder_quantity',
        'reorder_date',
        'expected_delivery_date'
    ];
}
