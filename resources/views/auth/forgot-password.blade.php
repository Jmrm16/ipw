@extends('layouts.app')

@section('title', 'Recuperar Contraseña')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm p-4 rounded-4 border-0">
                <h2 class="text-center text-primary mb-4">¿Olvidaste tu Contraseña?</h2>

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <input type="email" name="email" id="email" class="form-control" required autofocus>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">
                        Enviar enlace de recuperación
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
