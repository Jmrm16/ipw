<?php $__env->startSection('title', 'About'); ?>

<?php $__env->startSection('content'); ?>
<!-- Page Header Start -->
<div class="container-fluid page-header d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5 mb-5">
    <h1 class="display-4 text-white mb-3 mt-0 mt-lg-5">Acerca de</h1>
    <div class="d-inline-flex text-white">
        <p class="m-0"><a class="text-white" href="">Home</a></p>
        <p class="m-0 px-2">/</p>
        <p class="m-0">Acerca de</p>
    </div>
</div>
<!-- Page Header Start -->

<!-- About Start -->
<div class="container-fluid bg-light py-5">
  <div class="container">
    <div class="row align-items-center g-5">
      <!-- Imagen -->
      <div class="col-lg-5">
        <img class="img-fluid rounded shadow-sm" src="<?php echo e(asset('img/about.jpg')); ?>" alt="Sobre nosotros">
      </div>

      <!-- Contenido Institucional -->
      <div class="col-lg-7">
        <span class="badge bg-primary text-uppercase px-3 py-2 mb-3 shadow-sm">Quiénes Somos</span>
        <h2 class="fw-bold mb-3 text-dark">Agencia de Seguros IPW</h2>
        <p class="fs-5 text-muted mb-4">
          Fundada en 2003 en Maicao, somos una agencia con amplia trayectoria brindando soluciones efectivas en pólizas de seguros y productos afines.
        </p>

        <!-- Misión -->
        <div class="mb-4">
          <h5 class="fw-bold text-primary">Misión</h5>
          <p class="text-muted mb-0">Brindar asesoría experta y personalizada en seguros a nuestros clientes, protegiendo su patrimonio con respaldo confiable.</p>
        </div>

        <!-- Visión -->
        <div class="mb-4">
          <h5 class="fw-bold text-primary">Visión</h5>
          <p class="text-muted mb-0">Ser líderes en La Guajira para 2026, reconocidos por nuestro servicio, calidad y alianzas sólidas con las mejores aseguradoras del país.</p>
        </div>

        <!-- Valores -->
        <div class="mb-4">
          <h5 class="fw-bold text-primary">Valores Corporativos</h5>
          <ul class="list-unstyled text-muted">
            <?php $__currentLoopData = ['Responsabilidad', 'Compromiso', 'Respeto', 'Integridad', 'Transparencia', 'Equidad', 'Tolerancia', 'Honestidad']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $valor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li class="mb-1"><i class="fa fa-check-circle text-primary me-2"></i><?php echo e($valor); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>
        </div>

        <a href="<?php echo e(url('/about')); ?>" class="btn btn-primary px-4 py-2 rounded-pill shadow-sm">Leer Más</a>
      </div>
    </div>

    <!-- Contact Info -->
    <div class="row text-center mt-5 g-4">
      <div class="col-md-4">
        <div class="bg-white p-4 rounded shadow-sm d-flex align-items-center justify-content-center h-100">
          <i class="fa fa-map-marker-alt fa-2x text-primary me-3"></i>
          <div class="text-start">
            <h6 class="fw-bold mb-1">Nuestra Oficina</h6>
            <p class="mb-0 text-muted">Calle 16 No. 12 - 100, Maicao, La Guajira</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="bg-white p-4 rounded shadow-sm d-flex align-items-center justify-content-center h-100">
          <i class="fa fa-envelope-open fa-2x text-primary me-3"></i>
          <div class="text-start">
            <h6 class="fw-bold mb-1">Correo Electrónico</h6>
            <p class="mb-0 text-muted">ibethpana@gmail.com</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="bg-white p-4 rounded shadow-sm d-flex align-items-center justify-content-center h-100">
          <i class="fa fa-phone-alt fa-2x text-primary me-3"></i>
          <div class="text-start">
            <h6 class="fw-bold mb-1">Contáctanos</h6>
            <p class="mb-0 text-muted">300 800 0231 - 300 278 7271</p>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

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

        <a href="<?php echo e(url('/about')); ?>" class="btn btn-primary px-4 py-2 rounded-pill mt-3 shadow-sm">Conócenos Más</a>
      </div>

      <!-- Estadísticas con contador -->
      <div class="col-lg-6">
        <div class="row g-4">
          <?php
            $stats = [
              ['target' => 20, 'label' => 'Años de Experiencia'],
              ['target' => 15, 'label' => 'Aseguradoras Aliadas'],
              ['target' => 1200, 'label' => 'Clientes Satisfechos'],
              ['target' => 5000, 'label' => 'Pólizas Emitidas']
            ];
          ?>

          <?php $__currentLoopData = $stats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-sm-6">
              <div class="bg-white rounded shadow-sm text-center py-4 h-100 hover-shadow">
                <h2 class="text-primary fw-bold display-5 mb-2 counter" data-target="<?php echo e($stat['target']); ?>">0</h2>
                <p class="mb-0 fw-semibold text-muted"><?php echo e($stat['label']); ?></p>
              </div>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>

    </div>
  </div>
</div>

<!-- Features End -->

<!-- Team Start -->

<!-- Team End -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\nueva aseguradora\ipw\resources\views/pages/about.blade.php ENDPATH**/ ?>