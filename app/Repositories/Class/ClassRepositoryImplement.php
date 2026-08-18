<?php

namespace App\Repositories\Class;

use App\Models\CourseClass;

class ClassRepositoryImplement implements ClassRepository
{
    /**
     * Get all classes with search, status filter,
     * registration count, and pagination.
     */
    public function getAll(array $filters = [])
    {
        $query = CourseClass::query()
            ->withCount('registrations')
            ->latest();

        /*
        |--------------------------------------------------------------------------
        | Search
        |--------------------------------------------------------------------------
        */

        if (!empty($filters['search'])) {
            $search = $filters['search'];

            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%")
                    ->orWhere('meeting_schedule', 'like', "%{$search}%");
            });
        }

        /*
        |--------------------------------------------------------------------------
        | Status Filter
        |--------------------------------------------------------------------------
        */

        if (
            isset($filters['status']) &&
            $filters['status'] !== ''
        ) {
            $query->where(
                'is_active',
                (bool) $filters['status']
            );
        }

        return $query->paginate(10)->withQueryString();
    }


    /**
     * Find class by ID.
     */
    public function findById(int $id)
    {
        return CourseClass::withCount('registrations')
            ->findOrFail($id);
    }


    /**
     * Create class.
     */
    public function create(array $data)
    {
        return CourseClass::create($data);
    }


    /**
     * Update class.
     */
    public function update(int $id, array $data)
    {
        $class = $this->findById($id);

        $class->update($data);

        return $class->fresh()
            ->loadCount('registrations');
    }


    /**
     * Delete class.
     */
    public function delete(int $id)
    {
        $class = $this->findById($id);

        return $class->delete();
    }


    /**
     * Get active classes.
     *
     * Used by public registration form.
     */
    public function getActive()
    {
        return CourseClass::where('is_active', true)
            ->orderBy('name')
            ->get();
    }
}