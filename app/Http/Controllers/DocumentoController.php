<?php

namespace App\Http\Controllers;

use App\Models\DocumentoUsuario;
use App\Models\FormularioMedico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        // SOLO documentos heredados (globales)
        $documentos = DocumentoUsuario::where('user_id', $user->id)
            ->whereNull('formulario_medico_id')
            ->get()
            ->keyBy('tipo');

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
    $user = Auth::user();
    $isCumplimiento = $formulario->tipo_proceso === 'cumplimiento';

    // Documentos que deben ser específicos por formulario en pólizas médicas
    $documentosPorFormulario = [
        'formulario_sarlaft',
        'formulario_medico',
        'formulario_oficio',
    ];

    // Subida masiva
    if ($request->has('archivos') && is_array($request->archivos)) {
        $tiposValidos = [
            'contrato',
            'cedula_representante',
            'camara_comercio',
            'rut_actualizado',
            'estados_financieros',
            'experiencia_certificada',
            'formulario_sarlaft',
        ];

        foreach ($request->archivos as $tipo => $archivo) {
            if (!$archivo) continue;

            $request->validate([
                "archivos.$tipo" => 'file|mimes:pdf,jpg,jpeg,png|max:5120',
            ]);

            if (!in_array($tipo, $tiposValidos)) continue;

            $nombre = time() . '_' . $archivo->getClientOriginalName();
            $ruta = $archivo->storeAs("documentos_usuario/{$user->id}", $nombre, 'public');

            // ¿Documento global o por formulario?
            $formularioId = (!$isCumplimiento && in_array($tipo, $documentosPorFormulario))
                ? $formulario->id
                : null;

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

            Notificacion::create([
                'tipo' => 'documento_subido',
                'mensaje' => "El usuario {$user->name} ha subido el documento: {$tipo}",
                'leida' => false,
                'data' => [
                    'user_id' => $user->id,
                    'formulario_id' => $formulario->id,
                    'tipo_proceso' => $formulario->tipo_proceso,
                ],
            ]);
        }
    }

    // Subida individual
    elseif ($request->hasFile('archivo')) {
        $request->validate([
            'tipo' => 'required|in:cedula,rut,diploma,tarjeta_profesional,formulario_sarlaft,formulario_medico,contrato,cedula_representante,camara_comercio,rut_actualizado,estados_financieros,experiencia_certificada,formulario_oficio',
            'archivo' => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120',
        ]);

        $tipo = $request->tipo;
        $archivo = $request->file('archivo');
        $nombre = time() . '_' . $archivo->getClientOriginalName();
        $ruta = $archivo->storeAs("documentos_usuario/{$user->id}", $nombre, 'public');

        $formularioId = (!$isCumplimiento && in_array($tipo, $documentosPorFormulario))
            ? $formulario->id
            : null;

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

        Notificacion::create([
            'tipo' => 'documento_subido',
            'mensaje' => "El usuario {$user->name} ha subido el documento: {$tipo}",
            'leida' => false,
            'data' => [
                'user_id' => $user->id,
                'formulario_id' => $formulario->id,
                'tipo_proceso' => $formulario->tipo_proceso,
            ],
        ]);
    }

    // Redirección dinámica según tipo de proceso
    $ruta = $isCumplimiento
        ? 'documentos.cumplimiento'
        : 'documentos.por_formulario';

    return redirect()->route($ruta, ['formulario' => $formulario->id])
        ->with('success', 'Documento(s) subido(s) correctamente.');
}


    // Ver un documento por tipo (usando global)
    public function ver($tipo, $formularioId)
    {
        $user = Auth::user();

        $formulario = FormularioMedico::where('id', $formularioId)
            ->where('user_id', $user->id)
            ->firstOrFail();

        $documento = DocumentoUsuario::where('user_id', $user->id)
            ->where('tipo', $tipo)
            ->whereNull('formulario_medico_id')
            ->firstOrFail();

        return response()->file(storage_path('app/public/' . $documento->archivo));
    }

    // Vista por formulario (usa heredado)
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
            'formulario_oficio',
        ];

            $documentos = DocumentoUsuario::where('user_id', $user->id)
                ->where(function ($query) use ($formulario) {
                    $query->whereNull('formulario_medico_id')
                        ->orWhere('formulario_medico_id', $formulario->id);
                })
                ->orderByRaw('CASE WHEN formulario_medico_id IS NULL THEN 1 ELSE 0 END') // primero los que tienen formulario_id
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
            'formulario_sarlaft',
        ];

        $documentos = DocumentoUsuario::where('user_id', $user->id)
            ->whereNull('formulario_medico_id')
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
            'formulario_sarlaft',
            'contrato',
            'cedula_representante',
            'camara_comercio',
            'rut_actualizado',
            'estados_financieros',
            'experiencia_certificada',
        ];

        $documentos = DocumentoUsuario::where('user_id', $user->id)
            ->whereNull('formulario_medico_id')
            ->get()
            ->keyBy('tipo');

        return view('pages.documentos_cumplimiento', compact('documentos', 'tipos', 'formulario'));
    }

    public function cumplimiento(FormularioMedico $formulario)
    {
        if ($formulario->tipo_proceso !== 'cumplimiento') {
            abort(403, 'Este formulario no es de tipo cumplimiento.');
        }

        return view('pages.documentos_cumplimiento', [
            'formulario' => $formulario,
            'tipo' => 'cumplimiento'
        ]);
    }
}
