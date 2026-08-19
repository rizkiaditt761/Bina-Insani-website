<?php

namespace App\Repositories\Registration;

interface RegistrationRepository
{
    public function getAll(
        ?string $search = null,
        ?string $status = null
    );

    public function findById(int $id);

    public function findByRegistrationNumber(string $registrationNumber);

    public function create(array $data);

    public function update(int $id, array $data);

    public function delete(int $id);

    public function findByEmailAndPhone(
        string $email,
        string $phone
    );
}