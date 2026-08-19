<?php

namespace App\Services\Registration;

interface RegistrationService
{
    public function getAll(
        ?string $search = null,
        ?string $status = null
    );

    public function findById(int $id);

    public function findByRegistrationNumber(string $registrationNumber);

    public function generateRegistrationNumber();

    public function create(array $data);

    public function update(int $id, array $data);

    public function delete(int $id);

    public function updateStatus(
        int $registrationId,
        string $status
    );

    public function findByEmailAndPhone(
        string $email,
        string $phone
    );
}