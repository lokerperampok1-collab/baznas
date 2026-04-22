<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $fillable = [
        'token',
        'sapaan',
        'name',
        'whatsapp',
        'comment',
        'qurban_details',
        'total_nominal',
        'unique_code',
        'total_payment',
        'payment_method',
        'payment_status',
    ];

    protected $casts = [
        'qurban_details' => 'array',
    ];
}
