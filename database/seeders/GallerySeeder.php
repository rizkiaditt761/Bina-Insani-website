<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gallery;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Gallery::create([
            'title' => 'Kegiatan Pelatihan',

            'category' => 'Kegiatan',

            'description' => 'Aktivitas pembelajaran peserta.',

            'image' => 'gallery/default.jpg',

            'sort_order' => 1,

            'is_active' => true,
        ]);


        Gallery::create([
            'title' => 'Suasana Kelas',

            'category' => 'Fasilitas',

            'description' => 'Ruang belajar peserta.',

            'image' => 'gallery/default.jpg',

            'sort_order' => 2,

            'is_active' => true,
        ]);
    }
}