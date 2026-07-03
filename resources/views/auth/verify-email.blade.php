<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center px-6 py-12 bg-gray-50 dark:bg-gray-950">

        <div
            class="w-full max-w-lg rounded-3xl border border-gray-200 dark:border-gray-800 bg-white dark:bg-gray-900 shadow-xl overflow-hidden">

            <!-- Header -->
            <div
                class="px-8 py-10 bg-gradient-to-r from-indigo-600 to-violet-600 text-white text-center">

                <div
                    class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-white/20 backdrop-blur">

                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-8 w-8"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M16 12l-4-4-4 4m8 0l-4 4-4-4" />
                    </svg>

                </div>

                <h1 class="mt-5 text-2xl font-bold">
                    Verify your email
                </h1>

                <p class="mt-2 text-sm text-indigo-100">
                    One last step before accessing your workspace.
                </p>

            </div>

            <!-- Body -->
            <div class="px-8 py-8">

                <p class="text-gray-600 dark:text-gray-300 leading-7">

                    We've sent a verification link to the email address you used
                    during registration.

                    <br><br>

                    Click the link inside your inbox to activate your account.

                    If you didn't receive the email, you can request another one
                    below.

                </p>

                @if (session('status') === 'verification-link-sent')

                    <div
                        class="mt-6 rounded-xl border border-green-200 dark:border-green-800 bg-green-50 dark:bg-green-900/30 px-4 py-4">

                        <div class="flex items-start">

                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5 text-green-600 mt-0.5"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor">

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M5 13l4 4L19 7"/>

                            </svg>

                            <p class="ml-3 text-sm text-green-700 dark:text-green-300">

                                A new verification email has been sent successfully.

                            </p>

                        </div>

                    </div>

                @endif

                <div class="mt-8 space-y-4">

                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf

                        <button
                            type="submit"
                            class="w-full inline-flex justify-center items-center rounded-xl bg-indigo-600 hover:bg-indigo-700 transition-all duration-200 px-5 py-3 font-semibold text-white shadow-lg shadow-indigo-500/20">

                            Resend Verification Email

                        </button>

                    </form>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button
                            type="submit"
                            class="w-full rounded-xl border border-gray-300 dark:border-gray-700 px-5 py-3 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 transition">

                            Log Out

                        </button>

                    </form>

                </div>

            </div>

            <!-- Footer -->
            <div
                class="border-t border-gray-200 dark:border-gray-800 px-8 py-5 text-center">

                <p class="text-xs text-gray-500 dark:text-gray-400">

                    Having trouble receiving the email?
                    Check your Spam folder or wait a few minutes before requesting
                    another verification link.

                </p>

            </div>

        </div>

    </div>
</x-guest-layout>