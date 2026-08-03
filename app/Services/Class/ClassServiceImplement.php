<?php

namespace App\Services\Class;

use App\Repositories\Class\ClassRepository;

class ClassServiceImplement implements ClassService
{
    protected ClassRepository $classRepository;


    public function __construct(
        ClassRepository $classRepository
    ) {
        $this->classRepository = $classRepository;
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
        return $this->classRepository->create($data);
    }


    public function update(int $id, array $data)
    {
        return $this->classRepository->update($id, $data);
    }


    public function delete(int $id)
    {
        return $this->classRepository->delete($id);
    }

    public function getActive()
    {
        return $this->classRepository->getActive();
    }
}