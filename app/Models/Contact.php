<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    // The table associated with the model
    protected $table = 'contacts';

    // The attributes that are mass assignable
    protected $fillable = [
        'name',
        'email',
        'phone',
        'subject',
        'message',
        'ip_address',
        'entry_date',
        'mail_status'
    ];

    /**
     * Optional: Cast entry_date to a Carbon instance 
     * so you can format it easily in your views.
     */
    protected $casts = [
        'entry_date' => 'datetime',
    ];
}
