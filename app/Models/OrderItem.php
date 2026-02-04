<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'plant_id',
        'plant_name',
        'quantity',
        'total',
        'price',
    ];

    // Relation: Each order item belongs to one order
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Relation: Each order item references one plant
    public function plant()
    {
        return $this->belongsTo(Plant::class);
    }
}
