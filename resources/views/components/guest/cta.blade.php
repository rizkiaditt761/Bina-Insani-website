<section
    id="cta"
    data-aos="zoom-in"
    class="relative overflow-hidden py-28">

    {{-- Background --}}
    <div
        class="absolute inset-0 bg-gradient-to-br from-slate-900 via-blue-900 to-indigo-900">
    </div>

    <div
        class="absolute -top-40 -left-40 h-[500px] w-[500px] rounded-full bg-blue-500/20 blur-3xl">
    </div>

    <div
        class="absolute -bottom-40 -right-40 h-[500px] w-[500px] rounded-full bg-cyan-400/20 blur-3xl">
    </div>

    {{-- Grid Pattern --}}
    <div
        class="absolute inset-0 opacity-[0.05]">

        <svg
            class="h-full w-full"
            xmlns="http://www.w3.org/2000/svg">

            <defs>

                <pattern
                    id="grid"
                    width="40"
                    height="40"
                    patternUnits="userSpaceOnUse">

                    <path
                        d="M40 0H0V40"
                        fill="none"
                        stroke="white"
                        stroke-width="1"/>

                </pattern>

            </defs>

            <rect
                width="100%"
                height="100%"
                fill="url(#grid)"/>

        </svg>

    </div>





    <div
        class="section-container relative">

        <div
            class="grid items-center gap-20 lg:grid-cols-2">




            {{-- ========================== --}}
            {{-- LEFT --}}
            {{-- ========================== --}}

            <div
                data-aos="fade-right">

                <span
                    class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-5 py-2 font-semibold text-white backdrop-blur">

                    <span
                        class="h-2 w-2 rounded-full bg-green-400">
                    </span>

                    Pendaftaran Dibuka

                </span>





                <h2
                    class="mt-8 text-5xl font-black leading-tight text-white xl:text-6xl">

                    Wujudkan

                    <span
                        class="bg-gradient-to-r from-cyan-300 to-blue-300 bg-clip-text text-transparent">

                        Karier Impianmu

                    </span>

                    di Jepang

                </h2>





                <p
                    class="mt-8 max-w-2xl text-lg leading-9 text-blue-100">

                    Bergabung bersama
                    <strong>{{ $setting->site_name ?? 'LPK Bina Insani' }}</strong>
                    untuk memperoleh pelatihan bahasa Jepang, budaya kerja,
                    keterampilan profesional, serta pendampingan hingga siap
                    bekerja di perusahaan Jepang.

                </p>





                <div
                    class="mt-12 flex flex-wrap gap-5">

                    <a
                        href="{{ route('registration.create') }}"
                        class="inline-flex items-center gap-3 rounded-2xl bg-white px-8 py-4 font-bold text-blue-700 shadow-xl transition duration-300 hover:-translate-y-1 hover:shadow-2xl">

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

                    <a
                        href="#classes"
                        class="inline-flex items-center rounded-2xl border border-white/20 px-8 py-4 font-semibold text-white transition hover:bg-white hover:text-blue-700">

                        Lihat Program

                    </a>

                </div>

            </div>







            {{-- ========================== --}}
            {{-- RIGHT --}}
            {{-- ========================== --}}

            <div
                data-aos="fade-left">

                <div
                    class="rounded-[34px] border border-white/10 bg-white/10 p-8 backdrop-blur-xl">

                    <div
                        class="space-y-6">

                        <div
                            class="flex items-start gap-5 rounded-2xl bg-white/10 p-5">

                            <div
                                class="flex h-14 w-14 items-center justify-center rounded-2xl bg-white text-xl">

                                📘

                            </div>

                            <div>

                                <h3
                                    class="font-bold text-white">

                                    Pelatihan Intensif

                                </h3>

                                <p
                                    class="mt-2 leading-7 text-blue-100">

                                    Materi disusun sesuai standar industri Jepang.

                                </p>

                            </div>

                        </div>





                        <div
                            class="flex items-start gap-5 rounded-2xl bg-white/10 p-5">

                            <div
                                class="flex h-14 w-14 items-center justify-center rounded-2xl bg-white text-xl">

                                👨‍🏫

                            </div>

                            <div>

                                <h3
                                    class="font-bold text-white">

                                    Mentor Profesional

                                </h3>

                                <p
                                    class="mt-2 leading-7 text-blue-100">

                                    Dibimbing instruktur berpengalaman dari awal hingga lulus.

                                </p>

                            </div>

                        </div>





                        <div
                            class="flex items-start gap-5 rounded-2xl bg-white/10 p-5">

                            <div
                                class="flex h-14 w-14 items-center justify-center rounded-2xl bg-white text-xl">

                                🇯🇵

                            </div>

                            <div>

                                <h3
                                    class="font-bold text-white">

                                    Siap Bekerja di Jepang

                                </h3>

                                <p
                                    class="mt-2 leading-7 text-blue-100">

                                    Pendampingan hingga proses penempatan kerja.

                                </p>

                            </div>

                        </div>

                    </div>





                    <div
                        class="mt-10 rounded-2xl bg-gradient-to-r from-cyan-400/20 to-blue-400/20 p-6 text-center">

                        <h3
                            class="text-4xl font-black text-white">

                            Ayo Bergabung!

                        </h3>

                        <p
                            class="mt-3 text-blue-100">

                            Kesempatan terbaik dimulai dari langkah pertama.

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>