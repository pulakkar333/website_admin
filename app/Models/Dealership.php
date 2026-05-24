<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dealership extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'company',
        'owner',
        'address',
        'trade_license_tin',
        'business_type',
        'years_of_experience',
        'area_of_interest',
        'city',
        'state',
        'message',
        'document_file',
        'status'
    ];
}