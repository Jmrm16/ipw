<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\RedirectResponse;

class ConfirmablePasswordController extends Controller
{
    /**
     * Mostrar la vista de confirmación de contraseña.
     */
    public function show()
    {
        return view('auth.confirm-password');
    }

    /**
     * Confirmar la contraseña del usuario.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => ['required'],
        ]);

        if (! Auth::guard('web')->validate([
            'email' => $request->user()->email,
            'password' => $request->password,
        ])) {
            throw ValidationException::withMessages([
                'password' => __('auth.password'),
            ]);
        }

        $request->session()->put('auth.password_confirmed_at', time());

        return redirect()->intended(route('dashboard'));
    }
}
