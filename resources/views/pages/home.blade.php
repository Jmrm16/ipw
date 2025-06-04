@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
<!-- Carrusel Inicio -->
<div class="container-fluid p-0">
    <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#header-carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#header-carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#header-carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>

        <div class="carousel-inner">

            <!-- Slide 1 -->
            <div class="carousel-item active" style="height: 100vh;">
                <img src="{{ asset('img/carousel-1.jpg') }}" class="d-block w-100 h-100" style="object-fit: cover; filter: brightness(60%);" alt="Protección Total">
                <div class="carousel-caption d-flex flex-column justify-content-center align-items-center h-100">
                    <h5 class="text-uppercase text-white mb-3" style="text-shadow: 1px 1px 8px #000;">Más de 20 años de experiencia</h5>
                    <h1 class="display-4 fw-bold text-white mb-4 text-center" style="text-shadow: 2px 2px 12px #000;">Protegemos tu Vida y tu Patrimonio</h1>
                    <a href="{{ url('/productos') }}" class="btn btn-lg btn-primary px-4 py-2">Ver Productos</a>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item" style="height: 100vh;">
                <img src="{{ asset('img/carousel-2.jpg') }}" class="d-block w-100 h-100" style="object-fit: cover; filter: brightness(60%);" alt="Asesoría Experta">
                <div class="carousel-caption d-flex flex-column justify-content-center align-items-center h-100">
                    <h5 class="text-uppercase text-white mb-3" style="text-shadow: 1px 1px 8px #000;">Asesoría Personalizada</h5>
                    <h1 class="display-4 fw-bold text-white mb-4 text-center" style="text-shadow: 2px 2px 12px #000;">Te Guiamos en la Elección de tu Póliza</h1>
                    <a href="{{ url('/contacto') }}" class="btn btn-lg btn-primary px-4 py-2">Contáctanos</a>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="carousel-item" style="height: 100vh;">
                <img src="{{ asset('img/carousel-3.jpg') }}" class="d-block w-100 h-100" style="object-fit: cover; filter: brightness(60%);" alt="Clientes Felices">
                <div class="carousel-caption d-flex flex-column justify-content-center align-items-center h-100">
                    <h5 class="text-uppercase text-white mb-3" style="text-shadow: 1px 1px 8px #000;">Confianza y Seguridad</h5>
                    <h1 class="display-4 fw-bold text-white mb-4 text-center" style="text-shadow: 2px 2px 12px #000;">Miles de Clientes Protegidos</h1>
                    <a href="{{ url('/about') }}" class="btn btn-lg btn-primary px-4 py-2">Conócenos</a>
                </div>
            </div>
        </div>

        <!-- Controles -->
        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>
    </div>
</div>
<!-- Carrusel Fin -->


