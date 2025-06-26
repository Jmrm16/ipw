@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
<!-- Carrusel Inicio -->
<div class="container-fluid p-0">
    <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#header-carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#header-carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#header-carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>

        <div class="carousel-inner">

            <!-- Slide 1 -->
            <div class="carousel-item active" style="height: 100vh;">
                <img src="{{ asset('img/clientes2.png') }}" class="d-block w-100 h-100" style="object-fit: cover; filter: brightness(60%);" alt="Protección Total">
                <div class="carousel-caption d-flex flex-column justify-content-center align-items-center h-100">
                    <h5 class="text-uppercase text-white mb-3" style="text-shadow: 1px 1px 8px #000;">Más de 20 años de experiencia</h5>
                    <h1 class="display-4 fw-bold text-white mb-4 text-center" style="text-shadow: 2px 2px 12px #000;">Protegemos tu Vida y tu Patrimonio</h1>
                    <a href="{{ url('/productos') }}" class="btn btn-lg btn-primary px-4 py-2">Ver Productos</a>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item" style="height: 100vh;">
                <img src="{{ asset('img/poliza.jpg') }}" class="d-block w-100 h-100" style="object-fit: cover; filter: brightness(60%);" alt="Asesoría Experta">
                <div class="carousel-caption d-flex flex-column justify-content-center align-items-center h-100">
                    <h5 class="text-uppercase text-white mb-3" style="text-shadow: 1px 1px 8px #000;">Asesoría Personalizada</h5>
                    <h1 class="display-4 fw-bold text-white mb-4 text-center" style="text-shadow: 2px 2px 12px #000;">Te Guiamos en la Elección de tu Póliza</h1>
                    <a href="{{ url('/contacto') }}" class="btn btn-lg btn-primary px-4 py-2">Contáctanos</a>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="carousel-item" style="height: 100vh;">
                <img src="{{ asset('img/clientes3.png') }}" class="d-block w-100 h-100" style="object-fit: cover; filter: brightness(60%);" alt="Clientes Felices">
                <div class="carousel-caption d-flex flex-column justify-content-center align-items-center h-100">
                    <h5 class="text-uppercase text-white mb-3" style="text-shadow: 1px 1px 8px #000;">Confianza y Seguridad</h5>
                    <h1 class="display-4 fw-bold text-white mb-4 text-center" style="text-shadow: 2px 2px 12px #000;">Miles de Clientes Protegidos</h1>
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
</div>
<!-- Carrusel Fin -->


<!-- About Section -->
<section class="py-5 bg-light">
  <div class="container">
    <div class="row align-items-center g-5">
      
      <!-- Imagen -->
      <div class="col-lg-6">
        <div class="position-relative rounded-4 overflow-hidden shadow-sm hover-shadow">
          <img src="{{ asset('img/clientes.jpg') }}" class="img-fluid w-100" alt="Quiénes Somos - Agencia de Seguros">
        </div>
      </div>

      <!-- Contenido -->
<div class="col-lg-6">
  <div class="mb-4">
    <span class="badge px-3 py-2 text-uppercase small" style="background-color: #1f3b4d; color: #fff;">
      Quiénes Somos
    </span>
    <h2 class="fw-bold mt-3" style="color: #1f3b4d;">
      Tu Aliado en Seguros Médicos y de Cumplimiento
    </h2>
  </div>

  <p class="lead text-muted mb-4">
    Con más de 20 años de experiencia, nuestra agencia — fundada en 2003 en Maicao — ofrece soluciones especializadas en seguros para profesionales de la salud y garantías contractuales.
  </p>

  <p class="text-muted mb-4">
    Brindamos atención personalizada, procesos ágiles y respaldo de aseguradoras líderes, protegiendo a quienes ejercen con responsabilidad y compromiso.
  </p>

  <a href="{{ url('/about') }}" class="btn rounded-pill px-4" style="background-color: #1f3b4d; color: #fff;">
    <i class="fa fa-arrow-right me-2"></i> Leer Más
  </a>
</div>


    </div>
  </div>
</section>



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


