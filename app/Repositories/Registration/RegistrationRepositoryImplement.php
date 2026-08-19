<?php

namespace App\Repositories\Registration;

use App\Models\Registration;

class RegistrationRepositoryImplement implements RegistrationRepository
{
    /**
     * Get all registrations
     */
    public function getAll(
        ?string $search = null,
        ?string $status = null
    ) {
        $query = Registration::with([
            'courseClass',
            'payment',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Search
        |--------------------------------------------------------------------------
        */
        if ($search) {

            $query->where(function ($q) use ($search) {

                $q->where('registration_number', 'like', "%{$search}%")
                    ->orWhere('full_name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%");

            });

        }


        /*
        |--------------------------------------------------------------------------
        | Filter Status
        |--------------------------------------------------------------------------
        */
        if ($status) {

            $query->where('status', $status);

        }


        return $query
            ->latest()
            ->paginate(10)
            ->withQueryString();
    }


    /**
     * Find registration detail
     */
    public function findById(int $id)
    {
        return Registration::with([
            'courseClass',
            'payment',
        ])->findOrFail($id);
    }


    /**
     * Find by registration number
     */
    public function findByRegistrationNumber(
        string $registrationNumber
    ) {
        return Registration::with([
            'courseClass',
            'payment',
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