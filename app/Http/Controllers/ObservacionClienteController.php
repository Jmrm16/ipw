<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\FormularioMedico;
use App\Models\Observacion;

class ObservacionClienteController extends Controller
{
    /**
     * Mostrar las observaciones del cliente autenticado.
     */
    public function index()
    {
        $user = Auth::user();

        // Obtener todos los formularios del usuario con sus observaciones y el creador de cada observación
        $formularios = FormularioMedico::where('user_id', $user->id)
            ->with(['observaciones' => function ($query) {
                $query->with('creadoPor')->latest();
            }])
            ->latest()
            ->get();

        return view('pages.observaciones', compact('formularios'));
    }

    public function marcarComoResuelta($id)
{
    $observacion = Observacion::findOrFail($id);

    // Asegurarse de que el usuario tiene permiso para modificar esta observación
    if ($observacion->formularioMedico->user_id !== Auth::id()) {
        abort(403, 'No autorizado.');
    }

    $observacion->estado = 'finalizado';
    $observacion->save();

    return back()->with('success', 'Observación marcada como resuelta.');
}

    public function verPorFormulario($id)
{
    $formulario = \App\Models\FormularioMedico::with([
        'observaciones' => function ($q) {
            $q->with('creadoPor')->orderBy('created_at');
        }
    ])->where('user_id', Auth::id())->findOrFail($id);

    return view('pages.observaciones-formulario', compact('formulario'));
}


public function responder(Request $request, $id)
{
    $request->validate([
        'respuesta' => 'required|string|max:1000',
    ]);

    $observacion = \App\Models\Observacion::findOrFail($id);

    if ($observacion->formularioMedico->user_id !== Auth::id()) {
        abort(403, 'No autorizado.');
    }

    $observacion->respuesta = $request->respuesta;
    $observacion->resuelta = true;
    $observacion->estado = 'finalizado'; // opcional según tu lógica
    $observacion->save();

    return back()->with('success', 'Observación respondida correctamente.');
}



}
