@extends('layouts.app')

@section('title', 'Activity Log')

@section('content')

<div class="space-y-8">

    {{-- ======================================================= --}}
    {{-- Header --}}
    {{-- ======================================================= --}}
    <div
        class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-slate-900 via-blue-900 to-indigo-900 p-6 text-white shadow-xl">

        <div
            class="absolute -right-10 -top-10 h-40 w-40 rounded-full bg-white/10 blur-3xl">
        </div>

        <div
            class="relative flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">

            <div>

                <span
                    class="inline-flex rounded-full bg-white/10 px-4 py-2 text-xs font-semibold uppercase tracking-[0.25em] text-blue-100">

                    Activity Log

                </span>

                <h1
                    class="mt-4 text-3xl font-black">

                    Riwayat Aktivitas Sistem

                </h1>

                <p
                    class="mt-2 max-w-2xl text-sm text-blue-100">

                    Pantau seluruh aktivitas pengguna yang tercatat pada
                    website LPK Bina Insani.

                </p>

            </div>

        </div>

    </div>





    {{-- ======================================================= --}}
    {{-- Statistik --}}
    {{-- ======================================================= --}}
    <div
        class="grid gap-6 md:grid-cols-2 xl:grid-cols-4">

        <div
            class="rounded-2xl border border-blue-100 bg-gradient-to-br from-blue-50 to-white p-6 shadow-sm">

            <p
                class="text-sm font-medium text-blue-600">

                Total Aktivitas

            </p>

            <h2
                class="mt-3 text-3xl font-black text-slate-900">

                {{ $total }}

            </h2>

        </div>





        <div
            class="rounded-2xl border border-emerald-100 bg-gradient-to-br from-emerald-50 to-white p-6 shadow-sm">

            <p
                class="text-sm font-medium text-emerald-600">

                Hari Ini

            </p>

            <h2
                class="mt-3 text-3xl font-black text-slate-900">

                {{ $today }}

            </h2>

        </div>

        <div
            class="rounded-2xl border border-amber-100 bg-gradient-to-br from-amber-50 to-white p-6 shadow-sm">

            <p
                class="text-sm font-medium text-amber-600">

                Total Modul

            </p>

            <h2
                class="mt-3 text-3xl font-black text-slate-900">

                {{ $totalModules }}

            </h2>

        </div>

        <div
            class="rounded-2xl border border-amber-100 bg-gradient-to-br from-amber-50 to-white p-6 shadow-sm">

            <p
                class="text-sm font-medium text-amber-600">

                Bulan Ini

            </p>

            <h2
                class="mt-3 text-3xl font-black text-slate-900">

                {{ $thisMonth }}

            </h2>

        </div>

    </div>

    





    {{-- ======================================================= --}}
    {{-- Table --}}
    {{-- ======================================================= --}}
    <div
        class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">

        <div
            class="flex items-center justify-between border-b border-slate-200 px-6 py-5">

            <div>

                <h2
                    class="text-lg font-bold text-slate-900">

                    Daftar Aktivitas

                </h2>

                <p
                    class="text-sm text-slate-500">

                    Semua aktivitas pengguna yang berhasil tercatat
                    pada sistem.

                </p>

            </div>

        </div>





        <div
            class="overflow-x-auto">

            <table
                class="min-w-full text-sm">

                <thead
                    class="bg-slate-50">

                    <tr>

                        <th class="px-6 py-4 text-left font-semibold text-slate-600">
                            User
                        </th>

                        <th class="px-6 py-4 text-left font-semibold text-slate-600">
                            Modul
                        </th>

                        <th class="px-6 py-4 text-left font-semibold text-slate-600">
                            Aktivitas
                        </th>

                        <th class="w-40 px-6 py-4 text-center font-semibold text-slate-600">
                            Waktu
                        </th>

                        <th class="px-6 py-4 text-center font-semibold text-slate-600">
                            Aksi
                        </th>

                    </tr>

                </thead>

                <tbody
                    class="divide-y divide-slate-200">

                    @forelse($activities as $activity)
                <tr
    class="transition hover:bg-slate-50">

    {{-- User --}}
    <td class="px-6 py-5 align-top">

        <div class="flex items-center gap-4">

            <div
                class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-blue-100 text-lg font-bold text-blue-700">

                {{ strtoupper(substr($activity->user?->name ?? 'S', 0, 1)) }}

            </div>

            <div>

                <h3
                    class="font-semibold text-slate-900">

                    {{ $activity->user?->name ?? 'System' }}

                </h3>

                <p
                    class="mt-1 text-xs text-slate-500">

                    {{ $activity->user?->email ?? '-' }}

                </p>

            </div>

        </div>

    </td>





    {{-- Modul --}}
    <td class="px-6 py-5 align-middle">

        <span
            class="inline-flex rounded-full bg-indigo-100 px-3 py-1 text-xs font-semibold text-indigo-700">

            {{ ucfirst($activity->module) }}

        </span>

    </td>





    {{-- Aktivitas --}}
    <td class="px-6 py-5 align-top">

        @php

            $badge = match($activity->action) {

                'create' => [
                    'bg' => 'bg-emerald-100',
                    'text' => 'text-emerald-700',
                    'icon' => '🟢'
                ],

                'update' => [
                    'bg' => 'bg-amber-100',
                    'text' => 'text-amber-700',
                    'icon' => '🟡'
                ],

                'delete' => [
                    'bg' => 'bg-red-100',
                    'text' => 'text-red-700',
                    'icon' => '🔴'
                ],

                'login' => [
                    'bg' => 'bg-blue-100',
                    'text' => 'text-blue-700',
                    'icon' => '🔵'
                ],

                'logout' => [
                    'bg' => 'bg-slate-100',
                    'text' => 'text-slate-700',
                    'icon' => '⚫'
                ],

                default => [
                    'bg' => 'bg-violet-100',
                    'text' => 'text-violet-700',
                    'icon' => '🟣'
                ],

            };

        @endphp

        <span
            class="inline-flex items-center gap-2 rounded-full {{ $badge['bg'] }} px-3 py-1 text-xs font-bold {{ $badge['text'] }}">

            {{ $badge['icon'] }}

            {{ strtoupper($activity->action) }}

        </span>

        <p
            class="mt-3 max-w-lg text-sm leading-6 text-slate-600">

            {{ $activity->description }}

        </p>

    </td>





    {{-- Waktu --}}
    <td class="px-6 py-5 text-center align-middle">

        <div
            class="whitespace-nowrap font-semibold text-slate-800">

            {{ $activity->created_at->format('d M Y') }}

        </div>

        <div
            class="mt-1 whitespace-nowrap text-xs text-slate-500">

            {{ $activity->created_at->format('H:i') }} WIB

        </div>

    </td>





    {{-- Aksi --}}
    <td
        class="px-6 py-5 align-middle">

        <div
            class="flex justify-center">

            <a
                href="{{ route('activities.show', $activity->id) }}"
                class="rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 px-3 py-2 text-xs font-semibold text-white shadow transition hover:-translate-y-0.5 hover:shadow-lg">

                Detail

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
            class="mx-auto flex h-24 w-24 items-center justify-center rounded-full bg-slate-100 text-5xl">

            📋

        </div>

        <h3
            class="mt-6 text-2xl font-black text-slate-800">

            Belum Ada Aktivitas

        </h3>

        <p
            class="mx-auto mt-3 max-w-md text-slate-500">

            Aktivitas pengguna akan otomatis tercatat dan
            ditampilkan di halaman ini setelah sistem digunakan.

        </p>

    </td>

</tr>

@endforelse

                </tbody>

            </table>

        </div>





        @if(method_exists($activities, 'links'))

            <div
                class="border-t border-slate-200 px-6 py-5">

                {{ $activities->links() }}

            </div>

        @endif

    </div>

</div>

@endsection