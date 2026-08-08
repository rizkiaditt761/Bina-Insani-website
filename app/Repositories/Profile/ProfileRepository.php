<?php

namespace App\Repositories\Profile;

use App\Models\User;

interface ProfileRepository
{
    public function getById(int $id): User;

    public function update(int $id, array $data): User;
}