@extends('layouts.app-modern')

@section('title', 'Documentos')

@section('content')
<div class="empty-state-container">
    <!-- Ilustración SVG -->
    <div class="illustration">
        <svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 24 24" fill="none" stroke="#3b82f6" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
            <polyline points="14 2 14 8 20 8"></polyline>
            <line x1="16" y1="13" x2="8" y2="13"></line>
            <line x1="16" y1="17" x2="8" y2="17"></line>
            <polyline points="10 9 9 9 8 9"></polyline>
        </svg>
    </div>

    <!-- Mensaje principal -->
    <div class="empty-state-content">
        <h2 class="empty-state-title">No hay documentos disponibles</h2>
        <p class="empty-state-description">Para comenzar, completa primero tu formulario médico y podrás subir los documentos requeridos.</p>
        
        <!-- Acciones -->
        <div class="empty-state-actions">
            <a href="{{ route('formulario.create') }}" class="primary-button">
                <i class="ri-edit-2-line mr-2"></i>
                Completar Formulario
            </a>
            
            <a href="{{ route('dashboard') }}" class="secondary-button">
                <i class="ri-home-4-line mr-2"></i>
                Volver al Inicio
            </a>
        </div>
    </div>
</div>

<style>
    .empty-state-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        min-height: calc(100vh - 200px);
        padding: 2rem;
        text-align: center;
    }

    .illustration {
        margin-bottom: 2rem;
        opacity: 0.8;
    }

    .empty-state-content {
        max-width: 500px;
    }

    .empty-state-title {
        font-size: 1.75rem;
        font-weight: 600;
        color: #1e293b;
        margin-bottom: 1rem;
    }

    .empty-state-description {
        font-size: 1.125rem;
        color: #64748b;
        margin-bottom: 2rem;
        line-height: 1.6;
    }

    .empty-state-actions {
        display: flex;
        gap: 1rem;
        justify-content: center;
        flex-wrap: wrap;
    }

    .primary-button {
        display: inline-flex;
        align-items: center;
        padding: 0.75rem 1.5rem;
        background-color: #3b82f6;
        color: white;
        border-radius: 0.5rem;
        font-weight: 500;
        transition: all 0.2s ease;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
    }

    .primary-button:hover {
        background-color: #2563eb;
        transform: translateY(-2px);
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .secondary-button {
        display: inline-flex;
        align-items: center;
        padding: 0.75rem 1.5rem;
        background-color: white;
        color: #3b82f6;
        border: 1px solid #e2e8f0;
        border-radius: 0.5rem;
        font-weight: 500;
        transition: all 0.2s ease;
    }

    .secondary-button:hover {
        background-color: #f8fafc;
        border-color: #cbd5e1;
        transform: translateY(-2px);
    }

    @media (max-width: 640px) {
        .empty-state-title {
            font-size: 1.5rem;
        }
        
        .empty-state-description {
            font-size: 1rem;
        }
        
        .empty-state-actions {
            flex-direction: column;
            width: 100%;
        }
        
        .primary-button, .secondary-button {
            width: 100%;
            justify-content: center;
        }
    }
</style>
@endsection