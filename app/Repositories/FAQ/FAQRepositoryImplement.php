<?php

namespace App\Repositories\FAQ;

use App\Models\Faq;

class FAQRepositoryImplement implements FAQRepository
{
    public function getAll()
    {
        return Faq::orderBy('sort_order')->get();
    }


    public function findById(int $id)
    {
        return Faq::findOrFail($id);
    }


    public function create(array $data)
    {
        return Faq::create($data);
    }


    public function update(int $id, array $data)
    {
        $faq = $this->findById($id);

        $faq->update($data);

        return $faq;
    }


    public function delete(int $id)
    {
        $faq = $this->findById($id);

        return $faq->delete();
    }

    public function getActive()
    {
        return FAQ::where('is_active', true)
            ->orderBy('sort_order')
            ->get();
    }
}
