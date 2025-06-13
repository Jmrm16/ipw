<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\FormularioMedico;

class HomeController extends Controller
{
    public function index()
    {
        $estadisticas = [
            'anios_experiencia' => now()->year - 2003,
            'aseguradoras_aliadas' => 15,
            'clientes_satisfechos' => FormularioMedico::count(),
            'polizas_emitidas' => FormularioMedico::where('estado', 'poliza')->count(),
        ];

        return view('pages.home', compact('estadisticas'));
    }
}
