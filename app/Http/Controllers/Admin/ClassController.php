<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Class\ClassService;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    protected ClassService $classService;


    public function __construct(
        ClassService $classService
    ) {
        $this->classService = $classService;
    }


    public function index()
    {
        $classes = $this->classService->getAll();

        $total = $classes->count();

        $active = $classes->where('is_active', true)->count();

        $inactive = $classes->where('is_active', false)->count();


        return view(
            'admin.classes.index',
            compact(
                'classes',
                'total',
                'active',
                'inactive'
            )
        );
    }


    public function store(Request $request)
    {
        $data = $request->validate([

            'name' => [
                'required',
                'string',
                'max:255'
            ],

            'registration_fee' => [
                'required',
                'numeric'
            ],

            'duration' => [
                'nullable',
                'string'
            ],

            'meeting_schedule' => [
                'nullable',
                'string'
            ],

            'description' => [
                'nullable',
                'string'
            ],

            'is_active' => [
                'nullable',
                'boolean'
            ],
        ]);


        $this->classService->create($data);


        return redirect()
            ->route('classes.index')
            ->with(
                'success',
                'Program berhasil ditambahkan.'
            );
    }


    public function create()
    {
        return view('admin.classes.create');
    }


    public function edit(int $id)
    {
        $class = $this->classService->findById($id);

        return view(
            'admin.classes.edit',
            compact('class')
        );
    }


    public function update(
        Request $request,
        int $id
    ) {

        $data = $request->validate([

            'name' => [
                'required',
                'string',
                'max:255'
            ],

            'registration_fee' => [
                'required',
                'numeric'
            ],

            'duration' => [
                'nullable',
                'string'
            ],

            'meeting_schedule' => [
                'nullable',
                'string'
            ],

            'description' => [
                'nullable',
                'string'
            ],

            'is_active' => [
                'nullable',
                'boolean'
            ],
        ]);


        $this->classService->update(
            $id,
            $data
        );


        return redirect()
            ->route('classes.index')
            ->with(
                'success',
                'Program berhasil diperbarui.'
        );
    }


    public function show(int $id)
    {
        $class = $this->classService->findById($id);

        return view(
            'admin.classes.show',
            compact('class')
        );
    }


    public function destroy(int $id)
    {
        $this->classService->delete($id);


        return redirect()
            ->route('classes.index')
            ->with(
                'success',
                'Program berhasil dihapus.'
         );
    }
}