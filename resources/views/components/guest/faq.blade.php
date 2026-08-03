<section
    id="faq"
    data-aos="fade-up"
    class="relative overflow-hidden bg-gradient-to-b from-slate-50 to-white py-28">

    {{-- Background --}}
    <div
        class="absolute -left-40 top-10 h-[420px] w-[420px] rounded-full bg-blue-100/70 blur-3xl">
    </div>

    <div
        class="absolute -right-40 bottom-0 h-[420px] w-[420px] rounded-full bg-indigo-100/70 blur-3xl">
    </div>





    <div
        class="section-container relative">

        {{-- =============================== --}}
        {{-- Heading --}}
        {{-- =============================== --}}

        <div
            class="mx-auto mb-20 max-w-3xl text-center"
            data-aos="fade-up">

            <span
                class="inline-flex items-center gap-2 rounded-full bg-blue-100 px-5 py-2 font-semibold text-blue-700">

                <span
                    class="h-2 w-2 rounded-full bg-blue-600">
                </span>

                Frequently Asked Questions

            </span>





            <h2
                class="mt-6 text-4xl font-black leading-tight text-slate-900 md:text-5xl xl:text-6xl">

                Pertanyaan yang

                <span
                    class="bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">

                    Sering Ditanyakan

                </span>

            </h2>





            <p
                class="mx-auto mt-8 max-w-3xl text-lg leading-9 text-slate-600">

                Temukan jawaban mengenai proses pendaftaran,
                program pelatihan, biaya, sertifikat,
                hingga penempatan kerja di Jepang.

            </p>

        </div>








        @if($faqs->count())

            <div
                class="mx-auto max-w-5xl space-y-6">

                @foreach($faqs as $faq)

                    <div
                        x-data="{ open:false }"
                        data-aos="fade-up"
                        data-aos-delay="{{ $loop->index * 80 }}"
                        class="overflow-hidden rounded-[30px] border border-slate-200 bg-white shadow-sm transition duration-300 hover:shadow-xl">

                        {{-- Question --}}
                        <button
                            @click="open=!open"
                            class="flex w-full items-center justify-between px-8 py-7 text-left transition hover:bg-slate-50">

                            <div
                                class="flex items-center gap-5">

                                <div
                                    class="flex h-12 w-12 items-center justify-center rounded-2xl bg-gradient-to-br from-blue-600 to-indigo-600 text-lg font-bold text-white">

                                    ?

                                </div>

                                <h3
                                    class="text-xl font-bold leading-8 text-slate-900">

                                    {{ $faq->question }}

                                </h3>

                            </div>





                            <div
                                class="ml-8">

                                <div
                                    x-show="!open"
                                    class="flex h-11 w-11 items-center justify-center rounded-full bg-blue-100 text-blue-600">

                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-6 w-6"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor">

                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M12 5v14m7-7H5"/>

                                    </svg>

                                </div>





                                <div
                                    x-show="open"
                                    x-cloak
                                    class="flex h-11 w-11 items-center justify-center rounded-full bg-red-100 text-red-500">

                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-6 w-6"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor">

                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M5 12h14"/>

                                    </svg>

                                </div>

                            </div>

                        </button>





                        {{-- Answer --}}
                        <div
                            x-show="open"
                            x-collapse
                            x-cloak>

                            <div
                                class="border-t border-slate-100 px-8 pb-8 pt-6 leading-8 text-slate-600">
                                                                {!! nl2br(e($faq->answer)) !!}

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

                    Masih memiliki pertanyaan yang belum terjawab?

                </p>

                <a
                    href="#contact"
                    class="inline-flex items-center gap-3 rounded-2xl bg-gradient-to-r from-blue-600 to-indigo-600 px-8 py-4 font-semibold text-white shadow-xl transition duration-300 hover:-translate-y-1 hover:shadow-blue-500/30">

                    Hubungi Kami

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
                class="mx-auto max-w-3xl rounded-[36px] border border-slate-200 bg-white px-10 py-24 text-center shadow-sm">

                <div
                    class="mx-auto flex h-24 w-24 items-center justify-center rounded-full bg-blue-100 text-5xl">

                    ❓

                </div>

                <h3
                    class="mt-8 text-3xl font-black text-slate-900">

                    Belum Ada FAQ

                </h3>

                <p
                    class="mx-auto mt-5 max-w-xl text-lg leading-8 text-slate-500">

                    Pertanyaan yang sering diajukan akan ditampilkan di sini
                    setelah informasi tersedia.

                </p>

                <a
                    href="#contact"
                    class="mt-10 inline-flex rounded-2xl border border-blue-600 px-8 py-4 font-semibold text-blue-600 transition hover:bg-blue-600 hover:text-white">

                    Hubungi Kami

                </a>

            </div>

        @endif

    </div>

</section>