@extends('layouts.app')

@section('title', 'Activity Log')

@section('content')

<div class="space-y-8">

    {{-- =========================================================
    HEADER
    ========================================================== --}}
    <section
        class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-slate-950 via-blue-950 to-indigo-950 p-6 text-white shadow-xl sm:p-8">

        {{-- Decorative Background --}}
        <div
            class="absolute -right-16 -top-16 h-56 w-56 rounded-full bg-blue-400/10 blur-3xl">
        </div>

        <div
            class="absolute -bottom-20 left-1/3 h-48 w-48 rounded-full bg-indigo-400/10 blur-3xl">
        </div>

        <div
            class="relative flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">

            <div class="max-w-3xl">

                <span
                    class="inline-flex items-center rounded-full border border-white/10 bg-white/10 px-4 py-2 text-xs font-bold uppercase tracking-[0.22em] text-blue-100 backdrop-blur">

                    Activity Log

                </span>

                <h1
                    class="mt-4 text-3xl font-black tracking-tight sm:text-4xl">

                    Riwayat Aktivitas Sistem

                </h1>

                <p
                    class="mt-3 max-w-2xl text-sm leading-6 text-blue-100 sm:text-base">

                    Pantau aktivitas pengguna yang tercatat di dalam
                    sistem administrasi LPK Bina Insani.

                </p>

            </div>

            <div
                class="hidden rounded-2xl border border-white/10 bg-white/5 px-5 py-4 backdrop-blur sm:block">

                <p class="text-xs font-semibold uppercase tracking-wider text-blue-200">
                    Status Sistem
                </p>

                <div class="mt-2 flex items-center gap-2">

                    <span
                        class="h-2.5 w-2.5 rounded-full bg-emerald-400 shadow-[0_0_12px_rgba(52,211,153,0.7)]">
                    </span>

                    <span class="text-sm font-semibold text-white">
                        Activity Logging Aktif
                    </span>

                </div>

            </div>

        </div>

    </section>


    {{-- =========================================================
    STATISTICS
    ========================================================== --}}
    <section>

        <div
            class="grid gap-5 sm:grid-cols-2 xl:grid-cols-4">

            {{-- Total --}}
            <div
                class="group relative overflow-hidden rounded-2xl border border-blue-100 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-lg">

                <div
                    class="absolute -right-8 -top-8 h-24 w-24 rounded-full bg-blue-50 transition group-hover:scale-125">
                </div>

                <div class="relative">

                    <div class="flex items-center justify-between">

                        <p class="text-sm font-semibold text-slate-500">
                            Total Aktivitas
                        </p>

                        <div
                            class="flex h-10 w-10 items-center justify-center rounded-xl bg-blue-100 text-blue-600">

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2">

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>

                            </svg>

                        </div>

                    </div>

                    <h2
                        class="mt-5 text-3xl font-black tracking-tight text-slate-900">

                        {{ number_format($total) }}

                    </h2>

                    <p class="mt-1 text-xs text-slate-400">
                        Seluruh aktivitas tercatat
                    </p>

                </div>

            </div>


            {{-- Today --}}
            <div
                class="group relative overflow-hidden rounded-2xl border border-emerald-100 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-lg">

                <div
                    class="absolute -right-8 -top-8 h-24 w-24 rounded-full bg-emerald-50 transition group-hover:scale-125">
                </div>

                <div class="relative">

                    <div class="flex items-center justify-between">

                        <p class="text-sm font-semibold text-slate-500">
                            Hari Ini
                        </p>

                        <div
                            class="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-100 text-emerald-600">

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2">

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>

                            </svg>

                        </div>

                    </div>

                    <h2
                        class="mt-5 text-3xl font-black tracking-tight text-slate-900">

                        {{ number_format($today) }}

                    </h2>

                    <p class="mt-1 text-xs text-slate-400">
                        Aktivitas hari ini
                    </p>

                </div>

            </div>


            {{-- This Month --}}
            <div
                class="group relative overflow-hidden rounded-2xl border border-amber-100 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-lg">

                <div
                    class="absolute -right-8 -top-8 h-24 w-24 rounded-full bg-amber-50 transition group-hover:scale-125">
                </div>

                <div class="relative">

                    <div class="flex items-center justify-between">

                        <p class="text-sm font-semibold text-slate-500">
                            Bulan Ini
                        </p>

                        <div
                            class="flex h-10 w-10 items-center justify-center rounded-xl bg-amber-100 text-amber-600">

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2">

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>

                            </svg>

                        </div>

                    </div>

                    <h2
                        class="mt-5 text-3xl font-black tracking-tight text-slate-900">

                        {{ number_format($thisMonth) }}

                    </h2>

                    <p class="mt-1 text-xs text-slate-400">
                        Aktivitas bulan berjalan
                    </p>

                </div>

            </div>


            {{-- Modules --}}
            <div
                class="group relative overflow-hidden rounded-2xl border border-indigo-100 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-lg">

                <div
                    class="absolute -right-8 -top-8 h-24 w-24 rounded-full bg-indigo-50 transition group-hover:scale-125">
                </div>

                <div class="relative">

                    <div class="flex items-center justify-between">

                        <p class="text-sm font-semibold text-slate-500">
                            Total Modul
                        </p>

                        <div
                            class="flex h-10 w-10 items-center justify-center rounded-xl bg-indigo-100 text-indigo-600">

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2">

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>

                            </svg>

                        </div>

                    </div>

                    <h2
                        class="mt-5 text-3xl font-black tracking-tight text-slate-900">

                        {{ number_format($totalModules) }}

                    </h2>

                    <p class="mt-1 text-xs text-slate-400">
                        Modul yang memiliki aktivitas
                    </p>

                </div>

            </div>

        </div>

    </section>


    {{-- =========================================================
    ACTIVITY TABLE
    ========================================================== --}}
    <section
        class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">

        {{-- Table Header --}}
        <div
            class="flex flex-col gap-4 border-b border-slate-200 px-6 py-5 sm:flex-row sm:items-center sm:justify-between">

            <div>

                <div class="flex items-center gap-3">

                    <div
                        class="flex h-10 w-10 items-center justify-center rounded-xl bg-blue-100 text-blue-600">

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2">

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>

                        </svg>

                    </div>

                    <div>

                        <h2
                            class="text-lg font-bold text-slate-900">

                            Daftar Aktivitas

                        </h2>

                        <p
                            class="text-sm text-slate-500">

                            Riwayat aktivitas pengguna dalam sistem.

                        </p>

                    </div>

                </div>

            </div>


            {{-- Result Count --}}
            @if(method_exists($activities, 'total'))

                <div
                    class="rounded-xl bg-slate-50 px-4 py-2 text-xs font-semibold text-slate-500">

                    {{ number_format($activities->total()) }}
                    aktivitas

                </div>

            @endif

        </div>


        {{-- Table --}}
        <div class="overflow-x-auto">

            <table class="min-w-full text-sm">

                <thead class="bg-slate-50">

                    <tr>

                        <th
                            class="whitespace-nowrap px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-500">

                            Pengguna

                        </th>

                        <th
                            class="whitespace-nowrap px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-500">

                            Modul

                        </th>

                        <th
                            class="whitespace-nowrap px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-500">

                            Aktivitas

                        </th>

                        <th
                            class="whitespace-nowrap px-6 py-4 text-center text-xs font-bold uppercase tracking-wider text-slate-500">

                            Waktu

                        </th>

                        <th
                            class="whitespace-nowrap px-6 py-4 text-center text-xs font-bold uppercase tracking-wider text-slate-500">

                            Aksi

                        </th>

                    </tr>

                </thead>


                <tbody class="divide-y divide-slate-100">

                    @forelse($activities as $activity)

                        @php

                            $action = strtolower($activity->action ?? '');

                            $badge = match ($action) {

                                'create' => [
                                    'bg' => 'bg-emerald-100',
                                    'text' => 'text-emerald-700',
                                    'dot' => 'bg-emerald-500',
                                    'label' => 'CREATE',
                                ],

                                'update' => [
                                    'bg' => 'bg-amber-100',
                                    'text' => 'text-amber-700',
                                    'dot' => 'bg-amber-500',
                                    'label' => 'UPDATE',
                                ],

                                'delete' => [
                                    'bg' => 'bg-red-100',
                                    'text' => 'text-red-700',
                                    'dot' => 'bg-red-500',
                                    'label' => 'DELETE',
                                ],

                                'login' => [
                                    'bg' => 'bg-blue-100',
                                    'text' => 'text-blue-700',
                                    'dot' => 'bg-blue-500',
                                    'label' => 'LOGIN',
                                ],

                                'logout' => [
                                    'bg' => 'bg-slate-100',
                                    'text' => 'text-slate-700',
                                    'dot' => 'bg-slate-500',
                                    'label' => 'LOGOUT',
                                ],

                                default => [
                                    'bg' => 'bg-violet-100',
                                    'text' => 'text-violet-700',
                                    'dot' => 'bg-violet-500',
                                    'label' => strtoupper($action ?: 'UNKNOWN'),
                                ],

                            };

                            $userName = $activity->user?->name ?? 'System';

                            $userEmail = $activity->user?->email ?? '-';

                            $initial = strtoupper(
                                substr($userName ?: 'S', 0, 1)
                            );

                        @endphp


                        <tr
                            class="group transition hover:bg-slate-50">

                            {{-- User --}}
                            <td
                                class="px-6 py-5 align-top">

                                <div
                                    class="flex items-center gap-4">

                                    <div
                                        class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-blue-100 text-sm font-black text-blue-700">

                                        {{ $initial }}

                                    </div>

                                    <div class="min-w-0">

                                        <p
                                            class="truncate font-semibold text-slate-900">

                                            {{ $userName }}

                                        </p>

                                        <p
                                            class="mt-1 max-w-[220px] truncate text-xs text-slate-500">

                                            {{ $userEmail }}

                                        </p>

                                    </div>

                                </div>

                            </td>


                            {{-- Module --}}
                            <td
                                class="px-6 py-5 align-middle">

                                <span
                                    class="inline-flex items-center rounded-full bg-indigo-100 px-3 py-1.5 text-xs font-bold text-indigo-700">

                                    {{ $activity->module ? ucfirst($activity->module) : 'System' }}

                                </span>

                            </td>


                            {{-- Activity --}}
                            <td
                                class="max-w-xl px-6 py-5 align-top">

                                <span
                                    class="inline-flex items-center gap-2 rounded-full {{ $badge['bg'] }} px-3 py-1.5 text-[11px] font-black {{ $badge['text'] }}">

                                    <span
                                        class="h-2 w-2 rounded-full {{ $badge['dot'] }}">
                                    </span>

                                    {{ $badge['label'] }}

                                </span>

                                <p
                                    class="mt-3 line-clamp-2 text-sm leading-6 text-slate-600">

                                    {{ $activity->description ?? 'Tidak ada deskripsi aktivitas.' }}

                                </p>

                            </td>


                            {{-- Time --}}
                            <td
                                class="px-6 py-5 text-center align-middle">

                                @if($activity->created_at)

                                    <p
                                        class="whitespace-nowrap font-semibold text-slate-800">

                                        {{ $activity->created_at->format('d M Y') }}

                                    </p>

                                    <p
                                        class="mt-1 whitespace-nowrap text-xs text-slate-500">

                                        {{ $activity->created_at->format('H:i') }}
                                        WIB

                                    </p>

                                @else

                                    <span class="text-slate-400">
                                        -
                                    </span>

                                @endif

                            </td>


                            {{-- Action --}}
                            <td
                                class="px-6 py-5 align-middle">

                                <div
                                    class="flex items-center justify-center">

                                    <a
                                        href="{{ route('activities.show', $activity->id) }}"
                                        class="inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 px-4 py-2.5 text-xs font-bold text-white shadow-sm transition hover:-translate-y-0.5 hover:shadow-lg">

                                        Detail

                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="h-3.5 w-3.5"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            stroke-width="2">

                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M9 5l7 7-7 7"/>

                                        </svg>

                                    </a>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="5"
                                class="px-6 py-20 text-center">

                                <div
                                    class="mx-auto flex h-20 w-20 items-center justify-center rounded-3xl bg-slate-100">

                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-9 w-9 text-slate-400"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="1.7">

                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>

                                    </svg>

                                </div>

                                <h3
                                    class="mt-6 text-xl font-black text-slate-800">

                                    Belum Ada Aktivitas

                                </h3>

                                <p
                                    class="mx-auto mt-2 max-w-md text-sm leading-6 text-slate-500">

                                    Belum ada aktivitas yang tercatat
                                    di dalam sistem.

                                </p>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- =====================================================
        PAGINATION
        ====================================================== --}}
        @if(method_exists($activities, 'links'))

            <div
                class="border-t border-slate-200 bg-white px-6 py-5">

                <div
                    class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

                    <div class="text-sm text-slate-500">

                        @if($activities->total() > 0)

                            Menampilkan

                            <span class="font-semibold text-slate-700">
                                {{ $activities->firstItem() }}
                            </span>

                            sampai

                            <span class="font-semibold text-slate-700">
                                {{ $activities->lastItem() }}
                            </span>

                            dari

                            <span class="font-semibold text-slate-700">
                                {{ $activities->total() }}
                            </span>

                            aktivitas

                        @else

                            Tidak ada aktivitas

                        @endif

                    </div>


                    <div>

                        {{ $activities->links() }}

                    </div>

                </div>

            </div>

        @endif

    </section>

</div>

@endsection