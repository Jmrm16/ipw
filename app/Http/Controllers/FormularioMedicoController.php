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
        return redirect()->route('login')->with('error', 'Debes iniciar sesión para continuar.');
    }

    $request->validate([
        'tipo_persona' => 'required|in:natural,juridica',
    ]);

    $formulario = FormularioMedico::create([
        'user_id' => Auth::id(),
        'tipo_proceso' => 'cumplimiento',
        'tipo_persona' => $request->input('tipo_persona'),
    ]);

    // URL del SARLAFT
    $sarlaftUrl = $request->input('tipo_persona') === 'juridica'
        ? 'https://sarlaft.segurosmundial.com.co/forms/f/9211808c-f920-4af2-8eaf-d50ee3c3140d'
        : 'https://sarlaft.segurosmundial.com.co/forms/f/92c704c9-1967-4c90-b460-212af6bfa7fd';

    // Mostrar vista que abre el SARLAFT en otra pestaña y redirige al sistema
    return view('pages.ir_a_documentos', [
        'formularioId' => $formulario->id,
        'sarlaftUrl' => $sarlaftUrl,
    ]);
}


public function store(Request $request)
{
    if (!Auth::check()) {
        return redirect()->route('login')->withErrors('Debe iniciar sesión para completar el formulario.');
    }

    $data = $request->only((new FormularioMedico)->getFillable());
    $data['user_id'] = Auth::id();

    $formulario = FormularioMedico::create($data);

    Notificacion::create([
        'tipo' => 'nuevo_formulario',
        'mensaje' => '📥 Nuevo formulario recibido de ' . Auth::user()->name,
        'data' => [
            'user_id' => Auth::id(),
            'formulario_id' => $formulario->id,
            'tipo_proceso'=> $formulario->tipo_proceso,
        ],
    ]);

    return view('pages.redirigir_pdfs', [
        'formularioId' => $formulario->id,
    ]);
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
