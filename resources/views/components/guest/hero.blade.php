<section
    id="hero"
    data-aos="fade-in"
    class="relative flex min-h-screen items-center overflow-hidden bg-slate-950">

    {{-- ========================= --}}
    {{-- Background --}}
    {{-- ========================= --}}

    <div class="absolute inset-0">

        <img
            src="{{ asset('images/hero.jpg') }}"
            alt="Hero"
            class="h-full w-full object-cover object-center">

        <div
            class="absolute inset-0 bg-gradient-to-r from-slate-950 via-slate-950/85 to-slate-900/60">
        </div>

    </div>



    {{-- ========================= --}}
    {{-- Floating Decorations --}}
    {{-- ========================= --}}

    <div
        class="absolute -left-32 -top-32 h-[420px] w-[420px] rounded-full bg-blue-600/20 blur-[120px]">
    </div>

    <div
        class="absolute right-0 top-20 h-[350px] w-[350px] rounded-full bg-cyan-500/15 blur-[120px]">
    </div>

    <div
        class="absolute bottom-0 left-1/2 h-[300px] w-[300px] -translate-x-1/2 rounded-full bg-indigo-500/10 blur-[120px]">
    </div>





    <div
        class="section-container relative z-10 pt-36 pb-24">

        <div
            class="grid items-center gap-16 lg:grid-cols-2">





            {{-- ====================================== --}}
            {{-- LEFT CONTENT --}}
            {{-- ====================================== --}}

            <div>

                {{-- Badge --}}
                <div
                    data-aos="fade-right"
                    data-aos-delay="100"
                    class="inline-flex items-center gap-3 rounded-full border border-blue-400/20 bg-white/10 px-5 py-2 backdrop-blur-xl">


                    <span
                        class="text-sm font-semibold tracking-wide text-blue-100">

                        {{ $setting->hero_badge ?? 'PROGRAM PELATIHAN & PENYALURAN KERJA KE JEPANG' }}

                    </span>

                </div>





                {{-- Heading --}}
                <h1
                    data-aos="fade-right"
                    data-aos-delay="200"
                    class="mt-8 text-5xl font-black leading-tight text-white md:text-6xl xl:text-7xl">

                    {{ $setting->hero_title
                        ?? 'Bangun Karier Internasional Bersama LPK Bina Insani' }}

                </h1>





                {{-- Subtitle --}}
                <p
                    data-aos="fade-right"
                    data-aos-delay="300"
                    class="mt-8 max-w-2xl text-lg leading-9 text-slate-300">

                    {{ $setting->hero_subtitle
                        ?? 'Kami membantu calon peserta mempersiapkan kemampuan bahasa Jepang, budaya kerja, serta keterampilan profesional agar siap bekerja secara legal, aman, dan kompetitif di Jepang.' }}

                </p>





                {{-- CTA --}}
                <div
                    data-aos="fade-right"
                    data-aos-delay="400"
                    class="mt-10 flex flex-wrap items-center gap-5">


                    <a
                        href="{{ route('registration.create') }}"
                        class="inline-flex items-center gap-3 rounded-2xl bg-gradient-to-r from-blue-600 to-indigo-600 px-8 py-4 font-semibold text-white shadow-2xl shadow-blue-900/30 transition duration-300 hover:-translate-y-1 hover:scale-[1.02]">

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
                        class="inline-flex items-center gap-3 rounded-2xl border border-white/20 bg-white/10 px-8 py-4 font-semibold text-white backdrop-blur-xl transition duration-300 hover:bg-white hover:text-slate-900">

                        Lihat Program

                    </a>


                </div>





                {{-- Trust --}}
                <div
                    data-aos="fade-up"
                    data-aos-delay="500"
                    class="mt-12 flex flex-wrap items-center gap-6">


                    <div
                        class="flex -space-x-4">


                        @for($i = 0; $i < 4; $i++)

                            <div
                                class="flex h-12 w-12 items-center justify-center rounded-full border-2 border-slate-900 bg-white text-sm font-bold text-slate-700">

                                BI

                            </div>

                        @endfor


                    </div>


                    <div>

                        <h3
                            class="font-bold text-white">

                            Dipercaya Banyak Peserta

                        </h3>


                        <p
                            class="mt-1 text-sm text-slate-300">

                            Pelatihan Bahasa • Budaya • Penyaluran Kerja Jepang

                        </p>


                    </div>


                </div>

                




                {{-- Statistics --}}
                <div
                    data-aos="fade-up"
                    data-aos-delay="600"
                    class="mt-16 grid grid-cols-3 gap-5">


                    <div
                        data-aos="zoom-in"
                        data-aos-delay="700"
                        class="group rounded-3xl border border-white/15 bg-white/10 p-6 backdrop-blur-xl transition duration-300 hover:-translate-y-2 hover:bg-white/15">


                        <h2
                            class="text-4xl font-black text-white">

                            {{ $classes->count() }}+

                        </h2>


                        <p
                            class="mt-2 text-sm text-slate-300">

                            Program

                        </p>


                    </div>





                    <div
                        data-aos="zoom-in"
                        data-aos-delay="800"
                        class="group rounded-3xl border border-white/15 bg-white/10 p-6 backdrop-blur-xl transition duration-300 hover:-translate-y-2 hover:bg-white/15">


                        <h2
                            class="text-4xl font-black text-white">

                            {{ $galleries->count() }}+

                        </h2>


                        <p
                            class="mt-2 text-sm text-slate-300">

                            Dokumentasi

                        </p>


                    </div>





                    <div
                        data-aos="zoom-in"
                        data-aos-delay="900"
                        class="group rounded-3xl border border-white/15 bg-white/10 p-6 backdrop-blur-xl transition duration-300 hover:-translate-y-2 hover:bg-white/15">


                        <h2
                            class="text-4xl font-black text-white">

                            {{ $faqs->count() }}+

                        </h2>


                        <p
                            class="mt-2 text-sm text-slate-300">

                            FAQ

                        </p>


                    </div>


                </div>


            </div>








            {{-- ====================================== --}}
            {{-- RIGHT CONTENT --}}
            {{-- ====================================== --}}

            <div
                data-aos="fade-left"
                data-aos-delay="300"
                class="relative hidden justify-end lg:flex">


                <div
                    class="relative">


                    {{-- Main Image --}}
                    <div
                        data-aos="zoom-in"
                        data-aos-delay="500"
                        class="overflow-hidden rounded-[36px] border border-white/10 bg-white/10 p-3 shadow-[0_30px_80px_rgba(0,0,0,.35)] backdrop-blur-xl">

                        
                        <img
                            src="{{ $setting->hero_image
                                ? asset('storage/'.$setting->hero_image)
                                : asset('images/about.jpg') }}"
                            alt="LPK Bina Insani"
                            class="h-[620px] w-[470px] rounded-[28px] object-cover transition duration-700 hover:scale-105">

                    </div>







                    {{-- Card 1 --}}
                    <div
                        data-aos="fade-right"
                        data-aos-delay="700"
                        class="absolute -left-14 top-10 w-72 rounded-3xl border border-slate-200 bg-white p-6 shadow-2xl">


                        <div
                            class="flex items-center gap-4">


                            <div
                                class="flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-blue-600 to-indigo-600 text-2xl text-white">


                                📘


                            </div>


                            <div>


                                <h4
                                    class="font-bold text-slate-900">

                                    Pelatihan Berkualitas

                                </h4>


                                <p
                                    class="mt-1 text-sm text-slate-500">

                                    Mentor Profesional & Kurikulum Terbaru

                                </p>


                            </div>


                        </div>


                    </div>








                    {{-- Card 2 --}}
                    <div
                        data-aos="fade-left"
                        data-aos-delay="800"
                        class="absolute -right-10 bottom-10 rounded-3xl bg-gradient-to-r from-blue-600 to-indigo-600 px-8 py-7 text-white shadow-2xl">


                        <div
                            class="text-5xl font-black">

                            {{ $setting->hero_success_number ?? '95%' }}

                        </div>


                        <div
                            class="mt-2 text-sm text-blue-100">

                            Lulusan Siap Bersaing

                        </div>


                    </div>


                </div>


            </div>


        </div>


    </div>








    {{-- Scroll Indicator --}}
    <div
        data-aos="fade-up"
        data-aos-delay="1000"
        class="absolute bottom-8 left-1/2 hidden -translate-x-1/2 lg:block">


        <div
            class="flex flex-col items-center gap-3">


            <span
                class="text-xs font-semibold uppercase tracking-[0.4em] text-slate-300">

                Scroll

            </span>


            <div
                class="flex h-12 w-7 justify-center rounded-full border border-white/30">


                <div
                    class="mt-2 h-3 w-1 animate-bounce rounded-full bg-white">


                </div>


            </div>


        </div>


    </div>


</section>