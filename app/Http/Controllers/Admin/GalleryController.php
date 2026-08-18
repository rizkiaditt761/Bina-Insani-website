<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Gallery\GalleryService;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    protected GalleryService $galleryService;


    public function __construct(
        GalleryService $galleryService
    ) {
        $this->galleryService = $galleryService;
    }


    /**
     * Display gallery listing.
     */
    public function index(Request $request)
    {
        $galleries = $this->galleryService->getAll(
            $request->input('search'),
            $request->input('status')
        );

        $total = $this->galleryService->countTotal();

        $active = $this->galleryService->countActive();

        $inactive = $this->galleryService->countInactive();


        return view(
            'admin.gallery.index',
            compact(
                'galleries',
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
        return view('admin.gallery.create');
    }


    /**
     * Store gallery.
     */
    public function store(Request $request)
    {
        $data = $request->validate([

            'title' => [
                'required',
                'string',
                'max:255',
            ],

            'category' => [
                'nullable',
                'string',
                'max:255',
            ],

            'description' => [
                'nullable',
                'string',
            ],

            'image' => [
                'required',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

            'sort_order' => [
                'nullable',
                'integer',
                'min:0',
            ],

            'is_active' => [
                'nullable',
                'boolean',
            ],

        ]);


        /*
        |--------------------------------------------------------------------------
        | Default values
        |--------------------------------------------------------------------------
        */

        $data['is_active'] =
            $request->boolean('is_active');

        $data['sort_order'] =
            $request->input('sort_order', 0);


        /*
        |--------------------------------------------------------------------------
        | Upload image
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('image')) {

            $data['image'] = $request
                ->file('image')
                ->store('gallery', 'public');

        }


        $this->galleryService->create($data);


        return redirect()
            ->route('galleries.index')
            ->with(
                'success',
                'Gallery berhasil ditambahkan.'
            );
    }


    /**
     * Show gallery detail.
     */
    public function show(int $id)
    {
        $gallery = $this->galleryService->findById($id);


        return view(
            'admin.gallery.show',
            compact('gallery')
        );
    }


    /**
     * Show edit form.
     */
    public function edit(int $id)
    {
        $gallery = $this->galleryService->findById($id);


        return view(
            'admin.gallery.edit',
            compact('gallery')
        );
    }


    /**
     * Update gallery.
     */
    public function update(
        Request $request,
        int $id
    ) {
        $data = $request->validate([

            'title' => [
                'required',
                'string',
                'max:255',
            ],

            'category' => [
                'nullable',
                'string',
                'max:255',
            ],

            'description' => [
                'nullable',
                'string',
            ],

            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

            'sort_order' => [
                'nullable',
                'integer',
                'min:0',
            ],

            'is_active' => [
                'nullable',
                'boolean',
            ],

        ]);


        /*
        |--------------------------------------------------------------------------
        | Default values
        |--------------------------------------------------------------------------
        */

        $data['is_active'] =
            $request->boolean('is_active');

        $data['sort_order'] =
            $request->input('sort_order', 0);


        /*
        |--------------------------------------------------------------------------
        | Upload new image
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('image')) {

            $data['image'] = $request
                ->file('image')
                ->store('gallery', 'public');

        }


        $this->galleryService->update(
            $id,
            $data
        );


        return redirect()
            ->route('galleries.index')
            ->with(
                'success',
                'Gallery berhasil diperbarui.'
            );
    }


    /**
     * Delete gallery.
     */
    public function destroy(int $id)
    {
        $this->galleryService->delete($id);


        return redirect()
            ->route('galleries.index')
            ->with(
                'success',
                'Gallery berhasil dihapus.'
            );
    }
}