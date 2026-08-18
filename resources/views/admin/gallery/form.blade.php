<div class="space-y-6">

    {{-- ========================================================= --}}
    {{-- BASIC INFORMATION --}}
    {{-- ========================================================= --}}
    <div class="grid gap-5 md:grid-cols-2">

        {{-- Title --}}
        <div>

            <label
                for="title"
                class="mb-2 block text-sm font-semibold text-slate-700">

                Judul Galeri

            </label>

            <input
                id="title"
                type="text"
                name="title"
                value="{{ old('title', $gallery->title ?? '') }}"
                placeholder="Contoh: Kegiatan Pelatihan Jepang"
                class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-100"
                required>

            @error('title')

                <p class="mt-1.5 text-sm text-red-500">
                    {{ $message }}
                </p>

            @enderror

        </div>


        {{-- Category --}}
        <div>

            <label
                for="category"
                class="mb-2 block text-sm font-semibold text-slate-700">

                Kategori

            </label>

            <input
                id="category"
                type="text"
                name="category"
                value="{{ old('category', $gallery->category ?? '') }}"
                placeholder="Contoh: Pelatihan, Kegiatan, Wisuda"
                class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-100">

            @error('category')

                <p class="mt-1.5 text-sm text-red-500">
                    {{ $message }}
                </p>

            @enderror

        </div>

    </div>



    {{-- ========================================================= --}}
    {{-- DESCRIPTION --}}
    {{-- ========================================================= --}}
    <div>

        <label
            for="description"
            class="mb-2 block text-sm font-semibold text-slate-700">

            Deskripsi

        </label>

        <textarea
            id="description"
            name="description"
            rows="5"
            placeholder="Tuliskan deskripsi singkat mengenai kegiatan..."
            class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-100">{{ old('description', $gallery->description ?? '') }}</textarea>

        @error('description')

            <p class="mt-1.5 text-sm text-red-500">
                {{ $message }}
            </p>

        @enderror

    </div>



    {{-- ========================================================= --}}
    {{-- ORDER --}}
    {{-- ========================================================= --}}
    <div class="md:w-1/2">

        <label
            for="sort_order"
            class="mb-2 block text-sm font-semibold text-slate-700">

            Urutan Tampil

        </label>

        <input
            id="sort_order"
            type="number"
            name="sort_order"
            min="0"
            value="{{ old('sort_order', $gallery->sort_order ?? 0) }}"
            class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-700 outline-none transition focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-100">

        <p class="mt-1.5 text-xs text-slate-400">
            Angka lebih kecil akan ditampilkan lebih dahulu.
        </p>

        @error('sort_order')

            <p class="mt-1.5 text-sm text-red-500">
                {{ $message }}
            </p>

        @enderror

    </div>



    {{-- ========================================================= --}}
    {{-- IMAGE UPLOAD --}}
    {{-- ========================================================= --}}
    <div>

        <label
            for="image"
            class="mb-2 block text-sm font-semibold text-slate-700">

            Foto Galeri

        </label>

        <label
            for="image"
            class="group relative flex h-72 w-full cursor-pointer items-center justify-center overflow-hidden rounded-2xl border-2 border-dashed border-slate-300 bg-slate-50 transition hover:border-blue-500 hover:bg-blue-50">

            {{-- Preview --}}
            <img
                id="imagePreview"
                src="{{ isset($gallery) && $gallery->image ? Storage::url($gallery->image) : '' }}"
                alt="Preview foto"
                class="absolute inset-0 h-full w-full object-cover {{ isset($gallery) && $gallery->image ? '' : 'hidden' }}">


            {{-- Existing / selected image overlay --}}
            <div
                id="changeImageText"
                class="absolute inset-0 hidden items-center justify-center bg-black/40 text-white">

                <div class="text-center">

                    <svg
                        class="mx-auto mb-2 h-8 w-8"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />

                    </svg>

                    <span class="font-semibold">
                        Klik untuk mengubah foto
                    </span>

                </div>

            </div>


            {{-- Empty State --}}
            <div
                id="uploadText"
                class="text-center text-slate-500 {{ isset($gallery) && $gallery->image ? 'hidden' : '' }}">

                <svg
                    class="mx-auto mb-3 h-10 w-10 text-slate-400"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="1.5">

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6H16a4 4 0 010 8h-1m-4-4v8m0-8l-3 3m3-3l3 3" />

                </svg>

                <p class="font-semibold">
                    Upload Foto
                </p>

                <p class="mt-1 text-xs">
                    Klik untuk memilih gambar
                </p>

                <p class="mt-1 text-[11px] text-slate-400">
                    JPG, JPEG, PNG, atau WEBP • Maks. 2 MB
                </p>

            </div>


            <input
                id="image"
                type="file"
                name="image"
                accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp"
                class="hidden">

        </label>

        @error('image')

            <p class="mt-1.5 text-sm text-red-500">
                {{ $message }}
            </p>

        @enderror

    </div>



    {{-- ========================================================= --}}
    {{-- STATUS --}}
    {{-- ========================================================= --}}
    <div
        class="rounded-2xl border border-slate-200 bg-slate-50 p-4">

        <label class="flex cursor-pointer items-start gap-3">

            <input
                type="checkbox"
                name="is_active"
                value="1"
                class="mt-0.5 h-4 w-4 rounded border-slate-300 text-blue-600 focus:ring-blue-500"
                {{ old('is_active', $gallery->is_active ?? true) ? 'checked' : '' }}>

            <span>

                <span class="block text-sm font-semibold text-slate-700">
                    Tampilkan di website
                </span>

                <span class="mt-1 block text-xs leading-5 text-slate-500">
                    Jika aktif, foto akan dapat ditampilkan pada galeri
                    website LPK Bina Insani.
                </span>

            </span>

        </label>

    </div>



    {{-- ========================================================= --}}
    {{-- BUTTON --}}
    {{-- ========================================================= --}}
    <div
        class="flex flex-col-reverse gap-3 border-t border-slate-100 pt-6 sm:flex-row sm:items-center">

        <a
            href="{{ route('galleries.index') }}"
            class="inline-flex items-center justify-center rounded-xl border border-slate-300 bg-white px-6 py-3 text-sm font-semibold text-slate-600 transition hover:border-slate-400 hover:bg-slate-50">

            Batal

        </a>


        <button
            type="submit"
            class="inline-flex items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 px-6 py-3 text-sm font-bold text-white shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">

            <svg
                class="h-4 w-4"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2">

                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M5 13l4 4L19 7" />

            </svg>

            {{ isset($gallery) ? 'Simpan Perubahan' : 'Simpan Galeri' }}

        </button>

    </div>

</div>



@push('scripts')

<script>

    const imageInput = document.getElementById('image');
    const imagePreview = document.getElementById('imagePreview');
    const uploadText = document.getElementById('uploadText');
    const changeImageText = document.getElementById('changeImageText');


    if (imageInput) {

        imageInput.addEventListener('change', function (event) {

            const file = event.target.files[0];

            if (!file) {
                return;
            }


            const reader = new FileReader();


            reader.onload = function (e) {

                imagePreview.src = e.target.result;

                imagePreview.classList.remove('hidden');

                uploadText.classList.add('hidden');

                changeImageText.classList.remove('hidden');

                changeImageText.classList.add('flex');

            };


            reader.readAsDataURL(file);

        });

    }


    @if(isset($gallery) && $gallery->image)

        if (changeImageText) {

            changeImageText.classList.add('group-hover:flex');

        }

    @endif

</script>

@endpush