<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Registration\RegistrationService;
use App\Models\Registration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    protected RegistrationService $registrationService;


    public function __construct(
        RegistrationService $registrationService
    ) {
        $this->registrationService = $registrationService;
    }


    /**
     * Registration List
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $status = $request->input('status');


        $registrations = $this->registrationService
            ->getAll(
                $search,
                $status
            );


        $total = Registration::count();


        $waitingPayment = Registration::where(
            'status',
            'waiting_payment'
        )->count();


        $waitingVerification = Registration::where(
            'status',
            'waiting_verification'
        )->count();


        $accepted = Registration::where(
            'status',
            'accepted'
        )->count();


        return view(
            'admin.registrations.index',
            compact(
                'registrations',
                'total',
                'waitingPayment',
                'waitingVerification',
                'accepted'
            )
        );
    }


    /**
     * Registration Detail
     */
    public function show(int $id)
    {
        $registration = $this->registrationService
            ->findById($id);


        return view(
            'admin.registrations.show',
            compact(
                'registration'
            )
        );
    }


    /**
     * Manual Create (sementara)
     */
    public function store(Request $request)
    {
        $data = $request->validate([

            'course_class_id' => [
                'required',
                'exists:classes,id'
            ],

            'full_name' => [
                'required',
                'string',
                'max:255'
            ],

            'email' => [
                'required',
                'email'
            ],

            'phone' => [
                'required',
                'string'
            ],

            'gender' => [
                'required'
            ],

            'birth_date' => [
                'required',
                'date'
            ],

            'city' => [
                'required',
                'string'
            ],

            'address' => [
                'required',
                'string'
            ],

            'last_education' => [
                'required'
            ],

            'school_name' => [
                'required',
                'string'
            ],

            'graduation_year' => [
                'required'
            ],

            'status' => [
                'nullable'
            ],

            'notes' => [
                'nullable',
                'string'
            ],

        ]);


        $this->registrationService
            ->create($data);


        return back()
            ->with(
                'success',
                'Pendaftaran berhasil ditambahkan'
            );
    }


    /**
     * Update Status Registration
     */
    public function update(
        Request $request,
        int $id
    ) {
        $data = $request->validate([

            'status' => [
                'required'
            ],

            'notes' => [
                'nullable',
                'string'
            ],

        ]);


        $this->registrationService
            ->update(
                $id,
                $data
            );


        return back()
            ->with(
                'success',
                'Status pendaftaran berhasil diperbarui'
            );
    }


    /**
     * Delete Registration
     */
    public function destroy(int $id)
    {
        $this->registrationService
            ->delete($id);


        return redirect()
            ->route('registrations.index')
            ->with(
                'success',
                'Data pendaftar berhasil dihapus'
            );
    }
}