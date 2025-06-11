<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\FormularioMedico;
use App\Models\Notificacion;

class DashboardController extends Controller
{


public function index()
{
    $user = Auth::user();

    $formularios = FormularioMedico::where('user_id', $user->id)
                    ->latest()
                    ->paginate(5);

    // Extraer notificaciones solo si el data contiene su ID
    $notificaciones = \App\Models\Notificacion::whereRaw("JSON_EXTRACT(data, '$.usuario_id') = ?", [$user->id])
                    ->latest()
                    ->take(10)
                    ->get();

    $notificacionesNoLeidas = \App\Models\Notificacion::whereRaw("JSON_EXTRACT(data, '$.usuario_id') = ?", [$user->id])
                    ->whereNull('leida')
                    ->get();

    return view('pages.dashboard', compact('formularios', 'notificaciones', 'notificacionesNoLeidas'));
}


    public function marcarLeidas(Request $request)
    {
        Notificacion::where('user_id', Auth::id())
            ->where('leida', false)
            ->update(['leida' => true]);

        return response()->json(['success' => true]);
    }

    public function marcarTodas(Request $request)
    {
        Notificacion::where('user_id', Auth::id())
            ->update(['leida' => true]);

        return back()->with('success', 'Todas las notificaciones marcadas como leídas');
    }
}
