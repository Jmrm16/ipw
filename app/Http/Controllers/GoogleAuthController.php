<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log; // ← Agrega esta línea

class GoogleAuthController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

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

            return redirect('/Formulario');

        } catch (\Exception $e) {
            Log::error('Google Auth Error: ' . $e->getMessage()); // ← Ahora sí funcionará
            return redirect('/')->with('error', 'No se pudo iniciar sesión con Google.');
        }
    }
}
