<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Activity\ActivityService;
use Carbon\Carbon;

class ActivityController extends Controller
{
    protected ActivityService $activityService;


    public function __construct(
        ActivityService $activityService
    ) {
        $this->activityService = $activityService;
    }


    public function index()
    {
        $activities = $this->activityService->getAll();

        $total = $activities->count();

        $today = $activities
            ->where('created_at', '>=', Carbon::today())
            ->count();

        $thisMonth = $activities
            ->where('created_at', '>=', Carbon::now()->startOfMonth())
            ->count();

        $totalModules = $activities
            ->pluck('module')
            ->filter()
            ->unique()
            ->count();

        return view(
            'admin.activities.index',
            compact(
                'activities',
                'total',
                'today',
                'thisMonth',
                'totalModules'
            )
        );
    }


    public function show(int $id)
    {
        $activity = $this->activityService->findById($id);


        return view(
            'admin.activities.show',
            compact('activity')
        );
    }


    public function destroy(int $id)
    {
        $this->activityService->delete($id);


        return back()->with(
            'success',
            'Aktivitas berhasil dihapus'
        );
    }
}