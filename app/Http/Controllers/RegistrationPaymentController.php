<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\Setting\SettingService;
use App\Services\Registration\RegistrationService;
use App\Services\RegistrationPayment\RegistrationPaymentService;

class RegistrationPaymentController extends Controller
{
    protected RegistrationPaymentService $registrationPaymentService;
    protected RegistrationService $registrationService;
    protected SettingService $settingService;

    public function __construct(
        RegistrationPaymentService $registrationPaymentService,
        RegistrationService $registrationService,
        SettingService $settingService
    ) {
        $this->registrationPaymentService = $registrationPaymentService;
        $this->registrationService = $registrationService;
        $this->settingService = $settingService;
    }

    /**
     * Display upload payment page.
     */
    public function create(string $registrationNumber)
    {
        $setting = $this->settingService->getFirst();

        $registration = $this->registrationService
            ->findByRegistrationNumber($registrationNumber);

        abort_if(!$registration, 404);

        if ($registration->display_status === 'expired') {
            return redirect()
                ->route(
                    'registration.show',
                    $registration->registration_number
                )
                ->with(
                    'error',
                    'Batas waktu pembayaran pendaftaran sudah berakhir.'
                );
        }

        return view(
            'registration-payment.create',
            compact(
                'setting',
                'registration'
            )
        );
    }

    /**
     * Store uploaded payment proof.
     */
    public function store(
        Request $request,
        string $registrationNumber
    ) {
        $validated = $request->validate([

            'payment_proof' => [
                'required',
                'file',
                'mimes:jpg,jpeg,png,pdf',
                'max:2048',
            ],

        ]);

        $registration = $this->registrationService
            ->findByRegistrationNumber($registrationNumber);

        abort_if(!$registration, 404);

        if ($registration->display_status === 'expired') {
            return redirect()
                ->route('registration.show', $registration->id)
                ->with(
                    'error',
                    'Batas waktu pembayaran pendaftaran sudah berakhir.'
                );
        }

        $this->registrationPaymentService->uploadPayment(
            $registration->id,
            $validated['payment_proof']
        );

        return redirect()
            ->route(
                'registration.show',
                $registration->registration_number
            )
            ->with(
                'success',
                'Bukti pembayaran berhasil diupload dan sedang menunggu verifikasi.'
            );
    }
}