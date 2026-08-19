<?php

namespace App\Repositories\Activity;

use App\Models\ActivityLog;
use Carbon\Carbon;

class ActivityRepositoryImplement implements ActivityRepository
{
    /**
     * Get paginated activity logs.
     */
    public function getAll(int $perPage = 10)
    {
        return ActivityLog::with('user')
            ->latest('created_at')
            ->paginate($perPage)
            ->withQueryString();
    }


    /**
     * Get total activity logs.
     */
    public function getTotal(): int
    {
        return ActivityLog::count();
    }


    /**
     * Get total activity logs created today.
     */
    public function getTodayTotal(): int
    {
        return ActivityLog::whereDate(
            'created_at',
            Carbon::today()
        )->count();
    }


    /**
     * Get total activity logs created this month.
     */
    public function getThisMonthTotal(): int
    {
        return ActivityLog::whereBetween(
            'created_at',
            [
                Carbon::now()->startOfMonth(),
                Carbon::now()->endOfMonth(),
            ]
        )->count();
    }


    /**
     * Get total unique modules.
     */
    public function getTotalModules(): int
    {
        return ActivityLog::whereNotNull('module')
            ->where('module', '!=', '')
            ->distinct('module')
            ->count('module');
    }


    /**
     * Find activity by ID.
     */
    public function findById(int $id)
    {
        return ActivityLog::with('user')
            ->findOrFail($id);
    }


    /**
     * Create new activity log.
     */
    public function create(array $data)
    {
        return ActivityLog::create($data);
    }


    /**
     * Delete activity by ID.
     */
    public function delete(int $id)
    {
        $activity = $this->findById($id);

        return $activity->delete();
    }
}