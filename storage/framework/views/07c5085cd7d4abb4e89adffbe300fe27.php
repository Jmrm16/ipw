<?php $__env->startSection('title', 'Seguros Médicos'); ?>

<?php $__env->startSection('content'); ?>
<style>
  #resultadoCotizacionGeneral .card:hover {
    transform: translateY(-4px);
    transition: 0.3s ease;
  }
</style>

<!-- Encabezado con gradiente y efecto parallax -->
<!-- Encabezado con imagen, overlay hover, y botón animado solo en escritorio -->
<style>
  .header-img {
    background-image: url('<?php echo e(asset('img/asegu.jpg')); ?>');
    background-size: cover;
    background-position: relative;
    background-repeat: no-repeat;
    height: 400px;
    position: relative;
    transition: all 0.3s ease;
  }

  @media (max-width: 768px) {
    .header-img {
      height: 250px;
    }

    .btn-float {
      display: none; /* Oculta el botón en móviles */
    }
  }

  .header-img::after {
    content: "";
    position: absolute;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background-color: rgba(0,0,0,0);
    transition: background-color 0.3s ease;
  }

  .header-img:hover::after {
    background-color: rgba(0, 0, 0, 0.2);
  }

  .btn-float {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 2;
    animation: fadeInUp 1s ease-in-out;
  }

  /* Animación tipo animate.css */
  @keyframes fadeInUp {
    from {
      opacity: 0;
      transform: translate(-50%, -40%);
    }
    to {
      opacity: 1;
      transform: translate(-50%, -50%);
    }
  }
</style>

<div class="container-fluid p-0 m-0">
  <div class="header-img">

  </div>
</div>




<div class="container py-5" id="seccionCotizacion">
  <div class="row justify-content-center">
    <div class="col-lg-10 col-xl-9">
      <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-5">
          <h2 class="h4 fw-bold text-primary text-center mb-4">Cotiza tu Póliza Médica</h2>

          <form id="formCotizacion" novalidate>
            <div class="row g-4">
              <div class="col-md-6">
                <label for="profesion" class="form-label fw-semibold">Profesión / Especialidad</label>
                <select id="profesion" class="form-select form-select-lg rounded-pill shadow-sm" required>
                  <option value="">Seleccione una profesión</option>
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
              </div>

              <div class="col-md-6">
                <label for="valor" class="form-label fw-semibold">Valor Asegurado</label>
                <select id="valor" class="form-select form-select-lg rounded-pill shadow-sm" required>
                  <option value="">Seleccione un valor</option>
                  <option value="100M">$100.000.000</option>
                  <option value="400M">$400.000.000</option>
                  <option value="500M">$500.000.000</option>
                  <option value="700M">$700.000.000</option>
                  <option value="1.000M">$1.000.000.000</option>
                  <option value="2.000M">$2.000.000.000</option>
                </select>
              </div>
            </div>

            <div class="d-grid mt-4">
              <button type="submit" class="btn btn-primary btn-lg rounded-pill shadow-sm">
                <i class="bi bi-calculator me-2"></i>Calcular Cotización
              </button>
            </div>

            <div id="resultado" class="text-center mt-4 fs-5 fw-bold"></div>

            <hr class="my-4" />

            <div>
              <h6 class="fw-bold text-primary mb-2">Documentación requerida:</h6>
              <ul class="text-muted small ps-3 mb-0">
                <li>📄 Fotocopia del documento de identidad.</li>
                <li>🧾 RUT</li>
                <li>🎓 Diploma profesional</li>
                <li>📑 Resolución o Rethus</li>
                <li>🖋️ Diligencia tu formulario</li>
              </ul>
            </div>
          </form>
        </div>

        <!-- RESULTADOS -->
        <div id="resultadoCotizacionGeneral" class="container mt-5 mb-4 d-none">
          <div class="table-responsive bg-white rounded-4 shadow-sm border p-4">
            <div id="acordeonCoberturas">
              <table class="table table-hover align-middle mb-0">
                <thead class="table-light text-primary">
                  <tr>
                    <th>Aseguradora</th>
                    <th>Precio</th>
                    <th>Valor Asegurado</th>
                    <th class="text-center">Coberturas</th>
                    <th class="text-center">Solicitar</th>
                  </tr>
                </thead>
                <tbody id="listaResultados">
                  <!-- JS llenará aquí -->
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- FIN RESULTADOS -->

      </div>
    </div>
  </div>
</div>


<!-- Compañías Aseguradoras -->
<!-- Compañías Aseguradoras -->
<!-- Compañías Aseguradoras - Formato más compacto -->



