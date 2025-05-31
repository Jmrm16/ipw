<?php $__env->startSection('title', 'Mis Documentos'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row flex-nowrap">
        
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

        
        <div class="col py-4">
            <div class="card shadow-lg border-0 rounded-3 overflow-hidden">
                
                <div class="card-header bg-primary text-white py-3">
                    <h2 class="h4 mb-0 text-center fw-bold">
                        <i class="bi bi-folder2-open me-2"></i>Subida de Documentos Requeridos
                    </h2>
                </div>

                
                <div class="card-body p-4">
                    <?php if(session('success')): ?>
                        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                            <i class="bi bi-check-circle-fill me-2"></i>
                            <?php echo e(session('success')); ?>

                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                        </div>
                    <?php endif; ?>

                    <?php
                        $formularios_firmados = [
                            'formulario_sarlaft' => 'Formulario SARLAFT Firmado',
                            'formulario_medico' => 'Formulario Médico Firmado',
                        ];

                        $documentos_generales = [
                            'cedula' => 'Cédula',
                            'rut' => 'RUT',
                            'diploma' => 'Diploma',
                            'tarjeta_profesional' => 'Tarjeta Profesional',
                        ];

                        $renderCard = function ($tipo, $label) use ($formulario, $documentos) {
                            return view('components.documento-card', compact('tipo', 'label', 'formulario', 'documentos'))->render();
                        };
                    ?>

                    
                
                <div class="mb-5">
                    <h5 class="text-primary fw-bold mb-4 pb-2 border-bottom">
                        <i class="bi bi-file-earmark-text me-2"></i>Formularios Firmados
                    </h5>

                    
                    <div class="alert alert-info d-flex align-items-center mb-4" role="alert">
                        <i class="bi bi-info-circle-fill me-2 fs-5"></i>
                        <div>
                            Para continuar, asegúrate de haber firmado y huellado el <strong>Formulario Médico</strong> y el <strong>Formulario SARLAFT</strong>.
                        </div>
                    </div>

                    
                    <div class="mb-4 text-center">
                        <a href="<?php echo e(route('formulario1.pdf', $formulario->id)); ?>" target="_blank" class="btn btn-outline-primary me-2 mb-2">
                            <i class="bi bi-file-earmark-medical me-1"></i> Ver Formulario Médico
                        </a>

                        <a href="<?php echo e(route('formulario2.pdf', $formulario->id)); ?>" target="_blank" class="btn btn-outline-success mb-2">
                            <i class="bi bi-shield-check me-1"></i> Ver Formulario SARLAFT
                        </a>
                    </div>

                    <div class="row row-cols-1 g-3">
                        <?php $__currentLoopData = $formularios_firmados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipo => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo $renderCard($tipo, $label); ?>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>





                    
                    <div class="mb-5">
                        <h5 class="text-primary fw-bold mb-4 pb-2 border-bottom">
                            <i class="bi bi-files me-2"></i>Documentos Personales
                        </h5>
                            <div class="row row-cols-1 g-3">
                                <?php $__currentLoopData = $documentos_generales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipo => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col">
                                        <?php echo $renderCard($tipo, $label); ?>

                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\aseguradora\resources\views/pages/documentos.blade.php ENDPATH**/ ?>