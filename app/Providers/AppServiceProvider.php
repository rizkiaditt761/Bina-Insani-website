<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Setting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

use App\Repositories\Setting\SettingRepository;
use App\Repositories\Setting\SettingRepositoryImplement;
use App\Services\Setting\SettingService;
use App\Services\Setting\SettingServiceImplement;

use App\Repositories\Class\ClassRepository;
use App\Repositories\Class\ClassRepositoryImplement;
use App\Services\Class\ClassService;
use App\Services\Class\ClassServiceImplement;

use App\Repositories\Gallery\GalleryRepository;
use App\Repositories\Gallery\GalleryRepositoryImplement;
use App\Services\Gallery\GalleryService;
use App\Services\Gallery\GalleryServiceImplement;

use App\Repositories\FAQ\FAQRepository;
use App\Repositories\FAQ\FAQRepositoryImplement;
use App\Services\FAQ\FAQService;
use App\Services\FAQ\FAQServiceImplement;

use App\Repositories\Registration\RegistrationRepository;
use App\Repositories\Registration\RegistrationRepositoryImplement;
use App\Services\Registration\RegistrationService;
use App\Services\Registration\RegistrationServiceImplement;

use App\Repositories\RegistrationPayment\RegistrationPaymentRepository;
use App\Repositories\RegistrationPayment\RegistrationPaymentRepositoryImplement;
use App\Services\RegistrationPayment\RegistrationPaymentService;
use App\Services\RegistrationPayment\RegistrationPaymentServiceImplement;

use App\Repositories\Activity\ActivityRepository;
use App\Repositories\Activity\ActivityRepositoryImplement;
use App\Services\Activity\ActivityService;
use App\Services\Activity\ActivityServiceImplement;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

        $this->app->bind(
            \App\Repositories\Profile\ProfileRepository::class,
            \App\Repositories\Profile\ProfileRepositoryImplement::class
        );

        $this->app->bind(
            \App\Services\Profile\ProfileService::class,
            \App\Services\Profile\ProfileServiceImplement::class
        );

        $this->app->bind(
            SettingRepository::class,
            SettingRepositoryImplement::class
        );


        $this->app->bind(
            SettingService::class,
            SettingServiceImplement::class
        );

        $this->app->bind(
            ClassRepository::class,
            ClassRepositoryImplement::class
        );


        $this->app->bind(
            ClassService::class,
            ClassServiceImplement::class
        );

        $this->app->bind(
            GalleryRepository::class,
            GalleryRepositoryImplement::class
        );


        $this->app->bind(
            GalleryService::class,
            GalleryServiceImplement::class
        );

        $this->app->bind(
            FAQRepository::class,
            FAQRepositoryImplement::class
        );


        $this->app->bind(
            FAQService::class,
            FAQServiceImplement::class
        );

        $this->app->bind(
            RegistrationRepository::class,
            RegistrationRepositoryImplement::class
        );


        $this->app->bind(
            RegistrationService::class,
            RegistrationServiceImplement::class
        );

        $this->app->bind(
            RegistrationPaymentRepository::class,
            RegistrationPaymentRepositoryImplement::class
        );


        $this->app->bind(
            RegistrationPaymentService::class,
            RegistrationPaymentServiceImplement::class
        );

        $this->app->bind(
            ActivityRepository::class,
            ActivityRepositoryImplement::class
        );


        $this->app->bind(
            ActivityService::class,
            ActivityServiceImplement::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (Schema::hasTable('settings')) {

            View::share('setting', Setting::first());

        } else {

            View::share('setting', null);

        }

        
    }
}
