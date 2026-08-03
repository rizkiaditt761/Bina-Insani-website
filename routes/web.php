<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegistrationController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\ClassController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\FAQController;
use App\Http\Controllers\Admin\RegistrationController as AdminRegistrationController;
use App\Http\Controllers\Admin\RegistrationPaymentController as AdminRegistrationPaymentController;
use App\Http\Controllers\Admin\ActivityController;
use App\Http\Controllers\RegistrationPaymentController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::controller(RegistrationController::class)
    ->group(function () {

        Route::get('/registration', 'create')
            ->name('registration.create');

        Route::post('/registration', 'store')
            ->name('registration.store');

        Route::get(
            '/registration/success/{registrationNumber}',
            'success'
        )->name('registration.success');

        Route::get(
            '/registration/{registrationNumber}/payment',
            'payment'
        )->name('registration.payment');

        Route::post(
            '/registration/{registrationNumber}/payment',
            'storePayment'
        )->name('registration.payment.store');

        Route::get(
            '/registration/{registrationNumber}',
            'show'
        )->name('registration.show');

    });

Route::controller(RegistrationPaymentController::class)
    ->group(function () {

        Route::get(
            '/registration/{registrationNumber}/payment',
            'create'
        )->name('registration.payment.create');

        Route::post(
            '/registration/{registrationNumber}/payment',
            'store'
        )->name('registration.payment.store');

    });

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')
    ->middleware(['auth'])
    ->group(function () {

        Route::get('/', [DashboardController::class, 'index'])
            ->name('admin.dashboard');

        Route::patch(
            'registration-payments/{id}/approve',
            [RegistrationPaymentController::class, 'approve']
        )->name('registration-payments.approve');

        Route::patch(
            'registration-payments/{id}/reject',
            [RegistrationPaymentController::class, 'reject']
        )->name('registration-payments.reject');

        Route::resource(
            'registration-payments',
            RegistrationPaymentController::class
        );

        Route::patch(
            'registration-payments/{registrationPayment}/approve',
            [RegistrationPaymentController::class, 'approve']
        )->name('registration-payments.approve');

        Route::patch(
            'registration-payments/{registrationPayment}/reject',
            [RegistrationPaymentController::class, 'reject']
        )->name('registration-payments.reject');

        Route::resource('settings', SettingController::class);

        Route::resource('classes', ClassController::class);

        Route::resource('galleries', GalleryController::class);

        Route::resource('faqs', FAQController::class);

        Route::resource('registrations', AdminRegistrationController::class);

        Route::resource('registration-payments', RegistrationPaymentController::class);

        Route::resource('activities', ActivityController::class)
            ->only([
                'index',
                'show',
                'destroy',
            ]);
    });

require __DIR__ . '/auth.php';