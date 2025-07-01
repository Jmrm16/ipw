<div class="sidebar-container bg-white shadow-lg rounded-3 p-4 w-full lg:w-[280px] lg:min-h-screen flex flex-col lg:block">
    <!-- Header del Sidebar (oculto en móviles) -->
    <div class="sidebar-header mb-4 pb-2 border-bottom hidden lg:block">
        <div class="d-flex align-items-center">
            <div class="avatar me-3">
                <i class="bi bi-person-circle fs-3 text-primary"></i>
            </div>
            <div>
                <h5 class="mb-0 text-dark fw-semibold">Panel de Usuario</h5>
                <small class="text-muted">{{ Auth::user()->name ?? 'Usuario' }}</small>
            </div>
        </div>
    </div>

    <!-- Menú de Navegación (horizontal en móviles) -->
    <ul class="nav flex-row lg:flex-column gap-1 lg:gap-2 overflow-x-auto lg:overflow-visible py-2 lg:py-0">
        <li class="nav-item flex-shrink-0">
            <a href="{{ route('dashboard') }}" 
               class="nav-link rounded-3 p-2 lg:p-3 flex items-center {{ request()->routeIs('dashboard') ? 'active bg-primary-light text-primary' : 'text-dark' }}">
                <i class="bi bi-speedometer2 me-2 lg:me-3 text-lg"></i>
                <span class="text-sm lg:text-base fw-medium hidden sm:inline">Dashboard</span>
                {!! request()->routeIs('dashboard') ? '<i class="bi bi-chevron-right ms-auto hidden lg:block"></i>' : '' !!}
            </a>
        </li>

        <li class="nav-item flex-shrink-0">
            <a href="{{ route('perfil.show') }}" 
               class="nav-link rounded-3 p-2 lg:p-3 flex items-center {{ request()->routeIs('perfil.show') ? 'active bg-primary-light text-primary' : 'text-dark' }}">
                <i class="bi bi-person-badge me-2 lg:me-3 text-lg"></i>
                <span class="text-sm lg:text-base fw-medium hidden sm:inline">Mi Perfil</span>
                {!! request()->routeIs('perfil.show') ? '<i class="bi bi-chevron-right ms-auto hidden lg:block"></i>' : '' !!}
            </a>
        </li>

        <li class="nav-item flex-shrink-0">
            <a href="{{ route('documentos.index') }}" 
               class="nav-link rounded-3 p-2 lg:p-3 flex items-center {{ request()->routeIs('documentos.index') ? 'active bg-primary-light text-primary' : 'text-dark' }}">
                <i class="bi bi-folder2-open me-2 lg:me-3 text-lg"></i>
                <span class="text-sm lg:text-base fw-medium hidden sm:inline">Documentos</span>
                {!! request()->routeIs('documentos.index') ? '<i class="bi bi-chevron-right ms-auto hidden lg:block"></i>' : '' !!}
            </a>
        </li>
    </ul>

    <!-- Footer del Sidebar (oculto en móviles) -->
    <div class="sidebar-footer mt-auto pt-4 border-top hidden lg:block">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-outline-danger w-full flex items-center justify-center">
                <i class="bi bi-box-arrow-right me-2"></i>
                <span>Cerrar Sesión</span>
            </button>
        </form>
    </div>

    <!-- Menú móvil inferior (solo visible en móviles) -->
    <div class="fixed bottom-0 left-0 right-0 bg-white shadow-lg lg:hidden py-2 px-4 flex justify-around border-t">
        <a href="{{ route('dashboard') }}" class="flex flex-col items-center text-xs p-2 {{ request()->routeIs('dashboard') ? 'text-primary' : 'text-gray-600' }}">
            <i class="bi bi-speedometer2 text-lg"></i>
            <span>Inicio</span>
        </a>
        <a href="{{ route('perfil.show') }}" class="flex flex-col items-center text-xs p-2 {{ request()->routeIs('perfil.show') ? 'text-primary' : 'text-gray-600' }}">
            <i class="bi bi-person-badge text-lg"></i>
            <span>Perfil</span>
        </a>
        <a href="{{ route('documentos.index') }}" class="flex flex-col items-center text-xs p-2 {{ request()->routeIs('documentos.index') ? 'text-primary' : 'text-gray-600' }}">
            <i class="bi bi-folder2-open text-lg"></i>
            <span>Docs</span>
        </a>
    </div>
</div>

<style>
    .sidebar-container {
        transition: all 0.3s ease;
        border-right: 1px solid rgba(0, 0, 0, 0.05);
    }
    
    .nav-link {
        transition: all 0.2s ease;
        white-space: nowrap;
    }
    
    .nav-link:hover:not(.active) {
        background-color: rgba(0, 0, 0, 0.03);
    }
    
    .nav-link.active {
        box-shadow: 0 2px 8px rgba(52, 152, 219, 0.2);
    }
    
    .avatar {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: rgba(52, 152, 219, 0.1);
        border-radius: 50%;
    }
    
    @media (min-width: 1024px) {
        .sidebar-container {
            width: 280px;
            min-height: 100vh;
        }
    }
</style>