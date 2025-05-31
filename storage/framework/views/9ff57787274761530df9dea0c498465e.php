

<?php $__env->startSection('title', 'Documentos'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container py-5">
        <h2 class="text-center text-muted">No tienes formularios activos aún.</h2>
        <p class="text-center">Por favor completa primero tu formulario médico para cargar documentos.</p>
        <div class="text-center mt-4">
            <a href="<?php echo e(route('formulario.create')); ?>" class="btn btn-primary">
                Ir al formulario
            </a>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\nueva aseguradora\ipw\resources\views/pages/documentos-vacio.blade.php ENDPATH**/ ?>