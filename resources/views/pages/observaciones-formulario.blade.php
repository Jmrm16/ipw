@extends('layouts.app-modern')

@section('title', 'Observaciones Formulario #' . $formulario->id)

@section('content')
<div class="observations-container">
    <!-- Encabezado -->
    <div class="observations-header">
        <div class="header-content">
            <h1 class="header-title">
                <i class="ri-chat-check-line"></i>
                Observaciones del Formulario #{{ $formulario->id }}
            </h1>
            <p class="header-subtitle">Revisa y responde las observaciones sobre tu formulario</p>
        </div>
        <a href="{{ route('dashboard') }}" class="back-button">
            <i class="ri-arrow-left-line"></i> Volver al Dashboard
        </a>
    </div>

    <!-- Lista de observaciones -->
    <div class="observations-list">
        @forelse($formulario->observaciones as $obs)
            <div class="observation-card {{ $obs->creado_por === Auth::id() ? 'user-observation' : 'admin-observation' }}">
                <div class="observation-header">
                    <div class="user-info">
                        <div class="user-avatar {{ $obs->creado_por === Auth::id() ? 'bg-blue-100 text-blue-600' : 'bg-gray-100 text-gray-600' }}">
                            {{ substr($obs->creado_por === Auth::id() ? 'Tú' : $obs->creadoPor->name, 0, 1) }}
                        </div>
                        <div>
                            <strong>{{ $obs->creado_por === Auth::id() ? 'Tú' : $obs->creadoPor->name }}</strong>
                            <div class="observation-date">
                                <i class="ri-time-line"></i>
                                {{ $obs->created_at->format('d/m/Y H:i') }}
                            </div>
                        </div>
                    </div>
                    @if($obs->resuelta)
                        <span class="resolved-badge">
                            <i class="ri-checkbox-circle-line"></i> Resuelta
                        </span>
                    @endif
                </div>

                <div class="observation-content">
                    <p>{{ $obs->contenido }}</p>
                </div>

                @if($obs->resuelta)
                    <div class="observation-response">
                        <div class="response-header">
                            <i class="ri-reply-line"></i> Tu respuesta
                        </div>
                        <p>{{ $obs->respuesta }}</p>
                    </div>
                @else
                    <form action="{{ route('observaciones.responder', $obs->id) }}" method="POST" class="response-form">
                        @csrf
                        <div class="form-group">
                            <label for="respuesta-{{ $obs->id }}" class="form-label">
                                <i class="ri-edit-2-line"></i> Escribe tu respuesta
                            </label>
                            <textarea name="respuesta" id="respuesta-{{ $obs->id }}" 
                                      class="form-input" rows="3" required
                                      placeholder="Proporciona detalles sobre cómo has abordado esta observación..."></textarea>
                        </div>
                        <button type="submit" class="submit-button">
                            <i class="ri-send-plane-line"></i> Responder y marcar como resuelta
                        </button>
                    </form>
                @endif
            </div>
        @empty
            <div class="empty-state">
                <i class="ri-chat-off-line"></i>
                <h3>No hay observaciones aún</h3>
                <p>Este formulario no tiene observaciones pendientes de revisión.</p>
            </div>
        @endforelse
    </div>
</div>

<style>
    .observations-container {
        max-width: 800px;
        margin: 0 auto;
        padding: 2rem 1rem;
    }

    .observations-header {
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    @media (min-width: 768px) {
        .observations-header {
            flex-direction: row;
            justify-content: space-between;
            align-items: flex-end;
        }
    }

    .header-content {
        flex: 1;
    }

    .header-title {
        font-size: 1.75rem;
        font-weight: 700;
        color: #1e293b;
        display: flex;
        align-items: center;
        gap: 0.75rem;
        margin-bottom: 0.5rem;
    }

    .header-title i {
        color: #3b82f6;
    }

    .header-subtitle {
        color: #64748b;
        font-size: 1rem;
    }

    .back-button {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 1rem;
        background-color: white;
        color: #3b82f6;
        border: 1px solid #e2e8f0;
        border-radius: 0.5rem;
        font-weight: 500;
        transition: all 0.2s;
    }

    .back-button:hover {
        background-color: #f8fafc;
        border-color: #cbd5e1;
    }

    .observations-list {
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
    }

    .observation-card {
        background: white;
        border-radius: 0.75rem;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        overflow: hidden;
        border: 1px solid #e2e8f0;
    }

    .user-observation {
        border-left: 4px solid #3b82f6;
    }

    .admin-observation {
        border-left: 4px solid #ef4444;
    }

    .observation-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1rem 1.5rem;
        background-color: #f8fafc;
        border-bottom: 1px solid #e2e8f0;
    }

    .user-info {
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .user-avatar {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
    }

    .observation-date {
        font-size: 0.75rem;
        color: #64748b;
        display: flex;
        align-items: center;
        gap: 0.25rem;
        margin-top: 0.25rem;
    }

    .resolved-badge {
        background-color: #ecfdf5;
        color: #059669;
        padding: 0.25rem 0.75rem;
        border-radius: 9999px;
        font-size: 0.75rem;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 0.25rem;
    }

    .observation-content {
        padding: 1.5rem;
        color: #334155;
        line-height: 1.6;
    }

    .observation-response {
        background-color: #f0fdf4;
        border-top: 1px solid #dcfce7;
        padding: 1.5rem;
        color: #166534;
    }

    .response-header {
        font-weight: 600;
        margin-bottom: 0.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .response-form {
        border-top: 1px solid #e2e8f0;
        padding: 1.5rem;
    }

    .form-group {
        margin-bottom: 1rem;
    }

    .form-label {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.875rem;
        font-weight: 500;
        color: #475569;
        margin-bottom: 0.5rem;
    }

    .form-input {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 1px solid #e2e8f0;
        border-radius: 0.5rem;
        font-size: 0.875rem;
        transition: all 0.2s;
    }

    .form-input:focus {
        outline: none;
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }

    .submit-button {
        background-color: #3b82f6;
        color: white;
        border: none;
        padding: 0.75rem 1.5rem;
        border-radius: 0.5rem;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        cursor: pointer;
        transition: all 0.2s;
    }

    .submit-button:hover {
        background-color: #2563eb;
    }

    .empty-state {
        text-align: center;
        padding: 3rem 1rem;
        background-color: white;
        border-radius: 0.75rem;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        border: 1px dashed #e2e8f0;
    }

    .empty-state i {
        font-size: 3rem;
        color: #9ca3af;
        margin-bottom: 1rem;
    }

    .empty-state h3 {
        font-size: 1.25rem;
        font-weight: 600;
        color: #1e293b;
        margin-bottom: 0.5rem;
    }

    .empty-state p {
        color: #64748b;
        max-width: 400px;
        margin: 0 auto;
    }

    @media (max-width: 640px) {
        .observation-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 0.75rem;
        }
        
        .resolved-badge {
            align-self: flex-start;
        }
    }
</style>
@endsection