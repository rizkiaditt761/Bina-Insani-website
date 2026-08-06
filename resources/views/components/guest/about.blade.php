<section
    id="about"
    data-aos="fade-up"
    class="relative overflow-hidden bg-gradient-to-b from-slate-50 to-white py-28">


    {{-- Background Decoration --}}
    <div
        class="absolute -left-40 top-0 h-[450px] w-[450px] rounded-full bg-blue-100/70 blur-3xl">
    </div>

    <div
        class="absolute -right-40 bottom-0 h-[500px] w-[500px] rounded-full bg-indigo-100/70 blur-3xl">
    </div>





    <div
        class="section-container relative">


        <div
            class="grid items-center gap-20 lg:grid-cols-2">





            {{-- ===================================== --}}
            {{-- IMAGE SECTION --}}
            {{-- ===================================== --}}

            <div
                data-aos="fade-right"
                data-aos-duration="1000"
                class="relative">


                {{-- Main Image --}}
                <div
                    class="overflow-hidden rounded-[36px] border border-slate-200 bg-white p-3 shadow-[0_25px_80px_rgba(15,23,42,.12)]">


                    <img
                        src="{{ $setting->about_image
                                ? asset('storage/'.$setting->about_image)
                                : asset('images/about.jpg') }}"
                        alt="Tentang LPK Bina Insani"
                        loading="lazy"
                        class="h-[650px] w-full rounded-[28px] object-cover transition duration-700 hover:scale-105">


                </div>








                {{-- Floating Card 1 --}}
                <div
                    data-aos="zoom-in"
                    data-aos-delay="200"
                    class="absolute -left-10 top-10 rounded-3xl border border-slate-100 bg-white p-6 shadow-2xl">


                    <div
                        class="flex items-center gap-4">


                        <div
                            class="flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-blue-600 to-indigo-600 text-2xl text-white">


                            🇯🇵


                        </div>





                        <div>


                            <h3
                                class="text-lg font-bold text-slate-900">

                                Bahasa Jepang

                            </h3>


                            <p
                                class="text-sm text-slate-500">

                                JLPT & Persiapan Kerja

                            </p>


                        </div>


                    </div>


                </div>









                {{-- Floating Card 2 --}}
                <div
                    data-aos="zoom-in"
                    data-aos-delay="400"
                    class="absolute -right-8 bottom-10 rounded-3xl bg-gradient-to-r from-blue-600 to-indigo-600 px-8 py-7 text-white shadow-2xl">


                    <h3
                        class="text-5xl font-black">

                        {{ $setting->about_alumni_count ?? '100+' }}

                    </h3>


                    <p
                        class="mt-2 text-blue-100">

                        Alumni Berhasil

                    </p>


                </div>









                {{-- Floating Card 3 --}}
                <div
                    data-aos="fade-up"
                    data-aos-delay="600"
                    class="absolute bottom-44 -left-10 rounded-3xl border border-white/20 bg-slate-900/90 px-6 py-5 text-white shadow-xl backdrop-blur-xl">


                    <p
                        class="text-sm text-slate-300">

                        Fokus Pelatihan

                    </p>


                    <h3
                        class="mt-2 text-2xl font-black">

                        Bahasa • Budaya • Skill

                    </h3>


                </div>




            </div>
                        {{-- ===================================== --}}
            {{-- CONTENT SECTION --}}
            {{-- ===================================== --}}

            <div
                data-aos="fade-left"
                data-aos-duration="1000">


                {{-- Badge --}}
                <span
                    data-aos="fade-up"
                    class="inline-flex items-center gap-2 rounded-full bg-blue-100 px-5 py-2 font-semibold text-blue-700">


                    <span
                        class="h-2 w-2 rounded-full bg-blue-600">
                    </span>


                    Tentang Kami


                </span>







                {{-- Title --}}
                <h2
                    data-aos="fade-up"
                    data-aos-delay="100"
                    class="mt-6 text-5xl font-black leading-tight text-slate-900 xl:text-6xl">


                    {{ $setting->about_title ?? 'LPK Bina Insani' }}


                </h2>








                {{-- Description --}}
                <p
                    data-aos="fade-up"
                    data-aos-delay="200"
                    class="mt-8 text-lg leading-9 text-slate-600">


                    {{ $setting->about_description
                        ?? 'LPK Bina Insani merupakan lembaga pelatihan kerja yang membantu calon tenaga kerja Indonesia memperoleh kemampuan bahasa Jepang, budaya kerja, dan keterampilan profesional sehingga siap bersaing di dunia kerja internasional.' }}


                </p>









                {{-- Feature List --}}
                <div
                    class="mt-12 space-y-6">





                    {{-- Feature 1 --}}
                    <div
                        data-aos="fade-up"
                        data-aos-delay="300"
                        class="group flex gap-5 rounded-3xl border border-slate-200 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-xl">


                        <div
                            class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-gradient-to-br from-blue-600 to-indigo-600 text-xl text-white">

                            ✓

                        </div>



                        <div>

                            <h3
                                class="text-xl font-bold text-slate-900">

                                Pelatihan Berkualitas

                            </h3>


                            <p
                                class="mt-2 leading-7 text-slate-600">

                                Kurikulum disusun sesuai kebutuhan industri Jepang dengan kombinasi teori, praktik, dan simulasi kerja.

                            </p>


                        </div>


                    </div>








                    {{-- Feature 2 --}}
                    <div
                        data-aos="fade-up"
                        data-aos-delay="400"
                        class="group flex gap-5 rounded-3xl border border-slate-200 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-xl">


                        <div
                            class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-gradient-to-br from-emerald-500 to-teal-600 text-xl text-white">

                            ★

                        </div>



                        <div>

                            <h3
                                class="text-xl font-bold text-slate-900">

                                Mentor Berpengalaman

                            </h3>


                            <p
                                class="mt-2 leading-7 text-slate-600">

                                Dibimbing oleh instruktur berpengalaman dalam bahasa Jepang, budaya kerja, serta persiapan magang dan kerja.

                            </p>


                        </div>


                    </div>








                    {{-- Feature 3 --}}
                    <div
                        data-aos="fade-up"
                        data-aos-delay="500"
                        class="group flex gap-5 rounded-3xl border border-slate-200 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-xl">


                        <div
                            class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-gradient-to-br from-orange-500 to-red-500 text-xl text-white">

                            🚀

                        </div>



                        <div>

                            <h3
                                class="text-xl font-bold text-slate-900">

                                Pendampingan Hingga Penempatan

                            </h3>


                            <p
                                class="mt-2 leading-7 text-slate-600">

                                Peserta mendapatkan pendampingan sejak pelatihan hingga proses penempatan kerja di Jepang.

                            </p>


                        </div>


                    </div>




                </div>









                {{-- Statistic --}}
                <div
                    data-aos="fade-up"
                    data-aos-delay="600"
                    class="mt-12 grid grid-cols-3 gap-5">



                    <div
                        class="rounded-3xl border border-slate-200 bg-white p-6 text-center shadow-sm transition duration-300 hover:-translate-y-2 hover:shadow-lg">


                        <h3
                            class="text-5xl font-black">

                            {{ $setting->about_alumni_count ?? '100+' }}

                        </h3>


                        <p
                            class="mt-2 text-sm text-slate-500">

                            Alumni

                        </p>


                    </div>






                    <div
                        class="rounded-3xl border border-slate-200 bg-white p-6 text-center shadow-sm transition duration-300 hover:-translate-y-2 hover:shadow-lg">


                        <h3
                            class="text-4xl font-black text-blue-600">

                            {{ $classes->count() }}+

                        </h3>


                        <p
                            class="mt-2 text-sm text-slate-500">

                            Program

                        </p>


                    </div>






                    <div
                        class="rounded-3xl border border-slate-200 bg-white p-6 text-center shadow-sm transition duration-300 hover:-translate-y-2 hover:shadow-lg">


                        <h3
                            class="text-4xl font-black text-blue-600">

                            {{ $faqs->count() }}+

                        </h3>


                        <p
                            class="mt-2 text-sm text-slate-500">

                            FAQ

                        </p>


                    </div>


                </div>









                {{-- CTA --}}
                <div
                    data-aos="fade-up"
                    data-aos-delay="700"
                    class="mt-14 flex flex-wrap gap-5">


                    <a
                        href="{{ route('registration.create') }}"
                        class="inline-flex items-center gap-3 rounded-2xl bg-gradient-to-r from-blue-600 to-indigo-600 px-8 py-4 font-semibold text-white shadow-xl transition duration-300 hover:-translate-y-1 hover:shadow-2xl">


                        Bergabung Sekarang



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
                        class="inline-flex items-center rounded-2xl border border-slate-300 px-8 py-4 font-semibold text-slate-700 transition duration-300 hover:border-blue-600 hover:text-blue-600">


                        Lihat Program


                    </a>


                </div>



            </div>


        </div>


    </div>


</section>