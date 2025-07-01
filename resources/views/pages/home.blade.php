@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
<!-- Hero Section - Carrusel -->
<section class="hero-section">
    <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#header-carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#header-carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#header-carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>

        <div class="carousel-inner">
            <!-- Slide 1 -->
            <div class="carousel-item active">
                <img src="{{ asset('img/clientes2.png') }}" class="d-block w-100 object-fit-cover" alt="Protección Total">
                <div class="carousel-caption d-flex flex-column justify-content-center align-items-center h-100">
                    <h5 class="text-uppercase text-white mb-3">Más de 20 años de experiencia</h5>
                    <h1 class="display-4 fw-bold text-white mb-4 text-center">Protegemos tu Vida y tu Patrimonio</h1>
                    <a href="{{ url('/productos') }}" class="btn btn-lg btn-primary px-4 py-2">Ver Productos</a>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item">
                <img src="{{ asset('img/poliza.jpg') }}" class="d-block w-100 object-fit-cover" alt="Asesoría Experta">
                <div class="carousel-caption d-flex flex-column justify-content-center align-items-center h-100">
                    <h5 class="text-uppercase text-white mb-3">Asesoría Personalizada</h5>
                    <h1 class="display-4 fw-bold text-white mb-4 text-center">Te Guiamos en la Elección de tu Póliza</h1>
                    <a href="{{ url('/') }}" class="btn btn-lg btn-primary px-4 py-2">Contáctanos</a>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="carousel-item">
                <img src="{{ asset('img/clientes3.png') }}" class="d-block w-100 object-fit-cover" alt="Clientes Felices">
                <div class="carousel-caption d-flex flex-column justify-content-center align-items-center h-100">
                    <h5 class="text-uppercase text-white mb-3">Confianza y Seguridad</h5>
                    <h1 class="display-4 fw-bold text-white mb-4 text-center">Miles de Clientes Protegidos</h1>
                    <a href="{{ url('/about') }}" class="btn btn-lg btn-primary px-4 py-2">Conócenos</a>
                </div>
            </div>
        </div>

        <!-- Controles -->
        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>
    </div>
</section>

<!-- About Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <img src="{{ asset('img/clientes.jpg') }}" class="img-fluid w-100 rounded-4 shadow-sm" alt="Quiénes Somos">
            </div>
            <div class="col-lg-6">
                <span class="badge bg-primary text-white px-3 py-2 mb-3">Quiénes Somos</span>
                <h2 class="fw-bold mb-4">Tu Aliado en Seguros Médicos y de Cumplimiento</h2>
                <p class="lead text-muted mb-4">
                    Con más de 20 años de experiencia, nuestra agencia — fundada en 2003 en Maicao — ofrece soluciones especializadas en seguros para profesionales de la salud y garantías contractuales.
                </p>
                <p class="text-muted mb-4">
                    Brindamos atención personalizada, procesos ágiles y respaldo de aseguradoras líderes, protegiendo a quienes ejercen con responsabilidad y compromiso.
                </p>
                <a href="{{ url('/about') }}" class="btn btn-primary px-4">
                    <i class="fa fa-arrow-right me-2"></i> Leer Más
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Aseguradoras Section Mejorado -->
<section class="py-5" style="background: linear-gradient(to right, #f8f9fa, #eef2f7);">
    <div class="container">
        <div class="text-center mb-5">
            <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 mb-2">🔒 Aseguradoras Aliadas</span>
            <h2 class="fw-bold text-dark mb-3">Confianza y Respaldo Garantizados</h2>
            <p class="text-muted">Trabajamos con las principales compañías aseguradoras del país</p>
        </div>

        <div class="swiper aseguradorasSwiper">
            <div class="swiper-wrapper align-items-center py-3">
                @foreach (['confianza', 'previsora', 'colpatria', 'mundial'] as $logo)
                <div class="swiper-slide">
                    <div class="logo-wrapper p-3 d-flex align-items-center justify-content-center h-100 bg-white rounded-4 shadow-sm hover-scale transition">
                    <img src="{{ asset("img/aseguradoras/{$logo}.png") }}"
                        alt="{{ ucfirst($logo) }}"
                        class="aseguradora-logo"
                        style="max-height: 80px; object-fit: contain;">

                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- Estilos adicionales -->
