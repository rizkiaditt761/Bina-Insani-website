@extends('layouts.app')

@section('title', 'Program Kelas')

@section('content')

<div class="space-y-6 pb-8">

    {{-- Header --}}
    <div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-slate-900 via-blue-900 to-indigo-900 p-6 text-white shadow-xl">

        <div class="absolute -right-8 -top-8 h-32 w-32 rounded-full bg-white/10 blur-3xl"></div>

        <div class="relative flex flex-col gap-5 lg:flex-row lg:items-center lg:justify-between">

            <div>

                <span
                    class="inline-flex rounded-full bg-white/10 px-4 py-2 text-xs font-semibold uppercase tracking-[0.25em] text-blue-100">

                    Classes Management

                </span>

                <h1
                    class="mt-4 text-3xl font-black">

                    Program Kelas

                </h1>

                <p
                    class="mt-2 max-w-2xl text-sm text-blue-100">

                    Kelola seluruh program pelatihan yang ditampilkan pada website LPK Bina Insani.

                </p>

            </div>

            <div class="flex gap-3">

                <a
                    href="{{ route('classes.create') }}"
                    class="rounded-2xl bg-white px-6 py-3 text-sm font-bold text-blue-700 shadow transition hover:-translate-y-0.5 hover:bg-blue-50">

                    + Tambah Program

                </a>

            </div>

        </div>

    </div>



    {{-- Summary --}}
    <div class="grid gap-5 md:grid-cols-4">

        <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">

            <p class="text-sm font-medium text-slate-500">
                Total Program
            </p>

            <h2 class="mt-3 text-3xl font-black text-slate-800">
                {{ $classes->count() }}
            </h2>

        </div>

        <div class="rounded-3xl border border-emerald-200 bg-emerald-50 p-6 shadow-sm">

            <p class="text-sm font-medium text-emerald-700">
                Program Aktif
            </p>

            <h2 class="mt-3 text-3xl font-black text-emerald-700">
                {{ $classes->where('is_active',1)->count() }}
            </h2>

        </div>

        <div class="rounded-3xl border border-red-200 bg-red-50 p-6 shadow-sm">

            <p class="text-sm font-medium text-red-700">
                Tidak Aktif
            </p>

            <h2 class="mt-3 text-3xl font-black text-red-700">
                {{ $classes->where('is_active',0)->count() }}
            </h2>

        </div>

        <div class="rounded-3xl border border-blue-200 bg-blue-50 p-6 shadow-sm">

            <p class="text-sm font-medium text-blue-700">
                Total Pendaftar
            </p>

            <h2 class="mt-3 text-3xl font-black text-blue-700">

                {{ $classes->sum(fn($class) => $class->registrations->count()) }}

            </h2>

        </div>

    </div>



    {{-- Search --}}
<div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm">

    <form
        method="GET"
        class="flex flex-col gap-3 md:flex-row md:items-center">

        <div class="flex-1">

            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Cari program..."
                class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-2.5 text-sm placeholder:text-slate-400 focus:border-blue-500 focus:bg-white focus:ring-blue-500">

        </div>

        <button
            type="submit"
            class="rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 px-5 py-2.5 text-sm font-semibold text-white transition hover:shadow-md">

            Search

        </button>

        <a
            href="{{ route('classes.index') }}"
            class="rounded-xl border border-slate-300 px-5 py-2.5 text-center text-sm font-semibold text-slate-700 transition hover:bg-slate-100">

            Reset

        </a>

    </form>

</div>

        {{-- TABLE --}}
