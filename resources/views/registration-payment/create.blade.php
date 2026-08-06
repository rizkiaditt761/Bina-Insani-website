@extends('layouts.guest')

@section('title', 'Pembayaran Pendaftaran')

@section('content')

<section
    class="relative overflow-hidden bg-gradient-to-b from-slate-50 via-white to-slate-100 py-24">

    {{-- Background --}}
    <div
        class="absolute -left-32 top-0 h-[420px] w-[420px] rounded-full bg-blue-100 blur-3xl opacity-70">
    </div>

    <div
        class="absolute -right-32 bottom-0 h-[420px] w-[420px] rounded-full bg-indigo-100 blur-3xl opacity-70">
    </div>

    <div
        class="section-container relative">

        {{-- Header --}}
        <div
            class="mx-auto max-w-3xl text-center">

            <span
                class="inline-flex items-center gap-2 rounded-full bg-blue-100 px-5 py-2 font-semibold text-blue-700">

                <span
                    class="h-2 w-2 rounded-full bg-blue-600">
                </span>

                Pembayaran Pendaftaran

            </span>

            <h1
                class="mt-6 text-4xl font-black text-slate-900 md:text-5xl">

                Selesaikan Pembayaran

            </h1>

            <p
                class="mt-6 text-lg leading-8 text-slate-600">

                Silakan lakukan pembayaran sesuai nominal yang tertera.
                Setelah pembayaran berhasil, upload bukti pembayaran agar
                dapat diverifikasi oleh admin.

            </p>

        </div>





        {{-- Alert --}}
        <div
            class="mx-auto mt-10 max-w-5xl rounded-3xl border border-blue-200 bg-blue-50 p-6">

            <div
                class="flex items-start gap-4">

                <div
                    class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-blue-600 text-xl text-white">

                    ℹ️

                </div>

                <div>

                    <h3
                        class="font-bold text-blue-800">

                        Informasi Pembayaran

                    </h3>

                    <p
                        class="mt-2 leading-7 text-blue-700">

                        Pastikan nominal pembayaran sesuai biaya pendaftaran.
                        Pembayaran akan diverifikasi secara manual oleh admin
                        setelah bukti pembayaran berhasil diupload.

                    </p>

                </div>

            </div>

        </div>





        {{-- Payment Card --}}
        <div
            class="mx-auto mt-10 rounded-[36px] border border-slate-200 bg-white p-8 shadow-xl">

            <div
                class="grid gap-10 lg:grid-cols-2">

                {{-- ================================= --}}
                {{-- LEFT : QRIS --}}
                {{-- ================================= --}}

                <div>

                    <h2
                        class="mb-6 text-2xl font-bold text-slate-900">

                        Pembayaran QRIS

                    </h2>

                    <div
                        class="overflow-hidden rounded-3xl border border-slate-200 bg-slate-50 p-6">

                        @if($setting->qris_image)

                            <img
                                src="{{ asset('storage/'.$setting->qris_image) }}"
                                alt="QRIS"
                                class="mx-auto w-full max-w-sm rounded-2xl border bg-white p-4 shadow-sm">

                        @else

                            <div
                                class="flex h-[340px] items-center justify-center rounded-2xl border border-dashed border-slate-300 bg-white">

                                <div
                                    class="text-center">

                                    <div
                                        class="text-5xl">

                                        📷

                                    </div>

                                    <p
                                        class="mt-4 font-semibold text-slate-600">

                                        QRIS Belum Tersedia

                                    </p>

                                </div>

                            </div>

                        @endif

                    </div>

                    <p
                        class="mt-5 text-center text-sm leading-6 text-slate-500">

                        Scan kode QR menggunakan aplikasi pembayaran seperti
                        Mobile Banking, GoPay, OVO, DANA, ShopeePay,
                        atau aplikasi pembayaran lain yang mendukung QRIS.

                    </p>

                </div>





                {{-- ================================= --}}
                {{-- RIGHT : DETAIL --}}
                {{-- ================================= --}}

                <div>

                    <h2
                        class="mb-6 text-2xl font-bold text-slate-900">

                        Detail Pembayaran

                    </h2>

                    {{-- Nominal --}}
                    <div
                        class="rounded-3xl bg-gradient-to-r from-blue-600 to-indigo-600 p-7 text-white shadow-xl">

                        <p
                            class="text-blue-100">

                            Total Pembayaran

                        </p>

                        <h3
                            class="mt-2 text-4xl font-black">

                            Rp {{ number_format($registration->courseClass->registration_fee,0,',','.') }}

                        </h3>

                    </div>





                    {{-- Detail --}}
                    <div
                        class="mt-8 space-y-5">

                        <div
                            class="flex items-center justify-between border-b border-slate-200 pb-4">

                            <span class="text-slate-500">

                                Nomor Registrasi

                            </span>

                            <span class="font-semibold text-slate-800">

                                {{ $registration->registration_number }}

                            </span>

                        </div>

                        <div
                            class="flex items-center justify-between border-b border-slate-200 pb-4">

                            <span class="text-slate-500">

                                Nama Peserta

                            </span>

                            <span class="font-semibold text-slate-800">

                                {{ $registration->full_name }}

                            </span>

                        </div>

                        <div
                            class="flex items-center justify-between border-b border-slate-200 pb-4">

                            <span class="text-slate-500">

                                Program

                            </span>

                            <span class="font-semibold text-slate-800">

                                {{ $registration->courseClass->name }}

                            </span>

                        </div>

                        <div
                            class="flex items-center justify-between">

                            <span class="text-slate-500">

                                Status

                            </span>

                            <span
                                class="rounded-full bg-yellow-100 px-4 py-2 text-sm font-semibold text-yellow-700">

                                Menunggu Pembayaran

                            </span>

                        </div>

                    </div>





                    {{-- Transfer Bank --}}
                    <div
                        class="mt-10 rounded-3xl border border-slate-200 bg-slate-50 p-6">

                        <h3
                            class="text-lg font-bold text-slate-900">

                            Transfer Bank

                        </h3>

                        <div
                            class="mt-5 space-y-4">

                            <div>

                                <p class="text-sm text-slate-500">

                                    Bank

                                </p>

                                <p class="font-semibold">

                                    {{ $setting->bank_name }}

                                </p>

                            </div>

                            <div>

                                <p class="text-sm text-slate-500">

                                    Nomor Rekening

                                </p>

                                <div
                                    class="mt-1 flex items-center gap-3">

                                    <span
                                        id="rekeningNumber"
                                        class="font-bold tracking-wider">

                                        {{ $setting->bank_account_number }}

                                    </span>

                                    <button
    id="copyRekening"
    type="button"
    title="Salin Nomor Rekening"
    class="inline-flex h-11 w-11 items-center justify-center rounded-xl border border-slate-300 bg-white text-slate-600 transition-all duration-300 hover:border-blue-600 hover:text-blue-600">

    {{-- Clipboard --}}
    <svg
        id="clipboardIcon"
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        stroke-width="1.8"
        stroke="currentColor"
        class="h-5 w-5">

        <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125H4.125A1.125 1.125 0 013 20.625V6.375c0-.621.504-1.125 1.125-1.125H6.75m9 12H18a1.125 1.125 0 001.125-1.125V4.875A1.125 1.125 0 0018 3.75h-2.25m0 0A1.125 1.125 0 0014.625 2.625h-5.25A1.125 1.125 0 008.25 3.75m7.5 0h-7.5"/>

    </svg>

    {{-- Check --}}
    <svg
        id="checkIcon"
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        stroke-width="2"
        stroke="currentColor"
        class="hidden h-5 w-5">

        <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M4.5 12.75l6 6 9-13.5"/>

    </svg>

