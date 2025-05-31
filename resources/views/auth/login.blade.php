@extends('layouts.app')

@section('title', 'Iniciar Sesión')

@section('content')
<!-- Encabezado con gradiente y parallax -->
<div class="container-fluid page-header d-flex align-items-center justify-content-center mb-5 py-5 position-relative overflow-hidden"
     style="background: linear-gradient(135deg, #1e5799 0%, #207cca 51%, #2989d8 100%); height: 400px;">
    <div class="position-absolute w-100 h-100" style="top:0; left:0; background-image: url('{{ asset('img/headers.jpg') }}'); background-size: cover; background-position: center; opacity: 0.15; z-index: 1;"></div>
    <div class="text-center text-white position-relative z-index-2">
        <h1 class="display-4 fw-bold mb-3 animate__animated animate__fadeInDown">Bienvenido</h1>
        <p class="lead fs-4 mb-4 animate__animated animate__fadeInUp">Inicia sesión para acceder a tu cuenta</p>
    </div>
</div>

<!-- Sección del login con estilo -->
<div class="container mb-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-0 shadow-lg p-4 rounded-4">
                <div class="card-body text-center">
                    <h2 class="mb-3 fw-bold text-primary">Iniciar Sesión</h2>
                    <p class="mb-4 text-muted">Para continuar, inicia sesión con tu cuenta de Google.</p>

                    <a href="{{ route('google.login') }}" class="btn btn-danger btn-lg w-100">
                        <i class="fab fa-google me-2"></i> Iniciar Sesión con Google
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Estilos adicionales -->
<style>
    .page-header {
        position: relative;
        overflow: hidden;
    }
    .z-index-1 {
        z-index: 1;
    }
    .z-index-2 {
        z-index: 2;
    }
</style>
@endsection
