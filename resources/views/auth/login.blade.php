<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion | TaxAI</title>
    @vite('resources/css/app.css')
</head>
<body class="min-h-screen bg-gradient-to-br from-slate-50 to-slate-100 flex items-center justify-center px-4">

    <div class="w-full max-w-md">

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

    </div>

</body>
</html>