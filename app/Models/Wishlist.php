<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Wishlist extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id', 'plant_id'];

    public function plant()
    {
        return $this->belongsTo(Plant::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
