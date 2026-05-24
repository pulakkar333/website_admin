<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CorporateEcosystem extends Model
{
    use HasFactory;

    protected $fillable = [
        'icon',
        'title',
        'description',
        'image',
        'link',
        'order',
        'status'
    ];

    protected $casts = [
        'status' => 'boolean',
        'order' => 'integer'
    ];
}

