<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'slug', 'location', 'department', 'job_summery', 'jobFunction',
        'jobType', 'link', 'description', 'image', 'sequence', 'deadline'
    ];

    protected $casts = [
        'deadline' => 'date',
    ];
}
