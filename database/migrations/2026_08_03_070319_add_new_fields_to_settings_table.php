<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('settings', function (Blueprint $table) {

            $table->string('hero_image')
                ->nullable()
                ->after('hero_subtitle');

            $table->string('about_title')
                ->nullable()
                ->after('hero_image');

            $table->longText('about_description')
                ->nullable()
                ->after('about_title');

            $table->string('about_image')
                ->nullable()
                ->after('about_description');

            $table->string('bank_name')
                ->nullable()
                ->after('qris_image');

            $table->string('bank_account_name')
                ->nullable()
                ->after('bank_name');

            $table->string('bank_account_number')
                ->nullable()
                ->after('bank_account_name');

            $table->text('footer_description')
                ->nullable()
                ->after('bank_account_number');

            $table->string('copyright')
                ->nullable()
                ->after('footer_description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {

            $table->dropColumn([
                'hero_image',

                'about_title',
                'about_description',
                'about_image',

                'bank_name',
                'bank_account_name',
                'bank_account_number',

                'footer_description',
                'copyright',
            ]);

        });
    }
};