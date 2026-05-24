<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientsPhoto extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'title',
        'designation',
        'slug',
        'image',
        'sl',
        'status'
    ];

    protected $casts = [
        'status' => 'boolean',
        'sl' => 'integer',
        'category_id' => 'integer'
    ];

    /**
     * Get the category that the client belongs to.
     */
    public function category()
    {
        return $this->belongsTo(ClientCategory::class, 'category_id');
    }
}
