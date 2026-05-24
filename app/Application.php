<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'fullName', 'email','department', 'phone', 'position', 'resume', 'message', 'deadline',
    ];

    protected $casts = [
        'deadline' => 'date',
    ];
}
