<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DealershipContact extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'phone',
        'office_hours'
    ];
}

