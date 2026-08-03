<?php

namespace App\Services\RegistrationPayment;

use Illuminate\Http\UploadedFile;

interface RegistrationPaymentService
{
    public function getAll(array $filters = []);

    public function findById(int $id);

    public function findByRegistrationId(int $registrationId);

    public function uploadPayment(
        int $registrationId,
        UploadedFile $file
    );

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