<?php $__env->startSection('title', 'Mi Perfil'); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex">
    
    <?php if (isset($component)) { $__componentOriginal2880b66d47486b4bfeaf519598a469d6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2880b66d47486b4bfeaf519598a469d6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.sidebar','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2880b66d47486b4bfeaf519598a469d6)): ?>
<?php $attributes = $__attributesOriginal2880b66d47486b4bfeaf519598a469d6; ?>
<?php unset($__attributesOriginal2880b66d47486b4bfeaf519598a469d6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2880b66d47486b4bfeaf519598a469d6)): ?>
<?php $component = $__componentOriginal2880b66d47486b4bfeaf519598a469d6; ?>
<?php unset($__componentOriginal2880b66d47486b4bfeaf519598a469d6); ?>
<?php endif; ?>

    
    <div class="flex-grow-1 p-4">
        <div class="card shadow-lg border-0 p-4">
            <h2 class="text-center text-primary fw-bold mb-4">
                <i class="bi bi-person-circle me-2"></i>Información del Perfil
            </h2>

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="bg-light p-4 rounded border">
                        <div class="mb-3 d-flex align-items-center">
                            <i class="bi bi-person-fill me-3 fs-4 text-primary"></i>
                            <div>
                                <strong class="text-secondary">Nombre:</strong>
                                <div class="text-dark"><?php echo e($usuario->name); ?></div>
                            </div>
                        </div>

                        <div class="mb-3 d-flex align-items-center">
                            <i class="bi bi-envelope-fill me-3 fs-4 text-primary"></i>
                            <div>
                                <strong class="text-secondary">Email:</strong>
                                <div class="text-dark"><?php echo e($usuario->email); ?></div>
                            </div>
                        </div>

                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\aseguradora\resources\views/pages/perfil.blade.php ENDPATH**/ ?>