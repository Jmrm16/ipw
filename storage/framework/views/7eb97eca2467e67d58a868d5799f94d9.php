<?php $__env->startSection('title', 'Mi Dashboard'); ?>

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
            <h2 class="text-center mb-4 text-primary fw-bold">
                <i class="bi bi-file-earmark-check-fill me-2"></i>Mis Formularios Completados
            </h2>

            <?php if(session('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo e(session('success')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                </div>
            <?php endif; ?>

            <?php if($formularios->isEmpty()): ?>
                <div class="text-center text-muted my-4">
                    <i class="bi bi-inbox fs-1 mb-2"></i>
                    <p>No has completado ningún formulario todavía.</p>
                </div>
            <?php else: ?>
                <div class="table-responsive">
                    <table class="table table-hover align-middle text-center border">
                        <thead class="table-primary">
                            <tr class="text-uppercase">
                                <th>ID</th>
                                <th>Fecha</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <?php $__currentLoopData = $formularios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $formulario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($formulario->id); ?></td>
                                    <td><?php echo e($formulario->created_at->format('Y-m-d')); ?></td>
                                    <td>
                                        <?php
                                            $estadoColor = match ($formulario->estado) {
                                                'pendiente' => 'bg-secondary text-white',
                                                'en_revisión' => 'bg-warning text-white',
                                                'aprobado' => 'bg-success text-white',
                                                'rechazado' => 'bg-danger text-white',
                                                'finalizado' => 'bg-primary text-white',
                                                default => 'bg-light text-dark',
                                            };
                                        ?>
                                        <span class="badge <?php echo e($estadoColor); ?>"><?php echo e(ucfirst($formulario->estado)); ?></span>
                                    </td>
                                    <td>
                                        <a href="<?php echo e(route('documentos.por_formulario', ['formulario' => $formulario->id])); ?>" class="btn btn-outline-secondary mb-1">
                                            Subir Documentos
                                        </a>

                                        <a href="<?php echo e(route('observaciones.por_formulario', $formulario->id)); ?>" class="btn btn-outline-info mb-1">
                                            Ver Observaciones
                                        </a>

                                        <?php if($formulario->estado === 'proceso_pago' && ($formulario->link_pago || $formulario->comprobante_pago_path)): ?>
                                            <button class="btn btn-outline-success mb-1"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#modalPago<?php echo e($formulario->id); ?>">
                                                Ver Pago
                                            </button>
                                        <?php endif; ?>
                                            <?php if($formulario->estado === 'finalizado' && $formulario->poliza_path): ?>
                                             <a href="<?php echo e($formulario->poliza_path); ?>" target="_blank" class="btn btn-outline-primary mb-1">
                                             <i class="bi bi-file-earmark-text me-1"></i> Ver Póliza
                                              </a>
                                            <?php endif; ?>
                                    </td>
                                </tr>

                                
                                <?php if($formulario->estado === 'proceso_pago' && ($formulario->link_pago || $formulario->comprobante_pago_path)): ?>
                                <div class="modal fade" id="modalPago<?php echo e($formulario->id); ?>" tabindex="-1" aria-labelledby="modalPagoLabel<?php echo e($formulario->id); ?>" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content shadow">
                                            <div class="modal-header bg-primary text-white">
                                                <h5 class="modal-title" id="modalPagoLabel<?php echo e($formulario->id); ?>">
                                                    <i class="bi bi-credit-card me-2"></i> Información de Pago
                                                </h5>
                                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                            </div>
                                            <div class="modal-body">
    <?php if($formulario->link_pago): ?>
        <div class="mb-3">
            <strong>Link de Pago:</strong><br>
            <a href="<?php echo e($formulario->link_pago); ?>" class="text-primary" target="_blank">
                <?php echo e($formulario->link_pago); ?>

            </a>
        </div>
    <?php endif; ?>

    <?php if($formulario->comprobante_pago_path): ?>
        <div class="mb-4">
            <strong>Recibo de Pago (PDF):</strong><br>
            <a href="<?php echo e($formulario->comprobante_pago_path); ?>" target="_blank" class="btn btn-outline-secondary mt-2">
                <i class="bi bi-file-earmark-arrow-down me-1"></i> Ver Comprobante
            </a>
        </div>
    <?php endif; ?>

    
    <?php if($formulario->constancia_pago_path): ?>
        <div class="mb-3">
            <strong>Constancia de Pago:</strong><br>
            <img src="<?php echo e(asset('storage/' . $formulario->constancia_pago_path)); ?>"
                 alt="Constancia de pago"
                 class="img-fluid rounded border shadow-sm mt-2"
                 style="max-height: 300px;">
        </div>
    <?php endif; ?>


<form action="<?php echo e(route('formulario.constancia_pago', $formulario->id)); ?>" method="POST" enctype="multipart/form-data" class="mt-4">
    <?php echo csrf_field(); ?>
    <div class="mb-3">
        <label for="constancia_<?php echo e($formulario->id); ?>" class="form-label fw-bold">Subir Constancia de Pago (PDF o Imagen):</label>
        <input type="file" name="documento" accept=".pdf,image/*" required class="form-control" id="constancia_<?php echo e($formulario->id); ?>">
    </div>
    <button type="submit" class="btn btn-primary">
        <i class="bi bi-upload me-1"></i> Subir Constancia
    </button>
</form>

</div>



                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\aseguradora\resources\views/pages/dashboard.blade.php ENDPATH**/ ?>