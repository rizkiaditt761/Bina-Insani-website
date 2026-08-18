{{-- ========================================================= --}}
{{-- INFORMASI PROGRAM --}}
{{-- ========================================================= --}}
<div class="rounded-3xl border border-slate-200 bg-white shadow-sm">

    {{-- Section Header --}}
    <div class="border-b border-slate-200 px-6 py-5">

        <h2 class="text-base font-bold text-slate-800">
            Informasi Program
        </h2>

        <p class="mt-1 text-xs leading-5 text-slate-500">
            Lengkapi informasi dasar mengenai program pelatihan.
        </p>

    </div>


    {{-- Fields --}}
    <div class="grid gap-5 p-6 md:grid-cols-2">

        {{-- Nama Program --}}
        <div class="md:col-span-2">

            <label
                for="name"
                class="mb-2 block text-sm font-semibold text-slate-700">

                Nama Program
                <span class="text-red-500">*</span>

            </label>

            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name', $class->name ?? '') }}"
                placeholder="Contoh: Bahasa Jepang Reguler"
                required
                class="w-full rounded-xl border bg-slate-50 px-4 py-3 text-sm text-slate-700 shadow-sm outline-none transition placeholder:text-slate-400 focus:bg-white focus:ring-2
                    {{ $errors->has('name')
                        ? 'border-red-400 focus:border-red-500 focus:ring-red-100'
                        : 'border-slate-300 focus:border-blue-500 focus:ring-blue-100' }}">

            @error('name')

                <p class="mt-2 flex items-start gap-2 text-xs text-red-600">

                    <svg
                        class="mt-0.5 h-4 w-4 shrink-0"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M12 9v3m0 4h.01M10.29 3.86l-7.82 13.5A2 2 0 004.2 20.36h15.6a2 2 0 001.73-3L13.71 3.86a2 2 0 00-3.42 0z" />

                    </svg>

                    <span>{{ $message }}</span>

                </p>

            @enderror

        </div>


        {{-- Biaya --}}
        <div>

            <label
                for="registration_fee"
                class="mb-2 block text-sm font-semibold text-slate-700">

                Biaya Pendaftaran
                <span class="text-red-500">*</span>

            </label>

            <div class="relative">

                <span
                    class="pointer-events-none absolute left-4 top-1/2 -translate-y-1/2 text-sm font-medium text-slate-500">

                    Rp

                </span>

                <input
                    type="number"
                    id="registration_fee"
                    name="registration_fee"
                    value="{{ old('registration_fee', $class->registration_fee ?? '') }}"
                    placeholder="250000"
                    min="0"
                    step="1"
                    required
                    inputmode="numeric"
                    class="w-full rounded-xl border bg-slate-50 py-3 pl-12 pr-4 text-sm text-slate-700 shadow-sm outline-none transition placeholder:text-slate-400 focus:bg-white focus:ring-2
                        {{ $errors->has('registration_fee')
                            ? 'border-red-400 focus:border-red-500 focus:ring-red-100'
                            : 'border-slate-300 focus:border-blue-500 focus:ring-blue-100' }}">

            </div>

            <p class="mt-2 text-xs text-slate-500">
                Masukkan nominal angka tanpa titik atau koma. Contoh: 250000
            </p>

            @error('registration_fee')

                <p class="mt-2 flex items-start gap-2 text-xs text-red-600">

                    <span>{{ $message }}</span>

                </p>

            @enderror

        </div>


        {{-- Durasi --}}
        <div>

            <label
                for="duration"
                class="mb-2 block text-sm font-semibold text-slate-700">

                Durasi

            </label>

            <input
                type="text"
                id="duration"
                name="duration"
                value="{{ old('duration', $class->duration ?? '') }}"
                placeholder="Contoh: 6 Bulan"
                class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-700 shadow-sm outline-none transition placeholder:text-slate-400 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-100">

            @error('duration')

                <p class="mt-2 text-xs text-red-600">
                    {{ $message }}
                </p>

            @enderror

        </div>


        {{-- Jadwal --}}
        <div class="md:col-span-2">

            <label
                for="meeting_schedule"
                class="mb-2 block text-sm font-semibold text-slate-700">

                Jadwal Pertemuan

            </label>

            <input
                type="text"
                id="meeting_schedule"
                name="meeting_schedule"
                value="{{ old('meeting_schedule', $class->meeting_schedule ?? '') }}"
                placeholder="Contoh: Senin - Jumat, 19.00 - 21.00 WIB"
                class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-700 shadow-sm outline-none transition placeholder:text-slate-400 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-100">

            @error('meeting_schedule')

                <p class="mt-2 text-xs text-red-600">
                    {{ $message }}
                </p>

            @enderror

        </div>

    </div>

</div>



