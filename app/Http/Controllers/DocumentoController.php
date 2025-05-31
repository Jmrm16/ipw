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

        $tipos = [
            'documento_identidad',
            'certificado_existencia',
            'estados_financieros',
            'formulario_firmado',
        ];

        $formulario = FormularioMedico::where('user_id', $user->id)->latest()->first();

        if (!$formulario) {
            return view('pages.documentos-vacio');
        }

        $documentos = DocumentoUsuario::where('user_id', $user->id)
            ->where('formulario_medico_id', $formulario->id)
            ->get()
            ->keyBy('tipo');

        return view('pages.documentos', compact('documentos', 'tipos', 'formulario'));
    }

public function store(Request $request, FormularioMedico $formulario)
{
    $request->validate([
        'tipo' => 'required|in:cedula,rut,diploma,tarjeta_profesional,formulario_sarlaft,formulario_medico',
        'archivo' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
    ]);

    $user = Auth::user();

    if ($formulario->user_id !== $user->id) {
        abort(403, 'No autorizado');
    }

    $archivo = $request->file('archivo');
    $nombre = time() . '_' . $archivo->getClientOriginalName();
    $ruta = $archivo->storeAs("documentos_usuario/{$user->id}", $nombre, 'public');

    DocumentoUsuario::updateOrCreate(
        [
            'user_id' => $user->id,
            'formulario_medico_id' => $formulario->id,
            'tipo' => $request->tipo,
        ],
        [
            'archivo' => $ruta,
            'estado' => 'subido',
        ]
    );

    // Crear notificación
Notificacion::create([
    'tipo' => 'documento_subido',
    'mensaje' => "El usuario {$user->name} ha subido el documento: {$request->tipo}",
    'leida' => false,
    'data' => [
        'user_id' => $user->id,
        'formulario_id' => $formulario->id,
        'tipo_proceso' => 'documento',
    ],
]);

    $tiposRequeridos = [
        'cedula',
        'rut',
        'diploma',
        'tarjeta_profesional',
        'formulario_sarlaft',
        'formulario_medico',
    ];

    $subidos = DocumentoUsuario::where('user_id', $user->id)
        ->where('formulario_medico_id', $formulario->id)
        ->whereIn('tipo', $tiposRequeridos)
        ->pluck('tipo')
        ->unique()
        ->toArray();

    if (count(array_intersect($tiposRequeridos, $subidos)) === count($tiposRequeridos)) {
        $formulario->estado = 'documentos_cargados';
        $formulario->save();
    }

    return redirect()->route('documentos.por_formulario', ['formulario' => $formulario->id])
        ->with('success', 'Documento subido correctamente.');
}

    
    

    // Ver documento por tipo
    public function ver($tipo)
    {
        $user = Auth::user();

        $formulario = FormularioMedico::where('user_id', $user->id)->latest()->first();
        if (!$formulario) {
            abort(404, 'No se encontró el formulario asociado.');
        }

        $documento = DocumentoUsuario::where('user_id', $user->id)
            ->where('formulario_medico_id', $formulario->id)
            ->where('tipo', $tipo)
            ->firstOrFail();

        return response()->file(storage_path('app/public/' . $documento->archivo));
    }

    public function verPorFormulario($formularioId)
{
    $user = Auth::user();

    // Validar que el formulario pertenece al usuario
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
        ->where('formulario_medico_id', $formularioId)
        ->get()
        ->keyBy('tipo');

    return view('pages.documentos', compact('documentos', 'tipos', 'formulario'));
}

}
