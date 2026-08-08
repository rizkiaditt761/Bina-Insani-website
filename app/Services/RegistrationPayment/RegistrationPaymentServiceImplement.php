<?php

namespace App\Services\RegistrationPayment;

use App\Repositories\RegistrationPayment\RegistrationPaymentRepository;
use App\Services\Registration\RegistrationService;
use Illuminate\Http\UploadedFile;
use App\Models\User;
use App\Notifications\AdminPaymentNotification;

class RegistrationPaymentServiceImplement implements RegistrationPaymentService
{
    protected RegistrationPaymentRepository $registrationPaymentRepository;

    protected RegistrationService $registrationService;


    public function __construct(
        RegistrationPaymentRepository $registrationPaymentRepository,
        RegistrationService $registrationService
    ) {
        $this->registrationPaymentRepository = $registrationPaymentRepository;
        $this->registrationService = $registrationService;
    }


    /**
     * Get all payments
     */
    public function getAll(array $filters = [])
    {
        return $this->registrationPaymentRepository
            ->getAll($filters);
    }


    /**
     * Find payment by id
     */
    public function findById(int $id)
    {
        return $this->registrationPaymentRepository
            ->findById($id);
    }


    /**
     * Create payment
     */
    public function create(array $data)
    {
        return $this->registrationPaymentRepository
            ->create($data);
    }


    /**
     * Update payment
     */
    public function update(int $id, array $data)
    {
        return $this->registrationPaymentRepository
            ->update($id, $data);
    }


    /**
     * Delete payment
     */
    public function delete(int $id)
    {
        return $this->registrationPaymentRepository
            ->delete($id);
    }


    /**
     * Find payment by registration
     */
    public function findByRegistrationId(int $registrationId)
    {
        return $this->registrationPaymentRepository
            ->findByRegistrationId($registrationId);
    }


    /**
     * Upload payment proof from participant
     */
    public function uploadPayment(
        int $registrationId,
        UploadedFile $file
    ) {
        $registration = $this->registrationService
            ->findById($registrationId);

        $path = $file->store(
            'registration-payments',
            'public'
        );

        $payment = $this->registrationPaymentRepository
            ->createOrUpdate([
                'registration_id' => $registrationId,

                'payment_method' => 'QRIS',

                'amount' => $registration
                    ->courseClass
                    ->registration_fee,

                'payment_proof' => $path,

                'status' => 'waiting_verification',

                'rejection_reason' => null,
            ]);

        $this->registrationService
            ->update(
                $registrationId,
                [
                    'status' => 'waiting_verification'
                ]
            );

        // Kirim notifikasi pembayaran ke admin
        User::all()->each(function ($user) use ($payment) {
            $user->notify(
                new AdminPaymentNotification($payment)
            );
        });

        return $payment;
    }


    /**
     * Approve payment
     */
    public function approve(
        int $id,
        int $verifiedBy
    ) {

        return $this->registrationPaymentRepository
            ->approve(
                $id,
                $verifiedBy
            );
    }


    /**
     * Reject payment
     */
    public function reject(
        int $id,
        int $verifiedBy,
        ?string $rejectionReason = null
    ) {

        return $this->registrationPaymentRepository
            ->reject(
                $id,
                $verifiedBy,
                $rejectionReason
            );
    }


    /**
     * Waiting verification
     */
    public function getPending()
    {
        return $this->registrationPaymentRepository
            ->getPending();
    }


    /**
     * Verified payments
     */
    public function getVerified()
    {
        return $this->registrationPaymentRepository
            ->getVerified();
    }


    /**
     * Rejected payments
     */
    public function getRejected()
    {
        return $this->registrationPaymentRepository
            ->getRejected();
    }
}