<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'title',
        'details',
        'image',
        'order',
        'status'
    ];

    public function clients()
    {
        return $this->belongsToMany(\App\Models\ClientsPhoto::class, 'client_category_pivot', 'category_id', 'client_id');
    }
}
