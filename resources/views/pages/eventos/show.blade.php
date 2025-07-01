@extends('layouts.app')

@section('title', $evento->titulo)

@section('content')
<section class="py-5 bg-light">
    <div class="container">
        {{-- Botón de volver --}}
        <div class="mb-4">
            <a href="{{ route('eventos.index') }}" class="btn btn-outline-primary rounded-pill">
                <i class="fas fa-arrow-left me-1"></i> Volver a eventos
            </a>
        </div>

        {{-- Detalle del evento --}}
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card border-0 shadow rounded-4 overflow-hidden">
                    @if($evento->imagen_path)
                        <img src="{{ asset($evento->imagen_path) }}" alt="{{ $evento->titulo }}" class="w-100" style="max-height: 450px; object-fit: cover;">
                    @endif

                    <div class="card-body p-4">
                        <h1 class="fw-bold mb-3">{{ $evento->titulo }}</h1>

                        <p class="text-muted mb-2">
                            <i class="far fa-calendar-alt me-1"></i>
                            {{ \Carbon\Carbon::parse($evento->fecha_evento)->translatedFormat('d \d\e F \d\e Y') }}
                        </p>

                        <hr>

                        <p class="lead">{{ $evento->descripcion }}</p>

                        @if($evento->video_url)
                            <div class="mt-4">
                                <h5 class="fw-semibold mb-2">🎥 Video relacionado</h5>
                                <a href="{{ $evento->video_url }}" target="_blank" class="btn btn-danger rounded-pill">
                                    <i class="fab fa-youtube me-1"></i> Ver en YouTube
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
