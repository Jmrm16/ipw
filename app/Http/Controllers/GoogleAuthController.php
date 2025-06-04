<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class GoogleAuthController extends Controller
{
    /**
     * Redirige a Google para autenticación.
     */
    public function redirectToGoogle(Request $request)
    {
        // Guardamos en sesión la URL de donde viene el usuario
        if ($request->has('from')) {
            session(['redirect_after_login' => $request->get('from')]);
        } else {
            session(['redirect_after_login' => url()->previous()]);
        }

        return Socialite::driver('google')->redirect();
    }

    /**
     * Maneja la respuesta de Google.
     */
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            // Buscar o crear el usuario
            $user = User::firstOrCreate(
                ['email' => $googleUser->getEmail()],
                [
                    'name' => $googleUser->getName(),
                    'email_verified_at' => now(),
                    'password' => bcrypt(uniqid())
                ]
            );

            Auth::login($user, true);

            // Obtener la URL guardada en sesión
            $redirectUrl = session('redirect_after_login');

            // Redirigir según el origen
            if ($redirectUrl && str_contains($redirectUrl, 'seguros/medicos')) {
                return redirect()->route('formulario.create');
            }

            return redirect()->route('dashboard');

        } catch (\Exception $e) {
            Log::error('Google Auth Error: ' . $e->getMessage());
            return redirect('/')->with('error', 'No se pudo iniciar sesión con Google.');
        }
    }
}
