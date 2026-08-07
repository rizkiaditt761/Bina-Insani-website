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



    public function getAll()
    {
        return $this->faqRepository->getAll();
    }



    public function findById(int $id)
    {
        return $this->faqRepository->findById($id);
    }



    public function create(array $data)
    {
        $faq = $this->faqRepository->create($data);


        $this->activityService->log(
            'faq',
            'create',
            'Menambahkan FAQ: ' . $faq->question,
            $faq
        );


        return $faq;
    }





    public function update(int $id, array $data)
    {
        $faq = $this->faqRepository->findById($id);


        $changes = [];


        $fields = [
            'question',
            'answer',
            'status',
        ];


        foreach ($fields as $field) {

            if (
                isset($data[$field]) &&
                $faq->$field != $data[$field]
            ) {

                $changes[] = [

                    'field' => $field,

                    'old' => $faq->$field,

                    'new' => $data[$field],

                ];

            }

        }



        $updatedFaq = $this->faqRepository->update(
            $id,
            $data
        );



        if (
            $updatedFaq &&
            count($changes)
        ) {


            $this->activityService->log(

                'faq',

                'update',

                'Memperbarui FAQ',

                $updatedFaq,

                [
                    'changes' => $changes
                ]

            );

        }


        return $updatedFaq;
    }





    public function delete(int $id)
    {
        $faq = $this->faqRepository->findById($id);


        $this->activityService->log(
            'faq',
            'delete',
            'Menghapus FAQ: ' . $faq->question,
            $faq
        );


        return $this->faqRepository->delete($id);
    }





    public function getActive()
    {
        return $this->faqRepository->getActive();
    }
}