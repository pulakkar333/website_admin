<?php

namespace App\Models;

use App\Item;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentCategory extends Model
{
    use HasFactory;
    public function subCategories()
    {
        return $this->hasMany(SubCategory::class, 'parent_category_id');
    }
     public function items()
    {
        return $this->hasMany(Item::class, 'category_id');
    }
}