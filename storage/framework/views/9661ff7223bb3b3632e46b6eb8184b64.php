<!-- resources/views/components/sidebar.blade.php -->
<div class="sidebar-container bg-white shadow-lg rounded-3 p-4" style="width: 280px; min-height: 100vh;">
    <!-- Header del Sidebar -->
    <div class="sidebar-header mb-4 pb-2 border-bottom">
        <div class="d-flex align-items-center">
            <div class="avatar me-3">
                <i class="bi bi-person-circle fs-3 text-primary"></i>
            </div>
            <div>
                <h5 class="mb-0 text-dark fw-semibold">Panel de Usuario</h5>
                <small class="text-muted"><?php echo e(Auth::user()->name ?? 'Usuario'); ?></small>
            </div>
        </div>
    </div>

    <!-- Menú de Navegación -->
    <ul class="nav flex-column gap-2">
        <li class="nav-item">
            <a href="<?php echo e(route('dashboard')); ?>" 
               class="nav-link rounded-3 p-3 d-flex align-items-center <?php echo e(request()->routeIs('dashboard') ? 'active bg-primary-light text-primary' : 'text-dark'); ?>">
                <i class="bi bi-speedometer2 me-3 fs-5"></i>
                <span class="fw-medium">Dashboard</span>
                <?php echo request()->routeIs('dashboard') ? '<i class="bi bi-chevron-right ms-auto"></i>' : ''; ?>

            </a>
        </li>

        <li class="nav-item">
            <a href="<?php echo e(route('perfil.show')); ?>" 
               class="nav-link rounded-3 p-3 d-flex align-items-center <?php echo e(request()->routeIs('perfil.show') ? 'active bg-primary-light text-primary' : 'text-dark'); ?>">
                <i class="bi bi-person-badge me-3 fs-5"></i>
                <span class="fw-medium">Mi Perfil</span>
                <?php echo request()->routeIs('perfil.show') ? '<i class="bi bi-chevron-right ms-auto"></i>' : ''; ?>

            </a>
        </li>

        <li class="nav-item">
            <a href="<?php echo e(route('documentos.index')); ?>" 
               class="nav-link rounded-3 p-3 d-flex align-items-center <?php echo e(request()->routeIs('documentos.index') ? 'active bg-primary-light text-primary' : 'text-dark'); ?>">
                <i class="bi bi-folder2-open me-3 fs-5"></i>
                <span class="fw-medium">Mis Documentos</span>
                <?php echo request()->routeIs('documentos.index') ? '<i class="bi bi-chevron-right ms-auto"></i>' : ''; ?>

            </a>
        </li>

        <!-- Puedes añadir más elementos del menú aquí -->
    </ul>

    <!-- Footer del Sidebar -->
    <div class="sidebar-footer mt-auto pt-4 border-top">
        <form method="POST" action="<?php echo e(route('logout')); ?>">
            <?php echo csrf_field(); ?>
            <button type="submit" class="btn btn-outline-danger w-100 d-flex align-items-center justify-content-center">
                <i class="bi bi-box-arrow-right me-2"></i>
                <span>Cerrar Sesión</span>
            </button>
        </form>
    </div>
</div>

<style>
    :root {
        --primary-light: rgba(52, 152, 219, 0.1);
    }
    
    .sidebar-container {
        transition: all 0.3s ease;
        border-right: 1px solid rgba(0, 0, 0, 0.05);
    }
    
    .sidebar-header {
        transition: all 0.3s ease;
    }
    
    .nav-link {
        transition: all 0.2s ease;
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
        background-color: var(--primary-light);
        border-radius: 50%;
    }
    
    @media (max-width: 992px) {
        .sidebar-container {
            width: 100% !important;
            min-height: auto;
        }
    }
</style><?php /**PATH C:\xampp\htdocs\nueva aseguradora\ipw\resources\views/components/sidebar.blade.php ENDPATH**/ ?>