<!-- Sección adicional de beneficios -->
<!-- Sección Mejorada de Beneficios -->
<div class="container py-5 mt-5 bg-light">
  <div class="row justify-content-center text-center mb-5">
    <div class="col-lg-8">
      <h2 class="fw-bold text-primary">¿Por qué elegir nuestros seguros?</h2>
      <p class="text-muted">Ofrecemos respaldo profesional, atención continua y planes a tu medida.</p>
    </div>
  </div>

  <div class="row g-4">
    <!-- Beneficio 1 -->
    <div class="col-md-6 col-lg-4">
      <div class="card border-0 shadow-sm rounded-4 h-100 text-center p-4">
        <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
          <i class="fas fa-shield-alt fa-lg text-primary"></i>
        </div>
        <h5 class="fw-semibold">Protección Integral</h5>
        <p class="text-muted small">Amplia cobertura para múltiples especialidades y riesgos profesionales.</p>
      </div>
    </div>

    <!-- Beneficio 2 -->
    <div class="col-md-6 col-lg-4">
      <div class="card border-0 shadow-sm rounded-4 h-100 text-center p-4">
        <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
          <i class="fas fa-clock fa-lg text-primary"></i>
        </div>
        <h5 class="fw-semibold">Asistencia 24/7</h5>
        <p class="text-muted small">Atención permanente ante emergencias o inquietudes.</p>
      </div>
    </div>

    <!-- Beneficio 3 -->
    <div class="col-md-6 col-lg-4">
      <div class="card border-0 shadow-sm rounded-4 h-100 text-center p-4">
        <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
          <i class="fas fa-hand-holding-usd fa-lg text-primary"></i>
        </div>
        <h5 class="fw-semibold">Tarifas Competitivas</h5>
        <p class="text-muted small">Precios ajustados con planes flexibles para cada necesidad profesional.</p>
      </div>
    </div>
  </div>
</div>



<!-- Modal -->
<!-- Modal de Cotización -->
<!-- Modal de Cotización -->
</div>

  
<style>
  .bg-soft-primary {
    background-color: rgba(52, 152, 219, 0.12);
    border-radius: 0.75rem;
  }

  .text-gradient-primary {
    background-image: linear-gradient(90deg, #1e5799, #3498db);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    font-weight: 700;
  }

  .hover-shadow {
    transition: all 0.3s ease;
  }

  .hover-shadow:hover {
    transform: translateY(-4px);
    box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.1);
  }
</style>
  

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
      resultadoDiv.textContent = "Por favor seleccione una profesión y un valor asegurado.";
      resultadoDiv.classList.remove('text-success');
      resultadoDiv.classList.add('text-danger');
      return;
    }

    const valorConfianza = tablaValores[clase]?.[valor];
    const valorPrevisora = tablaValoresPrevisora[profesionReal]?.[valor];

    if (!valorConfianza && !valorPrevisora) {
      resultadoDiv.textContent = "No hay información disponible para esa combinación.";
      resultadoDiv.classList.remove('text-success');
      resultadoDiv.classList.add('text-danger');
      return;
    }

    resultadoDiv.textContent = "Comparación entre aseguradoras:";
    resultadoDiv.classList.remove('text-danger');
    resultadoDiv.classList.add('text-success');

    resultadoGeneral.classList.remove("d-none");
    document.getElementById('resultadoCotizacionGeneral')?.scrollIntoView({ behavior: 'smooth' });

    lista.innerHTML = "";
    // Cerrar modal
    const modalEl = document.getElementById('cotizarModal');
    const modal = bootstrap.Modal.getInstance(modalEl);
    if (modal) modal.hide();

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
  let diferencia = "Precio base";
  if (cot.valor > minValor) {
    const extra = Math.round(((cot.valor - minValor) / minValor) * 100);
    diferencia = `${extra}% más cara`;
  } else if (cot.valor < minValor) {
    const desc = Math.round(((minValor - cot.valor) / minValor) * 100);
    diferencia = `${desc}% más barata`;
  }

  const url = `/Formulario?aseguradora=${encodeURIComponent(cot.nombre)}&profesion=${encodeURIComponent(profesionReal)}&valor=${encodeURIComponent(valor)}`;
  const collapseId = `collapseCobertura${index}`;

  const coberturaHtml = coberturas[cot.nombre]
    ? coberturas[cot.nombre].map(c => `<li><i class="fa fa-check text-primary me-2"></i>${c}</li>`).join('')
    : '<li class="text-muted">Coberturas no disponibles</li>';

lista.innerHTML += `
  <tr>
    <td class="d-flex align-items-center gap-3">
      <img src="${cot.avatar}" alt="logo" style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover;">
      <span class="fw-semibold">${cot.nombre}</span>
    </td>
    <td class="fw-bold">
      $${cot.valor.toLocaleString('es-CO')}
    </td>
    <td class="text-center">${valor}</td> <!-- Valor asegurado visible -->
    <td class="text-center">
      <button 
        class="btn btn-sm btn-outline-info toggle-cobertura" 
        type="button"
        data-bs-toggle="collapse" 
        data-bs-target="#${collapseId}" 
        aria-expanded="false" 
        aria-controls="${collapseId}">
        Ver
      </button>
    </td>
    <td class="text-center">
      <button class="btn btn-sm btn-outline-primary" onclick="window.location.href='${url}'">
        Solicitar
      </button>
    </td>
  </tr>
  <tr class="collapse bg-light" id="${collapseId}" data-bs-parent="#acordeonCoberturas">
    <td colspan="5" class="py-2">
      <ul class="mb-0 ps-4">${coberturaHtml}</ul>
    </td>
  </tr>
`;

});
setTimeout(() => {
  document.querySelectorAll('.toggle-cobertura').forEach(button => {
    const targetId = button.getAttribute('data-bs-target');
    const collapseEl = document.querySelector(targetId);
    
    collapseEl.addEventListener('shown.bs.collapse', () => {
      button.textContent = 'Ocultar';
    });
    collapseEl.addEventListener('hidden.bs.collapse', () => {
      button.textContent = 'Ver';
    });
  });
}, 100); // Pequeño delay para asegurar que los elementos existan en el DOM

  });
</script>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\nueva aseguradora\ipw\resources\views/seguros/medicos.blade.php ENDPATH**/ ?>