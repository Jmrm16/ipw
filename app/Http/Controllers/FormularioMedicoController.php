<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormularioMedico;
use App\Models\Notificacion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class FormularioMedicoController extends Controller
{
    public function create()
    {
        return view('pages.formulario');
    }


public function iniciarCumplimiento(Request $request)
{
    if (!Auth::check()) {
        return response()->json(['error' => 'No autenticado'], 401);
    }

    $formulario = FormularioMedico::create([
        'user_id' => Auth::id(),
        'tipo_proceso' => 'cumplimiento',
    ]);

    return response()->json(['success' => true], 200);
}


 public function store(Request $request)
{
    // Validar si el usuario está autenticado
    if (!Auth::check()) {
        return redirect()->route('login')->withErrors('Debe iniciar sesión para completar el formulario.');
    }

    // Asegurarse de que se capturen solo los campos rellenables
    $data = $request->only((new FormularioMedico)->getFillable());

    // Agregar el user_id del usuario autenticado
    $data['user_id'] = Auth::id();

    // Crear el registro en la base de datos
    $formulario = FormularioMedico::create($data);

    // Crear notificación con data como ARRAY (no json_encode)
    Notificacion::create([
        'tipo' => 'nuevo_formulario',
        'mensaje' => '📥 Nuevo formulario recibido de ' . Auth::user()->name,
        'data' => [
            'user_id' => Auth::id(),
            'formulario_id' => $formulario->id,
            'tipo_proceso'=> $formulario->tipo_proceso,

        ],
    ]);

    return redirect()->route('dashboard')->with('success', 'Formulario guardado correctamente.');
}


public function subirConstanciaPago(Request $request, $id)
{
    $request->validate([
        'documento' => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120', // Máx. 5MB
    ]);

    $formulario = FormularioMedico::where('id', $id)
        ->where('user_id', Auth::id())
        ->firstOrFail();

    $file = $request->file('documento');
    $extension = $file->getClientOriginalExtension();
    $nombreArchivo = 'constancia_pago_' . time() . '.' . $extension;

    // Almacena en storage/app/public/constancias/{id}
    $ruta = $file->storeAs("constancias/{$id}", $nombreArchivo, 'public');

    // Guarda la ruta pública (ej: /storage/constancias/10/constancia_pago_...)
    $formulario->constancia_pago_path = Storage::url($ruta);
    $formulario->save();

    return back()->with('success', 'Constancia de pago enviada correctamente.');
}


}
