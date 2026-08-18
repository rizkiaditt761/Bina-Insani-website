@extends('layouts.app')

@section('title', 'Detail FAQ')

@section('content')

<div class="space-y-6 pb-8">

    {{-- ========================================================= --}}
    {{-- HEADER --}}
    {{-- ========================================================= --}}
    <div
        class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-slate-900 via-blue-900 to-indigo-900 p-6 text-white shadow-xl">

        <div
            class="absolute -right-8 -top-8 h-32 w-32 rounded-full bg-white/10 blur-3xl">
        </div>

        <div
            class="absolute -bottom-12 left-1/3 h-40 w-40 rounded-full bg-blue-400/10 blur-3xl">
        </div>

        <div
            class="relative flex flex-col gap-5 lg:flex-row lg:items-center lg:justify-between">

            <div>

                <span
                    class="inline-flex rounded-full bg-white/10 px-4 py-2 text-xs font-semibold uppercase tracking-[0.25em] text-blue-100">

                    FAQ Management

                </span>

                <h1 class="mt-4 text-3xl font-black tracking-tight">

                    Detail FAQ

                </h1>

                <p class="mt-2 max-w-2xl text-sm leading-6 text-blue-100">

                    Informasi lengkap mengenai FAQ yang ditampilkan
                    pada website LPK Bina Insani.

                </p>

            </div>


            <div class="flex items-center gap-2">

                <a
                    href="{{ route('faqs.edit', $faq->id) }}"
                    class="inline-flex items-center gap-2 rounded-xl bg-white px-5 py-2.5 text-sm font-semibold text-blue-700 shadow-lg transition hover:-translate-y-0.5 hover:bg-blue-50 hover:shadow-xl">

                    <svg
                        class="h-4 w-4"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M16.862 4.487l1.65-1.65a2.121 2.121 0 013 3l-1.65 1.65m-3-1.35L5.25 15.75a2.25 2.25 0 00-.56 1.03L4 20l3.22-.69a2.25 2.25 0 001.03-.56L18.5 8.01m-2.638-3.523l3 3" />

                    </svg>

                    Edit FAQ

                </a>

            </div>

        </div>

    </div>



    {{-- ========================================================= --}}
    {{-- DETAIL --}}
    {{-- ========================================================= --}}
    <div
        class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">

        {{-- Card Header --}}
        <div
            class="flex flex-col gap-2 border-b border-slate-200 px-6 py-5 sm:flex-row sm:items-center sm:justify-between">

            <div>

                <h2 class="text-lg font-bold text-slate-800">

                    Informasi FAQ

                </h2>

                <p class="mt-1 text-sm text-slate-500">

                    Detail pertanyaan, jawaban, status, dan informasi lainnya.

                </p>

            </div>


            {{-- Urutan --}}
            <div
                class="flex items-center gap-2 text-xs text-slate-500">

                Urutan

                <span
                    class="inline-flex min-w-8 items-center justify-center rounded-lg bg-slate-100 px-2.5 py-1 font-bold text-slate-700">

                    {{ $faq->sort_order ?? 0 }}

                </span>

            </div>

        </div>



        <div class="space-y-6 p-6">

            {{-- ================================================= --}}
            {{-- PERTANYAAN --}}
            {{-- ================================================= --}}
            <div>

                <label
                    class="mb-2 block text-[11px] font-semibold uppercase tracking-wider text-slate-500">

                    Pertanyaan

                </label>

                <div
                    class="rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4">

                    <div class="flex items-start gap-3">

                        <div
                            class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-blue-100 text-blue-600">

                            <svg
                                class="h-4 w-4"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2">

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M8.228 9c.549-1.165 1.9-2 3.772-2 2.21 0 4 1.343 4 3 0 1.087-.718 2.037-1.752 2.57-.98.506-1.748 1.18-1.748 2.43m-.5 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />

                            </svg>

                        </div>

                        <h3
                            class="pt-1 text-base font-bold leading-6 text-slate-800">

                            {{ $faq->question }}

                        </h3>

                    </div>

                </div>

            </div>



            {{-- ================================================= --}}
            {{-- JAWABAN --}}
            {{-- ================================================= --}}
            <div>

                <label
                    class="mb-2 block text-[11px] font-semibold uppercase tracking-wider text-slate-500">

                    Jawaban

                </label>

                <div
                    class="rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 text-sm leading-6 text-slate-700">

                    {!! nl2br(e($faq->answer)) !!}

                </div>

            </div>



            {{-- ================================================= --}}
            {{-- INFORMASI --}}
            {{-- ================================================= --}}
            <div
                class="grid gap-5 sm:grid-cols-2 lg:grid-cols-4">

                {{-- Kategori --}}
                <div
                    class="rounded-2xl border border-slate-200 bg-white p-4">

                    <p
                        class="text-[11px] font-semibold uppercase tracking-wider text-slate-400">

                        Kategori

                    </p>

                    <div class="mt-3">

                        @if($faq->category)

                            <span
                                class="inline-flex rounded-full bg-indigo-100 px-3 py-1 text-xs font-semibold text-indigo-700">

                                {{ $faq->category }}

                            </span>

                        @else

                            <span class="text-sm text-slate-400">
                                -
                            </span>

                        @endif

                    </div>

                </div>



                {{-- Urutan --}}
                <div
                    class="rounded-2xl border border-slate-200 bg-white p-4">

                    <p
                        class="text-[11px] font-semibold uppercase tracking-wider text-slate-400">

                        Urutan Tampilan

                    </p>

                    <div class="mt-3">

                        <span
                            class="inline-flex min-w-9 items-center justify-center rounded-xl bg-slate-100 px-3 py-1.5 text-sm font-bold text-slate-700">

                            {{ $faq->sort_order ?? 0 }}

                        </span>

                    </div>

                </div>



                {{-- Status --}}
                <div
                    class="rounded-2xl border border-slate-200 bg-white p-4">

                    <p
                        class="text-[11px] font-semibold uppercase tracking-wider text-slate-400">

                        Status

                    </p>

                    <div class="mt-3">

                        @if($faq->is_active)

                            <span
                                class="inline-flex items-center gap-1.5 rounded-full bg-emerald-100 px-3 py-1 text-[11px] font-semibold text-emerald-700">

                                <span
                                    class="h-1.5 w-1.5 rounded-full bg-emerald-500">
                                </span>

                                Aktif

                            </span>

                        @else

                            <span
                                class="inline-flex items-center gap-1.5 rounded-full bg-slate-200 px-3 py-1 text-[11px] font-semibold text-slate-600">

                                <span
                                    class="h-1.5 w-1.5 rounded-full bg-slate-400">
                                </span>

                                Nonaktif

                            </span>

                        @endif

                    </div>

                </div>



                {{-- ID --}}
                <div
                    class="rounded-2xl border border-slate-200 bg-white p-4">

                    <p
                        class="text-[11px] font-semibold uppercase tracking-wider text-slate-400">

                        ID FAQ

                    </p>

                    <p
                        class="mt-3 text-sm font-semibold text-slate-700">

                        #{{ $faq->id }}

                    </p>

                </div>

            </div>



            {{-- ================================================= --}}
            {{-- TIMESTAMP --}}
            {{-- ================================================= --}}
            <div
                class="grid gap-5 border-t border-slate-100 pt-5 sm:grid-cols-2">

                <div>

                    <p
                        class="text-[11px] font-semibold uppercase tracking-wider text-slate-400">

                        Dibuat Pada

                    </p>

                    <p class="mt-2 text-sm text-slate-700">

                        {{ $faq->created_at?->format('d F Y, H:i') ?? '-' }}

                    </p>

                </div>


                <div>

                    <p
                        class="text-[11px] font-semibold uppercase tracking-wider text-slate-400">

                        Terakhir Diperbarui

                    </p>

                    <p class="mt-2 text-sm text-slate-700">

                        {{ $faq->updated_at?->format('d F Y, H:i') ?? '-' }}

                    </p>

                </div>

            </div>



            {{-- ================================================= --}}
            {{-- ACTION --}}
            {{-- ================================================= --}}
            <div
                class="flex flex-col-reverse gap-3 border-t border-slate-200 pt-5 sm:flex-row sm:justify-start">

                <a
                    href="{{ route('faqs.index') }}"
                    class="inline-flex items-center justify-center rounded-xl border border-slate-300 bg-white px-5 py-2.5 text-sm font-semibold text-slate-600 transition hover:border-slate-400 hover:bg-slate-50">

                    Kembali

                </a>


                <a
                    href="{{ route('faqs.edit', $faq->id) }}"
                    class="inline-flex items-center justify-center rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">

                    Edit FAQ

                </a>

            </div>

        </div>

    </div>

</div>

@endsection