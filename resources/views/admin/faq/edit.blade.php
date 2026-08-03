@extends('layouts.admin')

@section('title','Edit FAQ')


@section('content')

<div>


    <div class="mb-6">

        <h1 class="text-2xl font-bold text-gray-800">
            Edit FAQ
        </h1>

        <p class="text-gray-500">
            Perbarui data FAQ.
        </p>

    </div>




    <div class="bg-white rounded-xl shadow-sm p-6">


        <form method="POST"
            action="{{ route('faqs.update',$faq->id) }}">


            @csrf

            @method('PUT')



            <div class="grid md:grid-cols-2 gap-4">


                <input
                    type="text"
                    name="category"
                    value="{{ $faq->category }}"
                    placeholder="Kategori"
                    class="rounded-lg border-gray-300"
                >



                <input
                    type="number"
                    name="sort_order"
                    value="{{ $faq->sort_order }}"
                    placeholder="Urutan"
                    class="rounded-lg border-gray-300"
                >


            </div>





            <input
                type="text"
                name="question"
                value="{{ $faq->question }}"
                class="mt-4 w-full rounded-lg border-gray-300"
                required
            >





            <textarea
                name="answer"
                rows="5"
                class="mt-4 w-full rounded-lg border-gray-300"
                required
            >{{ $faq->answer }}</textarea>





            <div class="mt-4">


                <label class="inline-flex items-center">


                    <input
                        type="checkbox"
                        name="is_active"
                        value="1"

                        @checked($faq->is_active)

                        class="rounded border-gray-300"
                    >


                    <span class="ml-2">
                        Aktif
                    </span>


                </label>


            </div>




            <div class="mt-6 flex gap-3">


                <button
                    class="px-5 py-2 bg-blue-600 text-white rounded-lg">

                    Update

                </button>



                <a
                    href="{{ route('faqs.index') }}"
                    class="px-5 py-2 bg-gray-200 rounded-lg">

                    Kembali

                </a>


            </div>



        </form>


    </div>



</div>


@endsection