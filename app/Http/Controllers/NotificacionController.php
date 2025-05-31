<?php

namespace App\Http\Controllers;


use App\Models\Notificacion;

class NotificacionController extends Controller
{
    public function leer($id)
    {
        $notificacion = Notificacion::findOrFail($id);
        $notificacion->update(['leida' => true]);

        if (isset($notificacion->data['user_id'])) {
            return redirect()->route('usuarios.show', $notificacion->data['user_id']);
        }

        if (isset($notificacion->data['formulario_id'])) {
            return redirect()->route('formularios.show', $notificacion->data['formulario_id']);
        }

        return back();
    }

    public function marcarTodasLeidas()
    {
        Notificacion::where('leida', false)->update(['leida' => true]);
        return back();
    }
}