</button>

                                </div>

                            </div>

                            <div>

                                <p class="text-sm text-slate-500">

                                    Atas Nama

                                </p>

                                <p class="font-semibold">

                                    {{ $setting->bank_account_name }}

                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>
                        {{-- ====================================================== --}}
            {{-- Upload Bukti Pembayaran --}}
            {{-- ====================================================== --}}
            {{-- Upload Bukti --}}
<div class="mt-10 border-t border-slate-200 pt-10">

    <h2
        class="mb-6 text-2xl font-bold text-slate-900">

        Upload Bukti Pembayaran

    </h2>

    <form
        action="{{ route('registration.payment.store', $registration->registration_number) }}"
        method="POST"
        enctype="multipart/form-data"
        class="space-y-8">

        @csrf

        <div>

            <input
                id="paymentInput"
                type="file"
                name="payment_proof"
                accept=".jpg,.jpeg,.png,.pdf"
                required
                class="hidden">

            <label
                for="paymentInput"
                class="block cursor-pointer overflow-hidden rounded-3xl border-2 border-dashed border-slate-300 bg-slate-50 transition hover:border-blue-500 hover:bg-blue-50">

                {{-- Preview --}}
                <div
                    class="relative">

                    <img
                        id="paymentPreview"
                        class="hidden h-[420px] w-full object-contain bg-white">

                    <div
                        id="paymentPlaceholder"
                        class="flex h-[420px] flex-col items-center justify-center px-8">

                        <div
                            class="mb-6 flex h-24 w-24 items-center justify-center rounded-full bg-blue-100 text-blue-600">

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-10 w-10"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor">

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4-4m0 0l-4 4m4-4v12"/>

                            </svg>

                        </div>

                        <h3
                            class="text-xl font-bold text-slate-800">

                            Upload Bukti Pembayaran

                        </h3>

                        <p
                            class="mt-3 text-center text-slate-500">

                            Klik untuk memilih gambar atau PDF
                        </p>

                        <p
                            class="mt-1 text-sm text-slate-400">

                            JPG, PNG atau PDF • Maksimal 2 MB

                        </p>

                    </div>

                </div>

            </label>

            <div
                id="selectedFile"
                class="hidden mt-4 rounded-2xl border border-emerald-200 bg-emerald-50 p-4">

                <div
                    class="flex items-center justify-between">

                    <div>

                        <h4
                            class="font-semibold text-emerald-700">

                            ✓ File berhasil dipilih

                        </h4>

                        <p
                            id="fileName"
                            class="mt-1 text-sm text-slate-600">

                        </p>

                    </div>

                    <label
                        for="paymentInput"
                        class="cursor-pointer rounded-xl bg-blue-600 px-5 py-2 text-sm font-semibold text-white transition hover:bg-blue-700">

                        Ubah File

                    </label>

                </div>

            </div>

            @error('payment_proof')

                <p class="mt-3 text-sm text-red-600">

                    {{ $message }}

                </p>

            @enderror

        </div>





                        {{-- Tips --}}
                        <div
                            class="rounded-3xl border border-amber-200 bg-amber-50 p-6">

                            <h3
                                class="font-bold text-amber-700">

                                Tips Upload

                            </h3>

                            <ul
                                class="mt-4 space-y-3 text-sm leading-6 text-amber-700">

                                <li>• Pastikan nominal transfer sesuai.</li>

                                <li>• Foto tidak blur atau terpotong.</li>

                                <li>• Nama pengirim dan nominal terlihat jelas.</li>

                                <li>• Pembayaran akan diverifikasi secara manual.</li>

                            </ul>

                        </div>

                    </div>





                    {{-- RIGHT --}}
                    <div
                        class="space-y-6">

                        <div
                            class="rounded-3xl mt-3 border border-blue-100 bg-blue-50 p-6">

                            <h3
                                class="font-bold text-blue-700">

                                Status Verifikasi

                            </h3>

                            <p
                                class="mt-3 leading-7 text-blue-700">

                                Setelah bukti pembayaran dikirim,
                                admin akan memverifikasi pembayaran Anda.

                                Status pendaftaran dapat dipantau melalui
                                halaman status pendaftaran.

                            </p>

                        </div>





                        <div
                            class="flex flex-col gap-4 sm:flex-row">

                            <a
                                href="{{ route('registration.show', $registration->registration_number) }}"
                                class="flex-1 rounded-2xl border border-slate-300 px-6 py-4 text-center font-semibold text-slate-700 transition hover:border-blue-600 hover:text-blue-600">

                                Lihat Status

                            </a>

                            <button
                                type="submit"
                                class="flex-1 rounded-2xl bg-gradient-to-r from-blue-600 to-indigo-600 px-6 py-4 font-semibold text-white shadow-lg transition hover:-translate-y-1 hover:shadow-xl">

                                Kirim Bukti Pembayaran

                            </button>

                        </div>

                    </div>

                </form>

            </div>

        </div>

    </div>

