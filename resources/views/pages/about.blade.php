@extends('layouts.app')

@section('title', 'About')

@section('content')
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
<div class="container-fluid py-5">
    <div class="container">
        <div class="row align-items-center pb-1">
            <div class="col-lg-5">
                <img class="img-thumbnail p-3" src="img/about.jpg" alt="">
            </div>
            <div class="col-lg-7 mt-5 mt-lg-0">
                <small class="bg-primary text-white text-uppercase font-weight-bold px-1">Who We Are</small>
                <h1 class="mt-2 mb-4">Agencia de Seguros IPW</h1>
                <p class="mb-4">Una agencia de seguros creada desde el 2003, en el municipio de Maicao, dispuesta a dar soluciones oportunas a las necesidades de la población, relacionadas a pólizas de seguros y productos afines.</p>
                
                <div class="mb-4">
                    <h4 class="font-weight-bold">Misión</h4>
                    <p>Brindar asesoría experta y personalizada en seguros a todos nuestros clientes, guiándolos en la selección de la póliza que mejor se adapte a sus necesidades y protegiendo su patrimonio con el respaldo de nuestras sólidas alianzas.</p>
                </div>

                <div class="mb-4">
                    <h4 class="font-weight-bold">Visión</h4>
                    <p>Para el 2026 consolidarnos como la agencia de seguros líder en La Guajira, reconocida por la excelencia en nuestros servicios, la calidad de nuestra asesoría y la solidez de nuestras alianzas con las mejores compañías de seguros del país, posicionándonos como aliados de confianza para la protección del patrimonio y el bienestar de nuestros clientes.</p>
                </div>

                <div class="mb-4">
                    <h4 class="font-weight-bold">Valores Corporativos</h4>
                    <ul class="list-unstyled">
                        <li><i class="fa fa-check text-primary mr-2"></i>Responsabilidad</li>
                        <li><i class="fa fa-check text-primary mr-2"></i>Compromiso</li>
                        <li><i class="fa fa-check text-primary mr-2"></i>Respeto</li>
                        <li><i class="fa fa-check text-primary mr-2"></i>Integridad</li>
                        <li><i class="fa fa-check text-primary mr-2"></i>Transparencia</li>
                        <li><i class="fa fa-check text-primary mr-2"></i>Equidad</li>
                        <li><i class="fa fa-check text-primary mr-2"></i>Tolerancia</li>
                        <li><i class="fa fa-check text-primary mr-2"></i>Honestidad</li>
                    </ul>
                </div>

                <a href="" class="btn btn-primary py-md-2 px-md-4 font-weight-semi-bold">Read More</a>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="d-flex align-items-center border mb-4 mb-lg-0 p-4" style="height: 120px;">
                    <i class="fa fa-2x fa-map-marker-alt text-primary mr-3"></i>
                    <div class="d-flex flex-column">
                        <h5 class="font-weight-bold">Our Office</h5>
                        <p class="m-0">Calle 16 No. 12 - 100, Maicao - La Guajira</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="d-flex align-items-center border mb-4 mb-lg-0 p-4" style="height: 120px;">
                    <i class="fa fa-2x fa-envelope-open text-primary mr-3"></i>
                    <div class="d-flex flex-column">
                        <h5 class="font-weight-bold">Email Us</h5>
                        <p class="m-0">ibethpana@gmail.com</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="d-flex align-items-center border mb-4 mb-lg-0 p-4" style="height: 120px;">
                    <i class="fas fa-2x fa-phone-alt text-primary mr-3"></i>
                    <div class="d-flex flex-column">
                        <h5 class="font-weight-bold">Call Us</h5>
                        <p class="m-0">300 800 0231 - 300 278 7271</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->

<!-- Features Start -->
<div class="container-fluid pt-5 pb-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-5">
                <small class="bg-primary text-white text-uppercase font-weight-bold px-1">Why Choose Us</small>
                <h1 class="mt-2 mb-3">Más de 20 Años de Experiencia</h1>
                <h4 class="font-weight-normal text-muted mb-4">Desde el 2003, hemos brindado soluciones de seguros confiables y personalizadas a nuestros clientes en Maicao y La Guajira.</h4>
                <div class="list-inline mb-4">
                    <p class="font-weight-semi-bold mb-2"><i class="fa fa-angle-right text-primary mr-2"></i>Asesoría personalizada</p>
                    <p class="font-weight-semi-bold mb-2"><i class="fa fa-angle-right text-primary mr-2"></i>Soluciones adaptadas a tus necesidades</p>
                    <p class="font-weight-semi-bold mb-2"><i class="fa fa-angle-right text-primary mr-2"></i>Alianzas con las mejores compañías de seguros</p>
                </div>
                <a href="" class="btn btn-primary py-md-2 px-md-4 font-weight-semi-bold">Learn More</a>
            </div>
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
                            <h2 class="display-3 text-primary mb-3" data-toggle="counter-up">500</h2>
                            <h5 class="font-weight-bold mb-4">Clientes Satisfechos</h5>
                        </div>
                    </div>
                    <div class="col-sm-6 pb-1">
                        <div class="d-flex flex-column align-items-center border px-4 mb-4">
                            <h2 class="display-3 text-primary mb-3" data-toggle="counter-up">1000</h2>
                            <h5 class="font-weight-bold mb-4">Pólizas Emitidas</h5>
                        </div>
                    </div>
                    <div class="col-sm-6 pb-1">
                        <div class="d-flex flex-column align-items-center border px-4 mb-4">
                            <h2 class="display-3 text-primary mb-3" data-toggle="counter-up">10</h2>
                            <h5 class="font-weight-bold mb-4">Compañías Aliadas</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Features End -->

