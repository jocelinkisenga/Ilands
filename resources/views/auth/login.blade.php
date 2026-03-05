<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion | TaxAI</title>
    @vite('resources/css/app.css')
</head>
<body >

<div class="min-h-screen bg-black text-white flex flex-col items-center justify-center px-6">
    
    <div class="mb-8 text-center">
        <h1 class="text-3xl font-black tracking-tighter uppercase">
            ILANDS <span class="text-green-500">SOLUTIONS</span>
        </h1>
    </div>

    <div class="max-w-md w-full bg-white/5 border border-green-500/20 rounded-3xl p-8 shadow-2xl">
        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf
            
            <div>
                <label class="block text-xs font-bold uppercase tracking-widest text-green-500 mb-2">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus
                       class="w-full bg-black border border-white/10 rounded-xl p-4 focus:border-green-500 outline-none transition">
                @error('email') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-widest text-green-500 mb-2">Password</label>
                <input type="password" name="password" required
                       class="w-full bg-black border border-white/10 rounded-xl p-4 focus:border-green-500 outline-none transition">
            </div>

            <div class="flex items-center justify-between text-sm">
                <label class="flex items-center">
                    <input type="checkbox" name="remember" class="rounded border-white/10 bg-black text-green-600">
                    <span class="ml-2 text-gray-400">Stay logged in</span>
                </label>
            </div>

            <button type="submit" 
                    class="w-full bg-green-600 hover:bg-green-500 text-white py-4 rounded-xl font-bold transition shadow-lg shadow-green-900/20">
                Se connecter
            </button>
        </form>
    </div>
    <a href="{{route('register')}}" class="text-green-500">you don't have an account? Register her</a>
</div>


{{--     <div class="w-full max-w-md">

        <!-- Logo / Brand -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-slate-800">TaxAI</h1>
            <p class="text-sm text-slate-500 mt-2">
                Connectez-vous à votre espace sécurisé
            </p>
        </div>

        <!-- Card -->
        <div class="bg-white shadow-xl rounded-2xl p-8">

            <!-- Session Status -->
            @if (session('status'))
                <div class="mb-4 text-sm text-green-600 bg-green-50 border border-green-200 p-3 rounded-lg">
                    {{ session('status') }}
                </div>
            @endif

            <!-- Errors -->
            @if ($errors->any())
                <div class="mb-4 text-sm text-red-600 bg-red-50 border border-red-200 p-3 rounded-lg">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Email -->
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autofocus
                        class="w-full px-4 py-2.5 border border-slate-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition"
                        placeholder="exemple@email.com"
                    >
                </div>

                <!-- Password -->
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">
                        Mot de passe
                    </label>

                    <input
                        type="password"
                        name="password"
                        required
                        class="w-full px-4 py-2.5 border border-slate-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition"
                        placeholder="••••••••"
                    >
                </div>

                <!-- Remember -->
                <div class="flex items-center justify-between text-sm">
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="remember" class="rounded border-slate-300 text-indigo-600 focus:ring-indigo-500">
                        <span class="text-slate-600">Se souvenir de moi</span>
                    </label>

                    <a href="#" class="text-indigo-600 hover:text-indigo-700 font-medium">
                        Mot de passe oublié ?
                    </a>
                </div>

                <!-- Button -->
                <button
                    type="submit"
                    class="w-full bg-indigo-600 text-white py-2.5 rounded-xl font-semibold hover:bg-indigo-700 transition shadow-md hover:shadow-lg"
                >
                    Se connecter
                </button>
            </form>
        </div>

        <!-- Footer -->
        <p class="text-center text-sm text-slate-500 mt-6">
            Pas encore inscrit ?
            <a href="/register" class="text-indigo-600 font-medium hover:text-indigo-700">
                Créer un compte
            </a>
        </p>

    </div> --}}

</body>
</html>