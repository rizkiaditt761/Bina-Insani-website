@extends('layouts.admin')

@section('title', 'Data Kelas')


@section('content')

<div>

    <div class="mb-6">

        <h1 class="text-2xl font-bold text-gray-800">
            Data Kelas
        </h1>

        <p class="text-gray-500 mt-1">
            Kelola program pelatihan LPK Bina Insani.
        </p>

    </div>



    {{-- Form Tambah --}}
    <div class="bg-white rounded-xl shadow-sm p-6 mb-6">

        <h2 class="text-lg font-semibold mb-4">
            Tambah Kelas
        </h2>


        <form method="POST"
            action="{{ route('classes.store') }}">

            @csrf


            <div class="grid md:grid-cols-2 gap-4">


                <input
                    type="text"
                    name="name"
                    placeholder="Nama Kelas"
                    class="rounded-lg border-gray-300"
                    required
                >


                <input
                    type="number"
                    name="registration_fee"
                    placeholder="Biaya Pendaftaran"
                    class="rounded-lg border-gray-300"
                    required
                >


                <input
                    type="text"
                    name="duration"
                    placeholder="Durasi"
                    class="rounded-lg border-gray-300"
                >


                <input
                    type="text"
                    name="meeting_schedule"
                    placeholder="Jadwal Pertemuan"
                    class="rounded-lg border-gray-300"
                >


            </div>


            <textarea
                name="description"
                placeholder="Deskripsi"
                class="mt-4 w-full rounded-lg border-gray-300"
                rows="3"
            ></textarea>


            <div class="mt-4">

                <label class="inline-flex items-center">

                    <input
                        type="checkbox"
                        name="is_active"
                        value="1"
                        checked
                        class="rounded border-gray-300"
                    >

                    <span class="ml-2 text-sm">
                        Aktif
                    </span>

                </label>

            </div>


            <button
                class="mt-5 px-5 py-2 bg-blue-600 text-white rounded-lg">

                Simpan

            </button>


        </form>


    </div>





    {{-- Table --}}
    <div class="bg-white rounded-xl shadow-sm overflow-hidden">


        <table class="w-full text-sm">


            <thead class="bg-gray-50">

                <tr>

                    <th class="px-6 py-3 text-left">
                        Nama
                    </th>

                    <th class="px-6 py-3 text-left">
                        Biaya
                    </th>

                    <th class="px-6 py-3 text-left">
                        Durasi
                    </th>

                    <th class="px-6 py-3 text-left">
                        Status
                    </th>

                    <th class="px-6 py-3 text-left">
                        Aksi
                    </th>

                </tr>

            </thead>


            <tbody>


            @forelse($classes as $class)

                <tr class="border-t">


                    <td class="px-6 py-4">

                        {{ $class->name }}

                    </td>


                    <td class="px-6 py-4">

                        Rp {{ number_format($class->registration_fee) }}

                    </td>


                    <td class="px-6 py-4">

                        {{ $class->duration ?? '-' }}

                    </td>


                    <td class="px-6 py-4">

                        @if($class->is_active)

                            <span class="text-green-600">
                                Aktif
                            </span>

                        @else

                            <span class="text-red-600">
                                Tidak Aktif
                            </span>

                        @endif

                    </td>


                    <td class="px-6 py-4 flex gap-2">


                        <a
                            href="{{ route('classes.edit', $class->id) }}"
                            class="px-3 py-1 bg-yellow-500 text-white rounded">

                            Edit

                        </a>



                        <form
                            method="POST"
                            action="{{ route('classes.destroy', $class->id) }}"
                        >

                            @csrf
                            @method('DELETE')


                            <button
                                class="px-3 py-1 bg-red-600 text-white rounded"
                            >

                                Hapus

                            </button>


                        </form>


                    </td>


                </tr>


            @empty

                <tr>

                    <td colspan="5"
                        class="px-6 py-6 text-center text-gray-500">

                        Belum ada kelas

                    </td>

                </tr>

            @endforelse


            </tbody>


        </table>


    </div>


</div>


@endsection