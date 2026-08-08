<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\CourseClass;
use App\Models\Gallery;
use App\Models\Registration;
use App\Models\RegistrationPayment;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | REGISTRATION
        |--------------------------------------------------------------------------
        */

        $totalRegistrations = Registration::count();

        $waitingPayment = Registration::where(
            'status',
            'waiting_payment'
        )->count();

        $waitingVerification = Registration::where(
            'status',
            'waiting_verification'
        )->count();

        $acceptedRegistrations = Registration::where(
            'status',
            'accepted'
        )->count();


        /*
        |--------------------------------------------------------------------------
        | PAYMENT
        |--------------------------------------------------------------------------
        */

        $verifiedPayments = RegistrationPayment::where(
            'status',
            'verified'
        )->count();

        $rejectedPayments = RegistrationPayment::where(
            'status',
            'rejected'
        )->count();


        /*
        |--------------------------------------------------------------------------
        | MASTER DATA
        |--------------------------------------------------------------------------
        */

        $totalClasses = CourseClass::count();

        $totalGalleries = Gallery::count();


        /*
        |--------------------------------------------------------------------------
        | REGISTRATION TREND - 7 HARI TERAKHIR
        |--------------------------------------------------------------------------
        */

        $registrationChartLabels = [];

        $registrationChartData = [];


        for ($i = 6; $i >= 0; $i--) {

            $date = Carbon::today()->subDays($i);

            $registrationChartLabels[] = $date->format('d M');

            $registrationChartData[] = Registration::whereDate(
                'created_at',
                $date
            )->count();
        }


        /*
        |--------------------------------------------------------------------------
        | RECENT ACTIVITY
        |--------------------------------------------------------------------------
        */

        $recentActivities = ActivityLog::with('user')
            ->latest()
            ->take(5)
            ->get();


        /*
        |--------------------------------------------------------------------------
        | RETURN VIEW
        |--------------------------------------------------------------------------
        */

        return view(
            'admin.dashboard.index',
            compact(
                'totalRegistrations',
                'waitingPayment',
                'waitingVerification',
                'acceptedRegistrations',
                'verifiedPayments',
                'rejectedPayments',
                'totalClasses',
                'totalGalleries',
                'registrationChartLabels',
                'registrationChartData',
                'recentActivities'
            )
        );
    }
}