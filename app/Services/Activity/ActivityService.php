<?php

namespace App\Services\Activity;

interface ActivityService
{
    /**
     * Get all activity logs.
     */
    public function getAll();


    /**
     * Find activity by ID.
     */
    public function findById(int $id);


    /**
     * Create activity manually.
     */
    public function create(array $data);


    /**
     * Delete activity by ID.
     */
    public function delete(int $id);


    /**
     * Create activity log automatically.
     */
    public function log(
        string $module,
        string $action,
        string $description,
        $subject = null,
        array $properties = []
    );
}