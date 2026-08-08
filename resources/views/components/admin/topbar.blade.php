
<header
    class="sticky top-0 z-30 flex h-16 items-center justify-end border-b border-slate-200 bg-white/80 px-6 backdrop-blur-xl lg:px-8">

    <div class="flex items-center gap-3">

        {{-- ========================================================= --}}
        {{-- NOTIFICATION --}}
        {{-- ========================================================= --}}

        <div
            x-data="{ notificationOpen: false }"
            class="relative">

            @php
                $notifications = auth()->user()->unreadNotifications;
                $notificationCount = $notifications->count();
            @endphp

            {{-- Notification Button --}}
            <button
                type="button"
                @click="notificationOpen = !notificationOpen"
                class="group relative flex h-11 w-11 items-center justify-center rounded-2xl border border-slate-200 bg-white text-slate-500 shadow-sm transition-all duration-200 hover:-translate-y-0.5 hover:border-blue-200 hover:bg-blue-50 hover:text-blue-600 hover:shadow-md">

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5 transition-transform duration-200 group-hover:scale-110"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2">

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6 6 0 10-12 0v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1" />

                </svg>

                {{-- Notification Badge --}}
                @if ($notificationCount > 0)

                    <span
                        class="absolute -right-1 -top-1 flex h-5 min-w-5 items-center justify-center rounded-full bg-red-500 px-1 text-[10px] font-bold text-white ring-2 ring-white">

                        {{ $notificationCount > 9 ? '9+' : $notificationCount }}

                    </span>

                @endif

            </button>


            {{-- ========================================================= --}}
            {{-- NOTIFICATION DROPDOWN --}}
            {{-- ========================================================= --}}

            <div
                x-show="notificationOpen"
                @click.away="notificationOpen = false"
                x-transition
                class="absolute right-0 z-50 mt-3 w-96 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-2xl"
                style="display: none;">

                {{-- Dropdown Header --}}
                <div
                    class="flex items-center justify-between border-b border-slate-100 px-5 py-4">

                    <div>

                        <h3 class="font-bold text-slate-900">
                            Notifikasi
                        </h3>

                        <p class="mt-1 text-xs text-slate-500">
                            Informasi terbaru yang perlu ditangani
                        </p>

                    </div>

                    @if ($notificationCount > 0)

                        <span
                            class="rounded-full bg-red-100 px-3 py-1 text-xs font-bold text-red-600">

                            {{ $notificationCount }} Baru

                        </span>

                    @endif

                </div>


                {{-- ===================================================== --}}
                {{-- NOTIFICATION LIST --}}
                {{-- ===================================================== --}}

                <div class="max-h-[420px] overflow-y-auto">

                    @forelse ($notifications as $notification)

                        <form
                            method="POST"
                            action="{{ route('notifications.read', $notification->id) }}">

                            @csrf

                            <button
                                type="submit"
                                class="flex w-full gap-4 border-b border-slate-100 px-5 py-4 text-left transition hover:bg-blue-50">

                                {{-- Notification Icon --}}
                                <div
                                    class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl
                                    {{ ($notification->data['type'] ?? '') === 'payment'
                                        ? 'bg-emerald-100 text-emerald-600'
                                        : 'bg-blue-100 text-blue-600' }}">

                                    @if (($notification->data['type'] ?? '') === 'payment')

                                        {{-- Payment Icon --}}
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="h-5 w-5"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            stroke-width="2">

                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M12 8c-2.21 0-4 1.343-4 3s1.79 3 4 3 4 1.343 4 3-1.79 3-4 3m0-12V5m0 14v-2M7 8l-2-2m14 0l-2 2" />

                                        </svg>

                                    @else

                                        {{-- Registration Icon --}}
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="h-5 w-5"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            stroke-width="2">

                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M18 20a6 6 0 00-12 0M12 14a4 4 0 100-8 4 4 0 000 8z" />

                                        </svg>

                                    @endif

                                </div>


                                {{-- Notification Content --}}
                                <div class="min-w-0 flex-1">

                                    <p class="text-sm font-bold text-slate-800">
                                        {{ $notification->data['title'] ?? 'Notifikasi' }}
                                    </p>

                                    <p class="mt-1 text-sm text-slate-600">
                                        {{ $notification->data['message'] ?? '' }}
                                    </p>

                                    <p class="mt-1 text-xs text-slate-400">
                                        {{ $notification->created_at->diffForHumans() }}
                                    </p>

                                </div>


                                {{-- Unread Indicator --}}
                                <span
                                    class="mt-1 h-2.5 w-2.5 shrink-0 rounded-full
                                    {{ ($notification->data['type'] ?? '') === 'payment'
                                        ? 'bg-emerald-500'
                                        : 'bg-blue-500' }}">
                                </span>

                            </button>

                        </form>

                    @empty

                        {{-- Empty State --}}
                        <div class="px-6 py-12 text-center">

                            <div
                                class="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-slate-100">

                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-7 w-7 text-slate-400"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="2">

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6 6 0 10-12 0v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1" />

                                </svg>

                            </div>

                            <p class="mt-4 font-semibold text-slate-700">
                                Tidak ada notifikasi baru
                            </p>

                            <p class="mt-1 text-sm text-slate-400">
                                Semua aktivitas sudah dibaca.
                            </p>

                        </div>

                    @endforelse

                </div>


                {{-- ===================================================== --}}
                {{-- NOTIFICATION FOOTER --}}
                {{-- ===================================================== --}}

                @if ($notificationCount > 0)

                    <div
                        class="border-t border-slate-100 bg-slate-50 px-5 py-3">

                        <div class="flex items-center justify-between">

                            <a
                                href="{{ route('registrations.index') }}"
                                class="text-xs font-semibold text-blue-600 transition hover:text-blue-800">

                                Lihat Pendaftaran

                            </a>

                            <a
                                href="{{ route('registration-payments.index') }}"
                                class="text-xs font-semibold text-emerald-600 transition hover:text-emerald-800">

                                Lihat Pembayaran

                            </a>

                        </div>

                    </div>

                @endif

            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- DIVIDER --}}
        {{-- ========================================================= --}}

        <div class="mx-2 h-6 w-px bg-slate-200"></div>


        {{-- ========================================================= --}}
        {{-- PROFILE DROPDOWN --}}
        {{-- ========================================================= --}}

        <div
            x-data="{ open: false }"
            class="relative">

            {{-- Profile Button --}}
            <button
                type="button"
                @click="open = !open"
                class="flex items-center gap-3 rounded-xl border border-slate-200 bg-white px-3 py-1.5 shadow-sm transition hover:border-blue-200 hover:bg-slate-50">

                {{-- Avatar --}}
                <div
                    class="flex h-10 w-10 shrink-0 items-center justify-center overflow-hidden rounded-full bg-gradient-to-br from-blue-600 to-indigo-600 text-sm font-bold text-white shadow">

                    @if (auth()->user()->profile_photo)
                        <img
                            src="{{ asset('storage/' . auth()->user()->profile_photo) }}"
                            alt="{{ auth()->user()->name }}"
                            class="h-full w-full object-cover">
                    @else
                        {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                    @endif

                </div>


                {{-- User Information --}}
                <div class="hidden text-left lg:block">

                    <p class="text-sm font-semibold text-slate-800">
                        {{ auth()->user()->name }}
                    </p>

                    <p class="text-xs text-slate-500">
                        Administrator
                    </p>

                </div>


                {{-- Arrow --}}
                <svg
                    class="hidden h-4 w-4 text-slate-400 transition duration-200 lg:block"
                    :class="{ 'rotate-180': open }"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2">

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M19 9l-7 7-7-7" />

                </svg>

            </button>


            {{-- Profile Dropdown --}}
            <div
                x-show="open"
                @click.away="open = false"
                x-transition
                class="absolute right-0 mt-3 w-56 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-xl"
                style="display: none;">

                {{-- Profile Information --}}
                <div class="border-b border-slate-100 px-5 py-4">

                    <p class="font-semibold text-slate-800">
                        {{ auth()->user()->name }}
                    </p>

                    <p class="mt-1 text-sm text-slate-500">
                        {{ auth()->user()->email }}
                    </p>

                </div>


                {{-- Profile Coming Soon --}}
                <button
                    type="button"
                    disabled
                    class="flex w-full cursor-not-allowed items-center gap-3 px-5 py-3 text-left text-sm text-slate-400">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M5.121 17.804A9 9 0 1118.88 17.8M15 11a3 3 0 11-6 0 3 3 0 016 0z" />

                    </svg>

                    Profile

                    <span class="ml-auto text-xs">
                        Soon
                    </span>

                </button>


                {{-- Logout --}}
                <form
                    method="POST"
                    action="{{ route('logout') }}">

                    @csrf

                    <button
                        type="submit"
                        class="flex w-full items-center gap-3 px-5 py-3 text-left text-sm font-medium text-red-600 transition hover:bg-red-50">

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2">

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />

                        </svg>

                        Logout

                    </button>

                </form>

            </div>

        </div>

    </div>

</header>

