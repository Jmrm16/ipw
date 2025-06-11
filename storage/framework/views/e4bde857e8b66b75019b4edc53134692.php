<?php
    $documento = $documentos->has($tipo) ? $documentos[$tipo] : null;
?>

<div x-data="{ uploading: false, submit() { uploading = true; $refs.formularioUpload.submit(); } }"
     class="relative w-full rounded-lg border <?php echo e($documento ? 'border-green-500' : 'border-gray-300'); ?>

            p-4 shadow-sm bg-white hover:shadow-md transition-all duration-300">

    
    <div class="flex items-center gap-2 mb-2 text-sm font-semibold text-gray-700">
        <i class="ri-file-text-line text-lg text-gray-500"></i>
        <?php echo e($label); ?>

    </div>

    
    <form x-ref="formularioUpload"
          @submit.prevent="submit"
          action="<?php echo e(route('documentos.store', $formulario->id)); ?>"
          method="POST"
          enctype="multipart/form-data"
          class="flex flex-col sm:flex-row items-center gap-2 w-full sm:w-auto">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="tipo" value="<?php echo e($tipo); ?>">

        
        <input type="file"
               name="archivo"
               accept=".pdf,.jpg,.jpeg,.png"
               required
               class="file-input file-input-sm file-input-bordered w-full max-w-xs" />

        
        <button type="submit"
                :disabled="uploading"
                class="btn btn-sm <?php echo e($documento ? 'btn-outline-success' : 'btn-primary'); ?> flex items-center gap-1">
            <template x-if="uploading">
                <svg class="animate-spin h-4 w-4 text-white" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10"
                            stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor"
                          d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                </svg>
            </template>
            <template x-if="!uploading">
                <i class="ri-upload-cloud-line"></i>
            </template>
            <span><?php echo e($documento ? 'Reemplazar' : 'Subir'); ?></span>
        </button>

        
        <?php if($documento): ?>
            <a href="<?php echo e(asset('storage/' . $documento->archivo)); ?>"
               target="_blank"
               class="btn btn-sm btn-outline-secondary flex items-center justify-center"
               title="Ver Documento">
                <i class="ri-eye-line"></i>
            </a>
        <?php endif; ?>
    </form>

    
    <?php if($documento): ?>
        <div class="absolute top-2 right-2 text-green-500">
            <i class="ri-check-double-fill text-xl"></i>
        </div>

        <div class="text-xs text-gray-400 text-right mt-2">
            <i class="ri-time-line mr-1"></i>
            Última subida: <?php echo e(\Carbon\Carbon::parse($documento->updated_at)->diffForHumans()); ?>

        </div>
    <?php endif; ?>
</div>
<?php /**PATH C:\xampp\htdocs\nueva aseguradora\ipw\resources\views/components/documento-card.blade.php ENDPATH**/ ?>