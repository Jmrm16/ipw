@extends('layouts.app')

@section('title', 'Mis Observaciones')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4 text-primary fw-bold">Observaciones de Formularios</h2>

    @forelse ($formularios as $formulario)
        <div class="card mb-4">
            <div class="card-header bg-light d-flex justify-content-between">
                <strong>Formulario #{{ $formulario->id }}</strong>
                <span class="text-muted">{{ $formulario->created_at->format('d/m/Y') }}</span>
            </div>
            <div class="card-body">
                @forelse ($formulario->observaciones as $obs)
                    <div class="border p-3 mb-3 rounded shadow-sm bg-white">
                        <div class="d-flex justify-content-between">
                            <div>
                                <strong>Fase:</strong> {{ ucfirst($obs->fase) }} <br>
                                <strong>Observación:</strong> {{ $obs->contenido }} <br>
                                <small class="text-muted">Agregada por: {{ $obs->creadoPor->name }} | {{ $obs->created_at->diffForHumans() }}</small>
                            </div>
                                    <div class="text-end">
                                    @if($obs->estado === 'pendiente')
                                        <form action="{{ route('observaciones.resolver', $obs->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-outline-success">
                                                Marcar como resuelta
                                            </button>
                                        </form>
                                    @else
                                        <span class="badge bg-success">Resuelta</span>
                                    @endif
                                </div>

                            <div>
                                <span class="badge {{ $obs->estado === 'pendiente' ? 'bg-warning' : 'bg-success' }}">
                                    {{ ucfirst($obs->estado) }}
                                </span>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-muted">No hay observaciones para este formulario.</p>
                @endforelse
            </div>
        </div>
    @empty
        <p>No tienes formularios aún.</p>
    @endforelse
</div>
@endsection
