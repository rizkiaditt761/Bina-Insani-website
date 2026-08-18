<?php

namespace App\Services\FAQ;

use App\Repositories\FAQ\FAQRepository;
use App\Services\Activity\ActivityService;

class FAQServiceImplement implements FAQService
{
    protected FAQRepository $faqRepository;

    protected ActivityService $activityService;


    public function __construct(
        FAQRepository $faqRepository,
        ActivityService $activityService
    ) {
        $this->faqRepository = $faqRepository;
        $this->activityService = $activityService;
    }


    public function getAll(
        ?string $search = null,
        ?string $status = null
    ) {
        return $this->faqRepository->getAll(
            $search,
            $status
        );
    }


    public function findById(int $id)
    {
        return $this->faqRepository->findById($id);
    }


    public function create(array $data)
    {
        /*
        |--------------------------------------------------------------------------
        | Tentukan posisi
        |--------------------------------------------------------------------------
        */

        $sortOrder = (int) ($data['sort_order'] ?? 1);

        if ($sortOrder < 1) {
            $sortOrder = 1;
        }


        /*
        |--------------------------------------------------------------------------
        | Geser FAQ lama
        |--------------------------------------------------------------------------
        */

        $this->faqRepository->shiftForCreate(
            $sortOrder
        );


        /*
        |--------------------------------------------------------------------------
        | Simpan FAQ baru
        |--------------------------------------------------------------------------
        */

        $data['sort_order'] = $sortOrder;

        $faq = $this->faqRepository->create(
            $data
        );


        /*
        |--------------------------------------------------------------------------
        | Rapikan urutan
        |--------------------------------------------------------------------------
        */

        $this->faqRepository->normalizeOrder();


        /*
        |--------------------------------------------------------------------------
        | Activity Log
        |--------------------------------------------------------------------------
        */

        $this->activityService->log(
            'faq',
            'create',
            'Menambahkan FAQ: ' . $faq->question,
            $faq,
            [
                'changes' => [
                    [
                        'field' => 'question',
                        'old' => null,
                        'new' => $faq->question,
                    ],

                    [
                        'field' => 'answer',
                        'old' => null,
                        'new' => $faq->answer,
                    ],

                    [
                        'field' => 'sort_order',
                        'old' => null,
                        'new' => $faq->sort_order,
                    ],

                    [
                        'field' => 'is_active',
                        'old' => null,
                        'new' => $faq->is_active,
                    ],
                ],
            ]
        );


        return $faq;
    }


    public function update(
        int $id,
        array $data
    ) {
        $oldFaq = $this->faqRepository->findById($id);

        $oldSortOrder = (int) $oldFaq->sort_order;

        $newSortOrder = array_key_exists(
            'sort_order',
            $data
        )
            ? (int) $data['sort_order']
            : $oldSortOrder;


        if ($newSortOrder < 1) {
            $newSortOrder = 1;
        }


        /*
        |--------------------------------------------------------------------------
        | Track perubahan
        |--------------------------------------------------------------------------
        */

        $changes = [];

        $fields = [
            'question',
            'answer',
            'sort_order',
            'is_active',
        ];


        foreach ($fields as $field) {

            if (
                array_key_exists($field, $data) &&
                $oldFaq->$field != $data[$field]
            ) {

                $changes[] = [
                    'field' => $field,
                    'old' => $oldFaq->$field,
                    'new' => $data[$field],
                ];
            }
        }


        /*
        |--------------------------------------------------------------------------
        | Atur ulang posisi
        |--------------------------------------------------------------------------
        */

        if ($oldSortOrder !== $newSortOrder) {

            $this->faqRepository->shiftForUpdate(
                $id,
                $oldSortOrder,
                $newSortOrder
            );

            $data['sort_order'] = $newSortOrder;
        }


        /*
        |--------------------------------------------------------------------------
        | Update FAQ
        |--------------------------------------------------------------------------
        */

        $faq = $this->faqRepository->update(
            $id,
            $data
        );


        /*
        |--------------------------------------------------------------------------
        | Rapikan urutan
        |--------------------------------------------------------------------------
        */

        $this->faqRepository->normalizeOrder();


        /*
        |--------------------------------------------------------------------------
        | Activity Log
        |--------------------------------------------------------------------------
        */

        $this->activityService->log(
            'faq',
            'update',
            'Memperbarui FAQ: ' . $faq->question,
            $faq,
            [
                'changes' => $changes,
            ]
        );


        return $faq;
    }


    public function delete(int $id)
    {
        $faq = $this->faqRepository->findById($id);


        /*
        |--------------------------------------------------------------------------
        | Activity Log
        |--------------------------------------------------------------------------
        */

        $this->activityService->log(
            'faq',
            'delete',
            'Menghapus FAQ: ' . $faq->question,
            $faq
        );


        /*
        |--------------------------------------------------------------------------
        | Delete
        |--------------------------------------------------------------------------
        */

        $result = $this->faqRepository->delete($id);


        /*
        |--------------------------------------------------------------------------
        | Rapikan nomor urutan
        |--------------------------------------------------------------------------
        */

        $this->faqRepository->normalizeOrder();


        return $result;
    }


    public function getActive()
    {
        return $this->faqRepository->getActive();
    }


    public function countTotal()
    {
        return $this->faqRepository->countTotal();
    }


    public function countActive()
    {
        return $this->faqRepository->countActive();
    }


    public function countInactive()
    {
        return $this->faqRepository->countInactive();
    }
}