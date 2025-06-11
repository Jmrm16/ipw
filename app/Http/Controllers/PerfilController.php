<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerfilController extends Controller
{
    public function show()
    {
        $usuario = Auth::user();
        return view('pages.perfil', compact('usuario'));
    }

// PerfilController.php
public function edit()
{
    return view('pages.perfil-edit');
}

public function update(Request $request)
{
    $user = Auth::user();

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'password' => 'nullable|min:6|confirmed',
    ]);

    $user->name = $request->name;
    $user->email = $request->email;

    if ($request->filled('password')) {
        $user->password = bcrypt($request->password);
    }

    $user->save();

    return redirect()->route('perfil.show')->with('success', 'Perfil actualizado correctamente.');
}

public function editPassword()
{
    return view('pages.perfil-password');
}

public function updatePassword(Request $request)
{
    $request->validate([
        'password' => 'required|min:6|confirmed',
    ]);

    $user = Auth::user();
    $user->password = bcrypt($request->password);
    $user->save();

    return redirect()->route('perfil.password')->with('success', 'Contraseña actualizada correctamente.');
}


}
