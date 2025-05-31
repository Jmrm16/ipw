<!-- CSS de Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">



<!-- Carrusel (versión funcional sin cambios estructurales) -->
<div class="container-fluid p-0 mb-5">
    <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#header-carousel" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#header-carousel" data-bs-slide-to="1"></li>
            <li data-bs-target="#header-carousel" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="<?php echo e(asset('img/carousel-1.jpg')); ?>" alt="Servicios Creativos">
                <div class="carousel-caption d-flex align-items-center justify-content-center">
                    <div class="p-5" style="width: 100%; max-width: 900px;">
                        <h5 class="text-white text-uppercase mb-md-3">Agencia Creativa</h5>
                        <h1 class="display-3 text-white mb-md-4">Servicios Creativos para el Crecimiento de Marcas</h1>
                        <a href="#" class="btn btn-primary py-md-2 px-md-4 font-weight-semi-bold mt-2">Aprende Más</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="<?php echo e(asset('img/carousel-2.jpg')); ?>" alt="Equipo Profesional">
                <div class="carousel-caption d-flex align-items-center justify-content-center">
                    <div class="p-5" style="width: 100%; max-width: 900px;">
                        <h5 class="text-white text-uppercase mb-md-3">Agencia Creativa</h5>
                        <h1 class="display-3 text-white mb-md-4">Miembros del Equipo Altamente Profesionales</h1>
                        <a href="#" class="btn btn-primary py-md-2 px-md-4 font-weight-semi-bold mt-2">Aprende Más</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="<?php echo e(asset('img/carousel-3.jpg')); ?>" alt="Clientes Satisfechos">
                <div class="carousel-caption d-flex align-items-center justify-content-center">
                    <div class="p-5" style="width: 100%; max-width: 900px;">
                        <h5 class="text-white text-uppercase mb-md-3">Agencia Creativa</h5>
                        <h1 class="display-3 text-white mb-md-4">Clientes Felices y Reseñas Positivas</h1>
                        <a href="#" class="btn btn-primary py-md-2 px-md-4 font-weight-semi-bold mt-2">Aprende Más</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript de Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script><?php /**PATH C:\xampp\htdocs\aseguradora\resources\views/partials/carrousel.blade.php ENDPATH**/ ?>