<!-- About Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <img class="img-fluid rounded shadow" src="{{ asset('img/about.jpg') }}" alt="Sobre Nosotros">
            </div>
            <div class="col-lg-6">
                <div class="section-title mb-4">
                    <span class="badge bg-primary text-uppercase mb-2">Quiénes Somos</span>
                    <h2 class="mb-3">Tu Aliado en Protección y Seguridad Financiera</h2>
                    <p class="lead">
                        Somos una agencia de seguros con más de 20 años de experiencia, fundada en el año 2003 en Maicao.
                    </p>
                </div>
                <p class="mb-4">
                    Nos especializamos en ofrecer soluciones integrales en pólizas de seguros y productos afines, 
                    garantizando a nuestros clientes protección y tranquilidad. Nos diferenciamos por nuestra atención 
                    personalizada, rapidez en la gestión y sólidas alianzas con las mejores aseguradoras del país.
                </p>
                <a href="{{ url('/about') }}" class="btn btn-primary px-4">Leer Más</a>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="py-5">
    <div class="container">
        <div class="section-title text-center mb-5">
            <span class="badge bg-primary text-uppercase mb-2">Nuestros Servicios</span>
            <h2 class="mb-3">Soluciones en Seguros para Tu Tranquilidad</h2>
            <p class="lead">Ofrecemos pólizas de seguros adaptadas a tus necesidades, protegiendo tu patrimonio, salud y negocios.</p>
        </div>
        
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="icon-box bg-primary-light rounded-circle mx-auto mb-4">
                            <i class="fa fa-user-shield text-primary fa-2x"></i>
                        </div>
                        <h5 class="card-title mb-3">RCE</h5>
                        <p class="card-text">Protección para su patrimonio frente a reclamaciones de terceros.</p>
                        <a href="{{ url('/seguros/rce') }}" class="btn btn-link text-primary p-0">Leer Más <i class="fa fa-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="icon-box bg-primary-light rounded-circle mx-auto mb-4">
                            <i class="fa fa-hospital text-primary fa-2x"></i>
                        </div>
                        <h5 class="card-title mb-3">Profesionales de la Salud</h5>
                        <p class="card-text">Protección especializada para médicos y profesionales de la salud.</p>
                        <a href="{{ url('/seguros/medicos') }}" class="btn btn-link text-primary p-0">Leer Más <i class="fa fa-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="icon-box bg-primary-light rounded-circle mx-auto mb-4">
                            <i class="fa fa-car text-primary fa-2x"></i>
                        </div>
                        <h5 class="card-title mb-3">Vehículos</h5>
                        <p class="card-text">Cobertura completa para tu automóvil contra accidentes y robos.</p>
                        <a href="{{ url('/services#vehiculos') }}" class="btn btn-link text-primary p-0">Leer Más <i class="fa fa-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="icon-box bg-primary-light rounded-circle mx-auto mb-4">
                            <i class="fa fa-building text-primary fa-2x"></i>
                        </div>
                        <h5 class="card-title mb-3">Empresariales</h5>
                        <p class="card-text">Soluciones de protección diseñadas para tu negocio.</p>
                        <a href="{{ url('/services#empresariales') }}" class="btn btn-link text-primary p-0">Leer Más <i class="fa fa-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="text-center mt-5">
            <a href="{{ url('/productos') }}" class="btn btn-outline-primary px-4">Ver Todos los Productos</a>
        </div>
    </div>
</section>

<!-- Características Inicio -->
<div class="container-fluid pt-5 pb-2">
    <div class="container">
        <div class="row">
            <!-- Información de Por Qué Elegirnos -->
            <div class="col-lg-6 mb-5">
                <small class="bg-primary text-white text-uppercase font-weight-bold px-1">Por Qué Elegirnos</small>
                <h1 class="mt-2 mb-3">Más de 20 Años Protegiendo tu Futuro</h1>
                <h4 class="font-weight-normal text-muted mb-4">
                    Desde 2003, hemos trabajado para brindar tranquilidad a nuestros clientes, ofreciendo asesoría 
                    experta en seguros y protegiendo su patrimonio con planes diseñados a su medida.
                </h4>
                <div class="list-inline mb-4">
                    <p class="font-weight-semi-bold mb-2"><i class="fa fa-angle-right text-primary mr-2"></i>Atención personalizada y asesoría experta</p>
                    <p class="font-weight-semi-bold mb-2"><i class="fa fa-angle-right text-primary mr-2"></i>Alianzas con las principales aseguradoras del país</p>
                    <p class="font-weight-semi-bold mb-2"><i class="fa fa-angle-right text-primary mr-2"></i>Amplia cobertura en seguros personales y empresariales</p>
                </div>
                <a href="{{ url('/about') }}" class="btn btn-primary py-md-2 px-md-4 font-weight-semi-bold">Aprende Más</a>
            </div>

            <!-- Estadísticas -->
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-sm-6 pb-1">
                        <div class="d-flex flex-column align-items-center border px-4 mb-4">
                            <h2 class="display-3 text-primary mb-3" data-toggle="counter-up">20</h2>
                            <h5 class="font-weight-bold mb-4">Años de Experiencia</h5>
                        </div>
                    </div>
                    <div class="col-sm-6 pb-1">
                        <div class="d-flex flex-column align-items-center border px-4 mb-4">
                            <h2 class="display-3 text-primary mb-3" data-toggle="counter-up">15</h2>
                            <h5 class="font-weight-bold mb-4">Compañías Aseguradoras Asociadas</h5>
                        </div>
                    </div>
                    <div class="col-sm-6 pb-1">
                        <div class="d-flex flex-column align-items-center border px-4 mb-4">
                            <h2 class="display-3 text-primary mb-3" data-toggle="counter-up">1200</h2>
                            <h5 class="font-weight-bold mb-4">Clientes Satisfechos</h5>
                        </div>
                    </div>
                    <div class="col-sm-6 pb-1">
                        <div class="d-flex flex-column align-items-center border px-4 mb-4">
                            <h2 class="display-3 text-primary mb-3" data-toggle="counter-up">5000</h2>
                            <h5 class="font-weight-bold mb-4">Pólizas Emitidas</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Características Fin -->

