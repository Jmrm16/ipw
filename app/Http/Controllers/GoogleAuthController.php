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
        // Si el usuario fue redirigido automáticamente desde una ruta protegida
        // Laravel ya guarda intended en la sesión: no necesitas guardarlo tú manualmente
        // Pero si quieres una URL personalizada, puedes permitirlo así:
        if ($request->has('from')) {
            session(['redirect_after_login' => $request->get('from')]);
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

            $user = User::firstOrCreate(
                ['email' => $googleUser->getEmail()],
                [
                    'name' => $googleUser->getName(),
                    'email_verified_at' => now(),
                    'password' => bcrypt(uniqid())
                ]
            );

            Auth::login($user, true);

            // Primero, si Laravel ya tenía una ruta "intended", la usamos:
            if (session()->has('url.intended')) {
                return redirect()->intended(route('dashboard'));
            }

            // Segundo, si manualmente guardamos una redirección personalizada:
            if (session()->has('redirect_after_login')) {
                $url = session()->pull('redirect_after_login');

                if (str_contains($url, 'seguros/medicos')) {
                    return redirect()->route('formulario.create');
                }

                return redirect($url); // o cualquier otra URL si quieres
            }

            // Fallback por defecto
            return redirect()->route('dashboard');

        } catch (\Exception $e) {
            Log::error('Google Auth Error: ' . $e->getMessage());
            return redirect('/')->with('error', 'No se pudo iniciar sesión con Google.');
        }
    }
}
