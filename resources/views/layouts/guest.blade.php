<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body x-data="{ darkMode: window.matchMedia('(prefers-color-scheme: dark)').matches }"
      :class="darkMode ? 'dark bg-slate-900 text-white' : 'bg-slate-50 text-slate-800'"
      class="transition duration-500">
      @include('components.navbar')
                @yield("content")
            
    @include('components.footer')
    @livewireScripts
    <script src="https://unpkg.com/lucide@latest"></script>
<script>
    lucide.createIcons();
</script>
    </body>
</html>
