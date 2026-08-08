<?php

namespace App\Services\Profile;

use App\Models\User;
use App\Repositories\Profile\ProfileRepository;

class ProfileServiceImplement implements ProfileService
{
    protected ProfileRepository $profileRepository;

    public function __construct(
        ProfileRepository $profileRepository
    ) {
        $this->profileRepository = $profileRepository;
    }

    /**
     * Get admin profile
     */
    public function getProfile(int $id): User
    {
        return $this->profileRepository->getById($id);
    }

    /**
     * Update admin profile
     */
    public function updateProfile(
        int $id,
        array $data
    ): User {
        return $this->profileRepository->update(
            $id,
            $data
        );
    }
}
