<div class="col d-flex">
  <div class="card border-0 shadow-sm w-100 rounded-4 d-flex flex-column justify-content-between">

    
    <div class="card-header text-white text-center fw-semibold rounded-top-4"
         style="background: linear-gradient(135deg, #0d6efd, #6610f2); font-size: 1.05rem; min-height: 60px; display: flex; align-items: center; justify-content: center;">
      <i class="bi bi-file-earmark-text me-2"></i> <?php echo e($label); ?>

    </div>

    
    <div class="card-body d-flex flex-column justify-content-between">
      <form action="<?php echo e(route('documentos.store', ['formulario' => $formulario->id])); ?>" method="POST" enctype="multipart/form-data" class="d-flex flex-column gap-3">
        <?php echo csrf_field(); ?>

        
        <input type="hidden" name="tipo" value="<?php echo e($tipo); ?>">

        
        <input type="file" name="archivo" class="form-control" accept=".pdf,.jpg,.jpeg,.png" required>

        
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
          <?php if($documentos->has($tipo)): ?>
            <a href="<?php echo e(asset('storage/' . $documentos[$tipo]->archivo)); ?>" target="_blank" class="btn btn-outline-success btn-sm">
              <i class="bi bi-eye-fill me-1"></i> Ver Documento
            </a>
          <?php else: ?>
            <span class="text-muted small d-flex align-items-center">
              <i class="bi bi-exclamation-circle me-1"></i> No subido aún
            </span>
          <?php endif; ?>

          <button type="submit" class="btn btn-primary btn-sm px-3 rounded-pill">
            <i class="bi bi-cloud-upload-fill me-1"></i>
            <?php echo e($documentos->has($tipo) ? 'Reemplazar' : 'Subir'); ?>

          </button>
        </div>
      </form>
    </div>

    
    <?php if($documentos->has($tipo)): ?>
      <div class="card-footer text-muted text-center small bg-light rounded-bottom-4">
        <i class="bi bi-clock me-1"></i>
        Última subida: <?php echo e(\Carbon\Carbon::parse($documentos[$tipo]->updated_at)->diffForHumans()); ?>

      </div>
    <?php endif; ?>

  </div>
</div>
<?php /**PATH C:\xampp\htdocs\proyecto\aseguradora\resources\views/components/documento-card.blade.php ENDPATH**/ ?>