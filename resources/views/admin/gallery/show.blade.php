@extends('layouts.app')


@section('title', 'Detail Gallery')



@section('content')


<div class="space-y-6">



    {{-- Header --}}
    <div
        class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-slate-900 via-blue-900 to-indigo-900 p-6 text-white shadow-xl">


        <div
            class="absolute -right-10 -top-10 h-40 w-40 rounded-full bg-white/10 blur-3xl">
        </div>



        <div
            class="relative flex flex-col gap-5 lg:flex-row lg:items-center lg:justify-between">


            <div>


                <span
                    class="inline-flex rounded-full bg-white/10 px-4 py-2 text-xs font-semibold uppercase tracking-[0.25em] text-blue-100">

                    Gallery Management

                </span>



                <h1
                    class="mt-4 text-3xl font-black">

                    Detail Gallery

                </h1>



                <p
                    class="mt-2 max-w-2xl text-sm text-blue-100">

                    Informasi lengkap dokumentasi kegiatan LPK Bina Insani.

                </p>


            </div>




            <div
                class="flex gap-3">


                <a
                    href="{{ route('galleries.edit', $gallery->id) }}"
                    class="rounded-2xl bg-white px-6 py-3 text-sm font-bold text-blue-700 shadow transition hover:-translate-y-0.5 hover:bg-blue-50">


                    Edit Gallery


                </a>



                <a
                    href="{{ route('galleries.index') }}"
                    class="rounded-2xl border border-white/30 px-6 py-3 text-sm font-bold text-white transition hover:bg-white/10">


                    Kembali


                </a>


            </div>


        </div>


    </div>





    {{-- Main Content --}}
    <div
        class="grid gap-6 lg:grid-cols-3">



        {{-- Image --}}
        <div
            class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm lg:col-span-1">


            <h2
                class="mb-5 text-lg font-bold text-slate-900">

                Preview Foto

            </h2>



            <div
                class="overflow-hidden rounded-2xl border border-slate-200 bg-slate-100">


                @if($gallery->image)

                    <img
                        src="{{ Storage::url($gallery->image) }}"
                        alt="{{ $gallery->title }}"
                        class="h-[350px] w-full object-cover">


                @else

                    <div
                        class="flex h-[350px] items-center justify-center text-slate-400">


                        Tidak ada foto


                    </div>


                @endif


            </div>


        </div>
                {{-- Information --}}
        <div
            class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm lg:col-span-2">


            <h2
                class="mb-6 text-lg font-bold text-slate-900">

                Informasi Gallery

            </h2>




            <div
                class="grid gap-5 md:grid-cols-2">



                {{-- Judul --}}
                <div>

                    <p
                        class="text-sm font-medium text-slate-500">

                        Judul Gallery

                    </p>


                    <p
                        class="mt-1 text-lg font-bold text-slate-900">

                        {{ $gallery->title }}

                    </p>

                </div>




                {{-- Kategori --}}
                <div>

                    <p
                        class="text-sm font-medium text-slate-500">

                        Kategori

                    </p>


                    <p
                        class="mt-1 text-lg font-bold text-slate-900">

                        {{ $gallery->category ?: '-' }}

                    </p>

                </div>





                {{-- Status --}}
                <div>

                    <p
                        class="text-sm font-medium text-slate-500">

                        Status

                    </p>



                    @if($gallery->is_active)

                        <span
                            class="mt-2 inline-flex rounded-full bg-emerald-100 px-4 py-2 text-sm font-semibold text-emerald-700">

                            Aktif

                        </span>


                    @else

                        <span
                            class="mt-2 inline-flex rounded-full bg-red-100 px-4 py-2 text-sm font-semibold text-red-700">

                            Tidak Aktif

                        </span>


                    @endif


                </div>





                {{-- Urutan --}}
                <div>

                    <p
                        class="text-sm font-medium text-slate-500">

                        Urutan Tampilan

                    </p>


                    <p
                        class="mt-1 text-lg font-bold text-slate-900">

                        {{ $gallery->sort_order ?? '-' }}

                    </p>


                </div>



            </div>





            {{-- Description --}}
            <div
                class="mt-8">


                <p
                    class="text-sm font-medium text-slate-500">

                    Deskripsi

                </p>



                <div
                    class="mt-3 rounded-2xl bg-slate-50 p-5 text-slate-700 leading-8">


                    {{ $gallery->description ?: 'Tidak ada deskripsi.' }}


                </div>


            </div>
                        {{-- Footer Info --}}
            <div
                class="mt-8 flex flex-col gap-4 border-t border-slate-200 pt-6 sm:flex-row sm:items-center sm:justify-between">


                <div>

                    <p
                        class="text-sm text-slate-500">

                        Dibuat pada

                    </p>


                    <p
                        class="font-semibold text-slate-900">

                        {{ $gallery->created_at?->format('d F Y, H:i') }}

                    </p>


                </div>





                <form
                    method="POST"
                    action="{{ route('galleries.destroy', $gallery->id) }}"
                    onsubmit="return confirm('Yakin ingin menghapus gallery ini?')">


                    @csrf
                    @method('DELETE')



                    <button
                        type="submit"
                        class="rounded-2xl bg-red-600 px-6 py-3 text-sm font-bold text-white shadow transition hover:bg-red-700">


                        Hapus Gallery


                    </button>


                </form>


            </div>



        </div>


    </div>


</div>


@endsection