@extends('layouts.admin')

@section('title', 'Settings')


@section('content')

<div class="max-w-5xl">


    <div class="mb-6">

        <h1 class="text-2xl font-bold text-gray-800">
            Pengaturan Website
        </h1>

        <p class="text-gray-500 mt-1">
            Kelola informasi utama website LPK Bina Insani.
        </p>

    </div>



    <div class="bg-white rounded-xl shadow-sm p-6">


        <form method="POST"
            action="{{ route('settings.update', $setting->id) }}">

            @csrf

            @method('PUT')



            {{-- Identity --}}
            <h2 class="text-lg font-semibold mb-4">
                Identitas Website
            </h2>


            <div class="space-y-4">


                <div>

                    <label class="block text-sm font-medium">
                        Nama Website
                    </label>

                    <input
                        type="text"
                        name="site_name"
                        value="{{ old('site_name', $setting->site_name) }}"
                        class="mt-2 w-full rounded-lg border-gray-300"
                    >

                </div>



                <div>

                    <label class="block text-sm font-medium">
                        Deskripsi
                    </label>

                    <textarea
                        name="description"
                        rows="3"
                        class="mt-2 w-full rounded-lg border-gray-300"
                    >{{ old('description', $setting->description) }}</textarea>

                </div>


            </div>




            {{-- Hero --}}
            <h2 class="text-lg font-semibold mt-8 mb-4">
                Hero Section
            </h2>


            <div class="space-y-4">


                <div>

                    <label class="block text-sm font-medium">
                        Judul Hero
                    </label>

                    <input
                        type="text"
                        name="hero_title"
                        value="{{ old('hero_title', $setting->hero_title) }}"
                        class="mt-2 w-full rounded-lg border-gray-300"
                    >

                </div>



                <div>

                    <label class="block text-sm font-medium">
                        Subjudul Hero
                    </label>

                    <textarea
                        name="hero_subtitle"
                        rows="3"
                        class="mt-2 w-full rounded-lg border-gray-300"
                    >{{ old('hero_subtitle', $setting->hero_subtitle) }}</textarea>

                </div>


            </div>





            {{-- Contact --}}
            <h2 class="text-lg font-semibold mt-8 mb-4">
                Kontak
            </h2>


            <div class="grid md:grid-cols-2 gap-4">


                <input
                    type="text"
                    name="address"
                    placeholder="Alamat"
                    value="{{ old('address', $setting->address) }}"
                    class="rounded-lg border-gray-300"
                >


                <input
                    type="text"
                    name="phone"
                    placeholder="Telepon"
                    value="{{ old('phone', $setting->phone) }}"
                    class="rounded-lg border-gray-300"
                >


                <input
                    type="text"
                    name="whatsapp"
                    placeholder="WhatsApp"
                    value="{{ old('whatsapp', $setting->whatsapp) }}"
                    class="rounded-lg border-gray-300"
                >


                <input
                    type="email"
                    name="email"
                    placeholder="Email"
                    value="{{ old('email', $setting->email) }}"
                    class="rounded-lg border-gray-300"
                >


            </div>





            {{-- Social --}}
            <h2 class="text-lg font-semibold mt-8 mb-4">
                Social Media
            </h2>


            <div class="space-y-4">


                <input
                    type="text"
                    name="facebook"
                    placeholder="Facebook"
                    value="{{ old('facebook', $setting->facebook) }}"
                    class="w-full rounded-lg border-gray-300"
                >


                <input
                    type="text"
                    name="instagram"
                    placeholder="Instagram"
                    value="{{ old('instagram', $setting->instagram) }}"
                    class="w-full rounded-lg border-gray-300"
                >


                <input
                    type="text"
                    name="youtube"
                    placeholder="Youtube"
                    value="{{ old('youtube', $setting->youtube) }}"
                    class="w-full rounded-lg border-gray-300"
                >


                <input
                    type="text"
                    name="tiktok"
                    placeholder="TikTok"
                    value="{{ old('tiktok', $setting->tiktok) }}"
                    class="w-full rounded-lg border-gray-300"
                >


            </div>





            <div class="mt-8">

                <button
                    type="submit"
                    class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700">

                    Simpan Pengaturan

                </button>

            </div>



        </form>


    </div>


</div>


@endsection