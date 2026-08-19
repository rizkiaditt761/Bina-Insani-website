<?php

namespace App\Services\RegistrationPayment;

use App\Models\User;
use App\Notifications\AdminPaymentNotification;
use App\Repositories\RegistrationPayment\RegistrationPaymentRepository;
use App\Services\Registration\RegistrationService;
use Illuminate\Http\UploadedFile;

class RegistrationPaymentServiceImplement
    implements RegistrationPaymentService
{
    protected RegistrationPaymentRepository $registrationPaymentRepository;

    protected RegistrationService $registrationService;


    public function __construct(
        RegistrationPaymentRepository $registrationPaymentRepository,
        RegistrationService $registrationService
    ) {
        $this->registrationPaymentRepository =
            $registrationPaymentRepository;

        $this->registrationService =
            $registrationService;
    }


    /**
     * Get all payments.
     */
    public function getAll(array $filters = [])
    {
        return $this->registrationPaymentRepository
            ->getAll($filters);
    }


    /**
     * Find payment by ID.
     */
    public function findById(int $id)
    {
        return $this->registrationPaymentRepository
            ->findById($id);
    }


    /**
     * Find payment by registration ID.
     */
    public function findByRegistrationId(
        int $registrationId
    ) {
        return $this->registrationPaymentRepository
            ->findByRegistrationId($registrationId);
    }


    /**
     * Create payment.
     */
    public function create(array $data)
    {
        return $this->registrationPaymentRepository
            ->create($data);
    }


    /**
     * Update payment.
     */
    public function update(
        int $id,
        array $data
    ) {
        return $this->registrationPaymentRepository
            ->update(
                $id,
                $data
            );
    }


    /**
     * Delete payment.
     */
    public function delete(int $id)
    {
        return $this->registrationPaymentRepository
            ->delete($id);
    }


    /**
     * Upload payment proof dari peserta.
     */
    public function uploadPayment(
        int $registrationId,
        UploadedFile $file
    ) {
        $registration =
            $this->registrationService
                ->findById($registrationId);


        /*
         * Simpan bukti pembayaran.
         */
        $path = $file->store(
            'registration-payments',
            'public'
        );


        /*
         * Buat / update payment.
         */
        $payment =
            $this->registrationPaymentRepository
                ->createOrUpdate([

                    'registration_id' =>
                        $registrationId,

                    'payment_method' =>
                        'QRIS',

                    'amount' =>
                        $registration
                            ->courseClass
                            ->registration_fee,

                    'payment_proof' =>
                        $path,

                    'status' =>
                        'waiting_verification',

                    'rejection_reason' =>
                        null,

                ]);


        /*
         * Registration kembali ke tahap
         * waiting verification.
         */
        $this->registrationService
            ->update(
                $registrationId,
                [
                    'status' =>
                        'waiting_verification',
                ]
            );


        /*
         * Kirim notifikasi ke admin.
         */
        User::query()
            ->each(function ($user) use ($payment) {

                $user->notify(
                    new AdminPaymentNotification($payment)
                );

            });


        return $payment;
    }


    /**
     * Approve payment.
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
     * Reject payment.
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
     * Count waiting verification.
     */
    public function getPendingCount(): int
    {
        return $this->registrationPaymentRepository
            ->getPendingCount();
    }


    /**
     * Count verified.
     */
    public function getVerifiedCount(): int
    {
        return $this->registrationPaymentRepository
            ->getVerifiedCount();
    }


    /**
     * Count rejected.
     */
    public function getRejectedCount(): int
    {
        return $this->registrationPaymentRepository
            ->getRejectedCount();
    }
}