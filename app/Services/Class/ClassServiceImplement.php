<?php

namespace App\Services\Class;

use App\Repositories\Class\ClassRepository;
use App\Services\Activity\ActivityService;
use App\Models\CourseClass;

class ClassServiceImplement implements ClassService
{
    protected ClassRepository $classRepository;

    protected ActivityService $activityService;


    public function __construct(
        ClassRepository $classRepository,
        ActivityService $activityService
    ) {
        $this->classRepository = $classRepository;

        $this->activityService = $activityService;
    }


    /**
     * Get all classes.
     */
    public function getAll(array $filters = [])
    {
        return $this->classRepository
            ->getAll($filters);
    }


    /**
     * Get class statistics.
     */
    public function getStatistics()
    {
        return [
            'total' => CourseClass::count(),

            'active' => CourseClass::where(
                'is_active',
                true
            )->count(),

            'inactive' => CourseClass::where(
                'is_active',
                false
            )->count(),
        ];
    }


    /**
     * Find class.
     */
    public function findById(int $id)
    {
        return $this->classRepository
            ->findById($id);
    }


    /**
     * Create class.
     */
    public function create(array $data)
    {
        $class = $this->classRepository
            ->create($data);


        $this->activityService->log(
            'class',
            'create',
            'Menambahkan program: ' . $class->name,
            $class
        );


        return $class;
    }


    /**
     * Update class.
     */
    public function update(
        int $id,
        array $data
    ) {
        $oldClass = $this->classRepository
            ->findById($id);


        $changes = [];


        $fields = [
            'name',
            'description',
            'duration',
            'registration_fee',
            'meeting_schedule',
            'is_active',
        ];


        foreach ($fields as $field) {

            $oldValue = $oldClass->{$field};

            $newValue = $data[$field]
                ?? $oldValue;


            if ($oldValue != $newValue) {

                $changes[] = [

                    'field' => $field,

                    'old' => $oldValue,

                    'new' => $newValue,

                ];
            }
        }


        $updatedClass =
            $this->classRepository->update(
                $id,
                $data
            );


        if (
            $updatedClass &&
            count($changes) > 0
        ) {

            $this->activityService->log(

                'class',

                'update',

                'Memperbarui data program: '
                    . $updatedClass->name,

                $updatedClass,

                [
                    'changes' => $changes,
                ]
            );
        }


        return $updatedClass;
    }


    /**
     * Delete class.
     */
    public function delete(int $id)
    {
        $class = $this->classRepository
            ->findById($id);


        /*
        |--------------------------------------------------------------------------
        | Prevent deleting classes that already have registrations
        |--------------------------------------------------------------------------
        */

        if (
            $class->registrations_count > 0
        ) {

            return [
                'success' => false,

                'message' =>
                    'Program tidak dapat dihapus karena sudah memiliki '
                    . $class->registrations_count
                    . ' data pendaftar. Silakan ubah status program menjadi Nonaktif.',
            ];
        }


        $this->activityService->log(
            'class',
            'delete',
            'Menghapus program: ' . $class->name,
            $class
        );


        $this->classRepository
            ->delete($id);


        return [
            'success' => true,
            'message' => 'Program berhasil dihapus.',
        ];
    }


    /**
     * Get active classes.
     */
    public function getActive()
    {
        return $this->classRepository
            ->getActive();
    }
}