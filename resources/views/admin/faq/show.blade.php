@extends('layouts.app')

@section('title', 'Detail FAQ')

@section('content')

<div class="space-y-8">

    {{-- Header --}}
    
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

                    FAQ Management

                </span>

                <h1
                    class="mt-4 text-3xl font-black">

                    Detail FAQ

                </h1>

                <p
                    class="mt-2 max-w-2xl text-sm text-blue-100">

                    Informasi lengkap mengenai FAQ yang ditampilkan pada website.

                </p>

            </div>

        </div>

    </div>





    {{-- Detail --}}
    <div
        class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">

        <div
            class="border-b border-slate-200 px-8 py-6">

            <h2
                class="text-xl font-bold text-slate-900">

                Informasi FAQ

            </h2>

            <p
                class="mt-1 text-sm text-slate-500">

                Detail pertanyaan dan jawaban.

            </p>

        </div>





        <div
            class="space-y-8 p-8">

            {{-- Pertanyaan --}}
            <div>

                <label
                    class="mb-2 block text-sm font-semibold uppercase tracking-wide text-slate-500">

                    Pertanyaan

                </label>

                <div
                    class="rounded-2xl border border-slate-200 bg-slate-50 p-5">

                    <h3
                        class="text-xl font-bold text-slate-800">

                        {{ $faq->question }}

                    </h3>

                </div>

            </div>
                        {{-- Jawaban --}}
            <div>

                <label
                    class="mb-2 block text-sm font-semibold uppercase tracking-wide text-slate-500">

                    Jawaban

                </label>

                <div
                    class="rounded-2xl border border-slate-200 bg-slate-50 p-6 leading-8 text-slate-700">

                    {!! nl2br(e($faq->answer)) !!}

                </div>

            </div>





            {{-- Informasi --}}
            <div
                class="grid gap-6 md:grid-cols-2">

                {{-- Kategori --}}
                <div>

                    <label
                        class="mb-2 block text-sm font-semibold uppercase tracking-wide text-slate-500">

                        Kategori

                    </label>

                    @if($faq->category)

                        <span
                            class="inline-flex rounded-full bg-indigo-100 px-4 py-2 text-sm font-semibold text-indigo-700">

                            {{ $faq->category }}

                        </span>

                    @else

                        <span
                            class="text-slate-400">

                            -

                        </span>

                    @endif

                </div>





                {{-- Status --}}
                <div>

                    <label
                        class="mb-2 block text-sm font-semibold uppercase tracking-wide text-slate-500">

                        Status

                    </label>

                    @if($faq->is_active)

                        <span
                            class="inline-flex items-center gap-2 rounded-full bg-emerald-100 px-4 py-2 text-sm font-semibold text-emerald-700">

                            <span
                                class="h-2 w-2 rounded-full bg-emerald-500">
                            </span>

                            Aktif

                        </span>

                    @else

                        <span
                            class="inline-flex items-center gap-2 rounded-full bg-red-100 px-4 py-2 text-sm font-semibold text-red-700">

                            <span
                                class="h-2 w-2 rounded-full bg-red-500">
                            </span>

                            Tidak Aktif

                        </span>

                    @endif

                </div>





                {{-- Urutan --}}
                <div>

                    <label
                        class="mb-2 block text-sm font-semibold uppercase tracking-wide text-slate-500">

                        Urutan

                    </label>

                    <div
                        class="rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 font-semibold text-slate-700">

                        {{ $faq->sort_order }}

                    </div>

                </div>





                {{-- Dibuat --}}
                <div>

                    <label
                        class="mb-2 block text-sm font-semibold uppercase tracking-wide text-slate-500">

                        Dibuat Pada

                    </label>

                    <div
                        class="rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 text-slate-700">

                        {{ $faq->created_at?->format('d F Y, H:i') }}

                    </div>

                </div>





                {{-- Terakhir Diubah --}}
                <div class="md:col-span-2">

                    <label
                        class="mb-2 block text-sm font-semibold uppercase tracking-wide text-slate-500">

                        Terakhir Diperbarui

                    </label>

                    <div
                        class="rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 text-slate-700">

                        {{ $faq->updated_at?->format('d F Y, H:i') }}

                    </div>

                </div>

            </div>
                        {{-- Action --}}
            <div
                class="flex flex-col-reverse gap-4 border-t border-slate-200 pt-8 sm:flex-row sm:justify-start">

                <a
                    href="{{ route('faqs.edit', $faq->id) }}"
                    class="rounded-xl bg-blue-600 px-6 py-3 text-sm font-bold text-white shadow transition hover:bg-blue-700 hover:-translate-y-0.5">

                    Edit FAQ

                </a>

                <a
                    href="{{ route('faqs.index') }}"
                    class="rounded-xl border border-slate-300 px-6 py-3 text-sm font-semibold text-slate-600 transition hover:bg-slate-100">

                    Kembali

                </a>

            </div>

        </div>

    </div>

</div>

@endsection