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


    public function index()
    {
        $faqs = $this->faqService->getAll();

        return view(
            'admin.faq.index',
            compact('faqs')
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

            'sort_order' => [
                'nullable',
                'integer'
            ],

            'is_active' => [
                'nullable',
                'boolean'
            ],
        ]);


        $this->faqService->create($data);


        return back()->with(
            'success',
            'FAQ berhasil ditambahkan'
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

            'sort_order' => [
                'nullable',
                'integer'
            ],

            'is_active' => [
                'nullable',
                'boolean'
            ],
        ]);


        $this->faqService->update(
            $id,
            $data
        );


        return back()->with(
            'success',
            'FAQ berhasil diperbarui'
        );
    }


    public function destroy(int $id)
    {
        $this->faqService->delete($id);


        return back()->with(
            'success',
            'FAQ berhasil dihapus'
        );
    }
}