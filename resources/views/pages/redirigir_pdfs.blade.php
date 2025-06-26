@extends('layouts.app')

@section('title', 'Proceso en curso - Formularios generados')

@section('content')

<style>
  .form-confirmation-page {
    --primary-color: #0d6efd;
    --success-color: #28a745;
    --light-color: #f8f9fa;
    --dark-color: #212529;
    --border-radius: 12px;
  }
  .form-confirmation-page .confirmation-container {
    max-width: 700px;
    margin: 0 auto;
    padding: 2rem;
    background-color: white;
    border-radius: var(--border-radius);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
  }
  .form-confirmation-page .success-icon {
    font-size: 5rem;
    color: var(--success-color);
    animation: pulse 1.5s infinite;
  }
  @keyframes pulse {
    0% { transform: scale(1); }
    50% { transform: scale(1.1); }
    100% { transform: scale(1); }
  }
  .form-confirmation-page .btn-custom {
    padding: 0.75rem 1.5rem;
    border-radius: var(--border-radius);
    font-weight: 600;
  }
  .form-confirmation-page .status-card {
    background-color: var(--light-color);
    border-radius: var(--border-radius);
    padding: 1.5rem;
    margin: 1.5rem 0;
    border-left: 4px solid var(--primary-color);
  }
  .form-confirmation-page .step-indicator {
    display: flex;
    justify-content: center;
    margin: 2rem 0;
  }
  .form-confirmation-page .step {
    position: relative;
    padding: 0 1.5rem;
    text-align: center;
  }
  .form-confirmation-page .step-number {
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
  .form-confirmation-page .step.completed .step-number {
    background: var(--success-color);
  }
  .form-confirmation-page .step-title {
    font-size: 0.9rem;
    font-weight: 600;
  }
  .form-confirmation-page .step-connector {
    position: absolute;
    top: 20px;
    left: -20px;
    width: 40px;
    height: 2px;
    background-color: #dee2e6;
  }
</style>

<div class="form-confirmation-page">
  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="confirmation-container text-center">

          <!-- Icono animado -->
          <div class="mb-4">
            <i class="ri-checkbox-circle-line success-icon"></i>
            <h2 class="fw-bold mt-4 text-success">¡Formulario guardado con éxito!</h2>
          </div>

          <!-- Indicador de pasos -->
          <div class="step-indicator">
            <div class="step completed">
              <div class="step-number">1</div>
              <div class="step-title">Formulario Enviado</div>
            </div>
            <div class="step active">
              <div class="step-connector"></div>
              <div class="step-number">2</div>
              <div class="step-title">Visualizar Formularios</div>
            </div>
            <div class="step">
              <div class="step-connector"></div>
              <div class="step-number">3</div>
              <div class="step-title">Panel de Control</div>
            </div>
          </div>

          <!-- Estado -->
          <div class="status-card text-start">
            <h5 class="fw-bold mb-3">Estado actual del proceso:</h5>
            <ul class="list-unstyled">
              <li class="mb-2 d-flex align-items-center">
                <i class="ri-check-line text-success me-2"></i>
                <span>Formulario médico generado (PDF)</span>
              </li>
              <li class="mb-2 d-flex align-items-center">
                <i class="ri-check-line text-success me-2"></i>
                <span>Formulario SARLAFT generado (PDF)</span>
              </li>
              <li class="d-flex align-items-center">
                <i class="ri-timer-line text-muted me-2"></i>
                <span>Redirigiendo al Dashboard en <span id="contador">5</span> segundos...</span>
              </li>
            </ul>
          </div>

          <!-- Botones -->
          <div class="d-grid gap-3 d-sm-flex justify-content-sm-center mt-4">
            <a href="{{ route('formulario1.pdf', ['id' => $formularioId]) }}" target="_blank" class="btn btn-outline-primary btn-custom">
              <i class="ri-file-list-3-line me-2"></i> Ver Formulario Médico PDF
            </a>
            <a href="{{ route('formulario2.pdf', ['id' => $formularioId]) }}" target="_blank" class="btn btn-outline-secondary btn-custom">
              <i class="ri-shield-check-line me-2"></i> Ver Formulario SARLAFT PDF
            </a>
          </div>

          <a href="{{ route('dashboard') }}" class="btn btn-success btn-custom mt-4 shadow-sm">
            <i class="ri-dashboard-line me-2"></i> Ir al Dashboard ahora
          </a>

        </div>
      </div>
    </div>
  </div>
</div>


@endsection
