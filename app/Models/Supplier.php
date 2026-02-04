<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $primaryKey = 'supplier_id';
    protected $fillable = [
        'supplier_name',
        'phone_number',
        'email',
        'address',
        'delivery_time',
        'supplier_type', 
    ];
}

