<section
    id="gallery"
    data-aos="fade-up"
    class="relative overflow-hidden bg-gradient-to-b from-white to-slate-50 py-28">

    {{-- Background Decoration --}}
    <div
        class="absolute -left-40 top-20 h-[420px] w-[420px] rounded-full bg-blue-100 opacity-60 blur-3xl">
    </div>

    <div
        class="absolute -right-40 bottom-0 h-[500px] w-[500px] rounded-full bg-indigo-100 opacity-60 blur-3xl">
    </div>





    <div
        class="section-container relative">

        {{-- ================================= --}}
        {{-- Header --}}
        {{-- ================================= --}}

        <div
            class="mx-auto mb-20 max-w-4xl text-center"
            data-aos="fade-up">

            <span
                class="inline-flex items-center gap-2 rounded-full bg-blue-100 px-5 py-2 font-semibold text-blue-700">

                <span
                    class="h-2 w-2 rounded-full bg-blue-600">
                </span>

                Dokumentasi

            </span>





            <h2
                class="mt-6 text-4xl font-black leading-tight text-slate-900 md:text-5xl xl:text-6xl">

                Momen

                <span
                    class="bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">

                    Pelatihan Kami

                </span>

            </h2>





            <p
                class="mx-auto mt-8 max-w-3xl text-lg leading-9 text-slate-600">

                Dokumentasi kegiatan pelatihan, pembelajaran, praktik,
                dan berbagai aktivitas peserta selama mengikuti program
                di LPK Bina Insani.

            </p>

        </div>








        @if($galleries->count())

            <div
                class="grid gap-8 sm:grid-cols-2 xl:grid-cols-3">

                @foreach($galleries as $gallery)

                    <div
                        data-aos="zoom-in"
                        data-aos-delay="{{ $loop->index * 80 }}"
                        class="group overflow-hidden rounded-[34px] border border-slate-200 bg-white shadow-sm transition duration-500 hover:-translate-y-3 hover:shadow-[0_25px_60px_rgba(37,99,235,.15)]">





                        {{-- Image --}}
                        <div
                            class="relative overflow-hidden">

                            <img
                                src="{{ $gallery->image ? Storage::url($gallery->image) : asset('storage/gallery/default.jpg') }}"
                                alt="{{ $gallery->title }}"
                                class="h-80 w-full object-cover transition duration-700 group-hover:scale-110">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-slate-950/90 via-slate-900/10 to-transparent opacity-0 transition duration-500 group-hover:opacity-100">
                            </div>





                            {{-- Category --}}
                            <div
                                class="absolute left-6 top-6">

                                <span
                                    class="rounded-full bg-white/90 px-4 py-2 text-xs font-bold uppercase tracking-wider text-blue-700 backdrop-blur">

                                    {{ $gallery->category ?: 'Gallery' }}

                                </span>

                            </div>





                            {{-- Hover Icon --}}
                            <div
                                class="absolute inset-0 flex items-center justify-center opacity-0 transition duration-500 group-hover:opacity-100">

                                <div
                                    class="flex h-16 w-16 items-center justify-center rounded-full bg-white text-2xl shadow-xl">

                                    📷

                                </div>

                            </div>

                        </div>








                        {{-- Body --}}
                        <div
                            class="p-8">

                            <div
                                class="flex items-center justify-between">

                                <h3
                                    class="text-2xl font-black text-slate-900">

                                    {{ $gallery->title }}

                                </h3>

                                <div
                                    class="rounded-full bg-blue-100 p-2 text-blue-600">

                                    🖼️

                                </div>

                            </div>





                            @if($gallery->description)

                                <p
                                    class="mt-5 leading-8 text-slate-600">

                                    {{ $gallery->description }}

                                </p>

                            @endif





                            <div
                                class="mt-8 flex items-center justify-between">
                                                                <div
                                    class="flex items-center gap-2 text-sm text-slate-500">

                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor">

                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M8 7V3m8 4V3M5 11h14M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>

                                    </svg>

                                    {{ $gallery->created_at?->format('d M Y') }}

                                </div>





                                <a
                                    <a
    href="{{ $gallery->image ? Storage::url($gallery->image) : asset('storage/gallery/default.jpg') }}"
                                    target="_blank"
                                    class="inline-flex items-center gap-2 font-semibold text-blue-600 transition hover:text-blue-700">

                                    Lihat Foto

                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor">

                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M9 5l7 7-7 7"/>

                                    </svg>

                                </a>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>





            {{-- Bottom CTA --}}
            <div
                class="mt-20 text-center"
                data-aos="fade-up">

                <p
                    class="mb-6 text-slate-600">

                    Ingin menjadi bagian dari dokumentasi berikutnya?

                </p>

                <a
                    href="{{ route('registration.create') }}"
                    class="inline-flex items-center gap-3 rounded-2xl bg-gradient-to-r from-blue-600 to-indigo-600 px-8 py-4 font-semibold text-white shadow-xl transition duration-300 hover:-translate-y-1 hover:shadow-blue-500/30">

                    Daftar Sekarang

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M9 5l7 7-7 7"/>

                    </svg>

                </a>

            </div>

        @else

            <div
                data-aos="zoom-in"
                class="rounded-[36px] border border-slate-200 bg-white px-10 py-24 text-center shadow-sm">

                <div
                    class="mx-auto flex h-24 w-24 items-center justify-center rounded-full bg-blue-100 text-5xl">

                    🖼️

                </div>

                <h3
                    class="mt-8 text-3xl font-black text-slate-900">

                    Belum Ada Dokumentasi

                </h3>

                <p
                    class="mx-auto mt-5 max-w-xl text-lg leading-8 text-slate-500">

                    Dokumentasi kegiatan pelatihan akan ditampilkan di sini
                    setelah tersedia.

                </p>

                <a
                    href="{{ route('registration.create') }}"
                    class="mt-10 inline-flex rounded-2xl border border-blue-600 px-8 py-4 font-semibold text-blue-600 transition hover:bg-blue-600 hover:text-white">

                    Daftar Menjadi Peserta

                </a>

            </div>

        @endif

    </div>

</section>