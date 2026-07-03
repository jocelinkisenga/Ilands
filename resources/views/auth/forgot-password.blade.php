@extends('layouts.fullscreen-layout')

@section('content')
<div
    class="relative min-h-screen overflow-hidden bg-gradient-to-br from-emerald-50 via-white to-green-100 dark:from-gray-950 dark:via-gray-900 dark:to-emerald-950">

    <!-- Background Decoration -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">

        <div
            class="absolute -top-32 -left-32 h-96 w-96 rounded-full bg-emerald-400/20 blur-3xl">
        </div>

        <div
            class="absolute bottom-0 right-0 h-[28rem] w-[28rem] rounded-full bg-green-500/10 blur-3xl">
        </div>

        <div
            class="absolute top-1/2 left-1/2 h-72 w-72 -translate-x-1/2 -translate-y-1/2 rounded-full bg-emerald-300/10 blur-3xl">
        </div>

    </div>

    <div class="relative z-10 flex min-h-screen items-center justify-center px-6 py-12">

        <div
            class="w-full max-w-lg overflow-hidden rounded-3xl border border-white/30 dark:border-gray-800 bg-white/90 dark:bg-gray-900/90 backdrop-blur-xl shadow-2xl">

            <!-- Header -->

            <div
                class="bg-gradient-to-r from-emerald-600 via-green-600 to-emerald-700 px-10 py-10 text-center">

                <div
                    class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-white/15 backdrop-blur">

                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-10 w-10 text-white"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="1.8">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M16.5 10.5V7.875A4.875 4.875 0 0011.625 3a4.875 4.875 0 00-4.875 4.875V10.5m9.75 0h.75A1.5 1.5 0 0118.75 12v6A1.5 1.5 0 0117.25 19.5h-11A1.5 1.5 0 014.75 18v-6a1.5 1.5 0 011.5-1.5H7" />

                    </svg>

                </div>

                <h1 class="mt-6 text-3xl font-bold tracking-tight text-white">
                    Recover Your Password
                </h1>

                <p class="mt-3 text-sm leading-6 text-emerald-100">

                    

                    Enter the email address associated with your account
                    and we'll send you a secure password reset link.

                </p>

            </div>

            <!-- Body -->

            <div class="px-8 py-8">

                @if(session('status'))

                    <div
                        class="mb-6 rounded-2xl border border-emerald-200 dark:border-emerald-700 bg-emerald-50 dark:bg-emerald-900/20 p-4">

                        <div class="flex items-start">

                            <div
                                class="flex h-10 w-10 items-center justify-center rounded-full bg-emerald-100 dark:bg-emerald-800">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-5 w-5 text-emerald-600"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor">

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M5 13l4 4L19 7"/>

                                </svg>

                            </div>

                            <div class="ml-4">

                                <h3 class="font-semibold text-emerald-700 dark:text-emerald-300">
                                    Email Sent Successfully
                                </h3>

                                <p class="mt-1 text-sm text-emerald-600 dark:text-emerald-400">

                                    {{ session('status') }}

                                </p>

                            </div>

                        </div>

                    </div>

                @endif

                <form
                    method="POST"
                    action="{{ route('password.email') }}"
                    class="space-y-6">

                    @csrf

                    <!-- Email -->

                    <div class="mb-4">

                        <label
                            for="email"
                            class="mb-2 block text-sm font-semibold text-gray-700 dark:text-gray-300">

                            Email Address

                        </label>

                        <div class="relative">

                            <div
                                class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-5 w-5 text-gray-400"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor">

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M16 12H8m8-4H8m8 8H8"/>

                                </svg>

                            </div>

                            <input
                                id="email"
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                required
                                autofocus
                                autocomplete="email"
                                placeholder="you@example.com"
                                class="w-full rounded-2xl border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 py-3.5 pl-12 pr-4 text-gray-900 dark:text-white placeholder:text-gray-400 focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/20 transition duration-300">

                        </div>

                        @error('email')

                            <p class="mt-2 text-sm text-red-500">
                                {{ $message }}
                            </p>

                        @enderror
                    <!-- Security Notice -->

                    <!-- Submit Button -->

                    <button
                        type="submit"
                        class="group mt-6 relative inline-flex w-full items-center justify-center overflow-hidden rounded-2xl bg-gradient-to-r from-emerald-600 via-green-600 to-emerald-700 px-6 py-4 font-semibold text-white shadow-lg shadow-emerald-500/30 transition-all duration-300 hover:-translate-y-0.5 hover:shadow-xl hover:shadow-emerald-500/40 focus:outline-none focus:ring-4 focus:ring-emerald-500/20">

                        <span
                            class="absolute inset-0 bg-white/10 opacity-0 transition-opacity duration-300 group-hover:opacity-100">
                        </span>

                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="mr-2 h-5 w-5"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8m-18 8h18V8H3v8z"/>

                        </svg>

                        Send Password Reset Link

                    </button>

                </form>

                <!-- Divider -->

                <div class="relative my-8">

                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-200 dark:border-gray-700"></div>
                    </div>

                    <div class="relative flex justify-center">

                        <span
                            class="bg-white dark:bg-gray-900 px-4 text-xs uppercase tracking-widest text-gray-400">

                            Remembered your password?

                        </span>

                    </div>

                </div>

                <!-- Back -->

                <a
                    href="{{ route('login') }}"
                    class="group flex items-center justify-center rounded-2xl border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 px-6 py-3.5 font-medium text-gray-700 dark:text-gray-300 transition-all duration-300 hover:border-emerald-500 hover:bg-emerald-50 dark:hover:bg-emerald-900/20">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="mr-2 h-5 w-5 transition-transform duration-300 group-hover:-translate-x-1"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M15 19l-7-7 7-7"/>

                    </svg>

                    Back to Sign In

                </a>

            </div>

            <!-- Footer -->

            <div
                class="border-t border-gray-200 dark:border-gray-800 bg-gray-50 dark:bg-gray-900/40 px-8 py-6">

                <div class="text-center">

                    <p class="text-xs leading-6 text-gray-500 dark:text-gray-400">

                        Need additional assistance?

                        Contact the ILANDS AI support team.
                        We're here to help you regain access securely.

                    </p>

                </div>

            </div>

        </div>

    </div>
        <!-- Theme Switcher -->
    <div class="fixed bottom-6 right-6 z-50">

        <button
            x-data
            @click.prevent="$store.theme.toggle()"
            class="group flex h-14 w-14 items-center justify-center rounded-2xl border border-white/20 dark:border-gray-700 bg-white/80 dark:bg-gray-900/80 backdrop-blur-xl shadow-xl transition-all duration-300 hover:scale-105 hover:shadow-2xl hover:shadow-emerald-500/20">

            <!-- Sun Icon -->
            <svg
                class="h-6 w-6 text-amber-500 transition-all duration-300 dark:hidden group-hover:rotate-180"
                xmlns="http://www.w3.org/2000/svg"
                fill="currentColor"
                viewBox="0 0 24 24">

                <path d="M12 18a6 6 0 100-12 6 6 0 000 12zm0-16a1 1 0 011-1h0a1 1 0 011 1v2a1 1 0 11-2 0V2zm0 18a1 1 0 011 1v0a1 1 0 11-2 0v-2a1 1 0 011-1zm10-8a1 1 0 01-1 1h-2a1 1 0 110-2h2a1 1 0 011 1zM5 12a1 1 0 01-1 1H2a1 1 0 110-2h2a1 1 0 011 1zm13.657-6.657a1 1 0 010 1.414l-1.414 1.414a1 1 0 11-1.414-1.414l1.414-1.414a1 1 0 011.414 0zM8.172 15.828a1 1 0 010 1.414L6.758 18.657a1 1 0 11-1.414-1.414l1.414-1.414a1 1 0 011.414 0zm9.071 2.829a1 1 0 01-1.414 0l-1.414-1.414a1 1 0 111.414-1.414l1.414 1.414a1 1 0 010 1.414zM8.172 8.172a1 1 0 01-1.414 0L5.343 6.758a1 1 0 111.414-1.414l1.414 1.414a1 1 0 010 1.414z"/>

            </svg>

            <!-- Moon Icon -->
            <svg
                class="hidden h-6 w-6 text-emerald-400 transition-all duration-300 dark:block group-hover:-rotate-12"
                xmlns="http://www.w3.org/2000/svg"
                fill="currentColor"
                viewBox="0 0 24 24">

                <path d="M20.742 13.045A8.088 8.088 0 0110.955 3.258a.75.75 0 00-.896-.95A9.5 9.5 0 10121.69 13.94a.75.75 0 00-.949-.895z"/>

            </svg>

        </button>

    </div>

</div>
@endsection
                    </div>