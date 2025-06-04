<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class EmailVerificationPromptController extends Controller
{
    /**
     * Mostrar la página para solicitar verificación de correo.
     */
    public function __invoke(Request $request): RedirectResponse|\Illuminate\View\View
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(route('dashboard'));
        }

        return view('auth.verify-email', [
            'status' => $request->session()->get('status'),
        ]);
    }
}
