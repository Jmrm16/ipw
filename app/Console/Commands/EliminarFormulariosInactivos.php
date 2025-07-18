<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\FormularioMedico;
use App\Models\DocumentoUsuario;
use App\Models\Notificacion;
use Carbon\Carbon;

class EliminarFormulariosInactivos extends Command
{
    protected $signature = 'formularios:eliminar-inactivos';

    protected $description = 'Elimina formularios con más de 5 días sin documentos subidos';

    public function handle()
    {
        $fechaLimite = Carbon::now()->subDays(5);

        $formularios = FormularioMedico::where('created_at', '<=', $fechaLimite)->get();

        foreach ($formularios as $formulario) {
            $documentos = DocumentoUsuario::where('formulario_medico_id', $formulario->id)->exists();

            if (!$documentos) {
                Notificacion::create([
                    'tipo' => 'formulario_eliminado',
                    'mensaje' => "⚠️ Tu formulario del {$formulario->created_at->format('d/m/Y')} fue eliminado por inactividad (sin documentos en 5 días).",
                    'leida' => false,
                    'data' => [
                        'user_id' => $formulario->user_id,
                        'formulario_id' => $formulario->id,
                        'motivo' => 'sin_documentos',
                    ],
                ]);

                $formulario->delete();
                $this->info("Formulario ID {$formulario->id} eliminado.");
            }
        }

        return Command::SUCCESS;
    }
}
