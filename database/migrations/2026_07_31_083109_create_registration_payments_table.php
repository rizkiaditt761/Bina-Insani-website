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
        Schema::create('registration_payments', function (Blueprint $table) {
            $table->id();

            // Registration
            $table->foreignId('registration_id')
                ->constrained('registrations')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            // Payment Information
            $table->string('payment_method')->default('QRIS');
            $table->decimal('amount', 15, 2);
            $table->string('payment_proof');

            // Verification
            $table->enum('status', [
                'waiting_verification',
                'verified',
                'rejected',
            ])->default('waiting_verification')->index();

            $table->foreignId('verified_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete()
                ->cascadeOnUpdate();

            $table->timestamp('verified_at')->nullable();

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
        Schema::dropIfExists('registration_payments');
    }
};