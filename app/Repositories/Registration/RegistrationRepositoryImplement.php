<?php

namespace App\Repositories\Registration;

use App\Models\Registration;

class RegistrationRepositoryImplement implements RegistrationRepository
{

    /**
     * Get all registrations
     */
    public function getAll()
    {
        return Registration::with([
                'courseClass'
            ])
            ->latest()
            ->paginate(10);
    }



    /**
     * Find registration detail
     */
    public function findById(int $id)
    {
        return Registration::with([
                'courseClass',
                'payment'
            ])
            ->findOrFail($id);
    }



    /**
     * Find by registration number
     */
    public function findByRegistrationNumber(
        string $registrationNumber
    ) {
        return Registration::with([
                'courseClass',
                'payment'
            ])
            ->where(
                'registration_number',
                $registrationNumber
            )
            ->first();
    }



    /**
     * Create registration
     */
    public function create(array $data)
    {
        $data['payment_deadline'] = now()->addDays(2);

        return Registration::create($data);
    }

    



    /**
     * Update registration
     */
    public function update(
        int $id,
        array $data
    ) {

        $registration = $this->findById($id);

        $registration->update($data);

        return $registration;
    }



    /**
     * Delete registration
     */
    public function delete(int $id)
    {
        $registration = $this->findById($id);

        return $registration->delete();
    }



    /**
     * Find registration by email and phone
     */
    public function findByEmailAndPhone(
        string $email,
        string $phone
    ) {

        return Registration::where('email', $email)
            ->where('phone', $phone)
            ->first();

    }

}