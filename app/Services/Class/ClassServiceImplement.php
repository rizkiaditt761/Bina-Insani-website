<?php

namespace App\Services\Class;

use App\Repositories\Class\ClassRepository;
use App\Services\Activity\ActivityService;

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


    public function getAll()
    {
        return $this->classRepository->getAll();
    }


    public function findById(int $id)
    {
        return $this->classRepository->findById($id);
    }


    public function create(array $data)
    {
        $class = $this->classRepository->create($data);

        $this->activityService->log(
            'class',
            'create',
            'Menambahkan program: ' . $class->name,
            $class
        );

        return $class;
    }




    public function update(int $id, array $data)
    {
        $oldClass = $this->classRepository->findById($id);

        $changes = [];

        $fields = [
            'name',
            'description',
            'duration',
            'registration_fee',
            'status',
        ];

        foreach ($fields as $field) {

            if (
                isset($data[$field]) &&
                $oldClass->$field != $data[$field]
            ) {

                $changes[] = [

                    'field' => $field,

                    'old' => $oldClass->$field,

                    'new' => $data[$field],

                ];

            }

        }


        $updatedClass = $this->classRepository->update(
            $id,
            $data
        );


        if (
            $updatedClass &&
            count($changes)
        ) {

            $this->activityService->log(

                'class',

                'update',

                'Memperbarui data program',

                $updatedClass,

                [
                    'changes' => $changes
                ]

            );

        }

        return $updatedClass;
    }




    public function delete(int $id)
    {
        $class = $this->classRepository->findById($id);

        $this->activityService->log(
            'class',
            'delete',
            'Menghapus program: ' . $class->name,
            $class
        );

        return $this->classRepository->delete($id);
    }




    public function getActive()
    {
        return $this->classRepository->getActive();
    }
}