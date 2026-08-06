{{-- ========================= --}}
{{-- INFORMASI PROGRAM --}}
{{-- ========================= --}}
<div class="rounded-2xl border border-slate-200 bg-white shadow-sm">

    <div class="border-b border-slate-200 px-6 py-4">

        <h2 class="text-lg font-bold text-slate-800">

            Informasi Program

        </h2>

        <p class="mt-1 text-sm text-slate-500">

            Lengkapi informasi dasar mengenai program pelatihan.

        </p>

    </div>

    <div class="grid gap-6 p-6 md:grid-cols-2">

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
                class="w-full rounded-xl border-slate-300 text-sm shadow-sm focus:border-blue-500 focus:ring-blue-500">

            @error('name')

                <p class="mt-2 text-sm text-red-600">

                    {{ $message }}

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

            <input
                type="number"
                id="registration_fee"
                name="registration_fee"
                value="{{ old('registration_fee', $class->registration_fee ?? '') }}"
                placeholder="250000"
                class="w-full rounded-xl border-slate-300 text-sm shadow-sm focus:border-blue-500 focus:ring-blue-500">

            @error('registration_fee')

                <p class="mt-2 text-sm text-red-600">

                    {{ $message }}

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
                class="w-full rounded-xl border-slate-300 text-sm shadow-sm focus:border-blue-500 focus:ring-blue-500">

            @error('duration')

                <p class="mt-2 text-sm text-red-600">

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
                class="w-full rounded-xl border-slate-300 text-sm shadow-sm focus:border-blue-500 focus:ring-blue-500">

            @error('meeting_schedule')

                <p class="mt-2 text-sm text-red-600">

                    {{ $message }}

                </p>

            @enderror

        </div>

    </div>

</div>
{{-- ========================= --}}
{{-- DESKRIPSI PROGRAM --}}
{{-- ========================= --}}
<div class="rounded-2xl border border-slate-200 bg-white shadow-sm">

    <div class="border-b border-slate-200 px-6 py-4">

        <h2 class="text-lg font-bold text-slate-800">

            Deskripsi Program

        </h2>

        <p class="mt-1 text-sm text-slate-500">

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
            class="w-full rounded-xl border-slate-300 text-sm leading-6 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('description', $class->description ?? '') }}</textarea>

        <p class="mt-2 text-xs text-slate-500">

            Deskripsi ini akan ditampilkan pada halaman landing page agar calon peserta memahami isi program.

        </p>

        @error('description')

            <p class="mt-2 text-sm text-red-600">

                {{ $message }}

            </p>

        @enderror

    </div>

</div>
{{-- ========================= --}}
{{-- STATUS PROGRAM --}}
{{-- ========================= --}}
<div class="rounded-2xl border border-slate-200 bg-white shadow-sm">

    <div class="border-b border-slate-200 px-6 py-4">

        <h2 class="text-lg font-bold text-slate-800">

            Status Program

        </h2>

        <p class="mt-1 text-sm text-slate-500">

            Tentukan apakah program dapat ditampilkan dan dipilih oleh calon peserta.

        </p>

    </div>

    <div class="p-6">

        <div class="grid gap-4 md:grid-cols-2">

            {{-- Aktif --}}
            <label
                class="flex cursor-pointer items-start gap-3 rounded-xl border border-slate-200 p-4 transition hover:border-blue-500 hover:bg-blue-50">

                <input
                    type="radio"
                    name="is_active"
                    value="1"
                    {{ old('is_active', $class->is_active ?? 1) == 1 ? 'checked' : '' }}
                    class="mt-1 text-blue-600 focus:ring-blue-500">

                <div>

                    <p class="font-semibold text-slate-800">

                        Aktif

                    </p>

                    <p class="mt-1 text-sm text-slate-500">

                        Program akan tampil di landing page dan dapat dipilih saat pendaftaran.

                    </p>

                </div>

            </label>

            {{-- Nonaktif --}}
            <label
                class="flex cursor-pointer items-start gap-3 rounded-xl border border-slate-200 p-4 transition hover:border-red-500 hover:bg-red-50">

                <input
                    type="radio"
                    name="is_active"
                    value="0"
                    {{ old('is_active', $class->is_active ?? 1) == 0 ? 'checked' : '' }}
                    class="mt-1 text-red-600 focus:ring-red-500">

                <div>

                    <p class="font-semibold text-slate-800">

                        Tidak Aktif

                    </p>

                    <p class="mt-1 text-sm text-slate-500">

                        Program disembunyikan dari website dan tidak bisa dipilih peserta.

                    </p>

                </div>

            </label>

        </div>

        @error('is_active')

            <p class="mt-3 text-sm text-red-600">

                {{ $message }}

            </p>

        @enderror

    </div>

</div>



{{-- ACTION --}}
<div class="flex items-center justify-between">

    <a
        href="{{ route('classes.index') }}"
        class="rounded-xl border border-slate-300 bg-white px-5 py-2.5 text-sm font-semibold text-slate-700 transition hover:bg-slate-100">

        Kembali

    </a>

    <button
        type="submit"
        class="rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 px-6 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:shadow-lg">

        {{ isset($class) ? 'Update Program' : 'Simpan Program' }}

    </button>

</div>