<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentoUsuario extends Model
{
    protected $table = 'documentos_usuario';

    protected $fillable = [
        'user_id',
        'formulario_medico_id',
        'tipo',
        'archivo',
        'estado',
    ];

    // 📎 Relación con formulario (puede ser null)
    public function formulario()
    {
        return $this->belongsTo(FormularioMedico::class, 'formulario_medico_id');
    }

    // 👤 Relación con el usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 📂 Scopes útiles
    public function scopeGenerales($query)
    {
        return $query->whereNull('formulario_medico_id');
    }

    public function scopeDelFormulario($query, $formularioId)
    {
        return $query->where('formulario_medico_id', $formularioId);
    }
}
