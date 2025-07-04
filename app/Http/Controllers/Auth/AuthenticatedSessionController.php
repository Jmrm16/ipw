<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\RedirectResponse;

class AuthenticatedSessionController extends Controller
{
    /**
     * Mostrar la vista de login.
     */
    public function create(Request $request)
    {
        // ✅ Guardar redirección si viene desde ?redirect_to=...
        if ($request->has('redirect_to')) {
            session(['redirect_after_login' => $request->query('redirect_to')]);
        }

        return view('auth.login', [
            'canResetPassword' => Route::has('password.request'),
            'status' => $request->session()->get('status'),
        ]);
    }

    /**
     * Procesar el inicio de sesión.
     */
    public function store(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();

            // ✅ 1. Redirección segura de Laravel (por ejemplo, si quiso ir a una ruta protegida)
            if (session()->has('url.intended')) {
                return redirect()->intended(route('dashboard'));
            }

            // ✅ 2. Redirección personalizada si se guardó `redirect_to` previamente
            if (session()->has('redirect_after_login')) {
                $url = session()->pull('redirect_after_login');

                // Redirigir específicamente a formulario.create si vino desde seguros/medicos
                if (str_contains($url, 'seguros/medicos')) {
                    return redirect()->route('formulario.create');
                }

                return redirect($url);
            }

            // ✅ 3. Fallback por defecto
            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'email' => 'Las credenciales ingresadas no son válidas.',
        ])->onlyInput('email');
    }

    /**
     * Cerrar sesión.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