{{-- ========================================================= --}}
{{-- DESKRIPSI PROGRAM --}}
{{-- ========================================================= --}}
<div class="rounded-3xl border border-slate-200 bg-white shadow-sm">

    {{-- Section Header --}}
    <div class="border-b border-slate-200 px-6 py-5">

        <h2 class="text-base font-bold text-slate-800">
            Deskripsi Program
        </h2>

        <p class="mt-1 text-xs leading-5 text-slate-500">
            Jelaskan materi, tujuan, atau informasi penting mengenai program pelatihan.
        </p>

    </div>


    <div class="p-6">

        <label
            for="description"
            class="mb-2 block text-sm font-semibold text-slate-700">

            Deskripsi

        </label>

        <textarea
            id="description"
            name="description"
            rows="6"
            placeholder="Contoh: Program ini ditujukan bagi calon peserta yang ingin mempelajari bahasa Jepang dari dasar hingga siap mengikuti proses kerja di Jepang."
            class="w-full rounded-xl border bg-slate-50 px-4 py-3 text-sm leading-6 text-slate-700 shadow-sm outline-none transition placeholder:text-slate-400 focus:bg-white focus:ring-2
                {{ $errors->has('description')
                    ? 'border-red-400 focus:border-red-500 focus:ring-red-100'
                    : 'border-slate-300 focus:border-blue-500 focus:ring-blue-100' }}">{{ old('description', $class->description ?? '') }}</textarea>

        <p class="mt-2 text-xs leading-5 text-slate-500">
            Deskripsi ini akan ditampilkan pada halaman landing page agar calon peserta memahami isi program.
        </p>

        @error('description')

            <p class="mt-2 text-xs text-red-600">
                {{ $message }}
            </p>

        @enderror

    </div>

</div>



{{-- ========================================================= --}}
{{-- STATUS PROGRAM --}}
{{-- ========================================================= --}}
<div class="rounded-3xl border border-slate-200 bg-white shadow-sm">

    {{-- Section Header --}}
    <div class="border-b border-slate-200 px-6 py-5">

        <h2 class="text-base font-bold text-slate-800">
            Status Program
        </h2>

        <p class="mt-1 text-xs leading-5 text-slate-500">
            Tentukan apakah program dapat ditampilkan dan dipilih oleh calon peserta.
        </p>

    </div>


    <div class="p-6">

        <div class="grid gap-4 md:grid-cols-2">

            {{-- Aktif --}}
            <label
                class="flex cursor-pointer items-start gap-3 rounded-2xl border border-slate-200 bg-white p-4 transition hover:border-blue-300 hover:bg-blue-50/50">

                <input
                    type="radio"
                    name="is_active"
                    value="1"
                    {{ old('is_active', $class->is_active ?? 1) == 1 ? 'checked' : '' }}
                    class="mt-1 h-4 w-4 border-slate-300 text-blue-600 focus:ring-blue-500">

                <div>

                    <p class="text-sm font-semibold text-slate-800">
                        Aktif
                    </p>

                    <p class="mt-1 text-xs leading-5 text-slate-500">
                        Program akan tampil di landing page dan dapat dipilih saat pendaftaran.
                    </p>

                </div>

            </label>


            {{-- Nonaktif --}}
            <label
                class="flex cursor-pointer items-start gap-3 rounded-2xl border border-slate-200 bg-white p-4 transition hover:border-red-300 hover:bg-red-50/50">

                <input
                    type="radio"
                    name="is_active"
                    value="0"
                    {{ old('is_active', $class->is_active ?? 1) == 0 ? 'checked' : '' }}
                    class="mt-1 h-4 w-4 border-slate-300 text-red-600 focus:ring-red-500">

                <div>

                    <p class="text-sm font-semibold text-slate-800">
                        Tidak Aktif
                    </p>

                    <p class="mt-1 text-xs leading-5 text-slate-500">
                        Program disembunyikan dari website dan tidak bisa dipilih peserta.
                    </p>

                </div>

            </label>

        </div>

        @error('is_active')

            <p class="mt-3 text-xs text-red-600">
                {{ $message }}
            </p>

        @enderror

    </div>

</div>



{{-- ========================================================= --}}
{{-- ACTION --}}
{{-- ========================================================= --}}
<div
    class="flex flex-col-reverse gap-3 border-t border-slate-200 pt-5 sm:flex-row sm:items-center sm:justify-between">

    <a
        href="{{ route('classes.index') }}"
        class="inline-flex items-center justify-center rounded-xl border border-slate-300 bg-white px-5 py-2.5 text-sm font-semibold text-slate-600 transition hover:border-slate-400 hover:bg-slate-50">

        Kembali

    </a>


    <button
        type="submit"
        class="inline-flex items-center justify-center rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 px-6 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">

        {{ isset($class) ? 'Update Program' : 'Simpan Program' }}

    </button>

</div>