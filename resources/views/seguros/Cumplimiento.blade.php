@extends('layouts.app')

@section('title', 'Cumplimiento SARLAFT')

@section('content')

<style>
  /* Estilos mejorados solo para la página SARLAFT */
  .sarlaft-page {
    --primary-color: #0d6efd;
    --primary-dark: #0b5ed7;
    --secondary-color: #6c757d;
    --light-color: #f8f9fa;
    --dark-color: #212529;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    line-height: 1.6;
  }

  .sarlaft-page .hero-section {
    position: relative;
    overflow: hidden;
    height: 500px;
    background-size: cover;
    background-position: center;
    display: flex;
    align-items: center;
    justify-content: center;
    background-attachment: fixed;
  }

  .sarlaft-page .hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(13, 110, 253, 0.85), rgba(0, 0, 0, 0.7));
  }

  .sarlaft-page .hero-content {
    position: relative;
    z-index: 2;
    color: white;
    text-align: center;
    padding: 0 20px;
    max-width: 800px;
    animation: fadeInUp 1s ease;
  }

  .sarlaft-page .hero-content h1 {
    font-size: 2.8rem;
    font-weight: 700;
    margin-bottom: 1rem;
    text-shadow: 0 2px 4px rgba(0,0,0,0.3);
  }

  .sarlaft-page .hero-content p {
    font-size: 1.2rem;
    margin-bottom: 2rem;
    opacity: 0.9;
  }

  .sarlaft-page .section-title {
    position: relative;
    margin-bottom: 2.5rem;
    color: var(--primary-color);
    font-weight: 700;
    text-align: center;
  }

  .sarlaft-page .section-title:after {
    content: '';
    position: absolute;
    bottom: -15px;
    left: 50%;
    transform: translateX(-50%);
    width: 100px;
    height: 4px;
    background: linear-gradient(to right, var(--primary-color), var(--primary-dark));
    border-radius: 2px;
  }

  .sarlaft-page .accordion-button {
    font-weight: 600;
    color: var(--dark-color);
    padding: 1.2rem 1.5rem;
    font-size: 1.1rem;
    transition: all 0.3s ease;
  }

  .sarlaft-page .accordion-button:not(.collapsed) {
    background-color: rgba(13, 110, 253, 0.1);
    color: var(--primary-color);
    box-shadow: none;
  }

  .sarlaft-page .accordion-button:focus {
    box-shadow: none;
    border-color: rgba(13, 110, 253, 0.2);
  }

  .sarlaft-page .requirement-card {
    border-left: 4px solid var(--primary-color);
    transition: all 0.3s ease;
    margin-bottom: 15px;
    border-radius: 8px;
    overflow: hidden;
  }

  .sarlaft-page .requirement-card:hover {
    transform: translateX(10px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.1);
  }

  .sarlaft-page .requirement-icon {
    color: var(--primary-color);
    font-size: 1.5rem;
    margin-right: 15px;
    min-width: 30px;
    text-align: center;
  }

  .sarlaft-page .btn-primary-gradient {
    background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
    border: none;
    color: white;
    transition: all 0.3s ease;
    border-radius: 50px;
    padding: 0.75rem 1.5rem;
    font-weight: 500;
    box-shadow: 0 4px 15px rgba(13, 110, 253, 0.2);
    margin: 0.5rem;
    min-width: 220px;
    text-align: center;
  }

  .sarlaft-page .btn-primary-gradient:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(13, 110, 253, 0.3);
    color: white;
  }

  .sarlaft-page .btn-group-actions {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 1rem;
    margin-top: 1.5rem;
  }

  .sarlaft-page .step-indicator {
    display: flex;
    justify-content: center;
    margin-bottom: 3rem;
    position: relative;
  }

  .sarlaft-page .step {
    display: flex;
    flex-direction: column;
    align-items: center;
    position: relative;
    padding: 0 30px;
    opacity: 0;
    transform: translateY(20px);
    transition: all 0.5s ease;
  }

  .sarlaft-page .step.show {
    opacity: 1;
    transform: translateY(0);
  }

  .sarlaft-page .step-number {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background-color: var(--primary-color);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    margin-bottom: 15px;
    font-size: 1.2rem;
    box-shadow: 0 4px 10px rgba(13, 110, 253, 0.2);
    transition: all 0.3s ease;
  }

  .sarlaft-page .step.active .step-number {
    background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
    box-shadow: 0 6px 15px rgba(13, 110, 253, 0.3);
    transform: scale(1.1);
  }

  .sarlaft-page .step-title {
    font-weight: 600;
    color: var(--dark-color);
    text-align: center;
    max-width: 150px;
  }

  .sarlaft-page .step-connector {
    position: absolute;
    top: 25px;
    left: -30px;
    width: 60px;
    height: 3px;
    background-color: var(--secondary-color);
    opacity: 0.2;
  }

  .sarlaft-page .faq-item {
    margin-bottom: 1rem;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 3px 10px rgba(0,0,0,0.05);
  }

  .sarlaft-page .cta-section {
    background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
    padding: 3rem 0;
    color: white;
  }

  .sarlaft-page .cta-content {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
  }

  .sarlaft-page .cta-content h3 {
    font-weight: 700;
    margin-bottom: 1rem;
  }

  .sarlaft-page .cta-content p {
    opacity: 0.9;
    margin-bottom: 1.5rem;
    max-width: 700px;
  }

  .sarlaft-page .btn-light {
    border-radius: 50px;
    padding: 0.75rem 2rem;
    font-weight: 500;
    transition: all 0.3s ease;
    min-width: 200px;
  }

  .sarlaft-page .btn-light:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(255,255,255,0.2);
  }

  @media (max-width: 992px) {
    .sarlaft-page .hero-section {
      height: 400px;
    }

    .sarlaft-page .hero-content h1 {
      font-size: 2.2rem;
    }
  }

  @media (max-width: 768px) {
    .sarlaft-page .hero-section {
      height: 350px;
      background-attachment: scroll;
    }

    .sarlaft-page .hero-content h1 {
      font-size: 1.8rem !important;
    }

    .sarlaft-page .step-indicator {
      flex-direction: column;
      align-items: center;
    }

    .sarlaft-page .step {
      margin-bottom: 30px;
      padding: 0;
    }

    .sarlaft-page .step-connector {
      display: none;
    }

    .sarlaft-page .btn-group-actions {
      flex-direction: column;
      align-items: center;
    }

    .sarlaft-page .btn-primary-gradient {
      width: 100%;
      max-width: 280px;
    }
  }

  @keyframes fadeInUp {
    from {
      opacity: 0;
      transform: translateY(20px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }
</style>

<div class="sarlaft-page">

  <!-- Hero Section Mejorada -->
  <section class="hero-section" style="background-image: url('{{ asset('img/rce.png') }}');">
    <div class="hero-overlay"></div>
    <div class="hero-content">
      <h1 class="display-4 fw-bold">Cumplimiento SARLAFT</h1>
      <p class="lead">Proceso obligatorio para la prevención de lavado de activos y financiación del terrorismo</p>
    </div>
  </section>

  <!-- Proceso en 3 pasos -->
  <section class="py-5 bg-white">
    <div class="container">
      <h2 class="text-center section-title">Proceso en 3 simples pasos</h2>
      <div class="step-indicator">
        <div class="step show">
          <div class="step-number">1</div>
          <div class="step-title">Selecciona tu tipo de persona</div>
        </div>
        <div class="step show">
          <div class="step-connector"></div>
          <div class="step-number">2</div>
          <div class="step-title">Revisa los requisitos</div>
        </div>
        <div class="step show">
          <div class="step-connector"></div>
          <div class="step-number">3</div>
          <div class="step-title">Carga los documentos</div>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
          <p class="text-muted lead">
            El proceso SARLAFT es un requisito legal obligatorio para todos nuestros clientes. 
            Asegúrate de tener a mano los documentos necesarios antes de comenzar.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Requisitos según tipo de persona -->
  <section id="requisitos" class="py-5 bg-light">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="section-title">Requisitos por Tipo de Persona</h2>
        <p class="text-muted lead">
          Selecciona tu tipo de persona y revisa cuidadosamente los documentos requeridos para el proceso.
        </p>
      </div>

      <div class="accordion" id="accordionCumplimiento">
        <!-- Persona Natural -->
        <div class="accordion-item border-0 mb-3 shadow-sm">
          <h2 class="accordion-header" id="headingNatural">
            <button class="accordion-button fw-semibold py-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNatural" aria-expanded="true" aria-controls="collapseNatural">
              <i class="fas fa-user me-2"></i> Persona Natural
            </button>
          </h2>
          <div id="collapseNatural" class="accordion-collapse collapse show" aria-labelledby="headingNatural" data-bs-parent="#accordionCumplimiento">
            <div class="accordion-body">
              <p class="mb-4 text-muted">
                Si eres una persona natural, necesitarás los siguientes documentos actualizados y legibles:
              </p>

              <div class="row">
                <div class="col-md-6">
                  <div class="requirement-card p-4 bg-white rounded mb-3 h-100">
                    <div class="d-flex align-items-start">
                      <i class="fas fa-file-signature requirement-icon mt-1"></i>
                      <div>
                        <h5 class="mb-2">Contrato firmado</h5>
                        <p class="mb-0 text-muted">Debe estar debidamente firmado por ambas partes.</p>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="requirement-card p-4 bg-white rounded mb-3 h-100">
                    <div class="d-flex align-items-start">
                      <i class="fas fa-id-card requirement-icon mt-1"></i>
                      <div>
                        <h5 class="mb-2">Cédula de ciudadanía</h5>
                        <p class="mb-0 text-muted">Copia escaneada y legible por ambos lados.</p>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="requirement-card p-4 bg-white rounded mb-3 h-100">
                    <div class="d-flex align-items-start">
                      <i class="fas fa-building requirement-icon mt-1"></i>
                      <div>
                        <h5 class="mb-2">Cámara de comercio</h5>
                        <p class="mb-0 text-muted">Vigencia no mayor a 30 días</p>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="requirement-card p-4 bg-white rounded mb-3 h-100">
                    <div class="d-flex align-items-start">
                      <i class="fas fa-file-alt requirement-icon mt-1"></i>
                      <div>
                        <h5 class="mb-2">RUT actualizado</h5>
                        <p class="mb-0 text-muted">En formato PDF con todos los datos legibles.</p>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="requirement-card p-4 bg-white rounded mb-3 h-100">
                    <div class="d-flex align-items-start">
                      <i class="fas fa-file-invoice-dollar requirement-icon mt-1"></i>
                      <div>
                        <h5 class="mb-2">Información financiera</h5>
                        <p class="mb-0 text-muted">Declaración de renta o estados financieros.</p>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="requirement-card p-4 bg-white rounded mb-3 h-100">
                    <div class="d-flex align-items-start">
                      <i class="fas fa-briefcase requirement-icon mt-1"></i>
                      <div>
                        <h5 class="mb-2">Experiencia</h5>
                        <p class="mb-0 text-muted"></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="btn-group-actions">
                @auth
                  <form action="{{ route('formulario.iniciarCumplimiento') }}" method="POST" target="_blank">
                    @csrf
                    <input type="hidden" name="tipo_persona" value="natural">
                    <button type="submit" class="btn btn-primary-gradient px-4 py-2" id="btnCumplimiento">
                      <i class="fas fa-play-circle me-2"></i> Solicitar póliza
                    </button>
                  </form>
                @else
                  <a href="{{ route('cumplimiento.modal') }}" class="btn btn-primary-gradient px-4 py-2">
                    <i class="fas fa-sign-in-alt me-2"></i> Solicitar póliza
                  </a>
                @endauth
                <a href="https://sarlaft.segurosmundial.com.co/forms/f/92c704c9-1967-4c90-b460-212af6bfa7fd"
                  target="_blank" class="btn btn-primary-gradient px-4 py-2">
                  <i class="fas fa-external-link-alt me-2"></i> Iniciar SARLAFT
                </a>
              </div>
            </div>
          </div>
        </div>

        <!-- Persona Jurídica -->
        <div class="accordion-item border-0 shadow-sm">
          <h2 class="accordion-header" id="headingJuridica">
            <button class="accordion-button collapsed fw-semibold py-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseJuridica" aria-expanded="false" aria-controls="collapseJuridica">
              <i class="fas fa-building me-2"></i> Persona Jurídica
            </button>
          </h2>
          <div id="collapseJuridica" class="accordion-collapse collapse" aria-labelledby="headingJuridica" data-bs-parent="#accordionCumplimiento">
            <div class="accordion-body">
              <p class="mb-4 text-muted">
                Si representas una empresa o persona jurídica, necesitarás los siguientes documentos:
              </p>

              <div class="row">
                <div class="col-md-6">
                  <div class="requirement-card p-4 bg-white rounded mb-3 h-100">
                    <div class="d-flex align-items-start">
                      <i class="fas fa-file-certificate requirement-icon mt-1"></i>
                      <div>
                        <h5 class="mb-2">Cámara de Comercio</h5>
                        <p class="mb-0 text-muted">Actualizada con vigencia no mayor a 30 días.</p>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="requirement-card p-4 bg-white rounded mb-3 h-100">
                    <div class="d-flex align-items-start">
                      <i class="fas fa-file-alt requirement-icon mt-1"></i>
                      <div>
                        <h5 class="mb-2">RUT Actualizado</h5>
                        <p class="mb-0 text-muted">Registro Único Tributario en formato PDF.</p>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="requirement-card p-4 bg-white rounded mb-3 h-100">
                    <div class="d-flex align-items-start">
                      <i class="fas fa-user-tie requirement-icon mt-1"></i>
                      <div>
                        <h5 class="mb-2"> Cedula del Representante Legal</h5>
                        <p class="mb-0 text-muted">Cédula y poder vigente del representante.</p>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="requirement-card p-4 bg-white rounded mb-3 h-100">
                    <div class="d-flex align-items-start">
                      <i class="fas fa-file-invoice-dollar requirement-icon mt-1"></i>
                      <div>
                        <h5 class="mb-2">Información Financiera</h5>
                        <p class="mb-0 text-muted"> declaración de renta.</p>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="requirement-card p-4 bg-white rounded mb-3 h-100">
                    <div class="d-flex align-items-start">
                      <i class="fas fa-file-signature requirement-icon mt-1"></i>
                      <div>
                        <h5 class="mb-2">Contrato firmado</h5>
                        <p class="mb-0 text-muted"></p>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="requirement-card p-4 bg-white rounded mb-3 h-100">
                    <div class="d-flex align-items-start">
                      <i class="fas fa-briefcase requirement-icon mt-1"></i>
                      <div>
                        <h5 class="mb-2">Experiencia</h5>
                        <p class="mb-0 text-muted"></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="btn-group-actions">
                @auth
                  <form action="{{ route('formulario.iniciarCumplimiento') }}" method="POST" target="_blank">
                    @csrf
                    <input type="hidden" name="tipo_persona" value="juridica">
                    <button type="submit" class="btn btn-primary-gradient px-4 py-2" id="btnCumplimiento">
                      <i class="fas fa-play-circle me-2"></i> Solicitar póliza
                    </button>
                  </form>
                @else
                  <a href="{{ route('cumplimiento.modal') }}" class="btn btn-primary-gradient px-4 py-2">
                    <i class="fas fa-sign-in-alt me-2"></i> Solicitar póliza
                  </a>
                @endauth
                <a href="https://sarlaft.segurosmundial.com.co/forms/f/9211808c-f920-4af2-8eaf-d50ee3c3140d"
                  target="_blank" class="btn btn-primary-gradient px-4 py-2">
                  <i class="fas fa-external-link-alt me-2"></i> Iniciar SARLAFT
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- FAQ Section -->
  <section class="py-5 bg-white">
    <div class="container">
      <h2 class="text-center section-title mb-5">Preguntas Frecuentes</h2>
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="accordion" id="faqAccordion">
            <div class="faq-item">
              <h2 class="accordion-header" id="faqHeading1">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse1" aria-expanded="false" aria-controls="faqCollapse1">
                  <i class="fas fa-question-circle me-2 text-primary"></i> ¿Qué es el SARLAFT?
                </button>
              </h2>
              <div id="faqCollapse1" class="accordion-collapse collapse" aria-labelledby="faqHeading1" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                  El SARLAFT (Sistema de Administración del Riesgo de Lavado de Activos y Financiación del Terrorismo) es un conjunto de políticas y procedimientos que las entidades vigiladas deben implementar para prevenir, administrar y mitigar los riesgos asociados a estos delitos. Es un requisito establecido por la Superintendencia Financiera de Colombia para todas las entidades del sector financiero.
                </div>
              </div>
            </div>

            <div class="faq-item">
              <h2 class="accordion-header" id="faqHeading2">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse2" aria-expanded="false" aria-controls="faqCollapse2">
                  <i class="fas fa-question-circle me-2 text-primary"></i> ¿Por qué debo completar este proceso?
                </button>
              </h2>
              <div id="faqCollapse2" class="accordion-collapse collapse" aria-labelledby="faqHeading2" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                  Es un requisito legal obligatorio establecido por la Superintendencia Financiera de Colombia. Nos permite conocer mejor a nuestros clientes, entender el origen de sus recursos y cumplir con las normas de prevención de lavado de activos y financiación del terrorismo. Este proceso ayuda a proteger tanto a la institución como a nuestros clientes de posibles actividades ilícitas.
                </div>
              </div>
            </div>

            <div class="faq-item">
              <h2 class="accordion-header" id="faqHeading3">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse3" aria-expanded="false" aria-controls="faqCollapse3">
                  <i class="fas fa-question-circle me-2 text-primary"></i> ¿Cuánto tiempo toma completar el formulario?
                </button>
              </h2>
              <div id="faqCollapse3" class="accordion-collapse collapse" aria-labelledby="faqHeading3" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                  Dependiendo de tu tipo de persona (natural o jurídica) y de que tengas todos los documentos a mano, el proceso puede tomar entre 10 y 20 minutos. Te recomendamos dedicar el tiempo necesario para completarlo correctamente y asegurarte de que toda la información proporcionada sea veraz y exacta. El tiempo invertido en este proceso es fundamental para cumplir con las regulaciones y mantener la seguridad de todas las partes involucradas.
                </div>
              </div>
            </div>

            <div class="faq-item">
              <h2 class="accordion-header" id="faqHeading4">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse4" aria-expanded="false" aria-controls="faqCollapse4">
                  <i class="fas fa-question-circle me-2 text-primary"></i> ¿Qué pasa si no completo el proceso SARLAFT?
                </button>
              </h2>
              <div id="faqCollapse4" class="accordion-collapse collapse" aria-labelledby="faqHeading4" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                  El cumplimiento del proceso SARLAFT es obligatorio para poder establecer o mantener una relación comercial con nuestra entidad. Si no se completa el proceso, no podremos continuar con la contratación de nuestros servicios o productos. Además, es importante destacar que este requisito aplica tanto al inicio de la relación como en actualizaciones periódicas que podamos solicitar.
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA Section -->
  <section class="cta-section">
    <div class="container">
      <div class="cta-content">
        <h3>¿Tienes dudas sobre el proceso SARLAFT?</h3>
        <p>Nuestro equipo de cumplimiento está listo para ayudarte con cualquier inquietud que puedas tener sobre el proceso o los documentos requeridos.</p>
        <a href="mailto:cumplimiento@segurosmundial.com.co" class="btn btn-light btn-lg">
          <i class="fas fa-envelope me-2"></i> Contactar al equipo
        </a>
      </div>
    </div>
  </section>

</div>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    // Efecto smooth scroll para los enlaces internos
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function (e) {
        e.preventDefault();
        document.querySelector(this.getAttribute('href')).scrollIntoView({
          behavior: 'smooth'
        });
      });
    });

    // Animación para los steps
    const steps = document.querySelectorAll('.sarlaft-page .step');
    steps.forEach((step, index) => {
      setTimeout(() => {
        step.classList.add('show');
      }, index * 200);
    });

    // Efecto hover para las cards de requisitos
    const requirementCards = document.querySelectorAll('.requirement-card');
    requirementCards.forEach(card => {
      card.addEventListener('mouseenter', () => {
        const icon = card.querySelector('.requirement-icon');
        icon.style.transform = 'scale(1.2)';
        icon.style.transition = 'transform 0.3s ease';
      });
      
      card.addEventListener('mouseleave', () => {
        const icon = card.querySelector('.requirement-icon');
        icon.style.transform = 'scale(1)';
      });
    });

    // Mostrar el paso activo según el scroll
    const observerOptions = {
      threshold: 0.1
    };

    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          const stepNumber = entry.target.getAttribute('data-step');
          document.querySelectorAll('.step').forEach(step => {
            step.classList.remove('active');
            if (step.querySelector('.step-number').textContent === stepNumber) {
              step.classList.add('active');
            }
          });
        }
      });
    }, observerOptions);

    document.querySelectorAll('[data-step-section]').forEach(section => {
      observer.observe(section);
    });
  });
</script>

@endsection