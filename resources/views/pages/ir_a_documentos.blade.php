@extends('layouts.app')

@section('title', 'Redireccionamiento en curso')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">

            <div class="mb-4">
                <i class="ri-checkbox-circle-line text-success" style="font-size: 4rem;"></i>
                <h2 class="fw-bold mt-3 text-success">¡Formulario SARLAFT iniciado con éxito!</h2>
            </div>

            <p class="lead text-muted mb-4">
                El formulario SARLAFT se ha abierto en una nueva pestaña. Una vez completes el proceso externo, puedes continuar en esta ventana con la carga de documentos requeridos para el proceso de <strong>cumplimiento contractual</strong>.
            </p>

            <a href="{{ route('documentos.cumplimiento', ['formulario' => $formularioId]) }}" class="btn btn-lg btn-outline-primary shadow-sm">
                <i class="ri-upload-cloud-line me-2"></i> Ir a la carga de documentos
            </a>

            <p class="mt-4 text-muted" style="font-size: 0.9rem;">
                Si el formulario no se abrió automáticamente, puedes <a href="{{ $sarlaftUrl }}" target="_blank">hacer clic aquí para abrirlo manualmente</a>.
            </p>
        </div>
    </div>
</div>

<script>
    window.addEventListener('DOMContentLoaded', () => {
        window.open("{{ $sarlaftUrl }}", "_blank");
    });
</script>
@endsection
