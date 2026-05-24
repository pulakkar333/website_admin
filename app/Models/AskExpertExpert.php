<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AskExpertExpert extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'name',
        'designation',
        'order',
        'status'
    ];

    protected $casts = [
        'status' => 'boolean',
        'order' => 'integer'
    ];
}

