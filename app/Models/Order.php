<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
protected $fillable = [
    'customer_id',
    'order_number',
    'payment_method',
    'total',
    'shipping_fee',  // <-- add this
    'status',
    'delivery_status', // add this
    'additional_info',
    'address_1',
    'address_2',
    'city',
    'state',
    'zip',
    'first_name',
    'last_name',
    'email',
    'phone',
];
    // Relationship to Customer
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function items()
{
    return $this->hasMany(OrderItem::class);
}

}

