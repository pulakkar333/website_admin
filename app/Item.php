<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'model_name', // Added the new field here
        'product_brand',
        'slug',
        'sub_title',
        'description',
        'image',
        'sl',
        'is_latest',
        'brochure',
        'title1',
        'details1',
        'title2',
        'details2',
        'title3',
        'details3',
        'title4',
        'details4'
    ];

    public function category()
    {
        // This links the item to its sub-category
        return $this->belongsTo('App\Models\SubCategory', 'category_id');
    }
}