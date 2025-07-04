<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Mostrar la página de registro.
     */
 public function create(Request $request)
{
    // Guardar redirección si se pasa por parámetro
    if ($request->has('redirect_to')) {
        session(['register_redirect' => $request->query('redirect_to')]);
    }

    return view('auth.register');
}

    /**
     * Procesar la solicitud de registro.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        // REDIRECCIÓN PERSONALIZADA DESPUÉS DEL REGISTRO
        if (session()->has('register_redirect')) {
            $url = session()->pull('register_redirect');

            // Si la url contiene "seguros/medicos", redirige a formulario.create
            if (str_contains($url, 'seguros/medicos')) {
                return redirect()->route('formulario.create');
            }
            // O simplemente redirige a la url guardada
            return redirect($url);
        }

        // Fallback por defecto
        return redirect()->route('dashboard');
    }
}
