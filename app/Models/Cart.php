<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id', 'plant_id', 'quantity'];

    // A cart item belongs to a customer
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    // A cart item belongs to a plant
    public function plant()
    {
        return $this->belongsTo(Plant::class);
    }
}
