@extends('layouts.app')

@section('title', 'Detail Activity')

@section('content')

{{-- ======================================================= --}}
{{-- Header --}}
{{-- ======================================================= --}}
<div
    class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-slate-900 via-blue-900 to-indigo-900 p-6 text-white shadow-xl">

    {{-- Background Decoration --}}
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

                Detail Aktivitas Sistem

            </h1>


            <p
                class="mt-2 max-w-2xl text-sm text-blue-100">

                Informasi lengkap mengenai aktivitas pengguna
                yang tercatat pada website LPK Bina Insani.

            </p>

        </div>



        {{-- Back Button --}}
        <div>

            <a
                href="{{ route('activities.index') }}"
                class="inline-flex items-center gap-2 rounded-xl bg-white/10 px-5 py-3 text-sm font-semibold text-white backdrop-blur transition hover:bg-white/20">

                <span>
                    ←
                </span>

                Kembali

            </a>

        </div>


    </div>

</div>





{{-- ======================================================= --}}
{{-- Content Wrapper --}}
{{-- ======================================================= --}}
<div
    class="space-y-6">


    {{-- ======================================================= --}}
{{-- User Information --}}
{{-- ======================================================= --}}
<div
    class="grid mt-6 gap-6 lg:grid-cols-3">


    {{-- User --}}
    <div
        class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm lg:col-span-1">


        <h2
            class="text-lg font-bold text-slate-900">

            Pengguna

        </h2>


        <p
            class="mt-1 text-sm text-slate-500">

            User yang melakukan aktivitas.

        </p>





        <div
            class="mt-6 flex items-center gap-4">


            <div
                class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-blue-100 text-xl font-black text-blue-700">

                {{ strtoupper(substr($activity->user?->name ?? 'S', 0, 1)) }}

            </div>



            <div>


                <h3
                    class="font-bold text-slate-900">

                    {{ $activity->user?->name ?? 'System' }}

                </h3>


                <p
                    class="mt-1 text-sm text-slate-500">

                    {{ $activity->user?->email ?? '-' }}

                </p>


            </div>


        </div>


    </div>





    {{-- Technical Information --}}
    <div
        class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm lg:col-span-2">


        <h2
            class="text-lg font-bold text-slate-900">

            Informasi Teknis

        </h2>


        <p
            class="mt-1 text-sm text-slate-500">

            Informasi perangkat dan koneksi saat aktivitas dilakukan.

        </p>





        <div
            class="mt-6 grid gap-5 md:grid-cols-2">


            {{-- IP --}}
            <div
                class="rounded-2xl bg-slate-50 p-5">


                <p
                    class="text-xs font-semibold uppercase tracking-wider text-slate-500">

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
                    class="text-xs font-semibold uppercase tracking-wider text-slate-500">

                    Browser / Device

                </p>


                <p
                    class="mt-3 break-all text-sm leading-6 text-slate-700">

                    {{ $activity->user_agent ?? '-' }}

                </p>


            </div>


        </div>


    </div>


</div>


    {{-- ======================================================= --}}
{{-- Detail Aktivitas --}}
{{-- ======================================================= --}}
<div
    class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">


    <div
        class="flex flex-col gap-6 lg:flex-row lg:items-start lg:justify-between">


        {{-- Left --}}
        <div>


            <h2
                class="text-lg font-bold text-slate-900">

                Informasi Aktivitas

            </h2>


            <p
                class="mt-1 text-sm text-slate-500">

                Detail aktivitas yang dilakukan pada sistem.

            </p>


        </div>



        {{-- Action Badge --}}
        <div>

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
                class="inline-flex items-center gap-2 rounded-full {{ $badge['bg'] }} px-4 py-2 text-xs font-bold {{ $badge['text'] }}">

                {{ $badge['icon'] }}

                {{ strtoupper($activity->action) }}

            </span>


        </div>


    </div>





    {{-- Information Grid --}}
    <div
        class="mt-8 grid gap-6 md:grid-cols-2">


        {{-- Module --}}
        <div
            class="rounded-2xl bg-slate-50 p-5">


            <p
                class="text-xs font-semibold uppercase tracking-wider text-slate-500">

                Modul

            </p>


            <div
                class="mt-3">

                <span
                    class="inline-flex rounded-full bg-indigo-100 px-3 py-1 text-xs font-semibold text-indigo-700">

                    {{ ucfirst($activity->module) }}

                </span>

            </div>


        </div>





        {{-- Waktu --}}
        <div
            class="rounded-2xl bg-slate-50 p-5">


            <p
                class="text-xs font-semibold uppercase tracking-wider text-slate-500">

                Waktu Aktivitas

            </p>


            <div
                class="mt-3 font-semibold text-slate-800">

                {{ $activity->created_at->format('d M Y') }}

            </div>


            <div
                class="mt-1 text-sm text-slate-500">

                {{ $activity->created_at->format('H:i') }} WIB

            </div>


        </div>


    </div>





    {{-- Description --}}
    <div
        class="mt-6 rounded-2xl border border-slate-200 p-5">


        <p
            class="text-xs font-semibold uppercase tracking-wider text-slate-500">

            Deskripsi

        </p>


        <p
            class="mt-3 leading-7 text-slate-600">

            {{ $activity->description }}

        </p>


    </div>


