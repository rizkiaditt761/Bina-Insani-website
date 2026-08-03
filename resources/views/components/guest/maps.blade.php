<section
    id="contact"
    data-aos="fade-up"
    class="relative overflow-hidden bg-gradient-to-b from-slate-50 to-white py-28">

    {{-- Background Decoration --}}
    <div
        class="absolute -left-40 top-0 h-[450px] w-[450px] rounded-full bg-blue-100/70 blur-3xl">
    </div>

    <div
        class="absolute -right-40 bottom-0 h-[450px] w-[450px] rounded-full bg-indigo-100/70 blur-3xl">
    </div>





    <div
        class="section-container relative">

        {{-- Header --}}
        <div
            class="mx-auto mb-20 max-w-3xl text-center"
            data-aos="fade-up">

            <span
                class="inline-flex items-center gap-2 rounded-full bg-blue-100 px-5 py-2 font-semibold text-blue-700">

                <span
                    class="h-2 w-2 rounded-full bg-blue-600">
                </span>

                Hubungi Kami

            </span>





            <h2
                class="mt-6 text-4xl font-black leading-tight text-slate-900 md:text-5xl xl:text-6xl">

                Kunjungi

                <span
                    class="bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">

                    LPK Bina Insani

                </span>

            </h2>





            <p
                class="mx-auto mt-8 max-w-3xl text-lg leading-9 text-slate-600">

                Kami siap membantu proses pendaftaran, konsultasi program,
                maupun memberikan informasi lengkap mengenai pelatihan
                dan penempatan kerja di Jepang.

            </p>

        </div>








        <div
            class="grid items-stretch gap-10 lg:grid-cols-5">




            {{-- =================================== --}}
            {{-- Contact Card --}}
            {{-- =================================== --}}

            <div
                data-aos="fade-right"
                class="lg:col-span-2">

                <div
                    class="rounded-[34px] border border-slate-200 bg-white p-10 shadow-sm">

                    <h3
                        class="text-3xl font-black text-slate-900">

                        Informasi Kontak

                    </h3>

                    <p
                        class="mt-3 leading-7 text-slate-500">

                        Jangan ragu menghubungi kami apabila membutuhkan
                        informasi lebih lanjut.

                    </p>





                    <div
                        class="mt-10 space-y-7">

                        {{-- Address --}}
                        <div
                            class="flex gap-5">

                            <div
                                class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-blue-100 text-xl">

                                📍

                            </div>

                            <div>

                                <h4
                                    class="font-bold text-slate-900">

                                    Alamat

                                </h4>

                                <p
                                    class="mt-2 leading-7 text-slate-600">

                                    {{ $setting->address ?? 'Alamat belum tersedia.' }}

                                </p>

                            </div>

                        </div>





                        {{-- Phone --}}
                        <div
                            class="flex gap-5">

                            <div
                                class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-green-100 text-xl">

                                📞

                            </div>

                            <div>

                                <h4
                                    class="font-bold text-slate-900">

                                    Telepon

                                </h4>

                                <p
                                    class="mt-2 text-slate-600">

                                    {{ $setting->phone ?? '-' }}

                                </p>

                            </div>

                        </div>





                        {{-- Email --}}
                        <div
                            class="flex gap-5">

                            <div
                                class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-amber-100 text-xl">

                                ✉️

                            </div>

                            <div>

                                <h4
                                    class="font-bold text-slate-900">

                                    Email

                                </h4>

                                <p
                                    class="mt-2 break-all text-slate-600">

                                    {{ $setting->email ?? '-' }}

                                </p>

                            </div>

                        </div>





                        {{-- Hours --}}
                        <div
                            class="flex gap-5">

                            <div
                                class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-red-100 text-xl">

                                🕒

                            </div>

                            <div>

                                <h4
                                    class="font-bold text-slate-900">

                                    Jam Operasional

                                </h4>

                                <p
                                    class="mt-2 leading-7 text-slate-600">

                                    Senin – Sabtu<br>
                                    08.00 – 16.00 WIB

                                </p>

                            </div>

                        </div>

                    </div>





                    <a
                        href="https://maps.google.com"
                        target="_blank"
                        class="mt-10 inline-flex w-full items-center justify-center rounded-2xl bg-gradient-to-r from-blue-600 to-indigo-600 px-6 py-4 font-semibold text-white shadow-lg transition duration-300 hover:-translate-y-1 hover:shadow-blue-500/30">

                        Buka Google Maps

                    </a>

                </div>

            </div>








            {{-- =================================== --}}
            {{-- Google Maps --}}
            {{-- =================================== --}}

            <div
                data-aos="fade-left"
                class="lg:col-span-3">

                <div
                    class="overflow-hidden rounded-[34px] border border-slate-200 bg-white shadow-sm">

                    @if(!empty($setting?->google_maps))

                        <div
                            class="[&>iframe]:h-[650px] [&>iframe]:w-full">

                            {!! $setting->google_maps !!}

                        </div>

                    @else

                        <iframe
                            src="https://maps.google.com/maps?q=Indonesia&t=&z=13&ie=UTF8&iwloc=&output=embed"
                            class="h-[650px] w-full"
                            loading="lazy">
                        </iframe>

                    @endif

                </div>

            </div>

        </div>

    </div>

</section>