@extends('layouts.app')

@section('title', 'Documentos')

@section('content')
    <div class="container py-5">
        <h2 class="text-center text-muted">No tienes formularios activos aún.</h2>
        <p class="text-center">Por favor completa primero tu formulario médico para cargar documentos.</p>
        <div class="text-center mt-4">
            <a href="{{ route('formulario.create') }}" class="btn btn-primary">
                Ir al formulario
            </a>
        </div>
    </div>
@endsection
