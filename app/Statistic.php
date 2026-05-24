<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    protected $fillable = [
        'key',
        'label',
        'value',
        'order',
        'status'
    ];

    protected $casts = [
        'value' => 'integer',
        'order' => 'integer',
        'status' => 'boolean'
    ];
}

