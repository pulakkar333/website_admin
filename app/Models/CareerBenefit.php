<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareerBenefit extends Model
{
    use HasFactory;

    protected $fillable = [
        'icon',
        'title',
        'description',
        'order',
        'status'
    ];
}
