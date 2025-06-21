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

<!-- Requisitos según tipo de persona -->
<section class="py-5 bg-light">
  <div class="container">

    {{-- Encabezado principal --}}
    <div class="text-center mb-5">
      <h2 class="fw-bold text-primary">Proceso de Cumplimiento - SARLAFT</h2>
      <p class="text-muted">
        Antes de iniciar el proceso, selecciona el tipo de persona correspondiente y revisa cuidadosamente los requisitos exigidos.
      </p>
    </div>

    <div class="accordion" id="accordionCumplimiento">

      {{-- Persona Natural --}}
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingNatural">
          <button class="accordion-button fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNatural" aria-expanded="true" aria-controls="collapseNatural">
            Persona Natural
          </button>
        </h2>
        <div id="collapseNatural" class="accordion-collapse collapse show" aria-labelledby="headingNatural" data-bs-parent="#accordionCumplimiento">
          <div class="accordion-body">

            <p class="mb-3 text-muted">
              A continuación se detallan los documentos requeridos para personas naturales. Todos deben estar actualizados y ser legibles.
            </p>

            <ul class="list-group mb-4">
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <strong>Documento de Identidad</strong>
                <span class="text-muted">Cédula de ciudadanía escaneada</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <strong>Certificación de Ingresos</strong>
                <span class="text-muted">Declaración o certificación de ingresos reciente</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <strong>Información de Contacto</strong>
                <span class="text-muted">Dirección y teléfono actualizados</span>
              </li>
            </ul>

            @auth
            <form action="{{ route('formulario.iniciarCumplimiento') }}" method="POST" target="_blank">
              @csrf
              <input type="hidden" name="tipo_persona" value="natural">
              <button type="submit" class="btn btn-outline-primary" id="btnCumplimiento">
                Iniciar SARLAFT - Persona Natural
              </button>
            </form>
            @else
            <a href="{{ route('cumplimiento.modal') }}" class="btn btn-outline-primary">
              Iniciar Sesión para Continuar
            </a>
            @endauth

          </div>
        </div>
      </div>

      {{-- Persona Jurídica --}}
      <div class="accordion-item mt-4">
        <h2 class="accordion-header" id="headingJuridica">
          <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseJuridica" aria-expanded="false" aria-controls="collapseJuridica">
            Persona Jurídica
          </button>
        </h2>
        <div id="collapseJuridica" class="accordion-collapse collapse" aria-labelledby="headingJuridica" data-bs-parent="#accordionCumplimiento">
          <div class="accordion-body">

            <p class="mb-3 text-muted">
              Si representas una persona jurídica (empresa), asegúrate de contar con los siguientes documentos actualizados:
            </p>

            <ul class="list-group mb-4">
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <strong>Cámara de Comercio</strong>
                <span class="text-muted">Certificado con vigencia menor a 30 días</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <strong>RUT Actualizado</strong>
                <span class="text-muted">En formato PDF o imagen</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <strong>Representante Legal</strong>
                <span class="text-muted">Cédula y datos de contacto</span>
              </li>
            </ul>

            @auth
            <form action="{{ route('formulario.iniciarCumplimiento') }}" method="POST" target="_blank">
              @csrf
              <input type="hidden" name="tipo_persona" value="juridica">
              <button type="submit" class="btn btn-outline-primary" id="btnCumplimiento">
                Iniciar SARLAFT - Persona Jurídica
              </button>
            </form>
            @else
            <a href="{{ route('cumplimiento.modal') }}" class="btn btn-outline-primary">
              Iniciar Sesión para Continuar
            </a>
            @endauth

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
