<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'IPW')</title>

    <!-- Bootstrap Icons (asegúrate de tenerlo cargado) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <style>
        .navbar-brand img {
            max-height: 120px;
            object-fit: contain;
            height: auto;
            width: auto;
        }

        .main-content {
            margin-top: 10px;
        }

        .header-img {
            background-image: url('{{ asset('img/ases.png') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 280px;
            position: relative;
            transition: all 0.3s ease;
        }

        @media (max-width: 768px) {
            .header-img {
                height: 100px;
            }

            .btn-float {
                display: none;
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

        .nav-link.active,
        .nav-link.text-primary {
            font-weight: 600;
        }
    </style>
</head>
<body>

    {{-- NAVBAR --}}
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
            <img src="{{ asset('img/logoB.png') }}" alt="Logo IPW">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav me-3">
                <li class="nav-item">
                    <a href="{{ url('/') }}" class="nav-link {{ Request::is('/') ? 'text-primary active' : '' }}">Home</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/about') }}" class="nav-link {{ Request::is('about') ? 'text-primary active' : '' }}">Acerca de</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/productos') }}" class="nav-link {{ Request::is('productos') ? 'text-primary active' : '' }}">Productos</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/contacto') }}" class="nav-link {{ Request::is('contacto') ? 'text-primary active' : '' }}">Contacto</a>
                </li>
            </ul>

            {{-- Bloque de usuario --}}
            <ul class="navbar-nav ms-auto">
                @guest
                    {{-- No autenticado --}}
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link">
                            </i> Iniciar sesión
                        </a>
                    </li>
                @else
                    {{-- Autenticado --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle me-1" style="font-size: 1.5rem;"></i> {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li>
                                <a class="dropdown-item" href="{{ route('dashboard') }}">
                                    <i class="bi bi-speedometer2 me-2"></i> Dashboard
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('perfil.show') }}">
                                    <i class="bi bi-person-lines-fill me-2"></i> Perfil
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="bi bi-box-arrow-right me-2"></i> Cerrar sesión
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>

        </div>
    </div>
</nav>


</body>
</html>
