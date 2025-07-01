<!-- Inicio del Pie de Página -->
<div class="padding-top-5">
    <!-- Espacio para el contenido principal de la página -->
<!-- Inicio del Pie de Página -->
<footer class="bg-dark text-white pt-5 pb-4">
    <div class="container">
        <div class="row g-4">
            <!-- Información de la Agencia -->
            <div class="col-lg-3 col-md-6 mb-4">
                <a href="{{ url('/') }}" class="d-flex align-items-center mb-3 text-decoration-none">
                    <img src="{{ asset('img/logoB.png') }}" alt="Logo IPW" style="max-height: 60px;">
                </a>
                <p class="mb-4">Agencia de seguros con más de 20 años de experiencia brindando soluciones confiables a nuestros clientes. Estamos en Maicao, La Guajira, protegiendo lo que más valoras.</p>
                <div class="d-flex social-icons">
                    <a href="https://www.facebook.com/ipw.agenciadeseguros/" class="btn btn-outline-light btn-social rounded-circle me-2">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="btn btn-outline-light btn-social rounded-circle me-2">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="btn btn-outline-light btn-social rounded-circle">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                </div>
            </div>

            <!-- Navegación -->
            <div class="col-lg-3 col-md-6 mb-4">
                <h5 class="text-uppercase fw-bold mb-4" style="color: #e74c3c;">Enlaces Rápidos</h5>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <a href="{{ url('/') }}" class="text-white text-decoration-none d-flex align-items-center">
                            <i class="bi bi-chevron-right me-2" style="color: #e74c3c;"></i>Inicio
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ url('/about') }}" class="text-white text-decoration-none d-flex align-items-center">
                            <i class="bi bi-chevron-right me-2" style="color: #e74c3c;"></i>Quiénes Somos
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ url('/services') }}" class="text-white text-decoration-none d-flex align-items-center">
                            <i class="bi bi-chevron-right me-2" style="color: #e74c3c;"></i>Servicios
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ url('/requisitos') }}" class="text-white text-decoration-none d-flex align-items-center">
                            <i class="bi bi-chevron-right me-2" style="color: #e74c3c;"></i>Requisitos
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/contacto') }}" class="text-white text-decoration-none d-flex align-items-center">
                            <i class="bi bi-chevron-right me-2" style="color: #e74c3c;"></i>Contáctanos
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Productos y Pólizas -->
            <div class="col-lg-3 col-md-6 mb-4">
                <h5 class="text-uppercase fw-bold mb-4" style="color: #e74c3c;">Nuestros Productos</h5>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <a href="{{ url('/services#vida') }}" class="text-white text-decoration-none d-flex align-items-center">
                            <i class="bi bi-chevron-right me-2" style="color: #e74c3c;"></i>Seguros de Vida
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ url('/services#medicos') }}" class="text-white text-decoration-none d-flex align-items-center">
                            <i class="bi bi-chevron-right me-2" style="color: #e74c3c;"></i>Seguros Médicos
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ url('/services#vehiculos') }}" class="text-white text-decoration-none d-flex align-items-center">
                            <i class="bi bi-chevron-right me-2" style="color: #e74c3c;"></i>Seguros de Vehículos
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ url('/services#empresariales') }}" class="text-white text-decoration-none d-flex align-items-center">
                            <i class="bi bi-chevron-right me-2" style="color: #e74c3c;"></i>Seguros Empresariales
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/services#sarlaft') }}" class="text-white text-decoration-none d-flex align-items-center">
                            <i class="bi bi-chevron-right me-2" style="color: #e74c3c;"></i>Formularios SARLAFT
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Contacto -->
            <div class="col-lg-3 col-md-6 mb-4">
                <h5 class="text-uppercase fw-bold mb-4" style="color: #e74c3c;">Contáctanos</h5>
                <p class="mb-4">Estamos disponibles para asesorarte </p>
                <ul class="list-unstyled">
                    <li class="mb-3 d-flex">
                        <i class="bi bi-geo-alt-fill me-3" style="color: #e74c3c; font-size: 1.2rem;"></i>
                        <span>Calle 16#12-100, Maicao, La Guajira</span>
                    </li>
                    <li class="mb-3 d-flex">
                        <i class="bi bi-geo-alt-fill me-3" style="color: #e74c3c; font-size: 1.2rem;"></i>
                        <span>Calle 14D # 10-80, Uribia, La Guajira</span>
                    </li>
                    <li class="mb-3 d-flex">
                        <i class="bi bi-telephone-fill me-3" style="color: #e74c3c; font-size: 1.2rem;"></i>
                        <span>Maicao +57 300 8000231</span>
                    </li>
                    <li class="mb-3 d-flex">
                        <i class="bi bi-telephone-fill me-3" style="color: #e74c3c; font-size: 1.2rem;"></i>
                        <span>Uribia +57 312 7721352</span>
                    </li>
                    <li class="d-flex">
                        <i class="bi bi-envelope-fill me-3" style="color: #e74c3c; font-size: 1.2rem;"></i>
                        <span>ibethpana@gmail.com</span>
                    </li>
                </ul>
            </div>
        </div>
        
        <hr class="my-4" style="border-color: rgba(255,255,255,0.1);">
        
 <div class="row align-items-center border-top pt-4 mt-4" style="border-color: rgba(255, 255, 255, 0.1);">
    <div class="col-md-6 text-center text-md-start mb-2 mb-md-0">
        <p class="mb-0 text-white-50">
            &copy; <script>document.write(new Date().getFullYear())</script> IPW Agencia de Seguros. Todos los derechos reservados.
        </p>
    </div>
    <div class="col-md-6 text-center text-md-end">
        <p class="mb-0 text-white-50">
            Diseñado con <i class="bi bi-heart-fill text-danger"></i> por <strong class="text-white">IPW</strong>
        </p>
    </div>
</div>

    </div>
</footer>
<!-- Fin del Pie de Página -->
</div>
<!-- Fin del Pie de Página -->
