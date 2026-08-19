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

    /**
     * Get all activity logs.
     */
    public function getAll()
    {
        return $this->activityRepository->getAll();
    }

    /**
     * Find activity by ID.
     */
    public function findById(int $id)
    {
        return $this->activityRepository->findById($id);
    }

    /**
     * Create activity manually.
     */
    public function create(array $data)
    {
        return $this->activityRepository->create($data);
    }

    /**
     * Delete activity by ID.
     */
    public function delete(int $id)
    {
        return $this->activityRepository->delete($id);
    }

    /**
     * Create activity log automatically.
     */
    public function log(
        string $module,
        string $action,
        string $description,
        $subject = null,
        array $properties = []
    ) {
        $data = [
            'user_id' => auth()->id(),
            'module' => $module,
            'action' => $action,
            'description' => $description,
            'subject_type' => null,
            'subject_id' => null,
            'properties' => $properties,
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ];

        if ($subject !== null) {
            $data['subject_type'] = get_class($subject);
            $data['subject_id'] = $subject->id ?? null;
        }

        return $this->activityRepository->create($data);
    }
}