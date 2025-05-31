@extends('layouts.app')

@section('title', 'Observaciones Formulario #' . $formulario->id)

@section('content')
<div class="container mt-4">
    <h3 class="mb-3">Observaciones del Formulario #{{ $formulario->id }}</h3>

    <div class="mb-4">
        <a href="{{ route('dashboard') }}" class="btn btn-secondary btn-sm">← Volver al Dashboard</a>
    </div>

    @forelse($formulario->observaciones as $obs)
        <div class="mb-3 p-3 border rounded 
            {{ $obs->creado_por === Auth::id() ? 'bg-light' : 'bg-white' }}">
            <div class="d-flex justify-content-between">
                <strong>{{ $obs->creado_por === Auth::id() ? 'Tú' : $obs->creadoPor->name }}</strong>
                <small class="text-muted">{{ $obs->created_at->format('d/m/Y H:i') }}</small>
            </div>

            <p class="mb-1">{{ $obs->contenido }}</p>

            {{-- Mostrar respuesta si ya fue respondida --}}
            @if($obs->resuelta)
                <div class="mt-2 p-2 bg-success bg-opacity-10 rounded">
                    <strong>Tu respuesta:</strong><br>
                    {{ $obs->respuesta }}
                </div>
            @else
                {{-- Formulario de respuesta --}}
                <form action="{{ route('observaciones.responder', $obs->id) }}" method="POST" class="mt-2">
                    @csrf
                    <div class="mb-2">
                        <textarea name="respuesta" class="form-control" rows="2" placeholder="Escribe tu respuesta..." required></textarea>
                    </div>
                    <button type="submit" class="btn btn-sm btn-success">Responder y marcar como resuelta</button>
                </form>
            @endif
        </div>
    @empty
        <p class="text-muted">No hay observaciones aún para este formulario.</p>
    @endforelse
</div>
@endsection