</div>



{{-- ======================================================= --}}
{{-- Change Detail --}}
{{-- ======================================================= --}}

@if(isset($activity->properties['changes']))


<div
    class="mt-6 overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">


    <div
        class="border-b border-slate-200 px-6 py-5">


        <h2
            class="text-lg font-bold text-slate-900">

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


        <div
            class="p-6">


            <h3
                class="font-bold text-slate-900">

                {{ ucwords(str_replace('_',' ', $change['field'])) }}

            </h3>





            <div
                class="mt-4 grid gap-5 md:grid-cols-2">



                {{-- Before --}}
                <div
                    class="rounded-2xl bg-red-50 p-5">


                    <p
                        class="text-xs font-bold uppercase tracking-wider text-red-600">

                        Sebelum

                    </p>


                    @if(str_contains($change['field'], 'image') || $change['field'] == 'logo' || $change['field'] == 'favicon')

                        @if($change['old'])

                            <img
                                src="{{ asset('storage/'.$change['old']) }}"
                                class="mt-3 h-40 w-full rounded-xl object-cover"
                            >

                        @else

                            <p class="mt-3 text-sm text-slate-500">
                                Tidak ada gambar sebelumnya
                            </p>

                        @endif

                    @else

                        <p
                            class="mt-3 break-words text-sm leading-6 text-slate-700">

                            {{ $change['old'] ?? '-' }}

                        </p>

                    @endif


                </div>





                {{-- After --}}
                <div
                    class="rounded-2xl bg-emerald-50 p-5">


                    <p
                        class="text-xs font-bold uppercase tracking-wider text-emerald-600">

                        Sesudah

                    </p>


                    @if(str_contains($change['field'], 'image') || $change['field'] == 'logo' || $change['field'] == 'favicon')

                        @if($change['new'] && $change['new'] != 'About image baru')

                            <img
                                src="{{ asset('storage/'.$change['new']) }}"
                                class="mt-3 h-40 w-full rounded-xl object-cover"
                            >

                        @else

                            <p class="mt-3 text-sm text-slate-500">
                                Gambar baru
                            </p>

                        @endif

                    @else

                        <p
                            class="mt-3 break-words text-sm leading-6 text-slate-700">

                            {{ $change['new'] ?? '-' }}

                        </p>

                    @endif


                </div>



            </div>


        </div>


        @endforeach


    </div>


</div>


@endif






{{-- ======================================================= --}}
{{-- Subject Information --}}
{{-- ======================================================= --}}
<div
    class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">


    <h2
        class="text-lg font-bold text-slate-900">

        Data Terkait

    </h2>


    <p
        class="mt-1 text-sm text-slate-500">

        Informasi data yang berhubungan dengan aktivitas ini.

    </p>





    <div
        class="mt-6 grid gap-6 md:grid-cols-2">


        {{-- Subject Type --}}
        <div
            class="rounded-2xl bg-slate-50 p-5">


            <p
                class="text-xs font-semibold uppercase tracking-wider text-slate-500">

                Subject Type

            </p>


            <p
                class="mt-3 break-all font-semibold text-slate-800">

                {{ $activity->subject_type ?? '-' }}

            </p>


        </div>





        {{-- Subject ID --}}
        <div
            class="rounded-2xl bg-slate-50 p-5">


            <p
                class="text-xs font-semibold uppercase tracking-wider text-slate-500">

                Subject ID

            </p>


            <p
                class="mt-3 font-semibold text-slate-800">

                {{ $activity->subject_id ?? '-' }}

            </p>


        </div>


    </div>


</div>


</div>


@endsection