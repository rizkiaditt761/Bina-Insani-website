<?php

namespace App\Repositories\Activity;

use App\Models\ActivityLog;

class ActivityRepositoryImplement implements ActivityRepository
{
    public function getAll()
    {
        return ActivityLog::with('user')
            ->latest()
            ->get();
    }


    public function findById(int $id)
    {
        return ActivityLog::with('user')
            ->findOrFail($id);
    }


    public function create(array $data)
    {
        return ActivityLog::create($data);
    }


    public function delete(int $id)
    {
        $activity = $this->findById($id);

        return $activity->delete();
    }
}