<!-- Equipo Inicio -->
<div class="container-fluid pt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-5">
                <small class="bg-primary text-white text-uppercase font-weight-bold px-1">Conoce al Equipo</small>
                <h1 class="mt-2 mb-3">Expertas que Respaldan Nuestra Misión</h1>
                <h4 class="font-weight-normal text-muted mb-4">
                    Nuestro equipo está compuesto por profesionales comprometidas con brindar asesoría clara, efectiva y oportuna en seguros.
                </h4>
                <a href="#" class="btn btn-primary py-md-2 px-md-4 font-weight-semi-bold">Ver Todo el Equipo</a>
            </div>
            <div class="col-lg-8 mb-5">
                <div class="owl-carousel team-carousel">
                    <!-- Mayerlis Pana -->
                    <div class="team-item">
                        <div class="position-relative">
                            <img class="img-fluid w-100" src="{{ asset('img/mayerlis.jpg') }}" alt="Mayerlis Pana">
                            <div class="team-overlay position-absolute d-flex align-items-center justify-content-center m-3">
                                <div class="d-flex align-items-center justify-content-start">
                                    <a class="btn btn-outline-secondary rounded-circle text-center mr-2 px-0" style="width: 38px; height: 38px;" href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-outline-secondary rounded-circle text-center px-0" style="width: 38px; height: 38px;" href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="border border-top-0 text-center" style="padding: 30px;">
                            <h5 class="font-weight-bold">Mayerlis Pana</h5>
                            <span>Asesora de Seguros</span>
                        </div>
                    </div>

                    <!-- Ibeth Pana -->
                    <div class="team-item">
                        <div class="position-relative">
                            <img class="img-fluid w-100" src="{{ asset('img/ibeth.jpg') }}" alt="Ibeth Pana">
                            <div class="team-overlay position-absolute d-flex align-items-center justify-content-center m-3">
                                <div class="d-flex align-items-center justify-content-start">
                                    <a class="btn btn-outline-secondary rounded-circle text-center mr-2 px-0" style="width: 38px; height: 38px;" href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-outline-secondary rounded-circle text-center px-0" style="width: 38px; height: 38px;" href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="border border-top-0 text-center" style="padding: 30px;">
                            <h5 class="font-weight-bold">Ibeth Pana</h5>
                            <span>Asesora Comercial</span>
                        </div>
                    </div>

                    <!-- Placeholder #1 -->
                    <div class="team-item">
                        <div class="position-relative">
                            <img class="img-fluid w-100" src="{{ asset('img/team-placeholder.jpg') }}" alt="">
                            <div class="team-overlay position-absolute d-flex align-items-center justify-content-center m-3">
                                <div class="d-flex align-items-center justify-content-start">
                                    <a class="btn btn-outline-secondary rounded-circle text-center mr-2 px-0" style="width: 38px; height: 38px;" href="#"><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-outline-secondary rounded-circle text-center px-0" style="width: 38px; height: 38px;" href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="border border-top-0 text-center" style="padding: 30px;">
                            <h5 class="font-weight-bold">Nombre Apellido</h5>
                            <span>Cargo</span>
                        </div>
                    </div>

                    <!-- Placeholder #2 -->
                    <div class="team-item">
                        <div class="position-relative">
                            <img class="img-fluid w-100" src="{{ asset('img/team-placeholder.jpg') }}" alt="">
                            <div class="team-overlay position-absolute d-flex align-items-center justify-content-center m-3">
                                <div class="d-flex align-items-center justify-content-start">
                                    <a class="btn btn-outline-secondary rounded-circle text-center mr-2 px-0" style="width: 38px; height: 38px;" href="#"><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-outline-secondary rounded-circle text-center px-0" style="width: 38px; height: 38px;" href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="border border-top-0 text-center" style="padding: 30px;">
                            <h5 class="font-weight-bold">Nombre Apellido</h5>
                            <span>Cargo</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- CTA Section -->
