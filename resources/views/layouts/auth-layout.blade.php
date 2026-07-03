<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-50 dark:bg-slate-950 text-slate-900 dark:text-white">

<div class="min-h-screen flex">

    <!-- LEFT (Form) -->
    <div class="w-full lg:w-1/2 flex items-center justify-center px-6 py-12">

        <div class="w-full max-w-md">

            <!-- SLOT -->
            {{ $slot }}

        </div>

    </div>

    <!-- RIGHT (Branding) -->
    <div class="hidden lg:flex w-1/2 relative bg-slate-900">

        <div class="absolute inset-0 bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900"></div>

        <div class="relative z-10 flex flex-col justify-center px-16">

            <h2 class="text-3xl font-bold leading-tight text-white">
                Build smarter decisions
            </h2>

            <p class="mt-4 text-slate-300">
                A clean workspace for reports, analytics and automation.
            </p>

            <div class="mt-10 space-y-4 text-slate-300 text-sm">

                <p>✔ Fast AI-assisted workflows</p>
                <p>✔ Secure authentication system</p>
                <p>✔ Scalable SaaS architecture</p>
                <p>✔ Enterprise-ready design</p>

            </div>

        </div>
    </div>

</div>

</body>
</html>