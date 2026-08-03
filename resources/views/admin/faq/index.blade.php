@extends('layouts.admin')

@section('title', 'FAQ')


@section('content')

<div>


    <div class="mb-6">

        <h1 class="text-2xl font-bold text-gray-800">
            FAQ
        </h1>

        <p class="text-gray-500">
            Kelola pertanyaan dan jawaban yang tampil pada halaman utama.
        </p>

    </div>




    {{-- Tambah FAQ --}}
    <div class="bg-white rounded-xl shadow-sm p-6 mb-6">


        <h2 class="text-lg font-semibold mb-4">
            Tambah FAQ
        </h2>



        <form method="POST"
            action="{{ route('faqs.store') }}">

            @csrf


            <div class="grid md:grid-cols-2 gap-4">


                <input
                    type="text"
                    name="category"
                    placeholder="Kategori FAQ"
                    class="rounded-lg border-gray-300"
                >



                <input
                    type="number"
                    name="sort_order"
                    placeholder="Urutan"
                    class="rounded-lg border-gray-300"
                >


            </div>



            <input
                type="text"
                name="question"
                placeholder="Pertanyaan"
                class="mt-4 w-full rounded-lg border-gray-300"
                required
            >



            <textarea
                name="answer"
                rows="4"
                placeholder="Jawaban"
                class="mt-4 w-full rounded-lg border-gray-300"
                required
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


                    <span class="ml-2">
                        Aktif
                    </span>


                </label>


            </div>




            <button
                class="mt-5 px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">


                Simpan


            </button>



        </form>


    </div>







    {{-- Data FAQ --}}

    <div class="bg-white rounded-xl shadow-sm overflow-hidden">


        <table class="w-full text-sm">


            <thead class="bg-gray-50">


                <tr>


                    <th class="px-6 py-3 text-left">
                        Pertanyaan
                    </th>


                    <th class="px-6 py-3 text-left">
                        Kategori
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


            @forelse($faqs as $faq)


                <tr class="border-t">


                    <td class="px-6 py-4">


                        <div class="font-medium text-gray-800">

                            {{ $faq->question }}

                        </div>


                        <div class="text-gray-500 text-xs mt-1">

                            {{ Str::limit($faq->answer, 80) }}

                        </div>


                    </td>




                    <td class="px-6 py-4">


                        {{ $faq->category ?? '-' }}


                    </td>




                    <td class="px-6 py-4">


                        @if($faq->is_active)


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
                            href="{{ route('faqs.edit', $faq->id) }}"
                            class="px-3 py-1 bg-yellow-500 text-white rounded">


                            Edit


                        </a>




                        <form method="POST"
                            action="{{ route('faqs.destroy', $faq->id) }}">


                            @csrf

                            @method('DELETE')



                            <button
                                class="px-3 py-1 bg-red-600 text-white rounded">


                                Hapus


                            </button>


                        </form>



                    </td>



                </tr>



            @empty



                <tr>


                    <td colspan="4"
                        class="px-6 py-6 text-center text-gray-500">


                        Belum ada FAQ


                    </td>


                </tr>



            @endforelse



            </tbody>



        </table>


    </div>



</div>


@endsection