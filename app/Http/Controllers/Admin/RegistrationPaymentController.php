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
                'nullable'
            ],

            'notes' => [
                'nullable',
                'string'
            ],
        ]);

        $this->registrationPaymentService->create($data);

        return back()->with(
            'success',
            'Pembayaran berhasil ditambahkan.'
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

        $this->registrationPaymentService->update(
            $id,
            $data
        );

        return back()->with(
            'success',
            'Status pembayaran berhasil diperbarui.'
        );
    }

    public function destroy(int $id)
    {
        $this->registrationPaymentService->delete($id);

        return back()->with(
            'success',
            'Pembayaran berhasil dihapus.'
        );
    }

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
            'Memverifikasi pembayaran ' .
            $payment->registration->registration_number
        );

        return back()->with(
            'success',
            'Pembayaran berhasil diverifikasi.'
        );
    }

    public function reject(
        Request $request,
        int $id
    ) {
        $request->validate([
            'notes' => [
                'nullable',
                'string',
                'max:1000',
            ],
        ]);

        $payment = $this->registrationPaymentService
            ->reject(
                $id,
                auth()->id(),
                $request->notes
            );

        $this->activityService->log(
            'Registration Payment',
            'Reject',
            'Menolak pembayaran ' .
            $payment->registration->registration_number
        );

        return back()->with(
            'success',
            'Pembayaran berhasil ditolak.'
        );
    }
}