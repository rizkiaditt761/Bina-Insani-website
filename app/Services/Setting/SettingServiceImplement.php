<?php

namespace App\Services\Setting;

use App\Repositories\Setting\SettingRepository;

class SettingServiceImplement implements SettingService
{
    protected SettingRepository $settingRepository;

    public function getFirst()
    {
        return $this->settingRepository->getFirst();
    }

    public function __construct(
        SettingRepository $settingRepository
    ) {
        $this->settingRepository = $settingRepository;
    }


    public function getSetting()
    {
        return $this->settingRepository->getSetting();
    }


    public function update(array $data)
    {
        return $this->settingRepository->update($data);
    }
}