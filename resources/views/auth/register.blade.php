@extends('layouts.app')

@section('title', 'Registrarse')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow-lg border-0 p-4 rounded-4 bg-light-subtle card-hover-effect">
                <div class="card-body">
                    <h2 class="text-center fw-bold text-primary mb-4">Crear una Cuenta</h2>
                    <p class="text-center text-muted mb-4">Completa el formulario para registrarte</p>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre completo</label>
                            <input type="text" name="name" id="name" class="form-control form-control-lg rounded-pill" required value="{{ old('name') }}">
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Correo Electrónico</label>
                            <input type="email" name="email" id="email" class="form-control form-control-lg rounded-pill" required value="{{ old('email') }}">
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" name="password" id="password" class="form-control form-control-lg rounded-pill" required>
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control form-control-lg rounded-pill" required>
                        </div>

                        <button type="submit" class="btn btn-primary-gradient w-100 py-2 fw-semibold rounded-pill">
                            <i class="bi bi-person-plus me-2"></i> Registrarse
                        </button>
                    </form>

                    <div class="text-center mt-4">
                        <small>¿Ya tienes una cuenta? <a href="{{ route('login') }}">Inicia sesión</a></small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Estilos adicionales -->
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
