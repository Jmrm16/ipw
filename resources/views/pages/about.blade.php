@extends('layouts.app')

@section('title', 'About')

@section('content')
<!-- Page Header Start -->
<div class="container-fluid page-header d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5 mb-5">
    <h1 class="display-4 text-white mb-3 mt-0 mt-lg-5">Acerca de</h1>
    <div class="d-inline-flex text-white">
        <p class="m-0"><a class="text-white" href="">Inicio</a></p>
        <p class="m-0 px-2">/</p>
        <p class="m-0">Acerca de</p>
    </div>
</div>
<!-- Page Header Start -->

<!-- About Start Mejorado -->
<section class="py-5 bg-light">
  <div class="container">
    <div class="row align-items-center g-5">
      
      <!-- Imagen profesional -->
      <div class="col-lg-5">
        <img class="img-fluid rounded-4 shadow-sm" src="{{ asset('img/logoB.png') }}" alt="Equipo de seguros IPW">
      </div>

      <!-- Contenido -->
      <div class="col-lg-7">
        <span class="badge bg-primary text-white px-3 py-2 text-uppercase mb-3">Quiénes Somos</span>
        <h2 class="fw-bold text-dark mb-3">Agencia de Seguros IPW</h2>
        <p class="lead text-muted mb-4">
          Fundada en 2003 en Maicao, somos una agencia con amplia trayectoria ofreciendo soluciones reales en seguros. Protegemos lo que más valoras.
        </p>

        <!-- Misión y Visión en columnas -->
        <div class="row mb-4">
          <div class="col-md-6">
            <h5 class="fw-bold text-primary"><i class="bi bi-bullseye me-2"></i>Misión</h5>
            <p class="text-muted mb-0">Asesorar de forma cercana y profesional, garantizando protección y confianza en cada póliza.</p>
          </div>
          <div class="col-md-6">
            <h5 class="fw-bold text-primary"><i class="bi bi-eye me-2"></i>Visión</h5>
            <p class="text-muted mb-0">Ser referentes en La Guajira al 2026 por nuestra ética, compromiso y alianzas sólidas.</p>
          </div>
        </div>

        <!-- Valores en dos columnas -->
        <div class="mb-4">
          <h5 class="fw-bold text-primary"><i class="bi bi-stars me-2"></i>Valores Corporativos</h5>
          <ul class="row list-unstyled text-muted ps-3">
            @foreach(['Responsabilidad', 'Compromiso', 'Respeto', 'Integridad', 'Transparencia', 'Equidad', 'Tolerancia', 'Honestidad'] as $valor)
              <li class="col-6 mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i>{{ $valor }}</li>
            @endforeach
          </ul>
        </div>

        <a href="{{ url('/about') }}" class="btn btn-primary px-4 py-2 rounded-pill shadow-sm">Conócenos más</a>
      </div>
    </div>

    <!-- Contacto -->
    <div class="row text-center mt-5 g-4">
      <div class="col-md-4">
        <div class="bg-white p-4 rounded shadow-sm h-100 d-flex align-items-center justify-content-center">
          <i class="bi bi-geo-alt-fill fa-2x text-primary me-3"></i>
          <div class="text-start">
            <h6 class="fw-bold mb-1">Nuestra Oficina</h6>
            <p class="mb-0 text-muted">Calle 16 No. 12 - 100, Maicao</p>
            <p class="mb-0 text-muted">Calle 14D #10-80, Uribia</p>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="bg-white p-4 rounded shadow-sm h-100 d-flex align-items-center justify-content-center">
          <i class="bi bi-envelope-open-fill fa-2x text-primary me-3"></i>
          <div class="text-start">
            <h6 class="fw-bold mb-1">Correo Electrónico</h6>
            <p class="mb-0 text-muted">ibethpana@gmail.com</p>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="bg-white p-4 rounded shadow-sm h-100 d-flex align-items-center justify-content-center">
          <i class="bi bi-telephone-fill fa-2x text-primary me-3"></i>
          <div class="text-start">
            <h6 class="fw-bold mb-1">Contáctanos</h6>
            <p class="mb-0 text-muted">300 800 0231 - Maicao</p>
            <p class="mb-0 text-muted">312 772 1352 - Uribia</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- About End -->

<!-- Features Start -->
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
              ['target' => 20, 'label' => 'Años de Experiencia'],
              ['target' => 15, 'label' => 'Aseguradoras Aliadas'],
              ['target' => 1200, 'label' => 'Clientes Satisfechos'],
              ['target' => 5000, 'label' => 'Pólizas Emitidas']
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

<!-- Features End -->

<!-- Team Start -->

<!-- Team End -->
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
@endsection