<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("
            ALTER TABLE registrations
            MODIFY status ENUM(
                'waiting_payment',
                'waiting_verification',
                'payment_rejected',
                'accepted',
                'rejected'
            )
            NOT NULL DEFAULT 'waiting_payment'
        ");
    }

    public function down(): void
    {
        DB::statement("
            ALTER TABLE registrations
            MODIFY status ENUM(
                'waiting_payment',
                'waiting_verification',
                'accepted',
                'rejected'
            )
            NOT NULL DEFAULT 'waiting_payment'
        ");
    }
};