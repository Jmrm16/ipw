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
    <div class="text-center mb-5">
      <h2 class="fw-bold text-primary">Selecciona tu tipo de persona</h2>
      <p class="text-muted">Consulta los requisitos antes de iniciar el proceso SARLAFT</p>
    </div>

    <div class="accordion" id="accordionRequisitos">
      <!-- Persona Natural -->
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingNatural">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNatural" aria-expanded="true" aria-controls="collapseNatural">
            Persona Natural
          </button>
        </h2>
        <div id="collapseNatural" class="accordion-collapse collapse show" aria-labelledby="headingNatural" data-bs-parent="#accordionRequisitos">
          <div class="accordion-body">
            <div class="table-responsive">
              <table class="table table-bordered align-middle">
                <thead class="table-light">
                  <tr>
                    <th>Requisito</th>
                    <th>Descripción</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Documento de Identidad</td>
                    <td>Cédula de ciudadanía (PDF o imagen legible)</td>
                  </tr>
                  <tr>
                    <td>Certificado de Ingresos</td>
                    <td>Declaración o certificación reciente de ingresos</td>
                  </tr>
                  <tr>
                    <td>Dirección y teléfono</td>
                    <td>Información actualizada de contacto</td>
                  </tr>
                </tbody>
              </table>
            </div>
            @auth
            <form action="{{ route('formulario.iniciarCumplimiento') }}" method="POST" target="_blank" class="mt-3 d-inline">
              @csrf
              <input type="hidden" name="tipo_persona" value="natural">
              <button type="submit" class="btn btn-primary-gradient">
                Ir al formulario SARLAFT - Natural
              </button>
            </form>
            @else
            <a href="{{ route('cumplimiento.modal') }}" class="btn btn-primary-gradient mt-3">
              Iniciar Sesión para continuar
            </a>
            @endauth
          </div>
        </div>
      </div>

      <!-- Persona Jurídica -->
      <div class="accordion-item mt-3">
        <h2 class="accordion-header" id="headingJuridica">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseJuridica" aria-expanded="false" aria-controls="collapseJuridica">
            Persona Jurídica
          </button>
        </h2>
        <div id="collapseJuridica" class="accordion-collapse collapse" aria-labelledby="headingJuridica" data-bs-parent="#accordionRequisitos">
          <div class="accordion-body">
            <div class="table-responsive">
              <table class="table table-bordered align-middle">
                <thead class="table-light">
                  <tr>
                    <th>Requisito</th>
                    <th>Descripción</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Cámara de Comercio</td>
                    <td>Certificado vigente no mayor a 30 días</td>
                  </tr>
                  <tr>
                    <td>RUT actualizado</td>
                    <td>PDF o imagen legible del RUT</td>
                  </tr>
                  <tr>
                    <td>Representante Legal</td>
                    <td>Identificación y contacto del representante legal</td>
                  </tr>
                </tbody>
              </table>
            </div>
            @auth
            <form action="{{ route('formulario.iniciarCumplimiento') }}" method="POST" target="_blank" class="mt-3 d-inline">
              @csrf
              <input type="hidden" name="tipo_persona" value="juridica">
              <button type="submit" class="btn btn-primary-gradient">
                Ir al formulario SARLAFT - Jurídica
              </button>
            </form>
            @else
            <a href="{{ route('cumplimiento.modal') }}" class="btn btn-primary-gradient mt-3">
              Iniciar Sesión para continuar
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
