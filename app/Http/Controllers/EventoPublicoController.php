<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;

class EventoPublicoController extends Controller
{
    public function index()
    {
        $eventos = Evento::orderByDesc('fecha_evento')->paginate(9); // Paginación
        return view('pages.eventos.index', compact('eventos'));


    }

    public function show(Evento $evento)
    {
       return view('pages.eventos.show', compact('evento'));

    }
}
