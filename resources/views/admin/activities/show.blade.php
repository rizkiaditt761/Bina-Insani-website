@extends('layouts.app')

@section('title', 'Detail Activity')

@section('content')

<div class="space-y-8">

    {{-- =========================================================
    HEADER
    ========================================================== --}}
    <section
        class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-slate-950 via-blue-950 to-indigo-950 p-6 text-white shadow-xl sm:p-8">

        <div
            class="absolute -right-16 -top-16 h-56 w-56 rounded-full bg-blue-400/10 blur-3xl">
        </div>

        <div
            class="absolute -bottom-20 left-1/3 h-48 w-48 rounded-full bg-indigo-400/10 blur-3xl">
        </div>

        <div
            class="relative flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">

            <div>

                <span
                    class="inline-flex items-center rounded-full border border-white/10 bg-white/10 px-4 py-2 text-xs font-bold uppercase tracking-[0.22em] text-blue-100 backdrop-blur">

                    Activity Log

                </span>

                <h1
                    class="mt-4 text-3xl font-black tracking-tight sm:text-4xl">

                    Detail Aktivitas

                </h1>

                <p
                    class="mt-3 max-w-2xl text-sm leading-6 text-blue-100 sm:text-base">

                    Informasi lengkap mengenai aktivitas yang tercatat
                    di dalam sistem administrasi LPK Bina Insani.

                </p>

            </div>


            <div>

                <a
                    href="{{ route('activities.index') }}"
                    class="inline-flex items-center gap-2 rounded-xl border border-white/10 bg-white/10 px-5 py-3 text-sm font-bold text-white backdrop-blur transition hover:bg-white/20">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-4 w-4"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M15 19l-7-7 7-7"/>

                    </svg>

                    Kembali

                </a>

            </div>

        </div>

    </section>


    {{-- =========================================================
    ACTIVITY SUMMARY
    ========================================================== --}}
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


    <section
        class="grid gap-6 lg:grid-cols-3">

        {{-- User --}}
        <div
            class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">

            <p
                class="text-xs font-bold uppercase tracking-[0.18em] text-slate-400">

                Pengguna

            </p>

            <div
                class="mt-5 flex items-center gap-4">

                <div
                    class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-blue-100 text-lg font-black text-blue-700">

                    {{ $initial }}

                </div>

                <div class="min-w-0">

                    <h2
                        class="truncate text-lg font-bold text-slate-900">

                        {{ $userName }}

                    </h2>

                    <p
                        class="mt-1 truncate text-sm text-slate-500">

                        {{ $userEmail }}

                    </p>

                </div>

            </div>

        </div>


        {{-- Action --}}
        <div
            class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">

            <p
                class="text-xs font-bold uppercase tracking-[0.18em] text-slate-400">

                Jenis Aktivitas

            </p>

            <div class="mt-5">

                <span
                    class="inline-flex items-center gap-2 rounded-full {{ $badge['bg'] }} px-4 py-2 text-xs font-black {{ $badge['text'] }}">

                    <span
                        class="h-2.5 w-2.5 rounded-full {{ $badge['dot'] }}">
                    </span>

                    {{ $badge['label'] }}

                </span>

            </div>

        </div>


        {{-- Time --}}
        <div
            class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">

            <p
                class="text-xs font-bold uppercase tracking-[0.18em] text-slate-400">

                Waktu Aktivitas

            </p>

            @if($activity->created_at)

                <p
                    class="mt-5 text-lg font-bold text-slate-900">

                    {{ $activity->created_at->format('d M Y') }}

                </p>

                <p
                    class="mt-1 text-sm text-slate-500">

                    {{ $activity->created_at->format('H:i:s') }} WIB

                </p>

            @else

                <p class="mt-5 text-slate-400">
                    -
                </p>

            @endif

        </div>

    </section>


    {{-- =========================================================
    ACTIVITY INFORMATION
    ========================================================== --}}
    <section
        class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">

        <div>

            <h2
                class="text-xl font-black text-slate-900">

                Informasi Aktivitas

            </h2>

            <p
                class="mt-1 text-sm text-slate-500">

                Detail aktivitas yang dilakukan pada sistem.

            </p>

        </div>


        <div
            class="mt-6 grid gap-5 md:grid-cols-2">

            {{-- Module --}}
            <div
                class="rounded-2xl bg-slate-50 p-5">

                <p
                    class="text-xs font-bold uppercase tracking-wider text-slate-400">

                    Modul

                </p>

                <div class="mt-3">

                    <span
                        class="inline-flex rounded-full bg-indigo-100 px-3 py-1.5 text-xs font-bold text-indigo-700">

                        {{ $activity->module ? ucfirst($activity->module) : 'System' }}

                    </span>

                </div>

            </div>


            {{-- Action --}}
            <div
                class="rounded-2xl bg-slate-50 p-5">

                <p
                    class="text-xs font-bold uppercase tracking-wider text-slate-400">

                    Action

                </p>

                <p
                    class="mt-3 font-bold uppercase text-slate-800">

                    {{ $activity->action ?? '-' }}

                </p>

            </div>

        </div>


        {{-- Description --}}
        <div
            class="mt-5 rounded-2xl border border-slate-200 p-5">

            <p
                class="text-xs font-bold uppercase tracking-wider text-slate-400">

                Deskripsi

            </p>

            <p
                class="mt-3 text-sm leading-7 text-slate-700">

                {{ $activity->description ?? 'Tidak ada deskripsi aktivitas.' }}

            </p>

        </div>

    </section>


    {{-- =========================================================
    CHANGE DETAILS
    ========================================================== --}}
    @if(
        is_array($activity->properties ?? null)
        && isset($activity->properties['changes'])
        && is_array($activity->properties['changes'])
        && count($activity->properties['changes']) > 0
    )

        <section
            class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">

            <div
                class="border-b border-slate-200 px-6 py-5 sm:px-8">

                <h2
                    class="text-xl font-black text-slate-900">

                    Detail Perubahan

                </h2>

                <p
                    class="mt-1 text-sm text-slate-500">

                    Perbandingan data sebelum dan sesudah perubahan.

                </p>

            </div>


            <div
                class="divide-y divide-slate-200">

                @foreach($activity->properties['changes'] as $change)

                    @php

                        $field = $change['field'] ?? 'Data';

                        $oldValue = $change['old'] ?? null;

                        $newValue = $change['new'] ?? null;

                        $isImage = str_contains(
                            strtolower($field),
                            'image'
                        )
                        || in_array(
                            strtolower($field),
                            ['logo', 'favicon']
                        );

                    @endphp


                    <div class="p-6 sm:p-8">

                        <h3
                            class="font-bold text-slate-900">

                            {{ ucwords(str_replace('_', ' ', $field)) }}

                        </h3>


                        <div
                            class="mt-5 grid gap-5 md:grid-cols-2">

                            {{-- Before --}}
                            <div
                                class="rounded-2xl border border-red-100 bg-red-50 p-5">

                                <p
                                    class="text-xs font-black uppercase tracking-wider text-red-600">

                                    Sebelum

                                </p>


                                @if($isImage)

                                    @if($oldValue && $oldValue !== 'Tidak ada')

                                        <img
                                            src="{{ asset('storage/' . $oldValue) }}"
                                            alt="Data sebelum perubahan"
                                            class="mt-4 h-40 w-full rounded-xl object-cover"
                                        >

                                    @else

                                        <div
                                            class="mt-4 flex h-40 items-center justify-center rounded-xl border border-dashed border-red-200 bg-white">

                                            <span
                                                class="text-sm text-slate-400">

                                                Tidak ada gambar sebelumnya

                                            </span>

                                        </div>

                                    @endif

                                @else

                                    <p
                                        class="mt-4 break-words rounded-xl bg-white p-4 text-sm leading-6 text-slate-700">

                                        {{ $oldValue !== null && $oldValue !== '' ? $oldValue : '-' }}

                                    </p>

                                @endif

                            </div>


                            {{-- After --}}
                            <div
                                class="rounded-2xl border border-emerald-100 bg-emerald-50 p-5">

                                <p
                                    class="text-xs font-black uppercase tracking-wider text-emerald-600">

                                    Sesudah

                                </p>


                                @if($isImage)

                                    @if(
                                        $newValue
                                        && $newValue !== 'Gambar baru'
                                        && $newValue !== 'About image baru'
                                    )

                                        <img
                                            src="{{ asset('storage/' . $newValue) }}"
                                            alt="Data sesudah perubahan"
                                            class="mt-4 h-40 w-full rounded-xl object-cover"
                                        >

                                    @else

                                        <div
                                            class="mt-4 flex h-40 items-center justify-center rounded-xl border border-dashed border-emerald-200 bg-white">

                                            <span
                                                class="text-sm text-slate-400">

                                                Gambar baru

                                            </span>

                                        </div>

                                    @endif

                                @else

                                    <p
                                        class="mt-4 break-words rounded-xl bg-white p-4 text-sm leading-6 text-slate-700">

                                        {{ $newValue !== null && $newValue !== '' ? $newValue : '-' }}

                                    </p>

                                @endif

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        </section>

    @endif


    {{-- =========================================================
    TECHNICAL INFORMATION
    ========================================================== --}}
    <section
        class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">

        <div>

            <h2
                class="text-xl font-black text-slate-900">

                Informasi Teknis

            </h2>

            <p
                class="mt-1 text-sm text-slate-500">

                Informasi koneksi dan data teknis saat aktivitas dilakukan.

            </p>

        </div>


        <div
            class="mt-6 grid gap-5 md:grid-cols-2">

            {{-- IP --}}
            <div
                class="rounded-2xl bg-slate-50 p-5">

                <p
                    class="text-xs font-bold uppercase tracking-wider text-slate-400">

                    IP Address

                </p>

                <p
                    class="mt-3 break-all font-semibold text-slate-800">

                    {{ $activity->ip_address ?? '-' }}

                </p>

            </div>


            {{-- User Agent --}}
            <div
                class="rounded-2xl bg-slate-50 p-5">

                <p
                    class="text-xs font-bold uppercase tracking-wider text-slate-400">

                    Browser / Device

                </p>

                <p
                    class="mt-3 break-all text-sm leading-6 text-slate-700">

                    {{ $activity->user_agent ?? '-' }}

                </p>

            </div>

        </div>

    </section>


    {{-- =========================================================
    SUBJECT INFORMATION
    ========================================================== --}}
    <section
        class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">

        <div>

            <h2
                class="text-xl font-black text-slate-900">

                Data Terkait

            </h2>

            <p
                class="mt-1 text-sm text-slate-500">

                Informasi model atau data yang berhubungan dengan aktivitas ini.

            </p>

        </div>


        <div
            class="mt-6 grid gap-5 md:grid-cols-2">

            {{-- Subject Type --}}
            <div
                class="rounded-2xl bg-slate-50 p-5">

                <p
                    class="text-xs font-bold uppercase tracking-wider text-slate-400">

                    Subject Type

                </p>

                <p
                    class="mt-3 break-all font-semibold text-slate-800">

                    @if($activity->subject_type)

                        {{ class_basename($activity->subject_type) }}

                    @else

                        -

                    @endif

                </p>

            </div>


            {{-- Subject ID --}}
            <div
                class="rounded-2xl bg-slate-50 p-5">

                <p
                    class="text-xs font-bold uppercase tracking-wider text-slate-400">

                    Subject ID

                </p>

                <p
                    class="mt-3 font-semibold text-slate-800">

                    {{ $activity->subject_id ?? '-' }}

                </p>

            </div>

        </div>

    </section>


    {{-- =========================================================
    DELETE ACTION
    ========================================================== --}}
    <section
        class="flex flex-col gap-4 rounded-3xl border border-red-100 bg-red-50 p-6 sm:flex-row sm:items-center sm:justify-between">

        <div>

            <h2
                class="font-bold text-red-800">

                Hapus Activity Log

            </h2>

            <p
                class="mt-1 text-sm text-red-600">

                Aktivitas yang dihapus tidak dapat dikembalikan.

            </p>

        </div>


        <form
            action="{{ route('activities.destroy', $activity->id) }}"
            method="POST"
            onsubmit="return confirm('Yakin ingin menghapus activity log ini?')">

            @csrf

            @method('DELETE')

            <button
                type="submit"
                class="inline-flex items-center justify-center rounded-xl bg-red-600 px-5 py-3 text-sm font-bold text-white shadow-sm transition hover:bg-red-700 hover:shadow-lg">

                Hapus Aktivitas

            </button>

        </form>

    </section>

</div>

@endsection