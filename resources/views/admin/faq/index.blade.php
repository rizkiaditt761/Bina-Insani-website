@extends('layouts.app')

@section('title', 'FAQ')

@section('content')

<div class="space-y-6 pb-8">

    {{-- ========================================================= --}}
    {{-- HEADER --}}
    {{-- ========================================================= --}}
    <div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-slate-900 via-blue-900 to-indigo-900 p-6 text-white shadow-xl">

        <div class="absolute -right-8 -top-8 h-32 w-32 rounded-full bg-white/10 blur-3xl"></div>

        <div class="absolute -bottom-12 left-1/3 h-40 w-40 rounded-full bg-blue-400/10 blur-3xl"></div>

        <div class="relative flex flex-col gap-5 lg:flex-row lg:items-center lg:justify-between">

            <div>

                <span
                    class="inline-flex rounded-full bg-white/10 px-4 py-2 text-xs font-semibold uppercase tracking-[0.25em] text-blue-100">

                    FAQ Management

                </span>

                <h1 class="mt-4 text-3xl font-black tracking-tight">

                    Frequently Asked Questions

                </h1>

                <p class="mt-2 max-w-2xl text-sm leading-6 text-blue-100">

                    Kelola seluruh pertanyaan dan jawaban yang ditampilkan
                    pada website LPK Bina Insani.

                </p>

            </div>


            <div>

                <a
                    href="{{ route('faqs.create') }}"
                    class="inline-flex items-center gap-2 rounded-2xl bg-white px-6 py-3 text-sm font-bold text-blue-700 shadow-lg transition hover:-translate-y-0.5 hover:bg-blue-50 hover:shadow-xl">

                    <svg
                        class="h-5 w-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M12 4v16m8-8H4" />

                    </svg>

                    Tambah FAQ

                </a>

            </div>

        </div>

    </div>



    {{-- ========================================================= --}}
    {{-- ALERT SUCCESS --}}
    {{-- ========================================================= --}}
    @if (session('success'))

        <div
            class="flex items-start gap-3 rounded-2xl border border-emerald-200 bg-emerald-50 px-5 py-4">

            <div
                class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-emerald-100 text-emerald-600">

                <svg
                    class="h-5 w-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2">

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M5 13l4 4L19 7" />

                </svg>

            </div>

            <div>

                <p class="text-sm font-bold text-emerald-800">
                    Berhasil
                </p>

                <p class="mt-1 text-sm text-emerald-700">
                    {{ session('success') }}
                </p>

            </div>

        </div>

    @endif



    {{-- ========================================================= --}}
    {{-- ALERT ERROR --}}
    {{-- ========================================================= --}}
    @if (session('error'))

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
                    Tidak dapat menghapus FAQ
                </p>

                <p class="mt-1 text-sm leading-6 text-red-700">
                    {{ session('error') }}
                </p>

            </div>

        </div>

    @endif



    {{-- ========================================================= --}}
    {{-- SUMMARY --}}
    {{-- ========================================================= --}}
    <div class="grid gap-5 sm:grid-cols-2 xl:grid-cols-3">

        {{-- Total --}}
        <div
            class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">

            <div class="flex items-start justify-between">

                <div>

                    <p class="text-sm font-medium text-slate-500">
                        Total FAQ
                    </p>

                    <h2 class="mt-3 text-3xl font-black text-slate-800">
                        {{ $total }}
                    </h2>

                </div>

                <div
                    class="flex h-11 w-11 items-center justify-center rounded-2xl bg-slate-100 text-slate-600">

                    <svg
                        class="h-5 w-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M8.228 9.247a3.75 3.75 0 117.544 0c0 2.07-1.543 2.877-2.613 3.47-.69.381-1.159.783-1.159 1.533M12 17.25h.008M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />

                    </svg>

                </div>

            </div>

        </div>


        {{-- Active --}}
        <div
            class="rounded-3xl border border-emerald-200 bg-emerald-50 p-6 shadow-sm">

            <div class="flex items-start justify-between">

                <div>

                    <p class="text-sm font-medium text-emerald-700">
                        FAQ Aktif
                    </p>

                    <h2 class="mt-3 text-3xl font-black text-emerald-700">
                        {{ $active }}
                    </h2>

                </div>

                <div
                    class="flex h-11 w-11 items-center justify-center rounded-2xl bg-white/80 text-emerald-600">

                    <svg
                        class="h-5 w-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M5 13l4 4L19 7" />

                    </svg>

                </div>

            </div>

        </div>


        {{-- Inactive --}}
        <div
            class="rounded-3xl border border-red-200 bg-red-50 p-6 shadow-sm">

            <div class="flex items-start justify-between">

                <div>

                    <p class="text-sm font-medium text-red-700">
                        Tidak Aktif
                    </p>

                    <h2 class="mt-3 text-3xl font-black text-red-700">
                        {{ $inactive }}
                    </h2>

                </div>

                <div
                    class="flex h-11 w-11 items-center justify-center rounded-2xl bg-white/80 text-red-600">

                    <svg
                        class="h-5 w-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />

                    </svg>

                </div>

            </div>

        </div>

    </div>



    {{-- ========================================================= --}}
    {{-- SEARCH & FILTER --}}
    {{-- ========================================================= --}}
    <div
        class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm">

        <div
            class="mb-4 flex flex-col gap-1 sm:flex-row sm:items-center sm:justify-between">

            <div>

                <h2 class="text-base font-bold text-slate-800">
                    Cari & Filter FAQ
                </h2>

                <p class="mt-1 text-xs text-slate-500">
                    Gunakan pencarian atau filter status untuk menemukan FAQ.
                </p>

            </div>


            @if(request()->hasAny(['search', 'status']))

                <span
                    class="inline-flex w-fit items-center rounded-full bg-blue-50 px-3 py-1 text-xs font-semibold text-blue-600">

                    Filter aktif

                </span>

            @endif

        </div>


        <form
            method="GET"
            action="{{ route('faqs.index') }}"
            class="grid gap-3 md:grid-cols-[minmax(0,1fr)_180px_auto_auto]">

            {{-- Search --}}
            <div class="relative">

                <div
                    class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400">

                    <svg
                        class="h-5 w-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="m21 21-4.35-4.35m2.35-5.65a8 8 0 11-16 0 8 8 0 0116 0z" />

                    </svg>

                </div>

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Cari pertanyaan atau jawaban..."
                    class="w-full rounded-xl border border-slate-300 bg-slate-50 py-3 pl-11 pr-4 text-sm text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-100">

            </div>


            {{-- Status --}}
            <select
                name="status"
                class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-700 outline-none transition focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-100">

                <option value="">
                    Semua Status
                </option>

                <option
                    value="1"
                    @selected(request('status') === '1')>

                    Aktif

                </option>

                <option
                    value="0"
                    @selected(request('status') === '0')>

                    Nonaktif

                </option>

            </select>


            {{-- Search --}}
            <button
                type="submit"
                class="inline-flex items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">

                <svg
                    class="h-4 w-4"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2">

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="m21 21-4.35-4.35m2.35-5.65a8 8 0 11-16 0 8 8 0 0116 0z" />

                </svg>

                Cari

            </button>


            {{-- Reset --}}
            @if(request()->hasAny(['search', 'status']))

                <a
                    href="{{ route('faqs.index') }}"
                    class="inline-flex items-center justify-center rounded-xl border border-slate-300 bg-white px-5 py-3 text-sm font-semibold text-slate-600 transition hover:border-slate-400 hover:bg-slate-50">

                    Reset

                </a>

            @else

                <div class="hidden md:block"></div>

            @endif

        </form>

    </div>



    {{-- ========================================================= --}}
    {{-- TABLE --}}
    {{-- ========================================================= --}}
    <div
        class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">

        {{-- Table Header --}}
        <div
            class="flex flex-col gap-3 border-b border-slate-200 px-6 py-5 sm:flex-row sm:items-center sm:justify-between">

            <div>

                <h2 class="text-lg font-bold text-slate-800">
                    Daftar FAQ
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Seluruh pertanyaan dan jawaban yang tersedia.
                </p>

            </div>


            @if(method_exists($faqs, 'total'))

                <div class="text-xs font-medium text-slate-400">

                    Menampilkan

                    <span class="font-semibold text-slate-600">
                        {{ $faqs->firstItem() ?? 0 }}
                    </span>

                    -

                    <span class="font-semibold text-slate-600">
                        {{ $faqs->lastItem() ?? 0 }}
                    </span>

                    dari

                    <span class="font-semibold text-slate-600">
                        {{ $faqs->total() }}
                    </span>

                    FAQ

                </div>

            @else

                <div class="text-xs font-medium text-slate-400">

                    Menampilkan

                    <span class="font-semibold text-slate-600">
                        {{ $faqs->count() }}
                    </span>

                    FAQ

                </div>

            @endif

        </div>



        {{-- Table --}}
        <div class="overflow-x-auto">

            <table class="min-w-full">

                <thead class="bg-slate-50">

                    <tr>

                        <th
                            class="px-6 py-3 text-left text-[11px] font-semibold uppercase tracking-wider text-slate-500">

                            Pertanyaan

                        </th>


                        <th
                            class="px-5 py-3 text-center text-[11px] font-semibold uppercase tracking-wider text-slate-500">

                            Urutan

                        </th>


                        <th
                            class="px-5 py-3 text-center text-[11px] font-semibold uppercase tracking-wider text-slate-500">

                            Status

                        </th>


                        <th
                            class="px-6 py-3 text-center text-[11px] font-semibold uppercase tracking-wider text-slate-500">

                            Aksi

                        </th>

                    </tr>

                </thead>


                <tbody class="divide-y divide-slate-100">

                    @forelse($faqs as $faq)

                        <tr
                            class="transition duration-200 hover:bg-slate-50">

                            {{-- Question --}}
                            <td class="px-6 py-4 align-top">

                                <div class="flex items-start gap-3">

                                    <div
                                        class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-blue-100 text-blue-600">

                                        <svg
                                            class="h-4.5 w-4.5"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            stroke-width="2">

                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M8.228 9.247a3.75 3.75 0 117.544 0c0 2.07-1.543 2.877-2.613 3.47-.69.381-1.159.783-1.159 1.533M12 17.25h.008M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />

                                        </svg>

                                    </div>


                                    <div class="min-w-0">

                                        <div class="text-sm font-semibold text-slate-800">

                                            {{ $faq->question }}

                                        </div>

                                        <div
                                            class="mt-1 max-w-2xl line-clamp-2 text-xs leading-5 text-slate-500">

                                            {{ \Illuminate\Support\Str::limit($faq->answer, 120) }}

                                        </div>

                                    </div>

                                </div>

                            </td>


                            {{-- Sort Order --}}
                            <td class="px-5 py-4 text-center align-middle">

                                <span
                                    class="inline-flex min-w-9 items-center justify-center rounded-lg bg-slate-100 px-2.5 py-1 text-xs font-bold text-slate-700">

                                    {{ $faq->sort_order ?? 0 }}

                                </span>

                            </td>


                            {{-- Status --}}
                            <td class="px-5 py-4 text-center align-middle">

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

                            </td>


                            {{-- Actions --}}
                            <td class="px-6 py-4 text-center align-middle">

                                <div class="flex justify-center gap-1.5">

                                    <a
                                        href="{{ route('faqs.show', $faq->id) }}"
                                        class="rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 px-3 py-2 text-xs font-semibold text-white shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">

                                        Detail

                                    </a>


                                    <a
                                        href="{{ route('faqs.edit', $faq->id) }}"
                                        class="rounded-xl bg-gradient-to-r from-yellow-500 to-yellow-600 px-3 py-2 text-xs font-semibold text-white shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">

                                        Edit

                                    </a>


                                    <form
                                        action="{{ route('faqs.destroy', $faq->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus FAQ ini?')">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="rounded-xl bg-gradient-to-r from-red-500 to-red-600 px-3 py-2 text-xs font-semibold text-white shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">

                                            Hapus

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="4"
                                class="px-6 py-14 text-center">

                                <div class="mx-auto flex max-w-sm flex-col items-center">

                                    <div
                                        class="flex h-16 w-16 items-center justify-center rounded-2xl bg-slate-100 text-slate-400">

                                        <svg
                                            class="h-8 w-8"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            stroke-width="1.5">

                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M8.228 9.247a3.75 3.75 0 117.544 0c0 2.07-1.543 2.877-2.613 3.47-.69.381-1.159.783-1.159 1.533M12 17.25h.008M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />

                                        </svg>

                                    </div>


                                    <h3 class="mt-5 text-lg font-bold text-slate-800">

                                        Tidak Ada FAQ

                                    </h3>


                                    <p class="mt-2 text-sm leading-6 text-slate-500">

                                        Tidak ada FAQ yang sesuai dengan
                                        pencarian atau filter yang digunakan.

                                    </p>


                                    @if(request()->hasAny(['search', 'status']))

                                        <a
                                            href="{{ route('faqs.index') }}"
                                            class="mt-5 inline-flex items-center rounded-xl border border-slate-300 bg-white px-5 py-2.5 text-sm font-semibold text-slate-700 shadow-sm transition hover:bg-slate-50">

                                            Reset Filter

                                        </a>

                                    @else

                                        <a
                                            href="{{ route('faqs.create') }}"
                                            class="mt-5 inline-flex items-center rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">

                                            + Tambah FAQ

                                        </a>

                                    @endif

                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- Pagination --}}
        @if(method_exists($faqs, 'hasPages') && $faqs->hasPages())

            <div
                class="border-t border-slate-100 px-6 py-4">

                {{ $faqs->links() }}

            </div>

        @endif

    </div>

</div>

@endsection