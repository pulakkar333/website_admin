<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManagingDirector extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'designation',
        'message',
        'career_highlights',
        'image',
        'signature',
        'status'
    ];

    protected $casts = [
        'career_highlights' => 'array',
        'status' => 'boolean'
    ];
}
