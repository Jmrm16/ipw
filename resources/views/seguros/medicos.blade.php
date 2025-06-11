@extends('layouts.app')

@section('title', 'Seguros Médicos')

@section('content')
<style>
  /* Estilos generales mejorados */
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
</style>

<!-- Hero Section -->
<section class="hero-section position-relative overflow-hidden">
  <div class="container-fluid p-0">
    <div class="hero-image" style="background-image: url('{{ asset('img/asegu.jpg') }}'); height: 500px; background-size: cover; background-position: center;">
      <div class="hero-overlay d-flex align-items-center justify-content-center">

      </div>
    </div>
  </div>
</section>

<style>
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

  .btn-gradient {
  background: linear-gradient(to right, #007bff, #00c6ff);
  border: none;
  color: white;
  transition: all 0.3s ease-in-out;
}
.btn-gradient:hover {
  background: linear-gradient(to right, #0056b3, #009ec3);
  transform: translateY(-2px);
}
.card-hover-effect:hover {
  transform: translateY(-4px);
  transition: 0.3s ease;
  box-shadow: 0 0 25px rgba(0, 0, 0, 0.08);
}

</style>

<!-- Sección de Cotización -->
<section id="seccionCotizacion" class="py-5 bg-light">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10">
      <div class="card border-0 shadow-lg rounded-4 bg-light-subtle">
  <div class="card-body p-5">
    <div class="text-center mb-5">
      <h2 class="fw-bold text-primary mb-3">Cotiza tu Seguro Médico</h2>
      <p class="text-muted fs-6">Completa los datos para recibir una cotización personalizada en segundos</p>
    </div>

    <form id="formCotizacion" novalidate>
      <div class="row g-4">

        <!-- Profesión -->
        <div class="col-md-6">
          <div class="form-floating position-relative">
            <select class="form-select shadow-sm" id="profesion" required>
              <option value="">Seleccione una opción</option>
              <option value="CLASE 3" data-profesion="MEDICINA GENERAL">Medicina General</option>
              <option value="CLASE 3" data-profesion="ENFERMERA JEFE">Enfermería Superior</option>
              <option value="CLASE 4" data-profesion="AUXILIAR DE ENFERMERIA">Auxiliar de Enfermería</option>
              <option value="CLASE 1" data-profesion="GINECOBSTETRICIA">Ginecología</option>
              <option value="CLASE 4" data-profesion="ODONTOLOGIA">Odontología</option>
              <option value="CLASE 2" data-profesion="PSICOLOGIA">Psicología</option>
              <option value="CLASE 4" data-profesion="NUTRICIONISTA">Nutricionista</option>
              <option value="CLASE 3" data-profesion="PEDIATRIA">Pediatra</option>
              <option value="CLASE 1" data-profesion="ORTOPEDIA">Ortopedia</option>
              <option value="CLASE 3" data-profesion="ALERGÓLOGO">Alergólogo</option>
              <option value="CLASE 1" data-profesion="ANESTESIOLOGIA">Anestesiólogo</option>
            </select>
            <label for="profesion"><i class="bi bi-briefcase-fill me-2 text-primary"></i>Profesión / Especialidad</label>
          </div>
        </div>

        <!-- Valor asegurado -->
        <div class="col-md-6">
          <div class="form-floating position-relative">
            <select class="form-select shadow-sm" id="valor" required>
              <option value="">Seleccione una opción</option>
              <option value="100M">$100.000.000</option>
              <option value="400M">$400.000.000</option>
              <option value="500M">$500.000.000</option>
              <option value="700M">$700.000.000</option>
              <option value="1.000M">$1.000.000.000</option>
              <option value="2.000M">$2.000.000.000</option>
            </select>
            <label for="valor"><i class="bi bi-currency-dollar me-2 text-success"></i>Valor Asegurado</label>
          </div>
        </div>

      </div>

      <!-- Botón calcular -->
      <div class="d-grid mt-5">
        <button type="submit" class="btn btn-gradient btn-lg py-3 rounded-pill shadow-sm position-relative overflow-hidden">
          <span class="fw-semibold">
            <i class="bi bi-calculator me-2"></i>Calcular Cotización
          </span>
        </button>
      </div>

      <!-- Resultado -->
      <div id="resultado" class="text-center mt-4 fs-5 fw-bold text-success"></div>
    </form>
  </div>
</div>

        
        <!-- Resultados de Cotización -->
        <div id="resultadoCotizacionGeneral" class="mt-5" style="display: none;">
          <div class="card border-0 shadow-sm">
            <div class="card-header bg-primary text-white py-3">
              <h5 class="mb-0"><i class="fas fa-list-alt me-2"></i> Resultados de Cotización</h5>
            </div>
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                  <thead class="table-light">
                    <tr>
                      <th>Aseguradora</th>
                      <th>Precio Anual</th>
                      <th>Valor Asegurado</th>
                      <th class="text-center">Coberturas</th>
                      <th class="text-center">Acción</th>
                    </tr>
                  </thead>
                  <tbody id="listaResultados">
                    <!-- Los resultados se cargarán aquí -->
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          
          <div class="mt-4 p-4 bg-light rounded">
            <h6 class="fw-bold text-primary mb-3"><i class="fas fa-file-alt me-2"></i>Documentación requerida:</h6>
            <div class="row">
              <div class="col-md-6">
                <ul class="list-unstyled">
                  <li class="mb-2"><i class="fas fa-check-circle text-primary me-2"></i> Fotocopia del documento de identidad</li>
                  <li class="mb-2"><i class="fas fa-check-circle text-primary me-2"></i> RUT</li>
                </ul>
              </div>
              <div class="col-md-6">
                <ul class="list-unstyled">
                  <li class="mb-2"><i class="fas fa-check-circle text-primary me-2"></i> Diploma profesional</li>
                  <li class="mb-2"><i class="fas fa-check-circle text-primary me-2"></i> Resolución o Rethus</li>
                </ul>
              </div>
            </div>
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

<!-- Aseguradoras -->
<section class="py-5 bg-light">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold text-primary">Nuestras Aseguradoras</h2>
      <p class="text-muted">Trabajamos con las compañías más confiables del mercado</p>
    </div>
    
    <div class="row g-4 justify-content-center">
      <div class="col-md-3 col-6">
        <div class="card border-0 bg-white shadow-sm card-hover-effect">
          <div class="card-body p-4 text-center">
            <img src="https://www.funcionpublica.gov.co/documents/d/guest/logo-previsora_mesa-de-trabajo-1-png" alt="La Previsora" class="img-fluid" style="max-height: 80px;">
          </div>
        </div>
      </div>
      
      <div class="col-md-3 col-6">
        <div class="card border-0 bg-white shadow-sm card-hover-effect">
          <div class="card-body p-4 text-center">
            <img src="https://confianza.directus.app/assets/cefd9fcd-0798-47f0-8637-af85d67ccfb8" alt="Confianza" class="img-fluid" style="max-height: 80px;">
          </div>
        </div>
      </div>
      
      <div class="col-md-3 col-6">
        <div class="card border-0 bg-white shadow-sm card-hover-effect">
          <div class="card-body p-4 text-center">
            <img src="https://media.perezlara.com/2020/09/1.Seguros_del_estado.png" alt="Seguros del Estado" class="img-fluid" style="max-height: 80px;">
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  const tablaValores = {
    "CLASE 1": {
      "100M": 249900, "400M": 687820, "500M": 880600,
      "700M": 1130500, "1.000M": 1368500, "2.000M": 2748900
    },
    "CLASE 2": {
      "100M": 188020, "400M": 499800, "500M": 630700,
      "700M": 815150, "1.000M": 1053150, "2.000M": 2439500
    },
    "CLASE 3": {
      "100M": 124950, "400M": 321300, "500M": 434350,
      "700M": 565250, "1.000M": 725900, "2.000M": 1582700
    },
    "CLASE 4": {
      "100M": 107100, "400M": 238000, "500M": 327250,
      "700M": 419500, "1.000M": 535500, "2.000M": 1166200
    }
  };

  const tablaValoresPrevisora = {
    "MEDICINA GENERAL":     { "100M": 119000,  "200M": 166600,  "300M": 214200,  "400M": 261800,  "500M": 309400 },
    "AUXILIAR DE ENFERMERIA": { "100M": 119000,  "200M": 166600,  "300M": 214200,  "400M": 261800,  "500M": 309400 },
    "ENFERMERA JEFE":       { "100M": 119000,  "200M": 166600,  "300M": 214200,  "400M": 261800,  "500M": 309400 },
    "ODONTOLOGIA":          { "100M": 119000,  "200M": 166600,  "300M": 214200,  "400M": 261800,  "500M": 309400 },
    "ANESTESIOLOGIA":       { "100M": 345100,  "200M": 464100,  "300M": 583100,  "400M": 702100,  "500M": 821100 },
    "FISIOTERAPEUTA":       { "100M": 119000,  "200M": 166600,  "300M": 214200,  "400M": 261800,  "500M": 309400 },
    "GINECOBSTETRICIA":     { "100M": 325000,  "200M": 505750,  "300M": 624750,  "400M": 743750,  "500M": 862750 },
    "PEDIATRIA":            { "100M": 119000,  "200M": 166600,  "300M": 214200,  "400M": 261800,  "500M": 309400 },
    "PSICOLOGIA":           { "100M": 119000,  "200M": 166600,  "300M": 214200,  "400M": 261800,  "500M": 309400 },
    "MEDICINA INTERNA":     { "100M": 130900,  "200M": 178500,  "300M": 226100,  "400M": 273700,  "500M": 321300 },
    "CIRUJANO GENERAL":     { "100M": 130900,  "200M": 178500,  "300M": 226100,  "400M": 273700,  "500M": 321300 },
    "ORTOPEDIA":            { "100M": 386750,  "200M": 505750,  "300M": 624750,  "400M": 743750,  "500M": 862750 },
    "BACTERIOLOGIA":        { "100M": 119000,  "200M": 166600,  "300M": 214200,  "400M": 261800,  "500M": 309400 },
    "OFTALMOLOGIA":         { "100M": 238000,  "200M": 333200,  "300M": 428400,  "400M": 523600,  "500M": 618800 }
  };

  const coberturas = {
    "La Previsora": [
      "Responsabilidad civil médica",
      "Accidentes personales",
      "Gastos legales"
    ],
    "Confianza": [
      "Cobertura Básica Responsabilidad Civil Profesional Médica",
      "Lucro cesante",
      "Perjuicios extrapatrimoniales",
      "Gastos de defensa",
      "Responsabilidad Civil Derivada del Uso de Aparatos Médicos"
    ],
    "Seguros del Estado": [
      "RC médica",
      "Gastos judiciales",
      "Lucro cesante"
    ]
  };

  document.getElementById('formCotizacion').addEventListener('submit', function(e) {
    e.preventDefault();

    const select = document.getElementById("profesion");
    const clase = select.value;
    const profesionReal = select.options[select.selectedIndex].dataset.profesion;
    const valor = document.getElementById("valor").value;
    const resultadoDiv = document.getElementById("resultado");
    const resultadoGeneral = document.getElementById("resultadoCotizacionGeneral");
    const lista = document.getElementById("listaResultados");

    if (!clase || !valor || !profesionReal) {
      resultadoDiv.innerHTML = '<div class="alert alert-danger"><i class="fas fa-exclamation-circle me-2"></i>Por favor seleccione una profesión y un valor asegurado.</div>';
      return;
    }

    const valorConfianza = tablaValores[clase]?.[valor];
    const valorPrevisora = tablaValoresPrevisora[profesionReal]?.[valor];

    if (!valorConfianza && !valorPrevisora) {
      resultadoDiv.innerHTML = '<div class="alert alert-warning"><i class="fas fa-info-circle me-2"></i>No hay información disponible para esa combinación.</div>';
      return;
    }

    resultadoDiv.innerHTML = '<div class="alert alert-success"><i class="fas fa-check-circle me-2"></i>Comparación entre aseguradoras:</div>';
    resultadoGeneral.style.display = "block";
    
    // Scroll suave a los resultados
    setTimeout(() => {
      resultadoGeneral.scrollIntoView({ behavior: 'smooth' });
    }, 300);

    lista.innerHTML = "";

    const cotizaciones = [];

    if (valorConfianza) {
      cotizaciones.push({
        nombre: "Confianza",
        valor: valorConfianza,
        avatar: "https://confianza.directus.app/assets/cefd9fcd-0798-47f0-8637-af85d67ccfb8"
      });
    }

    if (valorPrevisora) {
      cotizaciones.push({
        nombre: "La Previsora",
        valor: valorPrevisora,
        avatar: "https://www.funcionpublica.gov.co/documents/d/guest/logo-previsora_mesa-de-trabajo-1-png"
      });
    }

    if (valorPrevisora) {
      cotizaciones.push({
        nombre: "Seguros del Estado",
        valor: Math.round(valorPrevisora * 0.95),
        avatar: "https://media.perezlara.com/2020/09/1.Seguros_del_estado.png"
      });
    }

    const minValor = Math.min(...cotizaciones.map(c => c.valor));

    cotizaciones.forEach((cot, index) => {
      let diferencia = "";
      if (cot.valor > minValor) {
        const extra = Math.round(((cot.valor - minValor) / minValor) * 100);
       
      } else if (cot.valor === minValor) {
       
      }

      const url = `/Formulario?aseguradora=${encodeURIComponent(cot.nombre)}&profesion=${encodeURIComponent(profesionReal)}&valor=${encodeURIComponent(valor)}`;
      const collapseId = `collapseCobertura${index}`;

      const coberturaHtml = coberturas[cot.nombre]
        ? coberturas[cot.nombre].map(c => `<li class="mb-2"><i class="fas fa-check-circle text-primary me-2"></i>${c}</li>`).join('')
        : '<li class="text-muted">Coberturas no disponibles</li>';

      lista.innerHTML += `
        <tr>
          <td>
            <div class="d-flex align-items-center">
              <img src="${cot.avatar}" alt="${cot.nombre}" class="rounded-circle me-3" style="width: 40px; height: 40px; object-fit: cover;">
              <span class="fw-semibold">${cot.nombre}</span>
            </div>
          </td>
          <td class="fw-bold text-nowrap">
            $${cot.valor.toLocaleString('es-CO')} ${diferencia}
          </td>
          <td class="text-nowrap">${valor.replace('M', ' Millones')}</td>
          <td class="text-center">
            <button class="btn btn-sm btn-outline-primary" data-bs-toggle="collapse" data-bs-target="#${collapseId}">
              <i class="fas fa-eye me-1"></i> Ver
            </button>
          </td>
          <td class="text-center">
            <a href="${url}" class="btn btn-sm btn-primary">
              <i class="fas fa-paper-plane me-1"></i> Solicitar
            </a>
          </td>
        </tr>
        <tr>
          <td colspan="5" class="p-0">
            <div class="collapse" id="${collapseId}">
              <div class="p-3 bg-light">
                <h6 class="fw-bold mb-3"><i class="fas fa-shield-alt me-2"></i>Coberturas incluidas:</h6>
                <ul class="mb-0 ps-3">${coberturaHtml}</ul>
              </div>
            </div>
          </td>
        </tr>
      `;
    });
  });
</script>

@endsection