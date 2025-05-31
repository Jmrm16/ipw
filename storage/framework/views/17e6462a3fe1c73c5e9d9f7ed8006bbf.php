

<?php $__env->startSection('title', 'Mis Observaciones'); ?>

<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <h2 class="mb-4 text-primary fw-bold">Observaciones de Formularios</h2>

    <?php $__empty_1 = true; $__currentLoopData = $formularios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $formulario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="card mb-4">
            <div class="card-header bg-light d-flex justify-content-between">
                <strong>Formulario #<?php echo e($formulario->id); ?></strong>
                <span class="text-muted"><?php echo e($formulario->created_at->format('d/m/Y')); ?></span>
            </div>
            <div class="card-body">
                <?php $__empty_2 = true; $__currentLoopData = $formulario->observaciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $obs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                    <div class="border p-3 mb-3 rounded shadow-sm bg-white">
                        <div class="d-flex justify-content-between">
                            <div>
                                <strong>Fase:</strong> <?php echo e(ucfirst($obs->fase)); ?> <br>
                                <strong>Observación:</strong> <?php echo e($obs->contenido); ?> <br>
                                <small class="text-muted">Agregada por: <?php echo e($obs->creadoPor->name); ?> | <?php echo e($obs->created_at->diffForHumans()); ?></small>
                            </div>
                                    <div class="text-end">
                                    <?php if($obs->estado === 'pendiente'): ?>
                                        <form action="<?php echo e(route('observaciones.resolver', $obs->id)); ?>" method="POST" class="d-inline">
                                            <?php echo csrf_field(); ?>
                                            <button type="submit" class="btn btn-sm btn-outline-success">
                                                Marcar como resuelta
                                            </button>
                                        </form>
                                    <?php else: ?>
                                        <span class="badge bg-success">Resuelta</span>
                                    <?php endif; ?>
                                </div>

                            <div>
                                <span class="badge <?php echo e($obs->estado === 'pendiente' ? 'bg-warning' : 'bg-success'); ?>">
                                    <?php echo e(ucfirst($obs->estado)); ?>

                                </span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                    <p class="text-muted">No hay observaciones para este formulario.</p>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <p>No tienes formularios aún.</p>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\proyecto\aseguradora\resources\views/pages/observaciones.blade.php ENDPATH**/ ?>