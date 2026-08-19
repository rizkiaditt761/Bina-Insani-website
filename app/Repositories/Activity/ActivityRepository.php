<?php

namespace App\Repositories\Activity;

interface ActivityRepository
{
    /**
     * Get paginated activity logs.
     */
    public function getAll(int $perPage = 10);


    /**
     * Get total activity logs.
     */
    public function getTotal(): int;


    /**
     * Get total activity logs created today.
     */
    public function getTodayTotal(): int;


    /**
     * Get total activity logs created this month.
     */
    public function getThisMonthTotal(): int;


    /**
     * Get total unique modules.
     */
    public function getTotalModules(): int;


    /**
     * Find activity by ID.
     */
    public function findById(int $id);


    /**
     * Create new activity log.
     */
    public function create(array $data);


    /**
     * Delete activity by ID.
     */
    public function delete(int $id);
}