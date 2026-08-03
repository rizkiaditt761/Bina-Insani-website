<?php

namespace App\Repositories\Registration;

use App\Models\Registration;

class RegistrationRepositoryImplement implements RegistrationRepository
{
    public function getAll()
    {
        return Registration::with('courseClass')
            ->latest()
            ->get();
    }


    public function findById(int $id)
    {
        return Registration::with('courseClass')
            ->findOrFail($id);
    }

    public function findByRegistrationNumber(
        string $registrationNumber
    ) {
        return Registration::with('courseClass')
            ->where(
                'registration_number',
                $registrationNumber
            )
            ->first();
    }


    public function create(array $data)
    {
        return Registration::create($data);
    }


    public function update(int $id, array $data)
    {
        $registration = $this->findById($id);

        $registration->update($data);

        return $registration;
    }


    public function delete(int $id)
    {
        $registration = $this->findById($id);

        return $registration->delete();
    }
}