<section class="py-5 bg-dark text-white">
    <div class="container text-center py-4">
        <h2 class="mb-4">¿Listo para proteger lo que más te importa?</h2>
        <p class="lead mb-4">Contáctanos hoy mismo para una asesoría gratuita y sin compromiso.</p>
        <a href="{{ url('/contacto') }}" class="btn btn-primary btn-lg px-4">Solicitar Asesoría</a>
    </div>
</section>

@endsection

@section('styles')
<style>
    /* Hero Section */
    .hero-section {
        height: 100vh;
        min-height: 600px;
        max-height: 800px;
    }
    
    .carousel-item {
        height: 100%;
    }
    
    .carousel-item img {
        height: 100%;
        object-fit: cover;
    }
    
    .carousel-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.5);
    }
    
    /* Section Titles */
    .section-title span {
        letter-spacing: 1px;
    }
    
    .section-title h2 {
        position: relative;
        padding-bottom: 15px;
    }
    
    .section-title h2:after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 3px;
        background: var(--bs-primary);
    }
    
    /* Icon Box */
    .icon-box {
        width: 80px;
        height: 80px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    /* Counter */
    [data-counter] {
        transition: all 1s ease;
    }
    
    /* Team Card */
    .team-card .team-img {
        height: 300px;
    }
    
    .team-card .team-img img {
        height: 100%;
        width: 100%;
        object-fit: cover;
    }
    
    .team-social {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.7);
        opacity: 0;
        transition: all 0.3s ease;
    }
    
    .team-card:hover .team-social {
        opacity: 1;
    }
    
    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .hero-section {
            height: auto;
            min-height: 500px;
        }
        
        .section-title h2:after {
            width: 60px;
        }
        
        .team-card .team-img {
            height: 250px;
        }
    }
    .object-fit-cover {
    object-fit: cover;
    object-position: center;
}

.carousel-caption {
    z-index: 10;
}

.carousel-caption h1,
.carousel-caption h5 {
    text-shadow: 2px 2px 12px rgba(0,0,0,0.85);
}

.carousel-item img {
    transition: transform 3s ease;
}

.carousel-item.active img {
    transform: scale(1.03);
}


</style>
@endsection

@section('scripts')
<script>
    // Counter Animation
    document.addEventListener('DOMContentLoaded', function() {
        const counters = document.querySelectorAll('[data-counter]');
        const speed = 200;
        
        function animateCounters() {
            counters.forEach(counter => {
                const target = +counter.getAttribute('data-counter');
                const count = +counter.innerText;
                const increment = target / speed;
                
                if (count < target) {
                    counter.innerText = Math.ceil(count + increment);
                    setTimeout(animateCounters, 1);
                } else {
                    counter.innerText = target;
                }
            });
        }
        
        // Start animation when element is in viewport
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounters();
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });
        
        counters.forEach(counter => {
            observer.observe(counter);
        });
    });
</script>
@endsection