@extends('layouts.app')

@section('title', 'Seguros Médicos')

@section('content')

<!-- Estilos -->
<style>
  .card-hover-effect:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
  }

  .bg-soft-primary {
    background-color: rgba(13, 110, 253, 0.1);
  }

  .text-gradient-primary {
    background: linear-gradient(to right, #0d6efd, #0b5ed7);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
  }

  .btn-primary-gradient {
    background: linear-gradient(to right, #0d6efd, #0b5ed7);
    border: none;
    color: white;
  }

  .btn-primary-gradient:hover {
    background: linear-gradient(to right, #0b5ed7, #0a58ca);
    color: white;
  }

  .hero-image {
    position: relative;
  }

  .hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0, 0, 0, 0.5);
  }

  @media (max-width: 768px) {
    .hero-image {
      height: 350px !important;
    }

    .hero-overlay h1 {
      font-size: 2rem !important;
    }

    .hero-overlay p {
      font-size: 1rem !important;
    }
  }
</style>

<!-- Hero Section -->
<section class="hero-section position-relative overflow-hidden">
  <div class="container-fluid p-0">
    <div class="hero-image" style="background-image: url('{{ asset('img/rce.png') }}'); height: 500px; background-size: cover; background-position: center;">
      <div class="hero-overlay d-flex align-items-center justify-content-center"></div>
    </div>
  </div>
</section>

<!-- Aseguradoras -->
<section class="py-5 bg-light">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold text-primary">Nuestras Aseguradoras</h2>
      <p class="text-muted">Trabajamos con las compañías más confiables del mercado</p>
    </div>

    <div class="row justify-content-center g-4">
      <div class="col-md-4">
        <div class="card h-100 border-0 shadow-sm card-hover-effect">
          <div class="card-body text-center p-4">
            <div class="icon-box bg-soft-primary rounded-circle mx-auto mb-4">
              <i class="fas fa-building fa-2x text-primary"></i>
            </div>
            <h5 class="fw-bold mb-3">Seguros Mundial</h5>
            <p class="text-muted">Formulario de vinculación y evaluación de riesgos directamente con Seguros Mundial.</p>

            @auth
<form id="formCumplimiento" action="{{ route('formulario.iniciarCumplimiento') }}" method="POST" target="_blank" style="display: none;">
  @csrf
</form>

<button class="btn btn-primary-gradient mt-3" onclick="document.getElementById('formCumplimiento').submit();">
  Ir al Formulario
</button>
            @else
              <a href="{{ route('cumplimiento.modal') }}" class="btn btn-primary-gradient mt-3">
                Solicitar
              </a>
            
              
            @endauth

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Beneficios -->
<section class="py-5 bg-white">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold text-primary">Beneficios de Nuestros Seguros</h2>
      <p class="text-muted">Protección diseñada específicamente para profesionales de la salud</p>
    </div>

    <div class="row g-4">
      <div class="col-md-4">
        <div class="card h-100 border-0 shadow-sm card-hover-effect">
          <div class="card-body text-center p-4">
            <div class="icon-box bg-soft-primary rounded-circle mx-auto mb-4">
              <i class="fas fa-shield-alt fa-2x text-primary"></i>
            </div>
            <h5 class="fw-bold mb-3">Protección Integral</h5>
            <p class="text-muted">Cobertura amplia para múltiples especialidades y riesgos profesionales con las mejores aseguradoras del país.</p>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card h-100 border-0 shadow-sm card-hover-effect">
          <div class="card-body text-center p-4">
            <div class="icon-box bg-soft-primary rounded-circle mx-auto mb-4">
              <i class="fas fa-headset fa-2x text-primary"></i>
            </div>
            <h5 class="fw-bold mb-3">Asistencia 24/7</h5>
            <p class="text-muted">Atención permanente ante emergencias o inquietudes con nuestro equipo especializado.</p>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card h-100 border-0 shadow-sm card-hover-effect">
          <div class="card-body text-center p-4">
            <div class="icon-box bg-soft-primary rounded-circle mx-auto mb-4">
              <i class="fas fa-hand-holding-usd fa-2x text-primary"></i>
            </div>
            <h5 class="fw-bold mb-3">Tarifas Competitivas</h5>
            <p class="text-muted">Planes flexibles con precios ajustados a cada necesidad profesional y especialidad.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- Script para abrir el modal automáticamente si viene con #abrir-modal -->
@if (auth()->check() && str_contains(request()->fullUrl(), '#abrir-modal'))
<script>
  window.addEventListener('DOMContentLoaded', () => {
    if (window.location.hash === '#abrir-modal') {
      const modal = new bootstrap.Modal(document.getElementById('modalFormularioMundial'));
      modal.show();
    }
  });
</script>


@endif
<script>
  document.addEventListener('DOMContentLoaded', () => {
    const btn = document.getElementById('btnFormularioCumplimiento');
    if (!btn) return;

    btn.addEventListener('click', async function () {
      try {
        const response = await fetch("{{ route('formulario.iniciarCumplimiento') }}", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}"
          },
          body: JSON.stringify({})
        });

        if (response.ok) {
          window.open("https://sarlaft.segurosmundial.com.co/forms/f/92c704c9-1967-4c90-b460-212af6bfa7fd", "_blank");
        } else {
          alert("Error al iniciar el formulario.");
        }
      } catch (error) {
        alert("Hubo un problema al contactar el servidor.");
      }
    });
  });
</script>


@endsection
