<?php

namespace App\Services\RegistrationPayment;

use App\Repositories\RegistrationPayment\RegistrationPaymentRepository;
use App\Services\Registration\RegistrationService;
use Illuminate\Http\UploadedFile;

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

    public function getAll(array $filters = [])
    {
        return $this->registrationPaymentRepository->getAll($filters);
    }

    public function findById(int $id)
    {
        return $this->registrationPaymentRepository->findById($id);
    }

    public function create(array $data)
    {
        return $this->registrationPaymentRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->registrationPaymentRepository->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->registrationPaymentRepository->delete($id);
    }

    public function findByRegistrationId(int $registrationId)
    {
        return $this->registrationPaymentRepository
            ->findByRegistrationId($registrationId);
    }

    public function uploadPayment(
        int $registrationId,
        UploadedFile $file
    ) {
        $path = $file->store(
            'registration-payments',
            'public'
        );

        $payment = $this->registrationPaymentRepository->create([
            'registration_id' => $registrationId,
            'payment_method'  => 'QRIS',
            'amount'          => $this->registrationService
                ->findById($registrationId)
                ->courseClass
                ->registration_fee,
            'payment_proof'   => $path,
            'status'          => 'waiting_verification',
        ]);

        $this->registrationService->update(
            $registrationId,
            [
                'status' => 'waiting_verification',
            ]
        );

        return $payment;
    }

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

    public function reject(
        int $id,
        int $verifiedBy,
        ?string $notes = null
    ) {
        return $this->registrationPaymentRepository
            ->reject(
                $id,
                $verifiedBy,
                $notes
            );
    }

    public function getPending()
    {
        return $this->registrationPaymentRepository
            ->getPending();
    }

    public function getVerified()
    {
        return $this->registrationPaymentRepository
            ->getVerified();
    }

    public function getRejected()
    {
        return $this->registrationPaymentRepository
            ->getRejected();
    }
}