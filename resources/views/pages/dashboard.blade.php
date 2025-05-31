@extends('layouts.app')

@section('title', 'Mi Dashboard')

@section('content')
<div class="d-flex">
    {{-- Sidebar solo en esta vista --}}
    <x-sidebar />

    <div class="flex-grow-1 p-4">
        <div class="card shadow-lg border-0 p-4">
            <h2 class="text-center mb-4 text-primary fw-bold">
                <i class="bi bi-file-earmark-check-fill me-2"></i>Mis Formularios Completados
            </h2>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                </div>
            @endif

            @if($formularios->isEmpty())
                <div class="text-center text-muted my-4">
                    <i class="bi bi-inbox fs-1 mb-2"></i>
                    <p>No has completado ningún formulario todavía.</p>
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover align-middle text-center border">
                        <thead class="table-primary">
                            <tr class="text-uppercase">
                                <th>ID</th>
                                <th>Fecha</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach ($formularios as $formulario)
                                <tr>
                                    <td>{{ $formulario->id }}</td>
                                    <td>{{ $formulario->created_at->format('Y-m-d') }}</td>
                                    <td>
                                        @php
                                            $estadoColor = match ($formulario->estado) {
                                                'pendiente' => 'bg-secondary text-white',
                                                'en_revisión' => 'bg-warning text-white',
                                                'aprobado' => 'bg-success text-white',
                                                'rechazado' => 'bg-danger text-white',
                                                'finalizado' => 'bg-primary text-white',
                                                default => 'bg-light text-dark',
                                            };
                                        @endphp
                                        <span class="badge {{ $estadoColor }}">{{ ucfirst($formulario->estado) }}</span>
                                    </td>
                                    <td>
                                        <a href="{{ route('documentos.por_formulario', ['formulario' => $formulario->id]) }}" class="btn btn-outline-secondary mb-1">
                                            Subir Documentos
                                        </a>

                                        <a href="{{ route('observaciones.por_formulario', $formulario->id) }}" class="btn btn-outline-info mb-1">
                                            Ver Observaciones
                                        </a>

                                        @if($formulario->estado === 'proceso_pago' && ($formulario->link_pago || $formulario->comprobante_pago_path))
                                            <button class="btn btn-outline-success mb-1"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#modalPago{{ $formulario->id }}">
                                                Ver Pago
                                            </button>
                                        @endif
                                    </td>
                                </tr>

                                {{-- Modal para pago --}}
                                @if($formulario->estado === 'proceso_pago' && ($formulario->link_pago || $formulario->comprobante_pago_path))
                                <div class="modal fade" id="modalPago{{ $formulario->id }}" tabindex="-1" aria-labelledby="modalPagoLabel{{ $formulario->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content shadow">
                                            <div class="modal-header bg-primary text-white">
                                                <h5 class="modal-title" id="modalPagoLabel{{ $formulario->id }}">
                                                    <i class="bi bi-credit-card me-2"></i> Información de Pago
                                                </h5>
                                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                            </div>
                                            <div class="modal-body">
    @if($formulario->link_pago)
        <div class="mb-3">
            <strong>Link de Pago:</strong><br>
            <a href="{{ $formulario->link_pago }}" class="text-primary" target="_blank">
                {{ $formulario->link_pago }}
            </a>
        </div>
    @endif

    @if($formulario->comprobante_pago_path)
        <div class="mb-4">
            <strong>Recibo de Pago (PDF):</strong><br>
            <a href="{{ $formulario->comprobante_pago_path}}" target="_blank" class="btn btn-outline-secondary mt-2">
                <i class="bi bi-file-earmark-arrow-down me-1"></i> Ver Comprobante
            </a>
        </div>
    @endif

    {{-- Imagen de constancia si ya fue subida --}}
    @if($formulario->constancia_pago_path)
        <div class="mb-3">
            <strong>Constancia de Pago:</strong><br>
            <img src="{{ asset('storage/' . $formulario->constancia_pago_path) }}"
                 alt="Constancia de pago"
                 class="img-fluid rounded border shadow-sm mt-2"
                 style="max-height: 300px;">
        </div>
    @endif

{{-- Formulario para subir la constancia de pago --}}
<form action="{{ route('formulario.constancia_pago', $formulario->id) }}" method="POST" enctype="multipart/form-data" class="mt-4">
    @csrf
    <div class="mb-3">
        <label for="constancia_{{ $formulario->id }}" class="form-label fw-bold">Subir Constancia de Pago (PDF o Imagen):</label>
        <input type="file" name="documento" accept=".pdf,image/*" required class="form-control" id="constancia_{{ $formulario->id }}">
    </div>
    <button type="submit" class="btn btn-primary">
        <i class="bi bi-upload me-1"></i> Subir Constancia
    </button>
</form>

</div>



                                        </div>
                                    </div>
                                </div>
                                @endif

                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
