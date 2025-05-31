@extends('layouts.app')

@section('title', 'Mis Documentos')

@section('content')
<div class="container-fluid">
    <div class="row flex-nowrap">
        {{-- Sidebar --}}
        <x-sidebar />

        {{-- Main Content --}}
        <div class="col py-4">
            <div class="card shadow-lg border-0 rounded-3 overflow-hidden">
                {{-- Card Header --}}
                <div class="card-header bg-primary text-white py-3">
                    <h2 class="h4 mb-0 text-center fw-bold">
                        <i class="bi bi-folder2-open me-2"></i>Subida de Documentos Requeridos
                    </h2>
                </div>

                {{-- Card Body --}}
                <div class="card-body p-4">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                            <i class="bi bi-check-circle-fill me-2"></i>
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                        </div>
                    @endif

                    @php
                        $formularios_firmados = [
                            'formulario_sarlaft' => 'Formulario SARLAFT Firmado',
                            'formulario_medico' => 'Formulario Médico Firmado',
                        ];

                        $documentos_generales = [
                            'cedula' => 'Cédula',
                            'rut' => 'RUT',
                            'diploma' => 'Diploma',
                            'tarjeta_profesional' => 'Tarjeta Profesional',
                        ];

                        $renderCard = function ($tipo, $label) use ($formulario, $documentos) {
                            return view('components.documento-card', compact('tipo', 'label', 'formulario', 'documentos'))->render();
                        };
                    @endphp

                    {{-- Formularios Firmados --}}
                {{-- Formularios Firmados --}}
                <div class="mb-5">
                    <h5 class="text-primary fw-bold mb-4 pb-2 border-bottom">
                        <i class="bi bi-file-earmark-text me-2"></i>Formularios Firmados
                    </h5>

                    {{-- Mensaje de instrucción --}}
                    <div class="alert alert-info d-flex align-items-center mb-4" role="alert">
                        <i class="bi bi-info-circle-fill me-2 fs-5"></i>
                        <div>
                            Para continuar, asegúrate de haber firmado y huellado el <strong>Formulario Médico</strong> y el <strong>Formulario SARLAFT</strong>.
                        </div>
                    </div>

                    {{-- Botones para ver los formularios PDF --}}
                    <div class="mb-4 text-center">
                        <a href="{{ route('formulario1.pdf', $formulario->id) }}" target="_blank" class="btn btn-outline-primary me-2 mb-2">
                            <i class="bi bi-file-earmark-medical me-1"></i> Ver Formulario Médico
                        </a>

                        <a href="{{ route('formulario2.pdf', $formulario->id) }}" target="_blank" class="btn btn-outline-success mb-2">
                            <i class="bi bi-shield-check me-1"></i> Ver Formulario SARLAFT
                        </a>
                    </div>

                    <div class="row row-cols-1 g-3">
                        @foreach ($formularios_firmados as $tipo => $label)
                            {!! $renderCard($tipo, $label) !!}
                        @endforeach
                    </div>
                </div>





                    {{-- Documentos Generales --}}
                    <div class="mb-5">
                        <h5 class="text-primary fw-bold mb-4 pb-2 border-bottom">
                            <i class="bi bi-files me-2"></i>Documentos Personales
                        </h5>
                            <div class="row row-cols-1 g-3">
                                @foreach ($documentos_generales as $tipo => $label)
                                    <div class="col">
                                        {!! $renderCard($tipo, $label) !!}
                                    </div>
                                @endforeach
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection