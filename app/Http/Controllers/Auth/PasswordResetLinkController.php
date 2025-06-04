<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class PasswordResetLinkController extends Controller
{
    /**
     * Mostrar el formulario para solicitar un enlace de restablecimiento.
     */
    public function create(Request $request)
    {
        return view('auth.forgot-password', [
            'status' => $request->session()->get('status'),
        ]);
    }

    /**
     * Procesar la solicitud del enlace de restablecimiento.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        Password::sendResetLink($request->only('email'));

        return back()->with('status', 'Si el correo existe, se enviará un enlace de recuperación.');
    }
}
