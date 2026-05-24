<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'company',
        'organization',
        'designation',
        'department',
        'city',
        'message',
        'file',
        'terms_accepted',
        'product_name',
        'serial_number',
        'purchase_date',
        'address',
        'status'
    ];

    protected $casts = [
        'purchase_date' => 'date'
    ];
}
