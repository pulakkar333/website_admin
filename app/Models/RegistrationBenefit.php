<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrationBenefit extends Model
{
    use HasFactory;

    protected $fillable = [
        'icon',
        'title',
        'order'
    ];
}
