<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Registration\RegistrationService;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    protected RegistrationService $registrationService;


    public function __construct(
        RegistrationService $registrationService
    ) {
        $this->registrationService = $registrationService;
    }


    public function index()
    {
        $registrations = $this->registrationService->getAll();

        return view(
            'admin.registrations.index',
            compact('registrations')
        );
    }


    public function show(int $id)
    {
        $registration = $this->registrationService->findById($id);

        return view(
            'admin.registrations.show',
            compact('registration')
        );
    }


    public function store(Request $request)
    {
        $data = $request->validate([

            'registration_number' => [
                'required',
                'string',
                'unique:registrations,registration_number'
            ],

            'course_class_id' => [
                'required',
                'exists:course_classes,id'
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

            'status' => [
                'nullable'
            ],

            'notes' => [
                'nullable',
                'string'
            ],
        ]);


        $this->registrationService->create($data);


        return back()->with(
            'success',
            'Pendaftaran berhasil ditambahkan'
        );
    }


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


        $this->registrationService->update(
            $id,
            $data
        );


        return back()->with(
            'success',
            'Status pendaftaran berhasil diperbarui'
        );
    }


    public function destroy(int $id)
    {
        $this->registrationService->delete($id);


        return back()->with(
            'success',
            'Pendaftaran berhasil dihapus'
        );
    }
}