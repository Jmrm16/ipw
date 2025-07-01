@extends('layouts.app')

@section('title', 'Redirección SARLAFT - Proceso en curso')

@section('content')

<style>
  .sarlaft-confirmation-page {
    --primary-color: #0d6efd;
    --primary-dark: #0b5ed7;
    --success-color: #28a745;
    --light-color: #f8f9fa;
    --dark-color: #212529;
    --border-radius: 12px;
  }
  .sarlaft-confirmation-page .confirmation-container {
    max-width: 700px;
    margin: 0 auto;
    padding: 2rem;
    background-color: white;
    border-radius: var(--border-radius);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
  }
  .sarlaft-confirmation-page .success-icon {
    font-size: 5rem;
    color: var(--success-color);
    animation: pulse 1.5s infinite;
  }
  @keyframes pulse {
    0% { transform: scale(1); }
    50% { transform: scale(1.1); }
    100% { transform: scale(1); }
  }
  .sarlaft-confirmation-page .btn-outline-primary {
    border: 2px solid var(--primary-color);
    color: var(--primary-color);
    font-weight: 600;
    transition: all 0.3s ease;
    padding: 0.75rem 1.5rem;
    border-radius: var(--border-radius);
  }
  .sarlaft-confirmation-page .btn-outline-primary:hover {
    background-color: var(--primary-color);
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(13, 110, 253, 0.2);
  }
  .sarlaft-confirmation-page .status-card {
    background-color: var(--light-color);
    border-radius: var(--border-radius);
    padding: 1.5rem;
    margin: 1.5rem 0;
    border-left: 4px solid var(--primary-color);
  }
  .sarlaft-confirmation-page .step-indicator {
    display: flex;
    justify-content: center;
    margin: 2rem 0;
  }
  .sarlaft-confirmation-page .step {
    position: relative;
    padding: 0 1.5rem;
    text-align: center;
  }
  .sarlaft-confirmation-page .step-number {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background-color: var(--primary-color);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    margin: 0 auto 10px;
  }
  .sarlaft-confirmation-page .step.active .step-number,
  .sarlaft-confirmation-page .step.completed .step-number {
    background: var(--success-color);
  }
  .sarlaft-confirmation-page .step.completed .step-number:after {
    content: "\2713";
  }
  .sarlaft-confirmation-page .step-title {
    font-size: 0.9rem;
    font-weight: 600;
  }
  .sarlaft-confirmation-page .step-connector {
    position: absolute;
    top: 20px;
    left: -20px;
    width: 40px;
    height: 2px;
    background-color: #dee2e6;
  }
  @media (max-width: 768px) {
    .sarlaft-confirmation-page .confirmation-container {
      padding: 1.5rem;
    }
    .sarlaft-confirmation-page .step-indicator {
      flex-direction: column;
    }
    .sarlaft-confirmation-page .step {
      margin-bottom: 1.5rem;
    }
    .sarlaft-confirmation-page .step-connector {
      display: none;
    }
  }
</style>

<div class="sarlaft-confirmation-page">
  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="confirmation-container text-center">
          
          <!-- Icono animado de confirmación -->
          <div class="mb-4">
            <i class="ri-checkbox-circle-line success-icon"></i>
            <h2 class="fw-bold mt-4 text-success">¡Proceso Poliza iniciado correctamente!</h2>
          </div>
          
          <!-- Indicador de pasos -->
          <div class="step-indicator">
            <div class="step completed">
              <div class="step-number">1</div>
              <div class="step-title">Solicitar la póliza</div>
            </div>
            <div class="step active">
              <div class="step-connector"></div>
              <div class="step-number">2</div>
              <div class="step-title">Proceso inicializado correctamente</div>
            </div>
            <div class="step">
              <div class="step-connector"></div>
              <div class="step-number">3</div>
              <div class="step-title">Cargar documentos</div>
            </div>
          </div>
          
          <!-- Tarjeta de estado -->

          
          <!-- Mensaje principal -->
          <p class="lead text-muted mb-4">
            Para crear tu solicitud de póliza carga los documentos requeridos.
            <strong>.</strong>, puedes continuar en esta ventana con la carga de documentos complementarios .
          </p>
          
          <!-- Botón de acción -->
          <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
            <a href="{{ route('documentos.cumplimiento', ['formulario' => $formularioId]) }}" class="btn btn-lg btn-outline-primary shadow-sm px-4">
              <i class="ri-upload-cloud-line me-2"></i> Continuar con el cargue de documentos
            </a>
          </div>
          
          <!-- Mensaje secundario -->
          <p class="mt-4 text-muted small">
            Si tienes problemas con el formulario o necesitas asistencia, por favor contacta a nuestro 
            <a href="mailto:soporte@segurosmundial.com.co">equipo de soporte</a>.
          </p>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection
