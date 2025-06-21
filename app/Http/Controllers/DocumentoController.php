<?php

namespace App\Http\Controllers;

use App\Models\DocumentoUsuario;
use App\Models\FormularioMedico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Notificacion;

class DocumentoController extends Controller
{
    // Mostrar lista de documentos requeridos para el formulario más reciente
public function index()
{
    $user = Auth::user();
    $formulario = FormularioMedico::where('user_id', $user->id)->latest()->first();

    if (!$formulario) {
        return view('pages.documentos-vacio');
    }

    // Cargar documentos específicos de este formulario
    $documentosFormulario = DocumentoUsuario::where('user_id', $user->id)
        ->where('formulario_medico_id', $formulario->id)
        ->get()
        ->keyBy('tipo');

    // Cargar documentos generales del usuario (sin formulario asignado)
    $documentosGenerales = DocumentoUsuario::where('user_id', $user->id)
        ->whereNull('formulario_medico_id')
        ->get()
        ->keyBy('tipo');

    // Mezclar: prioridad a los específicos, pero si no hay, usar el general
    $documentos = $documentosGenerales->merge($documentosFormulario);

    $tipos = [
        'cedula',
        'rut',
        'diploma',
        'tarjeta_profesional',
    ];

    return view('pages.documentos', compact('documentos', 'tipos', 'formulario'));
}


public function store(Request $request, FormularioMedico $formulario)
{
    $request->validate([
        'tipo' => 'required|in:cedula,rut,diploma,tarjeta_profesional,formulario_sarlaft,formulario_medico,contrato,cedula_representante,camara_comercio,rut_actualizado,estados_financieros,experiencia_certificada',
        'archivo' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
    ]);

    $user = Auth::user();
    $tipo = $request->tipo;

    // Guardar siempre con el ID del formulario actual (sea médico o cumplimiento)
    $formularioId = $formulario->id;

    // Guardar archivo en carpeta personalizada
    $archivo = $request->file('archivo');
    $nombre = time() . '_' . $archivo->getClientOriginalName();
    $ruta = $archivo->storeAs("documentos_usuario/{$user->id}", $nombre, 'public');

    // Crear o actualizar el documento
    DocumentoUsuario::updateOrCreate(
        [
            'user_id' => $user->id,
            'formulario_medico_id' => $formularioId,
            'tipo' => $tipo,
        ],
        [
            'archivo' => $ruta,
            'estado' => 'subido',
        ]
    );

    // Crear notificación
    Notificacion::create([
        'tipo' => 'documento_subido',
        'mensaje' => "El usuario {$user->name} ha subido el documento: {$tipo}",
        'leida' => false,
        'data' => [
            'user_id' => $user->id,
            'formulario_id' => $formularioId,
            'tipo_proceso' => $formulario->tipo_proceso,
        ],
    ]);

    // Redirección dinámica según tipo de proceso
    $ruta = $formulario->tipo_proceso === 'cumplimiento'
        ? 'documentos.cumplimiento'
        : 'documentos.por_formulario';

    return redirect()->route($ruta, ['formulario' => $formularioId])
        ->with('success', 'Documento subido correctamente.');
}



    // Ver un documento por tipo (usando formulario actual o global)
    public function ver($tipo, $formularioId)
    {
        $user = Auth::user();

        $formulario = FormularioMedico::where('id', $formularioId)
            ->where('user_id', $user->id)
            ->firstOrFail();

        $documento = DocumentoUsuario::where('user_id', $user->id)
            ->where('tipo', $tipo)
            ->where(function ($query) use ($formularioId) {
                $query->where('formulario_medico_id', $formularioId)
                      ->orWhereNull('formulario_medico_id');
            })
            ->firstOrFail();

        return response()->file(storage_path('app/public/' . $documento->archivo));
    }

    // Ver vista de documentos por formulario (usa herencia también)
    public function verPorFormulario($formularioId)
    {
        $user = Auth::user();

        $formulario = FormularioMedico::where('id', $formularioId)
            ->where('user_id', $user->id)
            ->firstOrFail();

        $tipos = [
            'cedula',
            'rut',
            'diploma',
            'tarjeta_profesional',
            'formulario_sarlaft',
            'formulario_medico',
        ];

        $documentos = DocumentoUsuario::where('user_id', $user->id)
            ->where(function ($query) use ($formularioId) {
                $query->whereNull('formulario_medico_id')
                      ->orWhere('formulario_medico_id', $formularioId);
            })
            ->get()
            ->keyBy('tipo');

        return view('pages.documentos', compact('documentos', 'tipos', 'formulario'));
    }


    public function verPorFormularioCumplimiento($formularioId)
{
    $user = Auth::user();

    $formulario = FormularioMedico::where('id', $formularioId)
        ->where('user_id', $user->id)
        ->firstOrFail();

    $tipos = [
        'contrato',
        'cedula_representante',
        'camara_comercio',
        'rut_actualizado',
        'estados_financieros',
        'experiencia_certificada',
    ];

    $documentos = DocumentoUsuario::where('user_id', $user->id)
        ->where(function ($query) use ($formularioId) {
            $query->whereNull('formulario_medico_id')
                  ->orWhere('formulario_medico_id', $formularioId);
        })
        ->get()
        ->keyBy('tipo');

    return view('pages.documentos_cumplimiento', compact('documentos', 'tipos', 'formulario'));
}

public function verCumplimiento($formularioId)
{
    $user = Auth::user();

    $formulario = FormularioMedico::where('id', $formularioId)
        ->where('user_id', $user->id)
        ->firstOrFail();

    $tipos = [
        'formulario_sarlaft', // ✅ Añadido para incluir el SARLAFT firmado
        'contrato',
        'cedula_representante',
        'camara_comercio',
        'rut_actualizado',
        'estados_financieros',
        'experiencia_certificada',
    ];

    $documentos = DocumentoUsuario::where('user_id', $user->id)
        ->where('formulario_medico_id', $formularioId)
        ->get()
        ->keyBy('tipo');

    return view('pages.documentos_cumplimiento', compact('documentos', 'tipos', 'formulario'));
}

public function cumplimiento(FormularioMedico $formulario)
{
    // Puedes aplicar lógica adicional si quieres validar tipo
    if ($formulario->tipo_proceso !== 'cumplimiento') {
        abort(403, 'Este formulario no es de tipo cumplimiento.');
    }

return view('pages.documentos_cumplimiento', [
    'formulario' => $formulario,
    'tipo' => 'cumplimiento'
]);

}




}
