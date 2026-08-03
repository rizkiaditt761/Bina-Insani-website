<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CourseClass;

class CourseClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CourseClass::create([
            'name' => 'Bahasa Jepang Reguler',

            'registration_fee' => 250000,

            'duration' => '6 Bulan',

            'meeting_schedule' => 'Senin - Jumat',

            'description' => 'Program bahasa Jepang dasar hingga menengah.',

            'is_active' => true,
        ]);


        CourseClass::create([
            'name' => 'Bahasa Jepang Intensif',

            'registration_fee' => 250000,

            'duration' => '2.5 Bulan',

            'meeting_schedule' => 'Senin - Sabtu',

            'description' => 'Program intensif persiapan kerja ke Jepang.',

            'is_active' => true,
        ]);
    }
}