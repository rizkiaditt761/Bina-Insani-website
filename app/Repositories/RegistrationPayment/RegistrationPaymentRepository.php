<?php

namespace App\Repositories\RegistrationPayment;

interface RegistrationPaymentRepository
{
    public function getAll(array $filters = []);

    public function findById(int $id);

    public function findByRegistrationId(int $registrationId);

    public function create(array $data);

    public function update(int $id, array $data);

    public function delete(int $id);

    public function approve(
        int $id,
        int $verifiedBy
    );

    public function reject(
        int $id,
        int $verifiedBy,
        ?string $notes = null
    );

    public function getPending();

    public function getVerified();

    public function getRejected();
}