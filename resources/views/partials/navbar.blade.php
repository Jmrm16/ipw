<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title', 'IPW')</title>

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" />

  <style>
    :root {
      --primary-color: #2c3e50;
      --secondary-color: #3498db;
      --accent-color: #e74c3c;
      --light-color: #ecf0f1;
      --dark-color: #2c3e50;
      --transition-speed: 0.3s;
    }

    html, body {
      margin: 0;
      padding: 0;
      font-family: 'Poppins', sans-serif;
    }

    .navbar {
      background: linear-gradient(135deg, var(--primary-color) 0%, var(--dark-color) 100%);
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      padding: 0.5rem 1rem;
      transition: all var(--transition-speed) ease;
    }

    .navbar.scrolled {
      padding: 0.3rem 1rem;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.15);
    }

    .navbar-brand img {
      max-height: 60px;
      transition: all var(--transition-speed) ease;
    }

    .navbar.scrolled .navbar-brand img {
      max-height: 50px;
    }

    .nav-link {
      color: var(--light-color) !important;
      font-weight: 500;
      padding: 0.5rem 1rem !important;
      margin: 0 0.2rem;
      border-radius: 4px;
      transition: all var(--transition-speed) ease;
      position: relative;
    }

    .nav-link:hover, .nav-link:focus {
      color: white !important;
      background: rgba(255, 255, 255, 0.1);
    }

    .nav-link.active {
      color: white !important;
      font-weight: 600;
    }

    .nav-link.active::after {
      content: '';
      position: absolute;
      bottom: -5px;
      left: 15%;
      width: 70%;
      height: 2px;
      background: var(--accent-color);
      border-radius: 2px;
    }

    .navbar-toggler {
      border: none;
      padding: 0.5rem;
    }

    .navbar-toggler-icon {
      background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 255, 255, 0.8%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
    }

    /* Eliminar márgenes laterales en container */
    .navbar .container-fluid {
      padding-right: 0 !important;
      padding-left: 0 !important;
      margin-right: 0 !important;
      margin-left: 0 !important;
    }

    @media (max-width: 768px) {
      .navbar-brand img {
        max-height: 50px;
      }
    }
  </style>
</head>
<body>

  <!-- NAVBAR corregida -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ url('/') }}">
        <img src="{{ asset('img/logoB.png') }}" alt="Logo IPW" class="img-fluid" />
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="{{ url('/') }}" class="nav-link {{ Request::is('/') ? 'active' : '' }}">Home</a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/about') }}" class="nav-link {{ Request::is('about') ? 'active' : '' }}">Acerca de</a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/productos') }}" class="nav-link {{ Request::is('productos') ? 'active' : '' }}">Productos</a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/contacto') }}" class="nav-link {{ Request::is('contacto') ? 'active' : '' }}">Contacto</a>
          </li>
        </ul>

        <ul class="navbar-nav">
          @guest
            <li class="nav-item">
              <a href="{{ route('login') }}" class="nav-link">
                <i class="bi bi-box-arrow-in-right me-1"></i> Iniciar sesión
              </a>
            </li>
          @else
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">
                <div class="me-2 d-none d-sm-block">{{ Auth::user()->name }}</div>
                <i class="bi bi-person-circle" style="font-size: 1.5rem;"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
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

  <script>
    // Scroll effect
    window.addEventListener('scroll', function () {
      const navbar = document.querySelector('.navbar');
      if (window.scrollY > 50) {
        navbar.classList.add('scrolled');
      } else {
        navbar.classList.remove('scrolled');
      }
    });
  </script>
</body>
</html>
