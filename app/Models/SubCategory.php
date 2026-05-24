<?php

namespace App\Models;

use App\Item;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'parent_category_id',
        'image'
    ];

    public function parentCategory()
    {
        return $this->belongsTo(ParentCategory::class, 'parent_category_id');
    }

    public function items()
    {
        return $this->hasMany(Item::class, 'category_id');
    }
}