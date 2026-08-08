<?php

namespace App\Notifications;

use App\Models\RegistrationPayment;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class AdminPaymentNotification extends Notification
{
    use Queueable;

    public function __construct(
        public RegistrationPayment $payment
    ) {
    }

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toArray(object $notifiable): array
    {
        $registration = $this->payment->registration;

        return [
            'type' => 'payment',

            'title' => 'Pembayaran Baru',

            'message' =>
                $registration->full_name
                . ' telah mengirim bukti pembayaran.',

            'payment_id' => $this->payment->id,

            'registration_id' => $registration->id,

            'registration_number' =>
                $registration->registration_number,

            'url' => route(
                'registration-payments.show',
                $this->payment->id
            ),
        ];
    }
}