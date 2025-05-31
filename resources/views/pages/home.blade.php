@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
<!-- Carrusel Inicio -->
<div class="container-fluid p-0 mb-5">
    <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#header-carousel" data-slide-to="0" class="active"></li>
            <li data-target="#header-carousel" data-slide-to="1"></li>
            <li data-target="#header-carousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <!-- Slide 1 -->
            <div class="carousel-item active">
                <img class="img-fluid" src="{{ asset('img/carousel-1.jpg') }}" alt="Protección Total">
                <div class="carousel-caption d-flex align-items-center justify-content-center">
                    <div class="p-5 text-center" style="width: 100%; max-width: 900px;">
                        <h5 class="text-white text-uppercase mb-3">Más de 20 años de experiencia</h5>
                        <h1 class="display-4 text-white mb-4">Protegemos tu Vida y tu Patrimonio</h1>
                        <a href="{{ url('/services') }}" class="btn btn-primary py-md-2 px-md-4 font-weight-semi-bold mt-2">Ver Servicios</a>
                    </div>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item">
                <img class="img-fluid" src="{{ asset('img/carousel-2.jpg') }}" alt="Asesoría Experta">
                <div class="carousel-caption d-flex align-items-center justify-content-center">
                    <div class="p-5 text-center" style="width: 100%; max-width: 900px;">
                        <h5 class="text-white text-uppercase mb-3">Asesoría Personalizada</h5>
                        <h1 class="display-4 text-white mb-4">Te Guiamos en la Elección de tu Póliza</h1>
                        <a href="{{ url('/contacto') }}" class="btn btn-primary py-md-2 px-md-4 font-weight-semi-bold mt-2">Contáctanos</a>
                    </div>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="carousel-item">
                <img class="img-fluid" src="{{ asset('img/carousel-3.jpg') }}" alt="Clientes Felices">
                <div class="carousel-caption d-flex align-items-center justify-content-center">
                    <div class="p-5 text-center" style="width: 100%; max-width: 900px;">
                        <h5 class="text-white text-uppercase mb-3">Confianza y Seguridad</h5>
                        <h1 class="display-4 text-white mb-4">Miles de Clientes Protegidos</h1>
                        <a href="{{ url('/about') }}" class="btn btn-primary py-md-2 px-md-4 font-weight-semi-bold mt-2">Conócenos</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Carrusel Fin -->

    
<!-- Sobre Nosotros Inicio -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="row align-items-center pb-1">
            <!-- Imagen -->
            <div class="col-lg-5">
                <img class="img-thumbnail p-3" src="{{ asset('img/about.jpg') }}" alt="Sobre Nosotros">
            </div>

            <!-- Información -->
            <div class="col-lg-7 mt-5 mt-lg-0">
                <small class="bg-primary text-white text-uppercase font-weight-bold px-1">Quiénes Somos</small>
                <h1 class="mt-2 mb-4">Tu Aliado en Protección y Seguridad Financiera</h1>
                <p class="mb-4">
                    Somos una agencia de seguros con más de 20 años de experiencia, fundada en el año 2003 en Maicao. 
                    Nos especializamos en ofrecer soluciones integrales en pólizas de seguros y productos afines, 
                    garantizando a nuestros clientes protección y tranquilidad. Nos diferenciamos por nuestra atención 
                    personalizada, rapidez en la gestión y sólidas alianzas con las mejores aseguradoras del país.
                </p>
                <a href="{{ url('/about') }}" class="btn btn-primary py-md-2 px-md-4 font-weight-semi-bold">Leer Más</a>
            </div>
        </div>
    </div>
</div>
<!-- Sobre Nosotros Fin -->





<!-- Servicios Inicio -->
<div class="container-fluid pt-5 pb-3">
    <div class="container">
        <div class="row">
            <!-- Sección Principal -->
            <div class="col-lg-4 mb-5">
                <small class="bg-primary text-white text-uppercase font-weight-bold px-1">Nuestros Servicios</small>
                <h1 class="mt-2 mb-3">Soluciones en Seguros para Tu Tranquilidad</h1>
                <h4 class="font-weight-normal text-muted mb-4">
                    Ofrecemos pólizas de seguros adaptadas a tus necesidades, protegiendo tu patrimonio, salud y negocios con asesoría experta y las mejores aseguradoras del país.
                </h4>
                <a href="{{ url('/services') }}" class="btn btn-primary py-md-2 px-md-4 font-weight-semi-bold">Descubre Más</a>
            </div>

            <!-- Servicios Específicos -->
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-md-6 mb-5">
                        <div class="d-flex">
                            <i class="fa fa-3x fa-user-shield text-primary mr-4"></i>
                            <div class="d-flex flex-column">
                                <h4 class="font-weight-bold mb-3">Seguros de Vida</h4>
                                <p>Protege a tus seres queridos con pólizas diseñadas para garantizar su bienestar en caso de imprevistos.</p>
                                <a class="font-weight-semi-bold" href="{{ url('/services#vida') }}">Leer Más <i class="fa fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-5">
                        <div class="d-flex">
                            <i class="fa fa-3x fa-hospital text-primary mr-4"></i>
                            <div class="d-flex flex-column">
                                <h4 class="font-weight-bold mb-3">Responsabilidad Civil Para profesionales De La Salud</h4>
                                <p>Conozca la póliza más completa y económica para proteger su patrimonio frente a reclamaciones de pacientes y/o familiares en su rol de Profesional de la Salud.</p>
                                <a href="{{ url('/seguros/medicos') }}" class="font-weight-semi-bold">Leer Más <i class="fa fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-5">
                        <div class="d-flex">
                            <i class="fa fa-3x fa-car text-primary mr-4"></i>
                            <div class="d-flex flex-column">
                                <h4 class="font-weight-bold mb-3">Seguros para Vehículos</h4>
                                <p>Cubre tu automóvil contra accidentes, robos y daños con los mejores planes del mercado.</p>
                                <a class="font-weight-semi-bold" href="{{ url('/services#vehiculos') }}">Leer Más <i class="fa fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-5">
                        <div class="d-flex">
                            <i class="fa fa-3x fa-building text-primary mr-4"></i>
                            <div class="d-flex flex-column">
                                <h4 class="font-weight-bold mb-3">Seguros Empresariales</h4>
                                <p>Protege tu empresa con pólizas personalizadas que garantizan seguridad financiera y operativa.</p>
                                <a class="font-weight-semi-bold" href="{{ url('/services#empresariales') }}">Leer Más <i class="fa fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Servicios Fin -->


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

    <!-- Equipo Fin -->

<!-- Planes de Pólizas Inicio -->

<!-- Planes de Pólizas Fin -->


    <!-- Planes de Precios Fin -->

    <!-- Testimonios Fin -->

    <!-- Blog Inicio -->
<!-- Blog Inicio -->

<!-- Blog Fin -->

    <!-- Blog Fin -->

@endsection