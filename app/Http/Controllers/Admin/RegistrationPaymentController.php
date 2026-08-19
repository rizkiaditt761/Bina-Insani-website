<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Activity\ActivityService;
use App\Services\RegistrationPayment\RegistrationPaymentService;
use Illuminate\Http\Request;

class RegistrationPaymentController extends Controller
{
    protected RegistrationPaymentService $registrationPaymentService;

    protected ActivityService $activityService;


    public function __construct(
        RegistrationPaymentService $registrationPaymentService,
        ActivityService $activityService
    ) {
        $this->registrationPaymentService =
            $registrationPaymentService;

        $this->activityService =
            $activityService;
    }


    /**
     * Daftar pembayaran.
     */
    public function index(Request $request)
    {
        $filters = $request->only([
            'search',
            'status',
        ]);


        $payments =
            $this->registrationPaymentService
                ->getAll($filters);


        $pending =
            $this->registrationPaymentService
                ->getPendingCount();


        $verified =
            $this->registrationPaymentService
                ->getVerifiedCount();


        $rejected =
            $this->registrationPaymentService
                ->getRejectedCount();


        $total =
            $pending +
            $verified +
            $rejected;


        return view(
            'admin.registration-payments.index',
            compact(
                'payments',
                'pending',
                'verified',
                'rejected',
                'total'
            )
        );
    }


    /**
     * Detail pembayaran.
     */
    public function show(int $id)
    {
        $payment =
            $this->registrationPaymentService
                ->findById($id);


        return view(
            'admin.registration-payments.show',
            compact('payment')
        );
    }


    /**
     * Manual create payment.
     */
    public function store(Request $request)
    {
        $data = $request->validate([

            'registration_id' => [
                'required',
                'integer',
                'exists:registrations,id',
            ],

            'payment_method' => [
                'required',
                'string',
                'max:100',
            ],

            'amount' => [
                'required',
                'numeric',
                'min:0',
            ],

            'payment_proof' => [
                'nullable',
                'string',
            ],

            'status' => [
                'nullable',
                'in:waiting_verification,verified,rejected',
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
     * Update payment.
     *
     * Method ini dipertahankan untuk kebutuhan
     * administrasi manual.
     */
    public function update(
        Request $request,
        int $id
    ) {
        $data = $request->validate([

            'status' => [
                'required',
                'in:waiting_verification,verified,rejected',
            ],

            'rejection_reason' => [
                'nullable',
                'string',
                'max:1000',
            ],

        ]);


        $payment =
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
     * Delete payment.
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
     * Approve / verify payment.
     */
    public function approve(int $id)
    {
        $payment =
            $this->registrationPaymentService
                ->approve(
                    $id,
                    auth()->id()
                );


        /*
         * Jika payment sudah pernah diproses,
         * jangan membuat activity log approve ulang.
         */
        if ($payment->status === 'verified') {

            $this->activityService->log(

                'Registration Payment',

                'Approve',

                'Menyetujui pembayaran ' .
                $payment->registration
                    ->registration_number

            );

        }


        return back()
            ->with(
                'success',
                'Pembayaran berhasil diverifikasi.'
            );
    }


    /**
     * Reject payment.
     */
    public function reject(
        Request $request,
        int $id
    ) {
        $data = $request->validate([

            'rejection_reason' => [
                'required',
                'string',
                'max:1000',
            ],

        ]);


        $payment =
            $this->registrationPaymentService
                ->reject(
                    $id,
                    auth()->id(),
                    $data['rejection_reason']
                );


        /*
         * Activity log hanya dibuat setelah
         * payment benar-benar rejected.
         */
        if ($payment->status === 'rejected') {

            $this->activityService->log(

                'Registration Payment',

                'Reject',

                'Menolak pembayaran ' .
                $payment->registration
                    ->registration_number

            );

        }


        return back()
            ->with(
                'success',
                'Pembayaran berhasil ditolak.'
            );
    }
}