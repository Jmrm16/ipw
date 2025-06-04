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
     * Mostrar la vista de login (Blade).
     */
    public function create(Request $request)
    {
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

        // 1. Si Laravel ya tiene una URL protegida guardada (automático)
        if (session()->has('url.intended')) {
            return redirect()->intended(route('dashboard'));
        }

        // 2. Si manualmente guardaste una URL anterior
        if (session()->has('redirect_after_login')) {
            $url = session()->pull('redirect_after_login');

            // O redireccionas condicionalmente
            if (str_contains($url, 'seguros/medicos')) {
                return redirect()->route('formulario.create');
            }

            return redirect($url);
        }

        // 3. Fallback por defecto
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
