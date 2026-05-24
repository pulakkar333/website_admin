<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SoftwareProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'version',
        'icon',
        'download_link',
        'pdf_manual_link',
        'software_file',
        'video_tutorial_link',
        'installation_steps',
        'license_info',
        'support_email',
        'support_phone',
        'support_hours',
        'order',
        'status'
    ];

    protected $casts = [
        'status' => 'boolean',
        'order' => 'integer'
    ];

    /**
     * Boot method to auto-generate slug
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($software) {
            if (empty($software->slug)) {
                $software->slug = Str::slug($software->name);
            }
        });

        static::updating(function ($software) {
            if (empty($software->slug)) {
                $software->slug = Str::slug($software->name);
            }
        });
    }
}