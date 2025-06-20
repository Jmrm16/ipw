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
        // Guarda manualmente la URL de retorno si se pasa como parámetro ?from=
        if ($request->has('from')) {
            session(['redirect_after_login' => $request->get('from')]);
        }

        return Socialite::driver('google')->redirect();
    }

    /**
     * Maneja la respuesta de Google después de autenticarse.
     */
    public function handleGoogleCallback()
    {
        try {
            // Obtener usuario autenticado desde Google
            $googleUser = Socialite::driver('google')->user();

            // Buscar o crear usuario local
            $user = User::firstOrCreate(
                ['email' => $googleUser->getEmail()],
                [
                    'name' => $googleUser->getName(),
                    'email_verified_at' => now(),
                    'password' => bcrypt(uniqid()) // Contraseña aleatoria
                ]
            );

            // Iniciar sesión con el usuario
            Auth::login($user, true);

            // 1. Prioridad: usar la URL intended guardada automáticamente por Laravel
            if (session()->has('url.intended')) {
                return redirect()->intended();
            }

            // 2. Redirección personalizada (usando ?from=)
            if (session()->has('redirect_after_login')) {
                $url = session()->pull('redirect_after_login');

                // Si viene de seguros médicos, ir al formulario directamente
                if (str_contains($url, 'seguros/medicos')) {
                    return redirect()->route('formulario.create');
                }

                // Redirigir a cualquier otra URL personalizada (ej. seguros/Cumplimiento#abrir-modal)
                return redirect($url);
            }

            // 3. Redirección por defecto
            return redirect()->route('dashboard');

        } catch (\Exception $e) {
            Log::error('Google Auth Error: ' . $e->getMessage());
            return redirect('/')->with('error', 'No se pudo iniciar sesión con Google.');
        }
    }
}
