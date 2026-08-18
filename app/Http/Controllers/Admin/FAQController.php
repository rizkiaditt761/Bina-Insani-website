<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\FAQ\FAQService;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    protected FAQService $faqService;


    public function __construct(
        FAQService $faqService
    ) {
        $this->faqService = $faqService;
    }


    public function index(Request $request)
    {
        $faqs = $this->faqService->getAll(
            $request->search,
            $request->status
        );

        $total = $this->faqService->countTotal();

        $active = $this->faqService->countActive();

        $inactive = $this->faqService->countInactive();


        return view(
            'admin.faq.index',
            compact(
                'faqs',
                'total',
                'active',
                'inactive'
            )
        );
    }


    public function create()
    {
        return view('admin.faq.create');
    }


    public function show(int $id)
    {
        $faq = $this->faqService->findById($id);

        return view(
            'admin.faq.show',
            compact('faq')
        );
    }


    public function store(Request $request)
    {
        $data = $request->validate([

            'question' => [
                'required',
                'string',
                'max:255'
            ],

            'answer' => [
                'required',
                'string'
            ],

            'category' => [
                'nullable',
                'string',
                'max:255'
            ],

            'sort_order' => [
                'nullable',
                'integer',
                'min:1'
            ],

            'is_active' => [
                'nullable',
                'boolean'
            ],

        ]);


        /*
        |--------------------------------------------------------------------------
        | Checkbox
        |--------------------------------------------------------------------------
        */

        $data['is_active'] = $request->has('is_active');


        /*
        |--------------------------------------------------------------------------
        | Default position
        |--------------------------------------------------------------------------
        */

        if (
            !isset($data['sort_order']) ||
            $data['sort_order'] < 1
        ) {
            $data['sort_order'] = $this->faqService->countTotal() + 1;
        }


        /*
        |--------------------------------------------------------------------------
        | Insert FAQ ke posisi yang dipilih
        |--------------------------------------------------------------------------
        */

        $this->faqService->create($data);


        return redirect()
            ->route('faqs.index')
            ->with(
                'success',
                'FAQ berhasil ditambahkan.'
            );
    }


    public function edit(int $id)
    {
        $faq = $this->faqService->findById($id);

        return view(
            'admin.faq.edit',
            compact('faq')
        );
    }


    public function update(
        Request $request,
        int $id
    ) {

        $data = $request->validate([

            'question' => [
                'required',
                'string',
                'max:255'
            ],

            'answer' => [
                'required',
                'string'
            ],

            'category' => [
                'nullable',
                'string',
                'max:255'
            ],

            'sort_order' => [
                'nullable',
                'integer',
                'min:1'
            ],

            'is_active' => [
                'nullable',
                'boolean'
            ],

        ]);


        /*
        |--------------------------------------------------------------------------
        | Checkbox
        |--------------------------------------------------------------------------
        */

        $data['is_active'] = $request->has('is_active');


        /*
        |--------------------------------------------------------------------------
        | Default position
        |--------------------------------------------------------------------------
        */

        if (
            !isset($data['sort_order']) ||
            $data['sort_order'] < 1
        ) {
            $data['sort_order'] = 1;
        }


        /*
        |--------------------------------------------------------------------------
        | Update + atur ulang urutan
        |--------------------------------------------------------------------------
        */

        $this->faqService->update(
            $id,
            $data
        );


        return redirect()
            ->route('faqs.index')
            ->with(
                'success',
                'FAQ berhasil diperbarui.'
            );
    }


    public function destroy(int $id)
    {
        $this->faqService->delete($id);


        return back()->with(
            'success',
            'FAQ berhasil dihapus.'
        );
    }
}