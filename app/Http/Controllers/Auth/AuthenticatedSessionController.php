<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // Récupération de l'utilisateur connecté
$user = $request->user();
 if ($user->role->value === 'admin') {
        return redirect()->to('/admin/dashboard'); 
    }

    return redirect()->to('/dashboard');
  }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function avatar(Request $request){
       
        $request->validate([
            'avatar' => 'required|file|mimes:jpg,png,jpeg,webp|max:2048',
        ]);

        $user = Auth::user();

        if($request->hasFile('avatar') && $request->file('avatar')->isValid()){
            $path = $request->file('avatar')->store('uploads','public');

            $user->update(['avatar_path' => $path]);

            return back()->with('success', 'image updated succefully! ');
        }
    }
}
