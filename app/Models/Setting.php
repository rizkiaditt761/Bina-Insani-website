<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [

        // Website Identity
        'site_name',
        'logo',
        'favicon',
        'description',

        // Hero Section
        'hero_title',
        'hero_subtitle',

        // Contact
        'address',
        'phone',
        'whatsapp',
        'email',

        // Maps
        'google_maps',

        // Payment
        'qris_image',

        // Social Media
        'facebook',
        'instagram',
        'youtube',
        'tiktok',
    ];
}