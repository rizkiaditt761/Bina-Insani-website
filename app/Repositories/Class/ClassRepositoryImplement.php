<?php

namespace App\Repositories\Class;

use App\Models\CourseClass;

class ClassRepositoryImplement implements ClassRepository
{
    public function getAll()
    {
        return CourseClass::latest()->get();
    }


    public function findById(int $id)
    {
        return CourseClass::withCount('registrations')
            ->findOrFail($id);
    }


    public function create(array $data)
    {
        return CourseClass::create($data);
    }


    public function update(int $id, array $data)
    {
        $class = $this->findById($id);

        $class->update($data);

        return $class;
    }


    public function delete(int $id)
    {
        $class = $this->findById($id);

        return $class->delete();
    }

    public function getActive()
    {
        return CourseClass::where('is_active', true)
            ->orderBy('name')
            ->get();
    }
}