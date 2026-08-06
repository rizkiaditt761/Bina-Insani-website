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

        'site_name',

        'logo',
        'favicon',

        'hero_title',
        'hero_subtitle',
        'hero_image',
        'hero_badge',
        'hero_success_number',

        'about_title',
        'about_description',
        'about_image',
        'about_alumni_count',

        'description',

        'address',
        'phone',
        'whatsapp',
        'email',
        'google_maps',

        'qris_image',

        'bank_name',
        'bank_account_name',
        'bank_account_number',

        'facebook',
        'instagram',
        'youtube',
        'tiktok',

        'footer_description',
        'copyright',

    ];
}