<style>
    .hover-scale {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .hover-scale:hover {
        transform: scale(1.05);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
</style>

<!-- Servicios Section -->
<section class="py-5" style="background: linear-gradient(135deg, #f8f9fa, #e9ecef);">
  <div class="container">
    <div class="section-title text-center mb-5">
      <span class="badge px-3 py-2 text-uppercase small" style="background-color: #1f3b4d; color: #fff;">
        Nuestros Servicios
      </span>
      <h2 class="fw-bold mt-3" style="color: #1f3b4d;">Soluciones en Seguros para Tu Tranquilidad</h2>
      <p class="lead text-muted">Pólizas diseñadas para proteger tu patrimonio, salud y negocios con el respaldo de las mejores aseguradoras.</p>
      <p class="text-muted mb-4">Atendemos a personas, empresas y profesionales del sector salud con soluciones personalizadas, ágiles y con acompañamiento experto.</p>
    </div>

    <div class="row g-4">
      <!-- Servicio 1 -->
      <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
        <div class="card h-100 border-0 shadow-sm rounded-4 hover-shadow">
          <div class="card-body text-center p-4">
            <div class="icon-container mb-4">
              <i class="fa fa-user-shield fa-2x text-primary"></i>
            </div>
            <h5 class="fw-semibold mb-2 text-dark">Cumplimiento</h5>
            <p class="text-muted" style="font-size: 0.95rem;">Pólizas que garantizan el cumplimiento de tus obligaciones contractuales.</p>
            <a href="{{ url('/seguros/Cumplimiento') }}" class="btn btn-sm btn-outline-primary rounded-pill mt-2 px-3">
              Leer Más <i class="fa fa-arrow-right ms-1"></i>
            </a>
          </div>
        </div>
      </div>

      <!-- Servicio 2 -->
      <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
        <div class="card h-100 border-0 shadow-sm rounded-4 hover-shadow">
          <div class="card-body text-center p-4">
            <div class="icon-container mb-4">
              <i class="fa fa-hospital fa-2x text-primary"></i>
            </div>
            <h5 class="fw-semibold mb-2 text-dark">Profesionales de la Salud</h5>
            <p class="text-muted" style="font-size: 0.95rem;">Coberturas especializadas para médicos, enfermeros y especialistas.</p>
            <a href="{{ url('/seguros/medicos') }}" class="btn btn-sm btn-outline-primary rounded-pill mt-2 px-3">
              Leer Más <i class="fa fa-arrow-right ms-1"></i>
            </a>
          </div>
        </div>
      </div>

      <!-- Servicio 3 -->
      <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
        <div class="card h-100 border-0 shadow-sm rounded-4 hover-shadow">
          <div class="card-body text-center p-4">
            <div class="icon-container mb-4">
              <i class="fa fa-car fa-2x text-primary"></i>
            </div>
            <h5 class="fw-semibold mb-2 text-dark">Vehículos</h5>
            <p class="text-muted" style="font-size: 0.95rem;">Protección amplia para tu vehículo ante accidentes, robos y más.</p>
            <a href="{{ url('/services#vehiculos') }}" class="btn btn-sm btn-outline-primary rounded-pill mt-2 px-3">
              Leer Más <i class="fa fa-arrow-right ms-1"></i>
            </a>
          </div>
        </div>
      </div>

      <!-- Servicio 4 -->
      <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
        <div class="card h-100 border-0 shadow-sm rounded-4 hover-shadow">
          <div class="card-body text-center p-4">
            <div class="icon-container mb-4">
              <i class="fa fa-building fa-2x text-primary"></i>
            </div>
            <h5 class="fw-semibold mb-2 text-dark">Empresariales</h5>
            <p class="text-muted" style="font-size: 0.95rem;">Coberturas patrimoniales y operacionales para tu negocio.</p>
            <a href="{{ url('/services#empresariales') }}" class="btn btn-sm btn-outline-primary rounded-pill mt-2 px-3">
              Leer Más <i class="fa fa-arrow-right ms-1"></i>
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- CTA final -->
    <div class="text-center mt-5">
      <p class="text-muted fst-italic mb-3">Más de <strong>20 años de experiencia</strong> brindando confianza, agilidad y respaldo a nuestros asegurados.</p>
      <a href="{{ url('/productos') }}" class="btn btn-primary btn-lg rounded-pill shadow-sm px-5 py-3 mt-2">
        <i class="fa fa-layer-group me-2"></i> Ver Todos los Productos
      </a>
    </div>
  </div>
</section>

<!-- Estadísticas Section -->
<section class="py-5 bg-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-5">
                <span class="badge bg-primary text-white px-3 py-2 mb-3">¿Por qué elegirnos?</span>
                <h2 class="fw-bold mb-4">20 Años Protegiendo Tu Futuro</h2>
                <p class="text-muted mb-4">
                    Desde el 2003 brindamos seguridad, respaldo y acompañamiento profesional a miles de clientes en toda La Guajira. Con nosotros, tu tranquilidad está asegurada.
                </p>

                <ul class="list-unstyled">
                    <li class="d-flex align-items-start mb-3">
                        <i class="fa fa-check-circle text-primary me-2 mt-1"></i>
                        <span>Asesoría 100% personalizada y cercana</span>
                    </li>
                    <li class="d-flex align-items-start mb-3">
                        <i class="fa fa-handshake text-primary me-2 mt-1"></i>
                        <span>Alianzas con aseguradoras líderes del país</span>
                    </li>
                    <li class="d-flex align-items-start mb-3">
                        <i class="fa fa-layer-group text-primary me-2 mt-1"></i>
                        <span>Cobertura amplia para personas, familias y empresas</span>
                    </li>
                </ul>

                <a href="{{ url('/about') }}" class="btn btn-primary px-4">Conócenos Más</a>
            </div>

            <div class="col-lg-6">
                <div class="row g-4">
                    @php
                    $stats = [
                        ['target' => $estadisticas['anios_experiencia'], 'label' => 'Años de Experiencia'],
                        ['target' => $estadisticas['aseguradoras_aliadas'], 'label' => 'Aseguradoras Aliadas'],
                        ['target' => $estadisticas['clientes_satisfechos'], 'label' => 'Clientes Satisfechos'],
                        ['target' => $estadisticas['polizas_emitidas'], 'label' => 'Pólizas Emitidas'],
                    ];
                    @endphp

                    @foreach($stats as $stat)
                    <div class="col-sm-6">
                        <div class="bg-light rounded shadow-sm text-center py-4 h-100 hover-shadow">
                            <h2 class="text-primary fw-bold display-5 mb-2 counter" data-target="{{ $stat['target'] }}">0</h2>
                            <p class="mb-0 fw-semibold text-muted">{{ $stat['label'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Equipo Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-start">
            <div class="col-lg-4 mb-4">
                <span class="badge bg-primary text-white px-3 py-2 mb-3">Conoce al Equipo</span>
                <h2 class="fw-bold mb-4">Expertas que Respaldan Nuestra Misión</h2>
                <p class="text-muted mb-4">
                    Nuestro equipo está compuesto por profesionales comprometidas con brindar asesoría clara, efectiva y oportuna en seguros.
                </p>
                <a href="#" class="btn btn-primary px-4">Ver Todo el Equipo</a>
            </div>

            <div class="col-lg-8">
                <div class="owl-carousel owl-theme team-carousel">
                    <!-- Miembro 1 -->
                    <div class="team-item bg-white rounded shadow-sm overflow-hidden">
                        <div class="position-relative">
                            <img src="{{ asset('img/mayerli.png') }}" class="img-fluid w-100" alt="Mayerlis Pana" style="height: 320px; object-fit: cover;">
                            <div class="team-overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center bg-dark bg-opacity-50 opacity-0">
                                <div class="d-flex gap-2">
                                    <a href="#" class="btn btn-outline-light rounded-circle"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#" class="btn btn-outline-light rounded-circle"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="text-center py-3 px-3">
                            <h5 class="fw-bold mb-1">Mayerlis Bolaños</h5>
                            <small class="text-muted">Gerente de Seguros</small>
                        </div>
                    </div>

                    <!-- Miembro 2 -->
                    <div class="team-item bg-white rounded shadow-sm overflow-hidden">
                        <div class="position-relative">
                            <img src="{{ asset('img/presidenta.png') }}" class="img-fluid w-100" alt="Ibeth Pana" style="height: 320px; object-fit: cover;">
                            <div class="team-overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center bg-dark bg-opacity-50 opacity-0">
                                <div class="d-flex gap-2">
                                    <a href="#" class="btn btn-outline-light rounded-circle"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#" class="btn btn-outline-light rounded-circle"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="text-center py-3 px-3">
                            <h5 class="fw-bold mb-1">Ibeth Pana waffer</h5>
                            <small class="text-muted">Presidenta De La compañia</small>
                        </div>
                    </div>

                    <!-- Miembro 3 -->
                    <div class="team-item bg-white rounded shadow-sm overflow-hidden">
                        <div class="position-relative">
                            <img src="{{ asset('img/karla.png') }}" class="img-fluid w-100" alt="Ibeth Pana" style="height: 320px; object-fit: cover;">
                            <div class="team-overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center bg-dark bg-opacity-50 opacity-0">
                                <div class="d-flex gap-2">
                                    <a href="#" class="btn btn-outline-light rounded-circle"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#" class="btn btn-outline-light rounded-circle"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="text-center py-3 px-3">
                            <h5 class="fw-bold mb-1">karla Bolaños</h5>
                            <small class="text-muted">Asesora Comercial</small>
                        </div>
                    </div>

                    <!-- Miembro 4 -->
                    <div class="team-item bg-white rounded shadow-sm overflow-hidden">
                        <div class="position-relative">
                            <img src="{{ asset('img/sebastian.png') }}" class="img-fluid w-100" alt="Nuevo miembro" style="height: 320px; object-fit: cover;">
                            <div class="team-overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center bg-dark bg-opacity-50 opacity-0">
                                <div class="d-flex gap-2">
                                    <a href="#" class="btn btn-outline-light rounded-circle"><i class="fab fa-twitter"></i></a>
                                    <a href="#" class="btn btn-outline-light rounded-circle"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="text-center py-3 px-3">
                            <h5 class="fw-bold mb-1">Esteban Nieves</h5>
                            <small class="text-muted">Asesor comercial</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-5 bg-primary text-white">
    <div class="container text-center py-4">
        <h2 class="fw-bold mb-4">¿Listo para proteger lo que más te importa?</h2>
        <p class="lead mb-4">
            Contáctanos hoy mismo para una asesoría gratuita y sin compromiso.
        </p>
        <a href="{{ url('/contacto') }}" class="btn btn-light btn-lg px-5">
            Solicitar Asesoría
        </a>
    </div>
</section>
@endsection

@section('styles')
<style>
    /* Hero Section */
    .hero-section {
        height: 100vh;
        min-height: 600px;
    }
    
    .carousel-item {
        height: 100%;
    }
    
    .object-fit-cover {
        height: 100%;
        width: 100%;
        object-fit: cover;
        filter: brightness(60%);
    }
    
    .carousel-caption {
        z-index: 10;
    }
    
    .carousel-caption h1,
    .carousel-caption h5 {
        text-shadow: 2px 2px 12px rgba(0,0,0,0.85);
    }
    
    /* Logo Aseguradoras */
    .logo-wrapper {
        width: 170px;
        height: 100px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #fff;
        border-radius: 1rem;
        box-shadow: 0 2px 8px rgba(0,0,0,0.07);
        margin: 0 auto;
        transition: all 0.3s ease;
    }
    
    .logo-wrapper:hover {
        transform: translateY(-4px);
        box-shadow: 0 4px 20px rgba(80,80,180,0.10);
    }
    
.aseguradora-logo {
    max-width: 80%;
    max-height: 65px;
    object-fit: contain;
    transition: all 0.3s ease;
}

    
    /* Icon Box */
    .icon-container {
        width: 70px;
        height: 70px;
        background: linear-gradient(145deg, #ffffff, #dfe6ec);
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        margin: 0 auto 20px;
        transition: transform 0.3s ease;
    }
    
    .icon-container:hover {
        transform: scale(1.1);
    }
    
    /* Team Card */
    .team-item {
        transition: all 0.3s ease;
    }
    
    .team-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 1rem 2rem rgba(0, 0, 0, 0.15);
    }
    
    .team-overlay {
        transition: all 0.3s ease;
    }
    
    .team-item:hover .team-overlay {
        opacity: 1 !important;
    }
    
    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .hero-section {
            height: auto;
            min-height: 500px;
        }
        
        .logo-wrapper {
            width: 120px;
            height: 70px;
        }
        
        .aseguradora-logo {
            max-height: 40px;
        }
    }
</style>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Contador de estadísticas
    const counters = document.querySelectorAll('.counter');
    const animateCounter = (el) => {
        const target = +el.getAttribute('data-target');
        let count = 0;
        const step = Math.ceil(target / 50);

        const update = () => {
            count += step;
            if (count >= target) {
                el.textContent = target.toLocaleString();
            } else {
                el.textContent = count.toLocaleString();
                requestAnimationFrame(update);
            }
        };
        update();
    };

    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateCounter(entry.target);
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.6 });

    counters.forEach(counter => {
        observer.observe(counter);
    });

    // Swiper para aseguradoras
    new Swiper(".aseguradorasSwiper", {
        loop: true,
        slidesPerView: "auto",
        spaceBetween: 30,
        speed: 3000,
        autoplay: {
            delay: 0,
            disableOnInteraction: false
        },
        freeMode: true,
        freeModeMomentum: false,
        grabCursor: true
    });
});
</script>
@endsection