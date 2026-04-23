<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $fillable = [
        'token',
        'pakasir_order_id',
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
        'payment_data',
    ];

    protected $casts = [
        'qurban_details' => 'array',
        'payment_data' => 'array',
    ];
}