<div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

    {{-- Header --}}
    <div class="flex items-center justify-between border-b border-slate-200 px-5 py-4">

        <div>

            <h2 class="text-lg font-bold text-slate-800">

                Daftar Program

            </h2>

            <p class="mt-1 text-sm text-slate-500">

                Seluruh program pelatihan LPK Bina Insani.

            </p>

        </div>

    </div>


    <div class="overflow-x-auto">

        <table class="min-w-full">

            <thead class="bg-slate-50">

                <tr>

                    <th
                        class="px-5 py-3 text-left text-[11px] font-semibold uppercase tracking-wider text-slate-500">

                        Program

                    </th>

                    <th
                        class="px-5 py-3 text-center text-[11px] font-semibold uppercase tracking-wider text-slate-500">

                        Durasi

                    </th>

                    <th
                        class="px-5 py-3 text-center text-[11px] font-semibold uppercase tracking-wider text-slate-500">

                        Biaya

                    </th>

                    <th
                        class="px-5 py-3 text-center text-[11px] font-semibold uppercase tracking-wider text-slate-500">

                        Status

                    </th>

                    <th
                        class="px-5 py-3 text-center text-[11px] font-semibold uppercase tracking-wider text-slate-500">

                        Action

                    </th>

                </tr>

            </thead>

            <tbody class="divide-y divide-slate-100">

                @forelse($classes as $class)

                 <tr class="transition duration-200 hover:bg-slate-50">

    {{-- Program --}}
    <td class="px-5 py-3 align-top">

        <div class="text-sm font-semibold text-slate-800">

            {{ $class->name }}

        </div>

        <div class="mt-1 max-w-md line-clamp-2 text-xs leading-5 text-slate-500">

            {{ $class->description ?: 'Belum ada deskripsi program.' }}

        </div>

    </td>



    {{-- Duration --}}
    <td class="px-5 py-3 text-center align-middle">

        <span class="text-sm text-slate-700">

            {{ $class->duration ?: '-' }}

        </span>

    </td>



    {{-- Registration Fee --}}
    <td class="px-5 py-3 text-center align-middle">

        <span class="text-sm font-semibold text-blue-700">

            Rp {{ number_format($class->registration_fee,0,',','.') }}

        </span>

    </td>



    {{-- Status --}}
    <td class="px-5 py-3 text-center align-middle">

        @if($class->is_active)

            <span
                class="inline-flex rounded-full bg-emerald-100 px-3 py-1 text-[11px] font-semibold text-emerald-700">

                Aktif

            </span>

        @else

            <span
                class="inline-flex rounded-full bg-slate-200 px-3 py-1 text-[11px] font-semibold text-slate-600">

                Nonaktif

            </span>

        @endif

    </td>



    {{-- Action --}}
    <td class="px-5 py-3 text-center align-middle">

        <div class="flex justify-center gap-1.5">

            <a
                href="{{ route('classes.show', $class->id) }}"
                class="rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 px-3 py-2 text-xs font-semibold text-white shadow transition hover:-translate-y-0.5 hover:shadow-lg">

                Detail

            </a>

            <a
                href="{{ route('classes.edit', $class->id) }}"
                class="rounded-xl bg-gradient-to-r from-yellow-500 to-yellow-600 px-3 py-2 text-xs font-semibold text-white shadow transition hover:-translate-y-0.5 hover:shadow-lg">

                Edit

            </a>

            <form
                action="{{ route('classes.destroy', $class->id) }}"
                method="POST"
                onsubmit="return confirm('Yakin ingin menghapus program ini?')">

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
        colspan="5"
        class="px-5 py-12 text-center">

        <div class="mx-auto flex max-w-sm flex-col items-center">

            <div
                class="flex h-16 w-16 items-center justify-center rounded-full bg-slate-100 text-3xl">

                📚

            </div>

            <h3
                class="mt-5 text-lg font-bold text-slate-800">

                Belum Ada Program

            </h3>

            <p
                class="mt-2 text-sm leading-6 text-slate-500">

                Tambahkan program pelatihan pertama untuk ditampilkan pada landing page
                dan mulai menerima pendaftaran peserta.

            </p>

            <a
                href="{{ route('classes.create') }}"
                class="mt-6 inline-flex items-center rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 px-5 py-2.5 text-sm font-semibold text-white shadow transition hover:-translate-y-0.5">

                + Tambah Program

            </a>

        </div>

    </td>

</tr>

@endforelse

</tbody>

</table>

</div>

</div>

@endsection


