@extends('layouts.app')

@section('title', 'Mi Perfil')

@section('content')
<div class="d-flex">
    {{-- Sidebar --}}
    <x-sidebar />

    {{-- Contenido Principal --}}
    <div class="flex-grow-1 p-4">
        <div class="card shadow-lg border-0 p-4">
            <h2 class="text-center text-primary fw-bold mb-4">
                <i class="bi bi-person-circle me-2"></i>Información del Perfil
            </h2>

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="bg-light p-4 rounded border">
                        <div class="mb-3 d-flex align-items-center">
                            <i class="bi bi-person-fill me-3 fs-4 text-primary"></i>
                            <div>
                                <strong class="text-secondary">Nombre:</strong>
                                <div class="text-dark">{{ $usuario->name }}</div>
                            </div>
                        </div>

                        <div class="mb-3 d-flex align-items-center">
                            <i class="bi bi-envelope-fill me-3 fs-4 text-primary"></i>
                            <div>
                                <strong class="text-secondary">Email:</strong>
                                <div class="text-dark">{{ $usuario->email }}</div>
                            </div>
                        </div>

                        {{-- Puedes agregar más campos aquí si tu tabla users los tiene --}}
                        {{-- Ejemplo:
                        <div class="mb-3 d-flex align-items-center">
                            <i class="bi bi-phone-fill me-3 fs-4 text-primary"></i>
                            <div>
                                <strong class="text-secondary">Teléfono:</strong>
                                <div class="text-dark">{{ $usuario->telefono }}</div>
                            </div>
                        </div>
                        --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection