@extends('layouts.app')

@section('title', 'Eventos | IPW Seguros')

@section('content')
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <span class="badge bg-primary text-white px-3 py-2">Eventos</span>
            <h2 class="fw-bold mt-3">Conoce Nuestros Últimos Eventos</h2>
            <p class="text-muted">Participaciones, campañas y más actividades que hemos desarrollado contigo.</p>
        </div>

        <div class="row g-4">
            @foreach($eventos as $evento)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm border-0 rounded-4">
                        @if($evento->imagen_path)
                            <img src="{{ asset($evento->imagen_path) }}" class="card-img-top rounded-top-4" alt="{{ $evento->titulo }}">
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-primary">{{ $evento->titulo }}</h5>
                            <p class="card-text text-muted small">{{ \Carbon\Carbon::parse($evento->fecha_evento)->format('d M Y') }}</p>
                            <p class="card-text flex-grow-1">{{ Str::limit($evento->descripcion, 100) }}</p>

                            @if($evento->video_url)
                                <a href="{{ $evento->video_url }}" target="_blank" class="btn btn-sm btn-outline-primary mt-2">
                                    <i class="fas fa-video me-1"></i> Ver Video
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Paginación --}}
        <div class="mt-5">
            {{ $eventos->links() }}
        </div>
    </div>
</section>
@endsection
