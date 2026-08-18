<?php

namespace App\Repositories\FAQ;

use App\Models\Faq;

class FAQRepositoryImplement implements FAQRepository
{
    public function getAll(
        ?string $search = null,
        ?string $status = null
    ) {
        return Faq::query()

            ->when($search, function ($query) use ($search) {

                $query->where(function ($q) use ($search) {

                    $q->where(
                        'question',
                        'like',
                        "%{$search}%"
                    )

                    ->orWhere(
                        'answer',
                        'like',
                        "%{$search}%"
                    );
                });
            })

            ->when(
                $status !== null && $status !== '',
                function ($query) use ($status) {

                    $query->where(
                        'is_active',
                        (bool) $status
                    );
                }
            )

            ->orderBy('sort_order')
            ->orderByDesc('created_at')
            ->paginate(10)
            ->withQueryString();
    }


    public function findById(int $id)
    {
        return Faq::findOrFail($id);
    }


    public function create(array $data)
    {
        return Faq::create($data);
    }


    public function update(
        int $id,
        array $data
    ) {
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
        return Faq::where('is_active', true)
            ->orderBy('sort_order')
            ->get();
    }


    public function countTotal()
    {
        return Faq::count();
    }


    public function countActive()
    {
        return Faq::where('is_active', true)->count();
    }


    public function countInactive()
    {
        return Faq::where('is_active', false)->count();
    }


    /**
     * Geser FAQ ke bawah saat membuat FAQ baru.
     */
    public function shiftForCreate(int $sortOrder)
    {
        Faq::where(
            'sort_order',
            '>=',
            $sortOrder
        )->increment('sort_order');
    }


    /**
     * Atur ulang posisi FAQ saat sort_order diubah.
     */
    public function shiftForUpdate(
        int $id,
        int $oldSortOrder,
        int $newSortOrder
    ) {

        if ($oldSortOrder === $newSortOrder) {
            return;
        }


        /*
        |--------------------------------------------------------------------------
        | Dipindah ke bawah
        |--------------------------------------------------------------------------
        |
        | Contoh:
        | 1 A
        | 2 B
        | 3 C
        | 4 D
        |
        | B (2) -> 4
        |
        | Hasil:
        | 1 A
        | 2 C
        | 3 D
        | 4 B
        |
        */

        if ($newSortOrder > $oldSortOrder) {

            Faq::where('id', '!=', $id)
                ->whereBetween(
                    'sort_order',
                    [
                        $oldSortOrder + 1,
                        $newSortOrder
                    ]
                )
                ->decrement('sort_order');

            return;
        }


        /*
        |--------------------------------------------------------------------------
        | Dipindah ke atas
        |--------------------------------------------------------------------------
        |
        | Contoh:
        | 1 A
        | 2 B
        | 3 C
        | 4 D
        |
        | D (4) -> 2
        |
        | Hasil:
        | 1 A
        | 2 D
        | 3 B
        | 4 C
        |
        */

        Faq::where('id', '!=', $id)
            ->whereBetween(
                'sort_order',
                [
                    $newSortOrder,
                    $oldSortOrder - 1
                ]
            )
            ->increment('sort_order');
    }


    /**
     * Normalisasi nomor urutan menjadi 1, 2, 3, dst.
     */
    public function normalizeOrder()
    {
        $faqs = Faq::orderBy('sort_order')
            ->orderBy('id')
            ->get();

        foreach ($faqs as $index => $faq) {

            $newOrder = $index + 1;

            if ($faq->sort_order != $newOrder) {

                $faq->update([
                    'sort_order' => $newOrder
                ]);
            }
        }
    }
}