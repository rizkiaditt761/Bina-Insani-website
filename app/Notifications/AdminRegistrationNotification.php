<?php

namespace App\Notifications;

use App\Models\Registration;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class AdminRegistrationNotification extends Notification
{
    use Queueable;

    public function __construct(
        public Registration $registration
    ) {
    }

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toArray(object $notifiable): array
    {
        return [
            'type' => 'registration',

            'title' => 'Pendaftaran Baru',

            'message' =>
                $this->registration->full_name
                . ' telah melakukan pendaftaran.',

            'registration_id' =>
                $this->registration->id,

            'registration_number' =>
                $this->registration->registration_number,

            'url' => route(
                'registrations.show',
                $this->registration->id
            ),
        ];
    }
}