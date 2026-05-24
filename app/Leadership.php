<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leadership extends Model
{
    protected $fillable = [
        'name',
        'designation',
        'details',
        'image',
        'order',
        'status'
    ];

    protected $casts = [
        'order' => 'integer',
        'status' => 'boolean'
    ];
}

