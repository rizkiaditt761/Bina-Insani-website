<?php

namespace App\Services\FAQ;

use App\Repositories\FAQ\FAQRepository;

class FAQServiceImplement implements FAQService
{
    protected FAQRepository $faqRepository;


    public function __construct(
        FAQRepository $faqRepository
    ) {
        $this->faqRepository = $faqRepository;
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
        return $this->faqRepository->create($data);
    }


    public function update(int $id, array $data)
    {
        return $this->faqRepository->update($id, $data);
    }


    public function delete(int $id)
    {
        return $this->faqRepository->delete($id);
    }

    public function getActive()
    {
        return $this->faqRepository->getActive();
    }
}