<!-- Team Start -->
<div class="container-fluid pt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-5">
                <small class="bg-primary text-white text-uppercase font-weight-bold px-1">Meet The Team</small>
                <h1 class="mt-2 mb-3">Meet Experts of Behind Work</h1>
                <h4 class="font-weight-normal text-muted mb-4">Eirmod diam magna sed sea rebum, elitr diam dolor lorem ipsum, ipsum stet magna ea diam vero stet vero</h4>
                <a href="" class="btn btn-primary py-md-2 px-md-4 font-weight-semi-bold">Meet All Experts</a>
            </div>
            <div class="col-lg-8 mb-5">
                <div class="owl-carousel team-carousel">
                    <div class="team-item">
                        <div class="position-relative">
                            <img class="img-fluid w-100" src="img/team-1.jpg" alt="">
                            <div class="team-overlay position-absolute d-flex align-items-center justify-content-center m-3">
                                <div class="d-flex align-items-center justify-content-start">
                                    <a class="btn btn-outline-secondary rounded-circle text-center mr-2 px-0" style="width: 38px; height: 38px;" href="#"><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-outline-secondary rounded-circle text-center mr-2 px-0" style="width: 38px; height: 38px;" href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-outline-secondary rounded-circle text-center px-0" style="width: 38px; height: 38px;" href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="border border-top-0 text-center" style="padding: 30px;">
                            <h5 class="font-weight-bold">John Doe</h5>
                            <span>CEO, Founder</span>
                        </div>
                    </div>
                    <div class="team-item">
                        <div class="position-relative">
                            <img class="img-fluid w-100" src="img/team-2.jpg" alt="">
                            <div class="team-overlay position-absolute d-flex align-items-center justify-content-center m-3">
                                <div class="d-flex align-items-center justify-content-start">
                                    <a class="btn btn-outline-secondary rounded-circle text-center mr-2 px-0" style="width: 38px; height: 38px;" href="#"><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-outline-secondary rounded-circle text-center mr-2 px-0" style="width: 38px; height: 38px;" href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-outline-secondary rounded-circle text-center px-0" style="width: 38px; height: 38px;" href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="border border-top-0 text-center" style="padding: 30px;">
                            <h5 class="font-weight-bold">Kate Wilson</h5>
                            <span>Designer</span>
                        </div>
                    </div>
                    <div class="team-item">
                        <div class="position-relative">
                            <img class="img-fluid w-100" src="img/team-3.jpg" alt="">
                            <div class="team-overlay position-absolute d-flex align-items-center justify-content-center m-3">
                                <div class="d-flex align-items-center justify-content-start">
                                    <a class="btn btn-outline-secondary rounded-circle text-center mr-2 px-0" style="width: 38px; height: 38px;" href="#"><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-outline-secondary rounded-circle text-center mr-2 px-0" style="width: 38px; height: 38px;" href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-outline-secondary rounded-circle text-center px-0" style="width: 38px; height: 38px;" href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="border border-top-0 text-center" style="padding: 30px;">
                            <h5 class="font-weight-bold">John Brown</h5>
                            <span>Developer</span>
                        </div>
                    </div>
                    <div class="team-item">
                        <div class="position-relative">
                            <img class="img-fluid w-100" src="img/team-4.jpg" alt="">
                            <div class="team-overlay position-absolute d-flex align-items-center justify-content-center m-3">
                                <div class="d-flex align-items-center justify-content-start">
                                    <a class="btn btn-outline-secondary rounded-circle text-center mr-2 px-0" style="width: 38px; height: 38px;" href="#"><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-outline-secondary rounded-circle text-center mr-2 px-0" style="width: 38px; height: 38px;" href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-outline-secondary rounded-circle text-center px-0" style="width: 38px; height: 38px;" href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="border border-top-0 text-center" style="padding: 30px;">
                            <h5 class="font-weight-bold">Paul Watson</h5>
                            <span>Marketer</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Team End -->
@endsection