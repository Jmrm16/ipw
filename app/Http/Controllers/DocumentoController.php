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
    public function index()
    {
        $user = Auth::user();
        $formulario = FormularioMedico::where('user_id', $user->id)->latest()->first();

        if (!$formulario) {
            return view('pages.documentos-vacio');
        }

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

        $documentosPorFormulario = [
            'formulario_sarlaft',
            'formulario_medico',
            'formulario_oficio',
        ];

        $tiposValidos = [
            'contrato',
            'cedula_representante',
            'camara_comercio',
            'rut_actualizado',
            'estados_financieros',
            'experiencia_certificada',
            'formulario_sarlaft',
            'formulario_medico',
            'formulario_oficio',
            'cedula',
            'rut',
            'diploma',
            'tarjeta_profesional',
        ];

        // Subida masiva
        if ($request->has('archivos') && is_array($request->archivos)) {
            foreach ($request->archivos as $tipo => $archivo) {
                if (!$archivo || !in_array($tipo, $tiposValidos)) continue;

                $request->validate([
                    "archivos.$tipo" => 'file|mimes:pdf,jpg,jpeg,png|max:5120',
                ]);

                $nombre = time() . '_' . $archivo->getClientOriginalName();
                $rutaRelativa = $archivo->storeAs("documentos_usuario/{$user->id}", $nombre, 'public');
                $ruta = 'app/public/' . $rutaRelativa;

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
                'tipo' => 'required|in:' . implode(',', $tiposValidos),
                'archivo' => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120',
            ]);

            $tipo = $request->tipo;
            $archivo = $request->file('archivo');
            $nombre = time() . '_' . $archivo->getClientOriginalName();
            $rutaRelativa = $archivo->storeAs("documentos_usuario/{$user->id}", $nombre, 'public');
            $ruta = 'app/public/' . $rutaRelativa;

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

        $ruta = $isCumplimiento
            ? 'documentos.cumplimiento'
            : 'documentos.por_formulario';

        return redirect()->route($ruta, ['formulario' => $formulario->id])
            ->with('success', 'Documento(s) subido(s) correctamente.');
    }

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

        return response()->file(storage_path($documento->archivo));
    }

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
            ->orderByRaw('CASE WHEN formulario_medico_id IS NULL THEN 1 ELSE 0 END')
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
