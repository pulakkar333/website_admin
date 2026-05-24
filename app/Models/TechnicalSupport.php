<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TechnicalSupport extends Model
{
    use HasFactory;

  protected $fillable = [
        'name', 
        'organization', 
        'email', 
        'phone', 
        'equipment_name', 
        'message', 
        'preferred_contact_time', 
        'file',
        'status'
    ];
}
