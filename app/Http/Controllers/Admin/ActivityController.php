<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Activity\ActivityService;

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


        return view(
            'admin.activities.index',
            compact('activities')
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