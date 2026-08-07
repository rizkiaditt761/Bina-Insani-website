<div class="space-y-6">


    {{-- Judul & Kategori --}}
    <div class="grid md:grid-cols-2 gap-5">


        <div>

            <label class="block mb-2 text-sm font-semibold text-slate-700">
                Judul Gallery
            </label>


            <input
                type="text"
                name="title"
                value="{{ old('title', $gallery->title ?? '') }}"
                placeholder="Contoh: Kegiatan Pelatihan Jepang"
                class="w-full rounded-xl border-slate-300 text-sm focus:border-blue-500 focus:ring-blue-500"
                required
            >


            @error('title')

                <p class="mt-1 text-sm text-red-500">
                    {{ $message }}
                </p>

            @enderror


        </div>





        <div>

            <label class="block mb-2 text-sm-semibold text-slate-700">
                Kategori
            </label>


            <input
                type="text"
                name="category"
                value="{{ old('category', $gallery->category ?? '') }}"
                placeholder="Contoh: Pelatihan, Kegiatan, Wisuda"
                class="w-full rounded-xl border-slate-300 text-sm focus:border-blue-500 focus:ring-blue-500"
            >


            @error('category')

                <p class="mt-1 text-sm text-red-500">
                    {{ $message }}
                </p>

            @enderror


        </div>


    </div>





    {{-- Deskripsi --}}
    <div>

        <label class="block mb-2 text-sm font-semibold text-slate-700">
            Deskripsi
        </label>


        <textarea
            name="description"
            rows="4"
            placeholder="Deskripsi kegiatan..."
            class="w-full rounded-xl border-slate-300 text-sm focus:border-blue-500 focus:ring-blue-500"
        >{{ old('description', $gallery->description ?? '') }}</textarea>


        @error('description')

            <p class="mt-1 text-sm text-red-500">
                {{ $message }}
            </p>

        @enderror


    </div>





    {{-- Urutan --}}
    <div class="md:w-1/2">


        <label class="block mb-2 text-sm font-semibold text-slate-700">
            Urutan Tampil
        </label>


        <input
            type="number"
            name="sort_order"
            value="{{ old('sort_order', $gallery->sort_order ?? 0) }}"
            class="w-full rounded-xl border-slate-300 text-sm focus:border-blue-500 focus:ring-blue-500"
        >


        @error('sort_order')

            <p class="mt-1 text-sm text-red-500">
                {{ $message }}
            </p>

        @enderror


    </div>

        {{-- Upload Foto --}}
    <div>


        <label class="block mb-2 text-sm font-semibold text-slate-700">
            Foto Gallery
        </label>



        <label
            for="image"
            class="relative group flex h-72 w-full cursor-pointer items-center justify-center overflow-hidden rounded-2xl border-2 border-dashed border-slate-300 bg-slate-50 transition hover:border-blue-500 hover:bg-blue-50"
        >


            {{-- Preview Image --}}
            <img
                id="imagePreview"
                src="{{ isset($gallery) && $gallery->image ? Storage::url($gallery->image) : '' }}"
                class="absolute inset-0 h-full w-full object-cover
                {{ isset($gallery) && $gallery->image ? '' : 'hidden' }}"
            >



            {{-- Overlay ketika ada gambar --}}
            <div
                id="changeImageText"
                class="absolute inset-0 hidden items-center justify-center bg-black/40 text-white transition group-hover:flex"
            >

                <div class="text-center">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="mx-auto mb-2 h-8 w-8"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"
                        />

                    </svg>


                    <span class="font-semibold">
                        Ubah Foto
                    </span>


                </div>


            </div>





            {{-- Empty Upload State --}}
            <div
                id="uploadText"
                class="text-center text-slate-500
                {{ isset($gallery) && $gallery->image ? 'hidden' : '' }}"
            >

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="mx-auto mb-3 h-10 w-10 text-slate-400"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6H16a4 4 0 010 8h-1m-4-4v8m0-8l-3 3m3-3l3 3"
                    />

                </svg>


                <p class="font-semibold">
                    Upload Foto
                </p>


                <p class="mt-1 text-xs">
                    Klik untuk memilih gambar
                </p>


            </div>




            <input
                id="image"
                type="file"
                name="image"
                accept="image/*"
                class="hidden"
            >


        </label>



        @error('image')

            <p class="mt-1 text-sm text-red-500">
                {{ $message }}
            </p>

        @enderror


    </div>
        {{-- Status --}}
    <div>


        <label class="inline-flex items-center cursor-pointer">


            <input
                type="checkbox"
                name="is_active"
                value="1"
                class="rounded border-slate-300 text-blue-600 focus:ring-blue-500"
                {{ old('is_active', $gallery->is_active ?? true) ? 'checked' : '' }}
            >


            <span class="ml-3 text-sm font-semibold text-slate-700">
                Tampilkan di website
            </span>


        </label>


    </div>





    {{-- Button --}}
    <div class="flex items-center gap-3 pt-4">


        <button
            type="submit"
            class="rounded-xl bg-blue-600 px-6 py-3 text-sm font-bold text-white shadow transition hover:bg-blue-700 hover:-translate-y-0.5"
        >

            {{ isset($gallery) ? 'Update Gallery' : 'Simpan Gallery' }}

        </button>



        <a
            href="{{ route('galleries.index') }}"
            class="rounded-xl border border-slate-300 px-6 py-3 text-sm font-semibold text-slate-600 transition hover:bg-slate-100"
        >

            Batal

        </a>


    </div>


</div>





@push('scripts')

<script>

    const imageInput = document.getElementById('image');

    const imagePreview = document.getElementById('imagePreview');

    const uploadText = document.getElementById('uploadText');

    const changeImageText = document.getElementById('changeImageText');



    imageInput.addEventListener('change', function(event){


        const file = event.target.files[0];


        if(file){


            const reader = new FileReader();



            reader.onload = function(e){


                imagePreview.src = e.target.result;


                imagePreview.classList.remove('hidden');


                uploadText.classList.add('hidden');


                changeImageText.classList.remove('hidden');

                changeImageText.classList.add('flex');


            }



            reader.readAsDataURL(file);


        }


    });



    @if(isset($gallery) && $gallery->image)

        changeImageText.classList.remove('hidden');

    @endif


</script>

@endpush