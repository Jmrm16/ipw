<?php $__env->startSection('title', 'Observaciones Formulario #' . $formulario->id); ?>

<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <h3 class="mb-3">Observaciones del Formulario #<?php echo e($formulario->id); ?></h3>

    <div class="mb-4">
        <a href="<?php echo e(route('dashboard')); ?>" class="btn btn-secondary btn-sm">← Volver al Dashboard</a>
    </div>

    <?php $__empty_1 = true; $__currentLoopData = $formulario->observaciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $obs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="mb-3 p-3 border rounded 
            <?php echo e($obs->creado_por === Auth::id() ? 'bg-light' : 'bg-white'); ?>">
            <div class="d-flex justify-content-between">
                <strong><?php echo e($obs->creado_por === Auth::id() ? 'Tú' : $obs->creadoPor->name); ?></strong>
                <small class="text-muted"><?php echo e($obs->created_at->format('d/m/Y H:i')); ?></small>
            </div>

            <p class="mb-1"><?php echo e($obs->contenido); ?></p>

            
            <?php if($obs->resuelta): ?>
                <div class="mt-2 p-2 bg-success bg-opacity-10 rounded">
                    <strong>Tu respuesta:</strong><br>
                    <?php echo e($obs->respuesta); ?>

                </div>
            <?php else: ?>
                
                <form action="<?php echo e(route('observaciones.responder', $obs->id)); ?>" method="POST" class="mt-2">
                    <?php echo csrf_field(); ?>
                    <div class="mb-2">
                        <textarea name="respuesta" class="form-control" rows="2" placeholder="Escribe tu respuesta..." required></textarea>
                    </div>
                    <button type="submit" class="btn btn-sm btn-success">Responder y marcar como resuelta</button>
                </form>
            <?php endif; ?>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <p class="text-muted">No hay observaciones aún para este formulario.</p>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\aseguradora\resources\views/pages/observaciones-formulario.blade.php ENDPATH**/ ?>