</section>

@push('scripts')

<script>

const input = document.getElementById('paymentInput');
const preview = document.getElementById('paymentPreview');
const placeholder = document.getElementById('paymentPlaceholder');

input?.addEventListener('change', function(e){

    const file = e.target.files[0];

    if(!file) return;

    if(file.type === 'application/pdf'){

        preview.classList.add('hidden');
        placeholder.classList.remove('hidden');

        placeholder.innerHTML = `
            <div class="text-6xl">📄</div>
            <h3 class="mt-5 text-lg font-semibold text-slate-700">
                File PDF Dipilih
            </h3>
            <p class="mt-2 text-sm text-slate-500">
                ${file.name}
            </p>
        `;

        return;
    }

    const reader = new FileReader();

    reader.onload = function(e){

        preview.src = e.target.result;
        preview.classList.remove('hidden');
        placeholder.classList.add('hidden');

    }

    reader.readAsDataURL(file);

});

document
.getElementById('copyRekening')
?.addEventListener('click', function(){

    navigator.clipboard.writeText(
        document.getElementById('rekeningNumber').innerText
    );

    this.innerText = '✓';

    setTimeout(() => {

        this.innerText = '';

    }, 2000);

});

document.addEventListener('DOMContentLoaded', () => {

    const copyBtn = document.getElementById('copyRekening');
    const clipboardIcon = document.getElementById('clipboardIcon');
    const checkIcon = document.getElementById('checkIcon');



copyBtn?.addEventListener('click', async () => {

    await navigator.clipboard.writeText(
        document.getElementById('rekeningNumber').innerText
    );

    clipboardIcon.classList.add('hidden');
    checkIcon.classList.remove('hidden');

    copyBtn.classList.add(
        'text-green-600',
        'scale-110'
    );

    setTimeout(() => {

        checkIcon.classList.add('hidden');
        clipboardIcon.classList.remove('hidden');

        copyBtn.classList.remove(
            'text-green-600',
            'scale-110'
        );

    }, 1800);

});

});

const paymentInput = document.getElementById('paymentInput');
const paymentPreview = document.getElementById('paymentPreview');
const paymentPlaceholder = document.getElementById('paymentPlaceholder');
const selectedFile = document.getElementById('selectedFile');
const fileName = document.getElementById('fileName');

paymentInput?.addEventListener('change', function () {

    const file = this.files[0];

    if (!file) return;

    fileName.textContent = file.name;

    selectedFile.classList.remove('hidden');

    if (file.type.startsWith('image/')) {

        const reader = new FileReader();

        reader.onload = function (e) {

            paymentPreview.src = e.target.result;

            paymentPreview.classList.remove('hidden');

            paymentPlaceholder.classList.add('hidden');

        }

        reader.readAsDataURL(file);

    } else {

        paymentPreview.classList.add('hidden');

        paymentPlaceholder.classList.remove('hidden');

        paymentPlaceholder.innerHTML = `
            <div class="flex h-full flex-col items-center justify-center">

                <div class="text-7xl">📄</div>

                <h3 class="mt-5 text-xl font-bold text-slate-800">
                    ${file.name}
                </h3>

                <p class="mt-2 text-slate-500">
                    File PDF siap diupload
                </p>

            </div>
        `;

    }

});
</script>

@endpush

@endsection