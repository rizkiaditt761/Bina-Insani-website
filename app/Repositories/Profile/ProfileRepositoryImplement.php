<?php

namespace App\Repositories\Profile;

use App\Models\User;

class ProfileRepositoryImplement implements ProfileRepository
{
    /**
     * Get user by ID
     */
    public function getById(int $id): User
    {
        return User::findOrFail($id);
    }

    /**
     * Update user profile
     */
    public function update(int $id, array $data): User
    {
        $user = User::findOrFail($id);

        $user->update($data);

        return $user->fresh();
    }
}