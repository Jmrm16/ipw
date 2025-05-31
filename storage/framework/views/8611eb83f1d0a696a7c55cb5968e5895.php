<!-- resources/views/components/sidebar.blade.php -->
<div class="bg-white shadow-sm p-3 rounded" style="width: 250px;">
    <h5 class="text-primary mb-4">
        <i class="bi bi-person-circle me-2"></i>Panel
    </h5>

    <ul class="nav flex-column">
        <li class="nav-item">
            <a href="<?php echo e(route('dashboard')); ?>" class="nav-link <?php echo e(request()->routeIs('dashboard') ? 'active fw-bold text-primary' : ''); ?>">
                <i class="bi bi-house-door-fill me-2"></i> Dashboard
            </a>
        </li>

        <li class="nav-item">
            <a href="<?php echo e(route('perfil.show')); ?>" class="nav-link <?php echo e(request()->routeIs('perfil.show') ? 'active fw-bold text-primary' : ''); ?>">
                <i class="bi bi-person-lines-fill me-2"></i> Mi Perfil
            </a>
        </li>


        <li class="nav-item mt-4 border-top pt-3">
            <form method="POST" action="<?php echo e(route('logout')); ?>">
                <?php echo csrf_field(); ?>
                <button type="submit" class="btn btn-outline-danger w-100">
                    <i class="bi bi-box-arrow-right me-2"></i> Cerrar Sesión
                </button>
            </form>
        </li>
    </ul>
</div>
<?php /**PATH C:\xampp\htdocs\proyecto\aseguradora\resources\views/components/sidebar.blade.php ENDPATH**/ ?>