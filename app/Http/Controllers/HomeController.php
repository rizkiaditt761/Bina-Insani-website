<?php

namespace App\Http\Controllers;

use App\Services\Setting\SettingService;
use App\Services\Class\ClassService;
use App\Services\Gallery\GalleryService;
use App\Services\FAQ\FAQService;

class HomeController extends Controller
{
    protected SettingService $settingService;

    protected ClassService $classService;

    protected GalleryService $galleryService;

    protected FAQService $faqService;


    public function __construct(
        SettingService $settingService,
        ClassService $classService,
        GalleryService $galleryService,
        FAQService $faqService
    ) {
        $this->settingService = $settingService;
        $this->classService = $classService;
        $this->galleryService = $galleryService;
        $this->faqService = $faqService;
    }


    public function index()
    {

        $setting = $this->settingService->getSetting();

        $classes = $this->classService->getActive();

        $galleries = $this->galleryService->getActive();

        $faqs = $this->faqService->getActive();

        return view('home.index', compact(
            'setting',
            'classes',
            'galleries',
            'faqs'
        ));
    }
}