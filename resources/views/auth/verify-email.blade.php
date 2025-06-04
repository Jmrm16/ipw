@extends('layouts.app')

@section('title', 'Verifica tu correo')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm rounded-4 p-4 border-0">
                <h2 class="text-center text-primary mb-4">Verificación de Correo Electrónico</h2>

                @if (session('status') === 'verification-link-sent')
                    <div class="alert alert-success">
                        Se ha enviado un nuevo enlace de verificación a tu dirección de correo.
                    </div>
                @endif

                <p class="mb-4">
                    Antes de continuar, por favor verifica tu correo electrónico mediante el enlace que te acabamos de enviar.
                    Si no recibiste el correo, puedes solicitar uno nuevo.
                </p>

                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit" class="btn btn-primary">Reenviar enlace de verificación</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
