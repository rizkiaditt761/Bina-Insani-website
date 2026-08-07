@extends('layouts.app')

@section('title', 'Tambah FAQ')

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

                    Tambah FAQ

                </h1>

                <p
                    class="mt-2 max-w-2xl text-sm text-blue-100">

                    Tambahkan pertanyaan dan jawaban baru yang akan ditampilkan pada halaman utama website LPK Bina Insani.

                </p>

            </div>

        </div>

    </div>





    {{-- Form --}}
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

                Lengkapi seluruh informasi berikut.

            </p>

        </div>





        <form
            action="{{ route('faqs.store') }}"
            method="POST"
            class="space-y-8 p-8">

            @csrf

            {{-- Pertanyaan --}}
            <div>

                <label
                    class="mb-2 block text-sm font-semibold text-slate-700">

                    Pertanyaan <span class="text-red-500">*</span>

                </label>

                <input
                    type="text"
                    name="question"
                    value="{{ old('question') }}"
                    placeholder="Contoh: Berapa lama masa pelatihan?"
                    class="w-full rounded-2xl border-slate-300 focus:border-blue-500 focus:ring-blue-500">

                @error('question')

                    <p class="mt-2 text-sm text-red-500">

                        {{ $message }}

                    </p>

                @enderror

            </div>

                        {{-- Jawaban --}}
            <div>

                <label
                    class="mb-2 block text-sm font-semibold text-slate-700">

                    Jawaban <span class="text-red-500">*</span>

                </label>

                <textarea
                    name="answer"
                    rows="8"
                    placeholder="Masukkan jawaban FAQ..."
                    class="w-full rounded-2xl border-slate-300 focus:border-blue-500 focus:ring-blue-500">{{ old('answer') }}</textarea>

                @error('answer')

                    <p class="mt-2 text-sm text-red-500">

                        {{ $message }}

                    </p>

                @enderror

            </div>





            {{-- Kategori & Urutan --}}
            <div
                class="grid gap-6 md:grid-cols-2">

                <div>

                    <label
                        class="mb-2 block text-sm font-semibold text-slate-700">

                        Kategori

                    </label>

                    <input
                        type="text"
                        name="category"
                        value="{{ old('category') }}"
                        placeholder="Contoh: Pendaftaran"
                        class="w-full rounded-2xl border-slate-300 focus:border-blue-500 focus:ring-blue-500">

                    @error('category')

                        <p class="mt-2 text-sm text-red-500">

                            {{ $message }}

                        </p>

                    @enderror

                </div>





                <div>

                    <label
                        class="mb-2 block text-sm font-semibold text-slate-700">

                        Urutan

                    </label>

                    <input
                        type="number"
                        name="sort_order"
                        value="{{ old('sort_order', 0) }}"
                        min="0"
                        class="w-full rounded-2xl border-slate-300 focus:border-blue-500 focus:ring-blue-500">

                    @error('sort_order')

                        <p class="mt-2 text-sm text-red-500">

                            {{ $message }}

                        </p>

                    @enderror

                </div>

            </div>





            {{-- Status --}}
            <div>

                <label
                    class="mb-3 block text-sm font-semibold text-slate-700">

                    Status

                </label>

                <label
                    class="inline-flex cursor-pointer items-center gap-3">

                    <input
                        type="checkbox"
                        name="is_active"
                        value="1"
                        {{ old('is_active', true) ? 'checked' : '' }}
                        class="h-5 w-5 rounded border-slate-300 text-blue-600 focus:ring-blue-500">

                    <span
                        class="text-sm text-slate-700">

                        FAQ aktif dan ditampilkan pada landing page

                    </span>

                </label>

            </div>
                        {{-- Action --}}
            <div
                class="flex flex-col-reverse gap-4 border-t border-slate-200 pt-8 sm:flex-row sm:justify-start">

                <button
                    type="submit"
                    class="rounded-xl bg-blue-600 px-6 py-3 text-sm font-bold text-white shadow transition hover:bg-blue-700 hover:-translate-y-0.5">

                    Simpan FAQ

                </button>

                <a
                    href="{{ route('faqs.index') }}"
                    class="rounded-xl border border-slate-300 px-6 py-3 text-sm font-semibold text-slate-600 transition hover:bg-slate-100">

                    Kembali

                </a>

            </div>

        </form>

    </div>

</div>

@endsection