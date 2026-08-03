<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Registration;
use App\Models\CourseClass;
use App\Models\RegistrationPayment;
use App\Models\Gallery;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard.index', [

            'totalRegistrations' => Registration::count(),

            'totalClasses' => CourseClass::count(),

            'pendingPayments' => RegistrationPayment::where('status', 'pending')
                ->count(),

            'totalGalleries' => Gallery::count(),

        ]);
    }
}