<!-- Características Inicio -->
<div class="container-fluid bg-light py-5">
  <div class="container">
    <div class="row align-items-center">
      
      <!-- Texto Informativo -->
      <div class="col-lg-6 mb-5">
        <span class="badge rounded-pill bg-primary mb-3 px-3 py-2 text-uppercase shadow-sm">¿Por qué elegirnos?</span>
        <h2 class="fw-bold text-dark mb-3">20 Años Protegiendo Tu Futuro</h2>
        <p class="text-muted mb-4 fs-5">
          Desde el 2003 brindamos seguridad, respaldo y acompañamiento profesional a miles de clientes en toda La Guajira. Con nosotros, tu tranquilidad está asegurada.
        </p>

        <ul class="list-unstyled">
          <li class="d-flex align-items-start mb-3">
            <i class="fa fa-check-circle text-primary me-2 mt-1"></i>
            <span class="text-dark">Asesoría 100% personalizada y cercana</span>
          </li>
          <li class="d-flex align-items-start mb-3">
            <i class="fa fa-handshake text-primary me-2 mt-1"></i>
            <span class="text-dark">Alianzas con aseguradoras líderes del país</span>
          </li>
          <li class="d-flex align-items-start mb-3">
            <i class="fa fa-layer-group text-primary me-2 mt-1"></i>
            <span class="text-dark">Cobertura amplia para personas, familias y empresas</span>
          </li>
        </ul>

        <a href="{{ url('/about') }}" class="btn btn-primary px-4 py-2 rounded-pill mt-3 shadow-sm">Conócenos Más</a>
      </div>

      <!-- Estadísticas con contador -->
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
              <div class="bg-white rounded shadow-sm text-center py-4 h-100 hover-shadow">
                <h2 class="text-primary fw-bold display-5 mb-2 counter" data-target="{{ $stat['target'] }}">0</h2>
                <p class="mb-0 fw-semibold text-muted">{{ $stat['label'] }}</p>
              </div>
            </div>
          @endforeach
        </div>
      </div>

    </div>
  </div>
</div>


<!-- Características Fin -->

<!-- Equipo Inicio -->
<section class="bg-light py-5">
  <div class="container">
    <div class="row align-items-start">
      
      <!-- Texto Introductorio -->
      <div class="col-lg-4 mb-4">
        <span class="badge text-uppercase px-3 py-2 mb-2" style="background-color: #1f3b4d; color: white;">Conoce al Equipo</span>
        <h2 class="fw-bold" style="color: #1f3b4d;">Expertas que Respaldan Nuestra Misión</h2>
        <p class="text-muted mt-3 mb-4">
          Nuestro equipo está compuesto por profesionales comprometidas con brindar asesoría clara, efectiva y oportuna en seguros.
        </p>
        <a href="#" class="btn btn-primary rounded-pill px-4 py-2">Ver Todo el Equipo</a>
      </div>

      <!-- Carrusel de equipo -->
      <div class="col-lg-8">
        <div class="owl-carousel owl-theme team-carousel">

          <!-- Miembro 1 -->
          <div class="team-item bg-white rounded shadow-sm overflow-hidden">
            <div class="position-relative">
              <img src="{{ asset('img/aseg.png') }}" class="img-fluid w-100" alt="Mayerlis Pana" style="height: 320px; object-fit: cover;">
              <div class="team-overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center bg-dark bg-opacity-50 opacity-0 hover-opacity-100 transition">
                <div class="d-flex gap-2">
                  <a href="#" class="btn btn-outline-light rounded-circle"><i class="fab fa-facebook-f"></i></a>
                  <a href="#" class="btn btn-outline-light rounded-circle"><i class="fab fa-linkedin-in"></i></a>
                </div>
              </div>
            </div>
            <div class="text-center py-3 px-3">
              <h5 class="fw-bold mb-1 text-dark">Mayerlis Pana</h5>
              <small class="text-muted">Asesora de Seguros</small>
            </div>
          </div>

          <!-- Miembro 2 -->
          <div class="team-item bg-white rounded shadow-sm overflow-hidden">
            <div class="position-relative">
              <img src="{{ asset('img/ibeth.jpg') }}" class="img-fluid w-100" alt="Ibeth Pana" style="height: 320px; object-fit: cover;">
              <div class="team-overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center bg-dark bg-opacity-50 opacity-0 hover-opacity-100 transition">
                <div class="d-flex gap-2">
                  <a href="#" class="btn btn-outline-light rounded-circle"><i class="fab fa-facebook-f"></i></a>
                  <a href="#" class="btn btn-outline-light rounded-circle"><i class="fab fa-linkedin-in"></i></a>
                </div>
              </div>
            </div>
            <div class="text-center py-3 px-3">
              <h5 class="fw-bold mb-1 text-dark">Ibeth Pana</h5>
              <small class="text-muted">Asesora Comercial</small>
            </div>
          </div>

          <!-- Placeholder -->
          <div class="team-item bg-white rounded shadow-sm overflow-hidden">
            <div class="position-relative">
              <img src="https://em-content.zobj.net/source/apple/118/man-pouting-type-1-2_1f64e-1f3fb-200d-2642-fe0f.png" class="img-fluid w-100" alt="Nuevo miembro" style="height: 320px; object-fit: cover;">
              <div class="team-overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center bg-dark bg-opacity-50 opacity-0 hover-opacity-100 transition">
                <div class="d-flex gap-2">
                  <a href="#" class="btn btn-outline-light rounded-circle"><i class="fab fa-twitter"></i></a>
                  <a href="#" class="btn btn-outline-light rounded-circle"><i class="fab fa-linkedin-in"></i></a>
                </div>
              </div>
            </div>
            <div class="text-center py-3 px-3">
              <h5 class="fw-bold mb-1 text-dark">Esteban Nieves</h5>
              <small class="text-muted">Asesor comercial</small>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>
</section>


