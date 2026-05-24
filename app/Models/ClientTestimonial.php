<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientTestimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'details',
        'order',
        'status'
    ];

    protected $casts = [
        'status' => 'boolean',
        'order' => 'integer'
    ];
}

