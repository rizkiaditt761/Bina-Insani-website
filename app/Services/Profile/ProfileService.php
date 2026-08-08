<?php

namespace App\Services\Profile;

use App\Models\User;

interface ProfileService
{
    public function getProfile(int $id): User;

    public function updateProfile(int $id, array $data): User;
}