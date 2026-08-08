<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Registration\RegistrationService;
use App\Services\Class\ClassService;
use App\Services\Setting\SettingService;
use App\Services\RegistrationPayment\RegistrationPaymentService;


class RegistrationController extends Controller
{
    protected RegistrationPaymentService $registrationPaymentService;
    protected RegistrationService $registrationService;
    protected ClassService $classService;
    protected SettingService $settingService;

    public function __construct(
        RegistrationService $registrationService,
        ClassService $classService,
        SettingService $settingService,
        RegistrationPaymentService $registrationPaymentService
    ) {
        $this->registrationService = $registrationService;
        $this->classService = $classService;
        $this->settingService = $settingService;
        $this->registrationPaymentService = $registrationPaymentService;
    }
    /**
     * Registration Form
     */
    public function create()
    {
        $setting = $this->settingService->getFirst();

        $classes = $this->classService->getActive();

        return view('registration.create', compact(
            'setting',
            'classes'
        ));
    }
    /**
     * Save Registration
     */
    public function store(Request $request)
    {
        
  
   

    $validated = $request->validate([
        'course_class_id' => 'required|exists:classes,id',

         'full_name' => 'required|string|max:255',
         'email' => 'required|email|max:255|unique:registrations,email',
         'phone' => 'required|string|max:20|unique:registrations,phone',
         'gender' => 'required|in:Laki-laki,Perempuan',
         'birth_date' => 'required|date',
         'city' => 'required|string|max:255',
         'address' => 'required|string',

         'last_education' => 'required|string',
         'school_name' => 'required|string|max:255',
         'graduation_year' => 'required|digits:4',

         'ktp_file' => 'required|image|mimes:jpg,jpeg,png|max:2048',
         'diploma_file' => 'required|mimes:pdf,jpg,jpeg,png|max:4096',
         'photo_file' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

    
    

        $validated['ktp_file'] = $request
        ->file('ktp_file')
        ->store('registrations/ktp', 'public');

    $validated['diploma_file'] = $request
        ->file('diploma_file')
        ->store('registrations/diploma', 'public');

    $validated['photo_file'] = $request
        ->file('photo_file')
        ->store('registrations/photo', 'public');
         
    

        $registration = $this->registrationService->create($validated);

        return redirect()
        ->route(
            'registration.success',
            $registration->registration_number
        )
        ->cookie(
            'has_registration',
            true,
            60 * 24 * 30
        );
       
    }

    public function checkForm()
    {
        return view('registration.check');
    }

    public function check(Request $request)
    {
        $data = $request->validate([
            'email' => [
                'required',
                'email',
            ],
            'phone' => [
                'required',
                'string',
            ],
        ]);

        $registration = $this->registrationService
            ->findByEmailAndPhone(
                $data['email'],
                $data['phone']
            );

        if (! $registration) {
            return back()
                ->withInput()
                ->withErrors([
                    'email' => 'Data pendaftaran tidak ditemukan.',
                ]);
        }

        return redirect()->route(
            'registration.show',
            $registration->registration_number
        );
    }

    /**
     * Success Page
     */
    public function success(string $registrationNumber)
    {
        $setting = $this->settingService->getFirst();

        $registration = $this->registrationService
            ->findByRegistrationNumber($registrationNumber);

        abort_if(!$registration, 404);

        return view(
            'registration.success',
            compact(
                'setting',
                'registration'
            )
        );
    }

    /**
     * Registration Detail
     */
    public function show($registrationNumber)
    {
        $registration = $this->registrationService
            ->findByRegistrationNumber($registrationNumber);

        abort_if(!$registration, 404);

        $registration->load('payments');

        return view(
            'registration.show',
            compact('registration')
        );
    }

    public function payment(string $registrationNumber)
    {
        $registration = $this->registrationService
            ->findByRegistrationNumber($registrationNumber);

        abort_if(!$registration, 404);

        return view(
            'registration.payment',
            compact('registration')
        );
    }

    public function storePayment(
    Request $request,
    string $registrationNumber
    ) {

        $registration = $this->registrationService
            ->findByRegistrationNumber($registrationNumber);

        abort_if(!$registration, 404);

        $request->validate([
            'payment_proof' => [
                'required',
                'file',
                'mimes:jpg,jpeg,png,pdf',
                'max:2048',
            ],
        ]);

        $this->registrationPaymentService->uploadPayment(
            $registration->id,
            $request->file('payment_proof')
        );

        return redirect()
            ->route(
                'registration.show',
                $registration->registration_number
            )
            ->with(
                'success',
                'Bukti pembayaran berhasil dikirim dan sedang menunggu verifikasi admin.'
            );
    }

    public function cancel(string $registrationNumber)
    {
        $registration = $this->registrationService
            ->findByRegistrationNumber($registrationNumber);

        abort_if(!$registration, 404);

        /*
        |--------------------------------------------------------------------------
        | Hanya waiting_payment yang boleh dibatalkan
        |--------------------------------------------------------------------------
        */

        if ($registration->display_status !== 'waiting_payment') {
            return redirect()
                ->route(
                    'registration.show',
                    $registration->registration_number
                )
                ->with(
                    'error',
                    'Pendaftaran ini sudah tidak dapat dibatalkan.'
                );
        }

        /*
        |--------------------------------------------------------------------------
        | Batalkan pendaftaran
        |--------------------------------------------------------------------------
        */

        $this->registrationService->update(
            $registration->id,
            [
                'status' => 'cancelled',
            ]
        );

        return redirect()
            ->route(
                'registration.show',
                $registration->registration_number
            )
            ->with(
                'success',
                'Pendaftaran berhasil dibatalkan.'
            );
    }
}