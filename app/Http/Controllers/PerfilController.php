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

    public function edit()
    {
        $usuario = Auth::user();
        return view('pages.perfil-edit', compact('usuario'));
    }

    public function update(Request $request)
    {
        $usuario = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'telefono' => 'nullable|string|max:20',
        ]);

        $usuario->update($request->only('name', 'telefono'));

        return redirect()->route('perfil.show')->with('success', 'Perfil actualizado correctamente.');
    }
}
