<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentoUsuario extends Model
{
    protected $table = 'documentos_usuario'; // nombre correcto de la tabla

    protected $fillable = [
        'user_id',
        'formulario_medico_id',
        'tipo',
        'archivo',
        'estado',
    ];
    
    public function formulario()
{
    return $this->belongsTo(FormularioMedico::class, 'formulario_medico_id');
}
    
}