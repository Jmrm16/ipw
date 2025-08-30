<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;

class NewPasswordController extends Controller
{
    /**
     * Mostrar la vista de restablecimiento de contraseña.
     */
    public function create(Request $request)
    {
        return view('auth.reset-password', [
            'email' => $request->email,
            'token' => $request->route('token'),
        ]);
    }

    /**
     * Procesar la solicitud de nueva contraseña.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

$status = Password::broker('users')->reset(
    $request->only('email','password','password_confirmation','token'),
    function ($user) use ($request) {
        // 🔎 Log para confirmar que entramos al callback y qué usuario es
        Log::info('RESET OK', ['user_id' => $user->id, 'email' => $user->email]);

        $user->forceFill([
            'password' => \Illuminate\Support\Facades\Hash::make($request->password),
            'remember_token' => \Illuminate\Support\Str::random(60),
        ])->save();
    }
);



        if ($status === Password::PASSWORD_RESET) {
            return redirect()->route('login')->with('status', __($status));
        }

        throw ValidationException::withMessages([
            
            'email' => [__($status)],
            
        ]);
    }
}
