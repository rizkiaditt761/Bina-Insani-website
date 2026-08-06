<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\RegistrationPayment\RegistrationPaymentService;
use App\Services\Activity\ActivityService;
use Illuminate\Http\Request;

class RegistrationPaymentController extends Controller
{
    protected RegistrationPaymentService $registrationPaymentService;
    protected ActivityService $activityService;


    public function __construct(
        RegistrationPaymentService $registrationPaymentService,
        ActivityService $activityService
    ) {
        $this->registrationPaymentService = $registrationPaymentService;
        $this->activityService = $activityService;
    }


    /**
     * Payment List
     */
    public function index(Request $request)
    {
        $filters = $request->only([
            'search',
            'status',
        ]);


        $payments = $this->registrationPaymentService
            ->getAll($filters);


        $pending = $this->registrationPaymentService
            ->getPending()
            ->count();


        $verified = $this->registrationPaymentService
            ->getVerified()
            ->count();


        $rejected = $this->registrationPaymentService
            ->getRejected()
            ->count();


        return view(
            'admin.registration-payments.index',
            compact(
                'payments',
                'pending',
                'verified',
                'rejected'
            )
        );
    }



    /**
     * Payment Detail
     */
    public function show(int $id)
    {
        $payment = $this->registrationPaymentService
            ->findById($id);


        abort_if(!$payment, 404);


        return view(
            'admin.registration-payments.show',
            compact('payment')
        );
    }



    /**
     * Manual Create Payment
     * (Optional untuk admin)
     */
    public function store(Request $request)
    {
        $data = $request->validate([

            'registration_id' => [
                'required',
                'exists:registrations,id'
            ],

            'payment_method' => [
                'required',
                'string'
            ],

            'amount' => [
                'required',
                'numeric'
            ],

            'payment_proof' => [
                'nullable',
                'string'
            ],

            'status' => [
                'nullable',
                'in:waiting_verification,approved,rejected'
            ],

            'rejection_reason' => [
                'nullable',
                'string',
                'max:1000',
            ],

        ]);


        $this->registrationPaymentService
            ->create($data);


        return back()
            ->with(
                'success',
                'Pembayaran berhasil ditambahkan.'
            );
    }



    /**
     * Update Payment
     */
    public function update(
        Request $request,
        int $id
    ) {

        $data = $request->validate([

            'status' => [
                'required',
                'in:waiting_verification,approved,rejected'
            ],

            'rejection_reason' => [
                'nullable',
                'string',
                'max:1000',
            ],

        ]);


        $this->registrationPaymentService
            ->update(
                $id,
                $data
            );


        return back()
            ->with(
                'success',
                'Status pembayaran berhasil diperbarui.'
            );
    }



    /**
     * Delete Payment
     */
    public function destroy(int $id)
    {
        $this->registrationPaymentService
            ->delete($id);


        return back()
            ->with(
                'success',
                'Pembayaran berhasil dihapus.'
            );
    }



    /**
     * Approve Payment
     */
    public function approve(int $id)
    {

        $payment = $this->registrationPaymentService
            ->approve(
                $id,
                auth()->id()
            );


        $this->activityService->log(

            'Registration Payment',

            'Approve',

            'Menyetujui pembayaran ' .
            $payment->registration->registration_number

        );


        return back()
            ->with(
                'success',
                'Pembayaran berhasil disetujui.'
            );
    }



    /**
     * Reject Payment
     */
    public function reject(
        Request $request,
        int $id
    ) {

        $request->validate([

            'rejection_reason' => [
                'required',
                'string',
                'max:1000',
            ],

        ]);



        $payment = $this->registrationPaymentService
            ->reject(
                $id,
                auth()->id(),
                $request->rejection_reason
            );



        $this->activityService->log(

            'Registration Payment',

            'Reject',

            'Menolak pembayaran ' .
            $payment->registration->registration_number

        );



        return back()
            ->with(
                'success',
                'Pembayaran berhasil ditolak.'
            );
    }
}