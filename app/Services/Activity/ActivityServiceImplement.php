<?php

namespace App\Services\Activity;

use App\Repositories\Activity\ActivityRepository;

class ActivityServiceImplement implements ActivityService
{
    protected ActivityRepository $activityRepository;


    public function __construct(
        ActivityRepository $activityRepository
    ) {
        $this->activityRepository = $activityRepository;
    }


    public function getAll()
    {
        return $this->activityRepository->getAll();
    }


    public function findById(int $id)
    {
        return $this->activityRepository->findById($id);
    }


    public function create(array $data)
    {
        return $this->activityRepository->create($data);
    }


    public function delete(int $id)
    {
        return $this->activityRepository->delete($id);
    }

    public function log(
        string $module,
        string $action,
        string $description,
        $subject = null,
        array $properties = []
    )
    {
        return $this->activityRepository->create([

            'user_id' => auth()->id(),

            'module' => $module,

            'action' => $action,

            'description' => $description,


            'subject_type' => $subject
                ? get_class($subject)
                : null,


            'subject_id' => $subject?->id,


            'properties' => $properties,

            'ip_address' => request()->ip(),

            'user_agent' => request()->userAgent(),

        ]);
    }
}