<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class LitePasswordController extends Controller
{
    public function create()
    {
        return view('auth.forgot-password-lite');
    }

public function store(Request $request)
{
    $data = $request->validate(['email' => ['required','email']]);

    $user = \App\Models\User::where('email', $data['email'])->first();

    // Mensaje neutro si no quieres “cantar” existencia:
    if (! $user || ! $user instanceof \Illuminate\Contracts\Auth\CanResetPassword) {
        return back()->with('status', 'Si el correo existe, podrás restablecer la contraseña.');
    }

    /** @var \Illuminate\Auth\Passwords\PasswordBroker $broker */
    $broker = Password::broker('users');  // usa el broker configurado en config/auth.php

    // ✅ Obtener el repositorio a través del broker (esto SÍ está bindeado)
    $repo = $broker->getRepository(); // \Illuminate\Auth\Passwords\TokenRepositoryInterface

    // ✅ Crear el token sin enviar correo
    $token = $repo->create($user);

    // (opcional) marca de sesión para mitigar abuso
    $request->session()->put('pw_lite_verified_email', $user->getEmailForPasswordReset());

    // Redirige al formulario estándar de reset
    return redirect()->route('password.reset', [
        'token' => $token,
        'email' => $user->getEmailForPasswordReset(),
    ]);
}
}
