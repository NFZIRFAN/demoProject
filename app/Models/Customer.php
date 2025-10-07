<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'phonenumber',
        'icnumber',
        'password',
        'profile_picture',
        'address',
        'postcode',
        'relationship',
        'age',
        'occupation',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
