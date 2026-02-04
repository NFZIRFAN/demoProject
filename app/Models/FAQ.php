<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    use HasFactory;

    protected $table = 'faqs'; // 👈 Add this line

   protected $fillable = [
    'section',
    'question',
    'answer',
    'keywords',
];

}
