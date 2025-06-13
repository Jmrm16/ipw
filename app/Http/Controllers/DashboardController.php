<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormularioMedico;
use App\Models\Notificacion;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index()
{
    $user = Auth::user();

    // Formularios del cliente
   $formularios = FormularioMedico::where('user_id', $user->id)
    ->latest()
    ->paginate(10); // Puedes ajustar el número de ítems por página


    // Notificaciones solo del cliente
    $notificaciones = Notificacion::where('data->user_id', $user->id)
        ->orderBy('created_at', 'desc')
        ->take(5)
        ->get();

    $noLeidas = $notificaciones->where('leida', false)->count();

    return view('pages.dashboard', compact('formularios', 'notificaciones', 'noLeidas'));
}
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
