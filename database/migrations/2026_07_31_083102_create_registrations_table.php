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
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();

            // Registration Information
            $table->string('registration_number')->unique();

            // Selected Class
            $table->foreignId('course_class_id')
                ->constrained('classes')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            // Personal Information
            $table->string('full_name');
            $table->string('email')->index();
            $table->string('phone', 20)->index();

            $table->enum('gender', [
                'Laki-laki',
                'Perempuan',
            ]);

            $table->date('birth_date');
            $table->string('city');
            $table->text('address');


            // =====================================
            // Education Information
            // =====================================

            $table->enum('last_education', [
                'SMP / MTs',
                'SMA / SMK / MA',
                'D1',
                'D2',
                'D3',
                'D4',
                'S1',
                'S2',
                'S3',
                'Lainnya',
            ]);

            $table->string('school_name');

            $table->year('graduation_year');


            // =====================================
            // Required Documents
            // =====================================

            $table->string('ktp_file');

            $table->string('diploma_file');

            $table->string('photo_file');

            // Registration Status
            $table->enum('status', [
                'waiting_payment',
                'waiting_verification',
                'accepted',
                'rejected',
            ])->default('waiting_payment')->index();

            // Admin Notes
            $table->text('notes')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};