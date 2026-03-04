<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">

        <title>{{ config('app.name', 'ILANDS SOLUTIONS | AI Tax Strategies') }}</title>
        <meta name="description" content="Optimize your tax profile with AI-powered insights. Specialized for gig workers, freelancers, and expats.">
        <meta name="robots" content="index, follow">

        {{-- open grah --}}
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:title" content="ILANDS SOLUTIONS | Smart AI Tax Report">
        <meta property="og:description" content="Discover missed deductions and plan your tax year with our advanced AI analysis.">
        <meta property="og:image" content="{{ asset('logo.png') }}">
        <meta property="og:site_name" content="ILANDS SOLUTIONS">

        {{-- twitter --}}
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:url" content="{{ url()->current() }}">
        <meta name="twitter:title" content="ILANDS SOLUTIONS | AI Tax Strategies">
        <meta name="twitter:description" content="Get your comprehensive tax profile and AI-powered report in 10 minutes.">
        <meta name="twitter:image" content="{{ asset('logo.png') }}">

        {{-- mobile --}}
        <meta name="theme-color" content="#16a34a" media="(prefers-color-scheme: light)">
        <meta name="theme-color" content="#000000" media="(prefers-color-scheme: dark)">
        @if(request()->routeIs('dashboard*'))
    <meta name="robots" content="noindex, nofollow">
@endif

        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
                <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script>
    // Vérifie la préférence enregistrée ou celle du système
    if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark');
    }
</script>
        @livewireStyles
    </head>
    <body     x-data="{ dark: true }"
    :class="dark ? 'dark bg-black text-white' : 'bg-gray-100 text-gray-900'"      
    class="transition duration-500">
      @include('components.navbar')
               {{ $slot }}
         
    @include('components.footer')
   
    <script src="https://unpkg.com/lucide@latest"></script>

    <script>


    function toggleDarkMode() {
  
        if (document.documentElement.classList.contains('dark')) {
            document.documentElement.classList.remove('dark');
            localStorage.setItem('theme', 'light');
        } else {
            document.documentElement.classList.add('dark');
            localStorage.setItem('theme', 'dark');
        }
    }
</script>
<script>
    lucide.createIcons();
</script>
 @livewireScripts
    </body>
</html>
