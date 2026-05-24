<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TechnicalSupportService extends Model
{
    use HasFactory;

    protected $fillable = [
        'icon',
        'title',
        'details',
        'status',
        'order'
    ];

    protected $casts = [
        'status' => 'boolean',
        'order' => 'integer'
    ];
}

