@extends('layouts.app')

@section('title', 'Recuperar contraseña')

@section('content')
<div class="container-fluid page-header d-flex align-items-center justify-content-center mb-5 py-5 position-relative overflow-hidden"
     style="background: linear-gradient(135deg, #1e5799 0%, #207cca 51%, #2989d8 100%); height: 300px;">
    <div class="position-absolute w-100 h-100"
         style="top:0; left:0; background-image: url('{{ asset('img/headers.jpg') }}');
                background-size: cover; background-position: center; opacity: 0.15; z-index: 1;">
    </div>
    <div class="text-center text-white position-relative z-3">
        <h1 class="display-5 fw-bold mb-2 animate__animated animate__fadeInDown">Recuperar contraseña</h1>
        <p class="lead animate__animated animate__fadeInUp">Crea una nueva contraseña en segundos</p>
    </div>
</div>

<div class="container mb-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card border-0 shadow-lg p-4 rounded-4 bg-light-subtle card-hover-effect">
                <div class="card-body">
                    <h2 class="mb-3 fw-bold text-primary text-center">¿Olvidaste tu contraseña?</h2>
                    <p class="mb-4 text-muted text-center">Ingresa tu correo y, si existe, te enviaremos directamente al formulario para restablecerla.</p>

                    {{-- Mensajes de estado --}}
                    @if (session('status'))
                        <div class="alert alert-info" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- Errores de validación --}}
                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Formulario --}}
                    <form method="POST" action="{{ route('password.email.lite') }}"
                          onsubmit="this.querySelector('button[type=submit]').disabled=true;">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo electrónico</label>
                            <input type="email" id="email" name="email"
                                   class="form-control form-control-lg rounded-pill"
                                   required autofocus autocomplete="email" spellcheck="false"
                                   value="{{ old('email') }}">
                        </div>

                        <button type="submit"
                                class="btn btn-primary-gradient w-100 py-2 fw-semibold rounded-pill">
                            <i class="bi bi-arrow-right-circle me-2"></i> Continuar
                        </button>

                        <div class="text-center mt-3">
                            <small>
                                <a href="{{ route('login') }}">
                                    <i class="bi bi-arrow-left"></i> Volver a iniciar sesión
                                </a>
                            </small>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Estilos inline para mantener coherencia con login --}}
<style>
    .btn-primary-gradient {
        background: linear-gradient(45deg, #207cca, #1e5799);
        color: #fff;
        border: none;
        transition: all 0.3s ease;
    }
    .btn-primary-gradient:hover {
        background: linear-gradient(45deg, #1e5799, #207cca);
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }
    .card-hover-effect:hover {
        transform: translateY(-4px);
        transition: 0.3s ease;
        box-shadow: 0 0 25px rgba(0, 0, 0, 0.08);
    }
</style>
@endsection
