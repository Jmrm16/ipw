@extends('layouts.app')

@section('title', 'Nuestros Productos de Seguro')

@section('content')

<style>
    .service-card {
        transition: transform 0.4s ease, box-shadow 0.4s ease;
        background: #fff;
        border-radius: 12px;
        border: 1px solid #e6e6e6;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.04);
        height: 100%;
        overflow: hidden;
    }

    .service-icon {
        font-size: 2.5rem;
        color: #0078D4;
        margin-bottom: 1.5rem;
        transition: all 0.3s ease;
    }

    .service-card:hover .service-icon {
        color: #0BCEAF;
        transform: scale(1.1);
    }

    .section-title::after {
        content: '';
        display: block;
        width: 80px;
        height: 3px;
        margin: 10px auto 0;
        background: linear-gradient(90deg, #0BCEAF, #0078D4);
    }

    .gradient-bg {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    }
</style>

<!-- Encabezado -->
<div class="container-fluid py-5" style="background: linear-gradient(135deg, #0078D4 0%, #0BCEAF 100%);">
    <div class="container text-center text-white py-5">
        <h1 class="display-5 fw-bold">Nuestros Productos de Seguro</h1>
        <nav aria-label="breadcrumb" class="d-flex justify-content-center mt-3">
            <ol class="breadcrumb bg-transparent p-0 m-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white-50">Inicio</a></li>
                <li class="breadcrumb-item active text-white" aria-current="page">Productos</li>
            </ol>
        </nav>
    </div>
</div>

<!-- Servicios -->
<section class="container py-5">
    <div class="row justify-content-center mb-5">
        <div class="col-lg-8 text-center">
            <span class="badge bg-gradient-primary-to-secondary text-uppercase fw-bold px-3 py-2 mb-3">Soluciones Integrales</span>
            <h2 class="section-title mb-3">Protección a la Medida para tus Necesidades</h2>
            <p class="lead text-muted">
                Ofrecemos una gama completa de productos de seguros diseñados para proteger lo que más valoras, con coberturas adaptables y soporte experto las 24 horas.
            </p>
        </div>
    </div>

    <div class="row g-4">
        @php
            $productos = [
                [
                    'icon' => 'fas fa-file-contract',
                    'titulo' => 'Seguros de Cumplimiento',
                    'descripcion' => 'Garantía de obligaciones contractuales con cobertura integral para proyectos y contratos.',
                    'beneficios' => [
                        'Fiel cumplimiento de contratos',
                        'Garantías licitatorias',
                        'Cumplimiento regulatorio'
                    ],
                    'url' => '/seguros/Cumplimiento'
                ],
                [
                    'icon' => 'fas fa-user-md',
                    'titulo' => 'Responsabilidad Civil Médica',
                    'descripcion' => 'Protección especializada para profesionales y centros de salud contra reclamaciones por negligencia.',
                    'beneficios' => [
                        'Cobertura por errores médicos',
                        'Asistencia legal especializada',
                        'Cumplimiento RETHUS'
                    ],
                    'url' => '/seguros/medicos'
                ],
                [
                    'icon' => 'fas fa-building',
                    'titulo' => 'Soluciones Corporativas',
                    'descripcion' => 'Protección integral para empresas de todos los tamaños y sectores industriales.',
                    'beneficios' => [
                        'Responsabilidad civil',
                        'Seguros de cumplimiento',
                        'ARL y riesgos laborales',
                        'Protección patrimonial'
                    ],
                    'url' => '/seguros/empresariales'
                ],
                [
                    'icon' => 'fas fa-car',
                    'titulo' => 'Protección Vehicular',
                    'descripcion' => 'Coberturas completas para automóviles, motocicletas y flotas comerciales.',
                    'beneficios' => [
                        'Seguro Todo Riesgo',
                        'SOAT obligatorio',
                        'Transporte de mercancías',
                        'Asistencia en carretera'
                    ],
                    'url' => '/seguros/vehiculos'
                ],
                [
                    'icon' => 'fas fa-graduation-cap',
                    'titulo' => 'Protección Educativa',
                    'descripcion' => 'Soluciones diseñadas para instituciones educativas y estudiantes.',
                    'beneficios' => [
                        'Seguro para prácticas profesionales',
                        'Turismo educativo',
                        'Previsión educativa',
                        'Responsabilidad civil escolar'
                    ],
                    'url' => '/seguros/educativos'
                ],
                [
                    'icon' => 'fas fa-shield-alt',
                    'titulo' => 'Coberturas Especializadas',
                    'descripcion' => 'Soluciones a medida para necesidades específicas de protección.',
                    'beneficios' => [
                        'Hotelería y turismo',
                        'Restaurantes y alimentos',
                        'Estaciones de servicio',
                        'Entidades gubernamentales'
                    ],
                    'url' => '/seguros/especializados'
                ],
            ];
        @endphp

        @foreach ($productos as $producto)
        <div class="col-md-6 col-lg-4">
            <div class="service-card p-4">
                <div class="text-center">
                    <i class="{{ $producto['icon'] }} service-icon" role="img" aria-label="Icono del seguro"></i>
                    <h4 class="fw-bold mb-3">{{ $producto['titulo'] }}</h4>
                    <p class="text-muted mb-3">{{ $producto['descripcion'] }}</p>
                    <ul class="list-unstyled text-start mb-4">
                        @foreach ($producto['beneficios'] as $beneficio)
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>{{ $beneficio }}</li>
                        @endforeach
                    </ul>
                    <a href="{{ url($producto['url']) }}" class="btn btn-outline-primary btn-sm">Más información</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- CTA -->
    <div class="row mt-5">
        <div class="col-12 text-center">
            <div class="bg-primary text-white p-5 rounded shadow">
                <h4 class="mb-3">¿Requieres asesoría especializada?</h4>
                <p class="mb-4">Nuestro equipo está listo para ayudarte a encontrar la mejor opción para ti o tu empresa.</p>
                <a href="{{ url('/contacto') }}" class="btn btn-light btn-lg px-4 fw-bold shadow-sm">Solicitar Asesoría</a>
            </div>
        </div>
    </div>
</section>

<!-- Beneficios -->
<section class="container-fluid py-5 gradient-bg">
    <div class="container py-5">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center">
                <h2 class="text-dark mb-3">¿Por qué elegir nuestros seguros?</h2>
                <p class="lead text-secondary">
                    Ofrecemos más que pólizas, brindamos tranquilidad y respaldo cuando más lo necesitas.
                </p>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="bg-white p-4 rounded text-center h-100">
                    <i class="fas fa-headset fa-3x text-primary mb-3" aria-hidden="true"></i>
                    <h5 class="mb-2">Asesoría Personalizada</h5>
                    <p class="text-muted">Expertos en seguros que analizan tus necesidades para ofrecerte la mejor solución.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="bg-white p-4 rounded text-center h-100">
                    <i class="fas fa-clock fa-3x text-primary mb-3" aria-hidden="true"></i>
                    <h5 class="mb-2">Respuesta Rápida</h5>
                    <p class="text-muted">Procesamiento ágil de siniestros con atención disponible 24/7.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="bg-white p-4 rounded text-center h-100">
                    <i class="fas fa-hand-holding-usd fa-3x text-primary mb-3" aria-hidden="true"></i>
                    <h5 class="mb-2">Coberturas Competitivas</h5>
                    <p class="text-muted">Pólizas con amplias garantías a precios altamente competitivos.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer institucional -->
<section class="py-4 bg-light border-top">
    <div class="container text-center">
        <small class="text-muted">© {{ date('Y') }} Tu Empresa de Seguros. Todos los derechos reservados. | <a href="#" class="text-decoration-none text-muted">Política de privacidad</a></small>
    </div>
</section>

@endsection
