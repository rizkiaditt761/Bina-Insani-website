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


    /**
     * Display classes.
     */
    public function index(Request $request)
    {
        $filters = [
            'search' => $request->input('search'),
            'status' => $request->input('status'),
        ];


        $classes = $this->classService->getAll($filters);


        /*
        |--------------------------------------------------------------------------
        | Statistics
        |--------------------------------------------------------------------------
        */

        $statistics = $this->classService->getStatistics();


        $total = $statistics['total'];

        $active = $statistics['active'];

        $inactive = $statistics['inactive'];


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


    /**
     * Show create form.
     */
    public function create()
    {
        return view('admin.classes.create');
    }


    /**
     * Store class.
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'name' => [
                    'required',
                    'string',
                    'max:255',
                ],

                'registration_fee' => [
                    'required',
                    'numeric',
                    'min:0',
                ],

                'duration' => [
                    'nullable',
                    'string',
                    'max:255',
                ],

                'meeting_schedule' => [
                    'nullable',
                    'string',
                    'max:255',
                ],

                'description' => [
                    'nullable',
                    'string',
                ],

                'is_active' => [
                    'required',
                    'boolean',
                ],
            ],
            [
                'name.required' =>
                    'Nama program wajib diisi.',

                'name.string' =>
                    'Nama program harus berupa teks.',

                'name.max' =>
                    'Nama program maksimal 255 karakter.',

                'registration_fee.required' =>
                    'Biaya pendaftaran wajib diisi.',

                'registration_fee.numeric' =>
                    'Biaya pendaftaran hanya boleh berupa angka.',

                'registration_fee.min' =>
                    'Biaya pendaftaran tidak boleh kurang dari 0.',

                'duration.string' =>
                    'Durasi harus berupa teks.',

                'duration.max' =>
                    'Durasi maksimal 255 karakter.',

                'meeting_schedule.string' =>
                    'Jadwal pertemuan harus berupa teks.',

                'meeting_schedule.max' =>
                    'Jadwal pertemuan maksimal 255 karakter.',

                'description.string' =>
                    'Deskripsi harus berupa teks.',

                'is_active.required' =>
                    'Status program wajib dipilih.',

                'is_active.boolean' =>
                    'Status program tidak valid.',
            ]
        );

        /*
        |--------------------------------------------------------------------------
        | Status Program
        |--------------------------------------------------------------------------
        */

        $data['is_active'] = $request->boolean('is_active');

        /*
        |--------------------------------------------------------------------------
        | Create Program
        |--------------------------------------------------------------------------
        */

        $this->classService->create($data);

        return redirect()
            ->route('classes.index')
            ->with(
                'success',
                'Program berhasil ditambahkan.'
            );
    }


    /**
     * Show edit form.
     */
    public function edit(int $id)
    {
        $class = $this->classService->findById($id);


        return view(
            'admin.classes.edit',
            compact('class')
        );
    }


    /**
     * Update class.
     */
    public function update(
        Request $request,
        int $id
    ) {
        $data = $request->validate(
            [
                'name' => [
                    'required',
                    'string',
                    'max:255',
                ],

                'registration_fee' => [
                    'required',
                    'numeric',
                    'min:0',
                ],

                'duration' => [
                    'nullable',
                    'string',
                    'max:255',
                ],

                'meeting_schedule' => [
                    'nullable',
                    'string',
                    'max:255',
                ],

                'description' => [
                    'nullable',
                    'string',
                ],

                'is_active' => [
                    'required',
                    'boolean',
                ],
            ],
            [
                'name.required' =>
                    'Nama program wajib diisi.',

                'name.string' =>
                    'Nama program harus berupa teks.',

                'name.max' =>
                    'Nama program maksimal 255 karakter.',

                'registration_fee.required' =>
                    'Biaya pendaftaran wajib diisi.',

                'registration_fee.numeric' =>
                    'Biaya pendaftaran hanya boleh berupa angka.',

                'registration_fee.min' =>
                    'Biaya pendaftaran tidak boleh kurang dari 0.',

                'duration.string' =>
                    'Durasi harus berupa teks.',

                'duration.max' =>
                    'Durasi maksimal 255 karakter.',

                'meeting_schedule.string' =>
                    'Jadwal pertemuan harus berupa teks.',

                'meeting_schedule.max' =>
                    'Jadwal pertemuan maksimal 255 karakter.',

                'description.string' =>
                    'Deskripsi harus berupa teks.',

                'is_active.required' =>
                    'Status program wajib dipilih.',

                'is_active.boolean' =>
                    'Status program tidak valid.',
            ]
        );

        /*
        |--------------------------------------------------------------------------
        | Status Program
        |--------------------------------------------------------------------------
        */

        $data['is_active'] = $request->boolean('is_active');

        /*
        |--------------------------------------------------------------------------
        | Update Program
        |--------------------------------------------------------------------------
        */

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


    /**
     * Show class detail.
     */
    public function show(int $id)
    {
        $class = $this->classService->findById($id);


        return view(
            'admin.classes.show',
            compact('class')
        );
    }


    /**
     * Delete class.
     */
    public function destroy(int $id)
    {
        $result = $this->classService->delete($id);


        if (!$result['success']) {
            return redirect()
                ->route('classes.index')
                ->with(
                    'error',
                    $result['message']
                );
        }


        return redirect()
            ->route('classes.index')
            ->with(
                'success',
                'Program berhasil dihapus.'
            );
    }
}