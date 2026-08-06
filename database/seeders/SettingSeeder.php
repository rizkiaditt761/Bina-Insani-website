<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([

            // Website Identity
            'site_name' => 'LPK Bina Insani',

            'logo' => null,

            'favicon' => null,

            'description' => 'LPK Bina Insani merupakan lembaga pelatihan kerja yang berfokus pada pelatihan bahasa Jepang dan persiapan kerja ke Jepang dengan pendampingan profesional.',

            'about_alumni_count' => '100+',

            // Hero Section
            'hero_title' => 'Siap Kerja Dengan Kompetensi',

            'hero_subtitle' => 'Lembaga Pelatihan Kerja yang membantu peserta meningkatkan keterampilan dan kesiapan kerja.',

            'hero_badge' => 'PROGRAM PELATIHAN & PENYALURAN KERJA KE JEPANG',

            'hero_success_number' => '95%',

            // Contact
            'address' => 'Yogyakarta, Indonesia',

            'phone' => '081234567890',

            'whatsapp' => '081234567890',

            'email' => 'info@bina-insani.com',


            // Maps
            'google_maps' => null,


            // Payment
            'qris_image' => null,


            // Social Media
            'facebook' => 'https://facebook.com',

            'instagram' => 'https://instagram.com',

            'youtube' => 'https://youtube.com',

            'tiktok' => 'https://tiktok.com',
        ]);
    }
}