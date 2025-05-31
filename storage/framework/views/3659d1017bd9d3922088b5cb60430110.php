<?php $__env->startSection('title', 'Servicios'); ?>

<?php $__env->startSection('content'); ?>

<style>
    .service-card {
        transition: all 0.3s ease;
        background-color: #ffffff;
        padding: 20px;
        border-radius: 8px;
        border: 1px solid #e0e0e0;
    }

    .service-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 12px 20px rgba(0, 0, 0, 0.1);
        background-color: #f9f9f9;
    }

    .service-card i {
        transition: color 0.3s ease;
    }

    .service-card:hover i {
        color: #0BCEAF !important; /* o tu color primario */
    }
</style>


<!-- Page Header Start -->
<div class="container-fluid page-header d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5 mb-5">
    <h1 class="display-4 text-white mb-3 mt-0 mt-lg-5">Productos</h1>
    <div class="d-inline-flex text-white">
        <p class="m-0"><a class="text-white" href="">Inicio</a></p>
        <p class="m-0 px-2">/</p>
        <p class="m-0">Productos</p>
    </div>
</div>
<!-- Page Header Start -->

<!-- Servicios Inicio -->
<div class="container-fluid pt-5 pb-3">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-6 text-center mb-5">
                <small class="bg-primary text-white text-uppercase font-weight-bold px-2 py-1">Nuestros Productos</small>
                <h1 class="mt-2 mb-3">Soluciones en Seguros</h1>
                <p class="text-muted">
                    Contamos con una amplia gama de pólizas diseñadas para proteger tu salud, tu patrimonio y tu tranquilidad financiera.
                </p>
            </div>
        </div>
        <div class="row">
            <!-- Seguros de Vida -->
            <div class="col-md-4 mb-5">
                <a href="<?php echo e(url('/')); ?>" class="text-decoration-none text-dark">
                    <div class="d-flex service-card">
                        <i class="fa fa-heartbeat fa-3x text-primary mr-4"></i>
                        <div>
                            <h4 class="font-weight-bold mb-3">Seguros de Vida</h4>
                            <ul class="list-unstyled mb-0">
                                <li>Vida individual</li>
                                <li>Vida grupo</li>
                                <li>Vida deudores</li>
                                <li>Accidentes personales</li>
                            </ul>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Seguros Médicos -->
            <div class="col-md-4 mb-5">
                <a href="<?php echo e(url('/Formulario')); ?>" class="text-decoration-none text-dark">
                    <div class="d-flex service-card">
                        <i class="fa fa-user-md fa-3x text-primary mr-4"></i>
                        <div>
                            <h4 class="font-weight-bold mb-3">Seguros Médicos</h4>
                            <ul class="list-unstyled mb-0">
                                <li>Responsabilidad civil médica</li>
                                <li>Requisitos médicos (RETHUS)</li>
                                <li>Plan profesional</li>
                            </ul>
                        </div>
                    </div>
                </a>
            </div>
            
            <!-- Seguros Empresariales -->
            <div class="col-md-4 mb-5">
                <a href="<?php echo e(url('/')); ?>" class="text-decoration-none text-dark">
                    <div class="d-flex service-card">
                        <i class="fa fa-building fa-3x text-primary mr-4"></i>
                        <div>
                            <h4 class="font-weight-bold mb-3">Seguros Empresariales</h4>
                            <ul class="list-unstyled mb-0">
                                <li>Pólizas para contratos</li>
                                <li>Responsabilidad civil empresarial</li>
                                <li>Pólizas de cumplimiento</li>
                                <li>ARL</li>
                            </ul>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Seguros para Vehículos -->
            <div class="col-md-4 mb-5">
                <a href="<?php echo e(url('/')); ?>" class="text-decoration-none text-dark">
                    <div class="d-flex service-card">
                        <i class="fa fa-car fa-3x text-primary mr-4"></i>
                        <div>
                            <h4 class="font-weight-bold mb-3">Seguros para Vehículos</h4>
                            <ul class="list-unstyled mb-0">
                                <li>Seguro todo riesgo</li>
                                <li>SOAT</li>
                                <li>Seguros para motos y carros</li>
                                <li>Transporte de mercancías</li>
                            </ul>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Seguros Educativos -->
            <div class="col-md-4 mb-5">
                <a href="<?php echo e(url('/')); ?>" class="text-decoration-none text-dark">
                    <div class="d-flex service-card">
                        <i class="fa fa-graduation-cap fa-3x text-primary mr-4"></i>
                        <div>
                            <h4 class="font-weight-bold mb-3">Seguros Educativos</h4>
                            <ul class="list-unstyled mb-0">
                                <li>Pólizas para estudiantes en prácticas</li>
                                <li>Turismo educativo</li>
                                <li>Previ educativa</li>
                            </ul>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Otros Servicios -->
            <div class="col-md-4 mb-5">
                <a href="<?php echo e(url('/')); ?>" class="text-decoration-none text-dark">
                    <div class="d-flex">
                        <i class="fa fa-shield-alt fa-3x text-primary mr-4"></i>
                        <div>
                            <h4 class="font-weight-bold mb-3">Otras Coberturas</h4>
                            <ul class="list-unstyled mb-0">
                                <li>Responsabilidad civil hoteles</li>
                                <li>Responsabilidad civil restaurantes</li>
                                <li>Estaciones de servicio</li>
                                <li>Pymes y alcaldías</li>
                            </ul>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- Servicios Fin -->

