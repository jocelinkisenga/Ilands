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
    </head>
    <body >
<div class="min-h-screen bg-black text-white flex flex-col items-center justify-center px-6 py-12">
    
    <div class="mb-6 text-center">
        <h1 class="text-3xl font-black tracking-tighter uppercase text-white">
            CRÉER UN <span class="text-green-500 underline decoration-green-500/30">PROFIL FISCAL</span>
        </h1>
        <p class="text-gray-400 mt-2">Sécurisez vos données avec un chiffrement de niveau bancaire.</p>
    </div>

    <div class="max-w-md w-full bg-white/5 border border-green-500/20 rounded-3xl p-8 shadow-2xl">
        <form method="POST" action="{{ route('register') }}" class="space-y-5">
            @csrf
            
            <div>
                <label class="block text-xs font-bold uppercase tracking-widest text-green-500 mb-2">Prénom & Nom</label>
                <input type="text" name="name" value="{{ old('name') }}" required
                       class="w-full bg-black border border-white/10 rounded-xl p-4 focus:border-green-500 outline-none transition text-white">
                @error('name') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-widest text-green-500 mb-2">Email</label>
                <input type="email" name="email" value="{{ $email ?? old('email') }}" required
                       class="w-full bg-black border border-white/10 rounded-xl p-4 focus:border-green-500 outline-none transition text-white">
                @error('email') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-widest text-green-500 mb-2">Mot de passe</label>
                <input type="password" name="password" required
                       class="w-full bg-black border border-white/10 rounded-xl p-4 focus:border-green-500 outline-none transition text-white"
                       placeholder="Min. 8 caractères">
                @error('password') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-widest text-green-500 mb-2">Confirmer le mot de passe</label>
                <input type="password" name="password_confirmation" required
                       class="w-full bg-black border border-white/10 rounded-xl p-4 focus:border-green-500 outline-none transition text-white">
            </div>

            <button type="submit" 
                    class="w-full bg-green-600 hover:bg-green-500 text-white py-4 rounded-xl font-bold transition shadow-lg shadow-green-900/30 mt-4">
                Créer mon compte
            </button>

            <p class="text-center text-gray-500 text-xs mt-4">
                En vous inscrivant, vous acceptez nos <a href="#" class="text-white underline">Conditions d'Utilisation</a> et notre <a href="#" class="text-white underline">Politique de Confidentialité</a>.
            </p>
        </form>
    </div>
</div>
    </body>
</html>
