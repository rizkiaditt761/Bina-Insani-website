<?php

namespace App\Services\Registration;

use App\Repositories\Registration\RegistrationRepository;
use Illuminate\Support\Str;

class RegistrationServiceImplement implements RegistrationService
{
    protected RegistrationRepository $registrationRepository;


    public function __construct(
        RegistrationRepository $registrationRepository
    ) {
        $this->registrationRepository = $registrationRepository;
    }


    public function getAll()
    {
        return $this->registrationRepository->getAll();
    }


    public function findById(int $id)
    {
        return $this->registrationRepository->findById($id);
    }

    public function findByRegistrationNumber(
        string $registrationNumber
    ) {
        return $this->registrationRepository
            ->findByRegistrationNumber($registrationNumber);
    }


    public function create(array $data)
    {
        $data['registration_number'] = $this->generateRegistrationNumber();

        $data['status'] = 'waiting_payment';

        return $this->registrationRepository->create($data);
    }


    public function update(int $id, array $data)
    {
        return $this->registrationRepository->update($id, $data);
    }


    public function delete(int $id)
    {
        return $this->registrationRepository->delete($id);
    }

    public function generateRegistrationNumber()
    {
        do {

            $registrationNumber = 'REG-' .
                now()->format('Ymd') .
                '-' .
                strtoupper(Str::random(5));

        } while (
            $this->registrationRepository
                ->findByRegistrationNumber($registrationNumber)
        );

        return $registrationNumber;
    }

    public function updateStatus(
        int $registrationId,
        string $status
    ) {
        return $this->registrationRepository->update(
            $registrationId,
            [
                'status' => $status,
            ]
        );
    }
}