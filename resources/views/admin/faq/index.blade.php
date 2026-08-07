@extends('layouts.app')

@section('title', 'FAQ')

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

                    Frequently Asked Questions

                </h1>

                <p
                    class="mt-2 max-w-2xl text-sm text-blue-100">

                    Kelola pertanyaan dan jawaban yang ditampilkan pada halaman utama website LPK Bina Insani.

                </p>

            </div>

            <div>

                <a
                    href="{{ route('faqs.create') }}"
                    class="inline-flex items-center gap-2 rounded-2xl bg-white px-6 py-3 text-sm font-bold text-blue-700 shadow transition hover:-translate-y-0.5 hover:bg-blue-50">

                    + Tambah FAQ

                </a>

            </div>

        </div>

    </div>





    {{-- Statistik --}}
    <div
        class="grid gap-6 md:grid-cols-3">

        <div
            class="rounded-2xl border border-blue-100 bg-gradient-to-br from-blue-50 to-white p-6 shadow-sm">

            <p
                class="text-sm font-medium text-blue-600">

                Total FAQ

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

                FAQ Aktif

            </p>

            <h2
                class="mt-3 text-3xl font-black text-slate-900">

                {{ $active }}

            </h2>

        </div>





        <div
            class="rounded-2xl border border-rose-100 bg-gradient-to-br from-rose-50 to-white p-6 shadow-sm">

            <p
                class="text-sm font-medium text-rose-600">

                FAQ Tidak Aktif

            </p>

            <h2
                class="mt-3 text-3xl font-black text-slate-900">

                {{ $inactive }}

            </h2>

        </div>

    </div>





    {{-- Table --}}
    <div
        class="mb-8 overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">

        <div
            class="flex items-center justify-between border-b border-slate-200 px-6 py-5">

            <div>

                <h2
                    class="text-lg font-bold text-slate-900">

                    Daftar FAQ

                </h2>

                <p
                    class="text-sm text-slate-500">

                    Semua pertanyaan yang tampil di landing page.

                </p>

            </div>

        </div>





        <div class="overflow-x-auto">

            <table
                class="min-w-full text-sm">

                <thead
                    class="bg-slate-50">

                    <tr>

                        <th class="px-5 py-4 text-left font-semibold text-slate-600">
                            Pertanyaan
                        </th>

                        <th class="px-5 py-4 text-left font-semibold text-slate-600">
                            Kategori
                        </th>

                        <th class="px-5 py-4 text-center font-semibold text-slate-600">
                            Status
                        </th>

                        <th class="px-5 py-4 text-center font-semibold text-slate-600">
                            Aksi
                        </th>

                    </tr>

                </thead>

                <tbody class="divide-y divide-slate-200">

                    @forelse($faqs as $faq)

                <tr
    class="transition hover:bg-slate-50">

    {{-- Pertanyaan --}}
    <td class="px-6 py-5 align-middle">

        <div class="flex items-start gap-4 align-middle">

            <div
                class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-blue-100 text-xl">

                ❓

            </div>

            <div>

                <h3
                    class="font-bold text-slate-800">

                    {{ $faq->question }}

                </h3>

                <p
                    class="mt-2 text-sm leading-6 text-slate-500">

                    {{ \Illuminate\Support\Str::limit($faq->answer, 100) }}

                </p>

            </div>

        </div>

    </td>





    {{-- Kategori --}}
    <td class="px-6 py-5 align-middle">

        @if($faq->category)

            <span
                class="inline-flex rounded-full bg-indigo-100 px-3 py-1 text-xs font-semibold text-indigo-700">

                {{ $faq->category }}

            </span>

        @else

            <span
                class="text-slate-400">

                -

            </span>

        @endif

    </td>





    {{-- Status --}}
    <td class="px-6 py-5 align-middle">

        @if($faq->is_active)

            <span
                class="inline-flex items-center gap-2 rounded-full bg-emerald-100 px-3 py-1 text-xs font-bold text-emerald-700">

                <span class="h-2 w-2 rounded-full bg-emerald-500"></span>

                Aktif

            </span>

        @else

            <span
                class="inline-flex items-center gap-2 rounded-full bg-red-100 px-3 py-1 text-xs font-bold text-red-700">

                <span class="h-2 w-2 rounded-full bg-red-500"></span>

                Tidak Aktif

            </span>

        @endif

    </td>





    {{-- Aksi --}}
    <td class="px-6 py-5">

        <div
            class="flex flex-items-center gap-3">

            <a
                href="{{ route('faqs.show', $faq->id) }}"
                class="rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 px-3 py-2 text-xs font-semibold text-white shadow transition hover:-translate-y-0.5 hover:shadow-lg">

                Detail

            </a>

            <a
                href="{{ route('faqs.edit', $faq->id) }}"
                class="rounded-xl bg-gradient-to-r from-yellow-500 to-yellow-600 px-3 py-2 text-xs font-semibold text-white shadow transition hover:-translate-y-0.5 hover:shadow-lg">

                Edit

            </a>

            <form
                action="{{ route('faqs.destroy', $faq->id) }}"
                method="POST"
                class="inline"
                onsubmit="return confirm('Yakin ingin menghapus FAQ ini?')">

                @csrf
                @method('DELETE')

                <button
                    type="submit"
                    class="rounded-xl bg-gradient-to-r from-red-500 to-red-600 px-3 py-2 text-xs font-semibold text-white shadow transition hover:-translate-y-0.5 hover:shadow-lg">

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
        class="px-6 py-20 text-center">

        <div
            class="mx-auto flex h-24 w-24 items-center justify-center rounded-full bg-slate-100 text-5xl">

            ❓

        </div>

        <h3
            class="mt-6 text-2xl font-black text-slate-800">

            Belum Ada FAQ

        </h3>

        <p
            class="mx-auto mt-3 max-w-md text-slate-500">

            Pertanyaan yang ditambahkan akan muncul di sini dan
            ditampilkan pada halaman utama website.

        </p>

    </td>

</tr>

@endforelse

            </tbody>

        </table>

    </div>

</div>

@if(method_exists($faqs, 'links'))

    <div class="mt-6">

        {{ $faqs->links() }}

    </div>

@endif

@endsection