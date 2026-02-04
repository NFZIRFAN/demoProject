<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'plant_id', 'name', 'price', 'description', 'category', 'image', 'plant_care', 'stock_quantity'
    ];

    public function plant()
    {
        return $this->belongsTo(Plant::class, 'plant_id');
    }
}