<!-- CTA Section -->
<section class="py-5 bg-dark text-white" style="margin-bottom: 40px;">
  <div class="container text-center py-5">
    <h2 class="fw-bold mb-3" style="color: #ffffff;">¿Listo para proteger lo que más te importa?</h2>
    <p class="lead mb-4 text-light">
      Contáctanos hoy mismo para una asesoría gratuita y sin compromiso.
    </p>
    <a href="{{ url('/contacto') }}" class="btn btn-primary btn-lg px-5 py-3 rounded-pill shadow-sm">
      Solicitar Asesoría
    </a>
  </div>
</section>

<!-- Aseguradoras Aliadas -->
<section class="py-5" style="background: linear-gradient(135deg, #f8f9fa, #ffffff);">
  <div class="container">
    <div class="text-center mb-4">
      <span class="badge bg-primary bg-opacity-10 text-primary fw-semibold px-3 py-2 rounded-pill mb-2">
        Aseguradoras Aliadas
      </span>
      <h2 class="fw-bold text-dark">Confianza y Respaldo Garantizados</h2>
      <p class="text-muted">Trabajamos con las principales compañías aseguradoras del país</p>
    </div>

    <div class="swiper aseguradorasSwiper px-2">
      <div class="swiper-wrapper align-items-center py-3">
        @foreach (['confianza', 'previsora', 'colpatria', 'mundial'] as $logo)
          <div class="swiper-slide">
            <div class="logo-wrapper bg-white shadow-sm rounded-4 p-3 mx-2 d-flex align-items-center justify-content-center">
              <img src="{{ asset("img/aseguradoras/{$logo}.png") }}" alt="{{ ucfirst($logo) }}" class="img-fluid aseguradora-logo">
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</section>






@endsection

@section('styles')
<style>

  
    /* Hero Section */
    .hero-section {
        height: 100vh;
        min-height: 600px;
        max-height: 800px;
    }
    
    .carousel-item {
        height: 100%;
    }
    
    .carousel-item img {
        height: 100%;
        object-fit: cover;
    }
    
    .carousel-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.5);
    }
    
    /* Section Titles */
    .section-title span {
        letter-spacing: 1px;
    }
    
    .section-title h2 {
        position: relative;
        padding-bottom: 15px;
    }
    
    .section-title h2:after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 3px;
        background: var(--bs-primary);
    }
    
    /* Icon Box */
    .icon-box {
        width: 80px;
        height: 80px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    /* Counter */
    [data-counter] {
        transition: all 1s ease;
    }
    
    /* Team Card */
    .team-card .team-img {
        height: 300px;
    }
    
    .team-card .team-img img {
        height: 100%;
        width: 100%;
        object-fit: cover;
    }
    
    .team-social {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.7);
        opacity: 0;
        transition: all 0.3s ease;
    }
    
    .team-card:hover .team-social {
        opacity: 1;
    }
    
    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .hero-section {
            height: auto;
            min-height: 500px;
        }
        
        .section-title h2:after {
            width: 60px;
        }
        
        .team-card .team-img {
            height: 250px;
        }
    }
    .object-fit-cover {
    object-fit: cover;
    object-position: center;
}

.carousel-caption {
    z-index: 10;
}

.carousel-caption h1,
.carousel-caption h5 {
    text-shadow: 2px 2px 12px rgba(0,0,0,0.85);
}

.carousel-item img {
    transition: transform 3s ease;
}

.carousel-item.active img {
    transform: scale(1.03);
}



.bg-soft-primary {
  background-color: rgba(31, 59, 77, 0.1);
}

.hover-shadow {
  transition: all 0.3s ease;
}

.hover-shadow:hover {
  transform: translateY(-4px);
  box-shadow: 0 0.75rem 1.5rem rgba(0, 0, 0, 0.1);
}

.hover-shadow:hover {
  transform: translateY(-5px);
  box-shadow: 0 1rem 2rem rgba(0, 0, 0, 0.15);
  transition: all 0.3s ease;
}


.swiper-slide {
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 15px;
}

.aseguradora-logo {
  max-height: 120px;
  filter: grayscale(100%);
  transition: all 0.3s ease-in-out;
}

.aseguradora-logo:hover {
  filter: grayscale(0%);
  transform: scale(1.05);
}

.logo-wrapper {
  height: 100px;
  transition: transform 0.3s ease;
}

.logo-wrapper:hover {
  transform: translateY(-4px);
}


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



</style>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const counters = document.querySelectorAll('.counter');

    const animateCounter = (el) => {
        const target = +el.getAttribute('data-target');
        let count = 0;
        const step = Math.ceil(target / 50); // velocidad

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
});
</script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    new Swiper(".aseguradorasSwiper", {
      loop: true,
      slidesPerView: "auto",
      spaceBetween: 30,
      speed: 3000, // velocidad de deslizamiento continuo
      autoplay: {
        delay: 0,             // sin pausas
        disableOnInteraction: false
      },
      freeMode: true,
      freeModeMomentum: false, // muy importante
      grabCursor: true
    });
  });
</script>


@endsection
