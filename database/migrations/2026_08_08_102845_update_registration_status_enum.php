<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('registrations', function (Blueprint $table) {
            $table->enum('status', [
                'waiting_payment',
                'waiting_verification',
                'payment_rejected',
                'accepted',
                'rejected',
                'cancelled',
            ])->default('waiting_payment')->change();
        });
    }

    public function down(): void
    {
        Schema::table('registrations', function (Blueprint $table) {
            $table->enum('status', [
                'waiting_payment',
                'waiting_verification',
                'payment_rejected',
                'accepted',
                'rejected',
            ])->default('waiting_payment')->change();
        });
    }
};