<!-- Servicios Fin -->

<!-- Testimonios Inicio -->
<div class="container-fluid pt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-5">
                <small class="bg-primary text-white text-uppercase font-weight-bold px-1">Lo que dicen los clientes</small>
                <h1 class="mt-2 mb-3">Clientes Opinan Sobre Nuestros Servicios</h1>
                <h4 class="font-weight-normal text-muted mb-4">Lorem ut kasd elitr sed est duo ea ipsum justo diam, est erat lorem clita diam elitr</h4>
                <a href="" class="btn btn-primary py-md-2 px-md-4 font-weight-semi-bold">Enviar Reseña</a>
            </div>
            <div class="col-lg-8 mb-5">
                <div class="owl-carousel testimonial-carousel">
                    <div class="testimonial-item">
                        <div class="testimonial-text position-relative border mb-4" style="padding: 25px 30px;">
                            Sed ea amet kasd elitr stet nonumy, stet rebum et ipsum est duo elitr eirmod clita lorem. Dolores tempor voluptua ipsum sanctus clita
                        </div>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid rounded-circle" src="img/testimonial-1.jpg" style="width: 80px; height: 80px;" alt="Imagen">
                            <div class="pl-4">
                                <h6 class="font-weight-bold">Nombre del Cliente</h6>
                                <i class="text-muted">Profesión</i>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item">
                        <div class="testimonial-text position-relative border mb-4" style="padding: 25px 30px;">
                            Sed ea amet kasd elitr stet nonumy, stet rebum et ipsum est duo elitr eirmod clita lorem. Dolores tempor voluptua ipsum sanctus clita
                        </div>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid rounded-circle" src="img/testimonial-2.jpg" style="width: 80px; height: 80px;" alt="Imagen">
                            <div class="pl-4">
                                <h6 class="font-weight-bold">Nombre del Cliente</h6>
                                <i class="text-muted">Profesión</i>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item">
                        <div class="testimonial-text position-relative border mb-4" style="padding: 25px 30px;">
                            Sed ea amet kasd elitr stet nonumy, stet rebum et ipsum est duo elitr eirmod clita lorem. Dolores tempor voluptua ipsum sanctus clita
                        </div>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid rounded-circle" src="img/testimonial-3.jpg" style="width: 80px; height: 80px;" alt="Imagen">
                            <div class="pl-4">
                                <h6 class="font-weight-bold">Nombre del Cliente</h6>
                                <i class="text-muted">Profesión</i>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item">
                        <div class="testimonial-text position-relative border mb-4" style="padding: 25px 30px;">
                            Sed ea amet kasd elitr stet nonumy, stet rebum et ipsum est duo elitr eirmod clita lorem. Dolores tempor voluptua ipsum sanctus clita
                        </div>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid rounded-circle" src="img/testimonial-4.jpg" style="width: 80px; height: 80px;" alt="Imagen">
                            <div class="pl-4">
                                <h6 class="font-weight-bold">Nombre del Cliente</h6>
                                <i class="text-muted">Profesión</i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonios Fin -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\proyecto\aseguradora\resources\views/pages/services.blade.php ENDPATH**/ ?>