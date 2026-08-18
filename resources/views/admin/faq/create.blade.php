@extends('layouts.app')

@section('title', 'Tambah FAQ')

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

        <div class="relative">

            <span
                class="inline-flex rounded-full bg-white/10 px-4 py-2 text-xs font-semibold uppercase tracking-[0.25em] text-blue-100">

                FAQ Management

            </span>

            <h1 class="mt-4 text-3xl font-black tracking-tight">

                Tambah FAQ

            </h1>

            <p class="mt-2 max-w-2xl text-sm leading-6 text-blue-100">

                Tambahkan pertanyaan dan jawaban baru yang akan
                ditampilkan pada halaman utama website LPK Bina Insani.

            </p>

        </div>

    </div>



    {{-- ========================================================= --}}
    {{-- VALIDATION ERROR --}}
    {{-- ========================================================= --}}
    @if ($errors->any())

        <div
            class="flex items-start gap-3 rounded-2xl border border-red-200 bg-red-50 px-5 py-4">

            <div
                class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-red-100 text-red-600">

                <svg
                    class="h-5 w-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2">

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M12 9v3m0 4h.01M10.29 3.86l-7.82 13.5A2 2 0 004.2 20.36h15.6a2 2 0 001.73-3L13.71 3.86a2 2 0 00-3.42 0z" />

                </svg>

            </div>

            <div>

                <p class="text-sm font-bold text-red-800">

                    Terdapat kesalahan

                </p>

                <p class="mt-1 text-sm leading-6 text-red-700">

                    Periksa kembali data yang kamu masukkan.

                </p>

            </div>

        </div>

    @endif



    {{-- ========================================================= --}}
    {{-- FORM --}}
    {{-- ========================================================= --}}
    <div
        class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">

        {{-- Form Header --}}
        <div
            class="border-b border-slate-200 px-6 py-5">

            <h2 class="text-lg font-bold text-slate-800">

                Informasi FAQ

            </h2>

            <p class="mt-1 text-sm text-slate-500">

                Lengkapi informasi FAQ yang ingin ditampilkan.

            </p>

        </div>



        <form
            action="{{ route('faqs.store') }}"
            method="POST"
            class="space-y-6 p-6">

            @csrf


            {{-- ================================================= --}}
            {{-- QUESTION --}}
            {{-- ================================================= --}}
            <div>

                <label
                    for="question"
                    class="mb-2 block text-sm font-semibold text-slate-700">

                    Pertanyaan
                    <span class="text-red-500">*</span>

                </label>

                <input
                    id="question"
                    type="text"
                    name="question"
                    value="{{ old('question') }}"
                    placeholder="Contoh: Berapa lama masa pelatihan?"
                    class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-100">

                @error('question')

                    <p class="mt-2 text-xs font-medium text-red-500">

                        {{ $message }}

                    </p>

                @enderror

            </div>



            {{-- ================================================= --}}
            {{-- ANSWER --}}
            {{-- ================================================= --}}
            <div>

                <label
                    for="answer"
                    class="mb-2 block text-sm font-semibold text-slate-700">

                    Jawaban
                    <span class="text-red-500">*</span>

                </label>

                <textarea
                    id="answer"
                    name="answer"
                    rows="7"
                    placeholder="Masukkan jawaban FAQ..."
                    class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm leading-6 text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-100">{{ old('answer') }}</textarea>

                @error('answer')

                    <p class="mt-2 text-xs font-medium text-red-500">

                        {{ $message }}

                    </p>

                @enderror

            </div>



            {{-- ================================================= --}}
            {{-- CATEGORY + SORT ORDER --}}
            {{-- ================================================= --}}
            <div class="grid gap-5 md:grid-cols-2">

                {{-- Category --}}
                <div>

                    <label
                        for="category"
                        class="mb-2 block text-sm font-semibold text-slate-700">

                        Kategori

                    </label>

                    <input
                        id="category"
                        type="text"
                        name="category"
                        value="{{ old('category') }}"
                        placeholder="Contoh: Pendaftaran"
                        class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-100">

                    @error('category')

                        <p class="mt-2 text-xs font-medium text-red-500">

                            {{ $message }}

                        </p>

                    @enderror

                </div>


                {{-- Sort Order --}}
                <div>

                    <label
                        for="sort_order"
                        class="mb-2 block text-sm font-semibold text-slate-700">

                        Urutan

                    </label>

                    <input
                        id="sort_order"
                        type="number"
                        name="sort_order"
                        value="{{ old('sort_order', 1) }}"
                        min="1"
                        class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-700 outline-none transition focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-100">

                    <p class="mt-2 text-xs text-slate-400">

                        FAQ pada urutan tersebut akan digeser otomatis.

                    </p>

                    @error('sort_order')

                        <p class="mt-2 text-xs font-medium text-red-500">

                            {{ $message }}

                        </p>

                    @enderror

                </div>

            </div>



            {{-- ================================================= --}}
            {{-- STATUS --}}
            {{-- ================================================= --}}
            <div
                class="rounded-2xl border border-slate-200 bg-slate-50 p-4">

                <label class="inline-flex cursor-pointer items-center gap-3">

                    <input
                        type="checkbox"
                        name="is_active"
                        value="1"
                        @checked(old('is_active', true))
                        class="h-4 w-4 rounded border-slate-300 text-blue-600 focus:ring-blue-500">

                    <span>

                        <span
                            class="block text-sm font-semibold text-slate-700">

                            FAQ Aktif

                        </span>

                        <span
                            class="mt-0.5 block text-xs text-slate-500">

                            FAQ akan ditampilkan pada landing page.

                        </span>

                    </span>

                </label>

            </div>



            {{-- ================================================= --}}
            {{-- ACTION --}}
            {{-- ================================================= --}}
            <div
                class="flex flex-col-reverse gap-3 border-t border-slate-200 pt-6 sm:flex-row sm:justify-start">

                <a
                    href="{{ route('faqs.index') }}"
                    class="inline-flex items-center justify-center rounded-xl border border-slate-300 bg-white px-5 py-2.5 text-sm font-semibold text-slate-600 transition hover:bg-slate-50">

                    Kembali

                </a>

                <button
                    type="submit"
                    class="inline-flex items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">

                    <svg
                        class="h-4 w-4"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M12 4v16m8-8H4" />

                    </svg>

                    Simpan FAQ

                </button>

            </div>

        </form>

    </div>

</div>

@endsection