<?php
    $documento = $documentos->has($tipo) ? $documentos[$tipo] : null;
    $esHeredado = $documento && is_null($documento->formulario_medico_id);
?>

<div x-data="{ uploading: false, submit() { uploading = true; $refs.formularioUpload.submit(); } }"
     class="relative w-full rounded-lg border <?php echo e($documento ? 'border-green-500' : 'border-gray-300'); ?>

            p-4 shadow-sm bg-white hover:shadow-md transition-all duration-300">

    
    <div class="flex items-center justify-between mb-2 text-sm font-semibold text-gray-700">
        <div class="flex items-center gap-2">
            <i class="ri-file-text-line text-lg text-gray-500"></i>
            <?php echo e($label); ?>

        </div>

        
        <?php if($esHeredado): ?>
            <span class="text-xs text-orange-600 bg-orange-100 px-2 py-0.5 rounded-full font-medium">
                Usando documento anterior
            </span>
        <?php endif; ?>
    </div>

    
    <form x-ref="formularioUpload"
          @submit.prevent="submit"
          action="<?php echo e(route('documentos.store', $formulario->id)); ?>"
          method="POST"
          enctype="multipart/form-data"
          class="flex flex-col sm:flex-row sm:items-center gap-2 sm:gap-4 w-full">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="tipo" value="<?php echo e($tipo); ?>">

        
        <input type="file"
               name="archivo"
               accept=".pdf,.jpg,.jpeg,.png"
               required
               class="file-input file-input-sm file-input-bordered w-full" />

        
        <button type="submit"
                :disabled="uploading"
                class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium rounded-md transition
                       <?php echo e($documento ? 'bg-white border border-green-500 text-green-600 hover:bg-green-100' : 'bg-blue-600 text-white hover:bg-blue-700'); ?>">
            <template x-if="uploading">
                <svg class="animate-spin h-4 w-4" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10"
                            stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor"
                          d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                </svg>
            </template>
            <template x-if="!uploading">
                <i class="ri-upload-cloud-line text-lg"></i>
            </template>
            <span><?php echo e($documento ? 'Reemplazar' : 'Subir'); ?></span>
        </button>

        
        <?php if($documento): ?>
            <a href="<?php echo e(asset('storage/' . $documento->archivo)); ?>"
               target="_blank"
               class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-gray-700 border border-gray-300 rounded-md hover:bg-gray-100 transition"
               title="Ver Documento">
                <i class="ri-eye-line text-lg"></i>
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