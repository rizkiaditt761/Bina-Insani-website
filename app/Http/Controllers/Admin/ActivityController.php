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


    /**
     * Display activity logs.
     */
    public function index()
    {
        $activities = $this->activityService->getAll();

        /*
        |--------------------------------------------------------------------------
        | Statistics
        |--------------------------------------------------------------------------
        |
        | Untuk sementara statistik tetap dihitung dari collection agar
        | tidak mengubah kontrak service/repository yang sudah berjalan.
        | Nanti setelah kita lihat service & repository, kalau memungkinkan
        | kita pindahkan perhitungannya ke database agar lebih efisien.
        |
        */

        $total = $activities->count();

        $today = $activities
            ->filter(function ($activity) {
                return $activity->created_at?->isToday();
            })
            ->count();

        $thisMonth = $activities
            ->filter(function ($activity) {
                return $activity->created_at?->isSameMonth(now());
            })
            ->count();

        $totalModules = $activities
            ->pluck('module')
            ->filter()
            ->unique()
            ->count();


        return view(
            'admin.activities.index',
            [
                'activities' => $activities,
                'total' => $total,
                'today' => $today,
                'thisMonth' => $thisMonth,
                'totalModules' => $totalModules,
            ]
        );
    }


    /**
     * Display a single activity.
     */
    public function show(int $id)
    {
        $activity = $this->activityService->findById($id);

        abort_if(
            !$activity,
            404,
            'Aktivitas tidak ditemukan.'
        );


        return view(
            'admin.activities.show',
            compact('activity')
        );
    }


    /**
     * Delete an activity.
     */
    public function destroy(int $id)
    {
        $activity = $this->activityService->findById($id);

        abort_if(
            !$activity,
            404,
            'Aktivitas tidak ditemukan.'
        );

        $this->activityService->delete($id);


        return redirect()
            ->route('activities.index')
            ->with(
                'success',
                'Aktivitas berhasil dihapus.'
            );
    }
}