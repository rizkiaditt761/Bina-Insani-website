<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Faq;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Faq::create([
            'question' => 'Bagaimana cara melakukan pendaftaran?',

            'answer' => 'Peserta dapat melakukan pendaftaran melalui website dengan mengisi formulir yang tersedia.',

            'sort_order' => 1,

            'is_active' => true,
        ]);


        Faq::create([
            'question' => 'Apakah mendapatkan sertifikat?',

            'answer' => 'Peserta yang menyelesaikan pelatihan akan mendapatkan sertifikat.',

            'sort_order' => 2,

            'is_active' => true,
        ]);
    }
}