<?php $__env->startSection('title', 'Documentos Requeridos'); ?>

<?php $__env->startSection('content'); ?>



<div class="p-6"
data-intro=" este es el espacio para subir los documentos requeridos." 
        data-step="1"
>
    
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-blue-700 flex items-center gap-2">
            <i class="ri-folder-upload-line text-3xl"></i>
            Subida de Documentos Requeridos
        </h1>
    </div>

    
    <div class="bg-blue-50 border border-blue-200 text-blue-800 p-4 rounded-lg mb-6">
        Asegúrate de haber firmado y huellado el <strong>Formulario Médico</strong> y el <strong>Formulario SARLAFT</strong> antes de continuar.
    </div>

    
    <div class="flex flex-wrap gap-4 mb-8"
        data-intro="Aquí puedes descargar los formularios médicos y 
        SARLAFT en formato PDF para revisarlos o imprimirlos." 
        data-step="2"
    >
        <a href="<?php echo e(route('formulario1.pdf', $formulario->id)); ?>" target="_blank"
           class="flex items-center gap-2 bg-white border border-blue-500 text-blue-600 px-4 py-2 rounded-lg hover:bg-blue-50 transition">
            <i class="ri-file-list-3-line"></i> Ver Formulario Médico
        </a>
        <a href="<?php echo e(route('formulario2.pdf', $formulario->id)); ?>" target="_blank"
           class="flex items-center gap-2 bg-green-100 text-green-700 border border-green-400 px-4 py-2 rounded-lg hover:bg-green-200 transition">
            <i class="ri-shield-check-line"></i> Ver Formulario SARLAFT
        </a>
    </div>

    
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

    
    <div class="mb-10"
    data-intro="Aqui subiras tus Formularios Sarlafts y Medicos descargados y firmados." 
        data-step="3">  
        <h2 class="text-xl font-semibold text-gray-800 mb-4 border-b pb-2 flex items-center gap-2">
            <i class="ri-file-edit-line"></i> Formularios Firmados
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <?php $__currentLoopData = $formularios_firmados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipo => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo $renderCard($tipo, $label); ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

    
    <div class="mb-10"
    data-intro="Aqui subiras tus documentos personales como cédula, RUT, diploma y tarjeta profesional." 
        data-step="4"
    >
        <h2 class="text-xl font-semibold text-gray-800 mb-4 border-b pb-2 flex items-center gap-2">
            <i class="ri-archive-line"></i> Documentos Personales
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-1 gap-4">
            <?php $__currentLoopData = $documentos_generales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipo => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo $renderCard($tipo, $label); ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Control del modal de notificaciones
        const notificacionesBtn = document.getElementById('notificacionesBtn');
        const notificacionesModal = document.getElementById('notificacionesModal');
        let modalAbierto = false;

        // Abrir/cerrar modal al hacer clic en el botón
        notificacionesBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            modalAbierto = !modalAbierto;
            
            if (modalAbierto) {
                notificacionesModal.classList.remove('hidden');
                // Marcar notificaciones como leídas al abrir el modal
                marcarNotificacionesComoLeidas();
            } else {
                notificacionesModal.classList.add('hidden');
            }
        });

        // Cerrar modal al hacer clic fuera
        document.addEventListener('click', function(e) {
            if (modalAbierto && !notificacionesModal.contains(e.target) && e.target !== notificacionesBtn) {
                notificacionesModal.classList.add('hidden');
                modalAbierto = false;
            }
        });

        // Función para marcar notificaciones como leídas
        function marcarNotificacionesComoLeidas() {
            fetch("<?php echo e(route('notificaciones.marcar-leidas')); ?>", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                },
                body: JSON.stringify({})
            }).then(response => {
                if(response.ok) {
                    // Actualizar el contador de notificaciones
                    const badge = document.querySelector('.absolute.-top-1.-right-1.bg-red-500');
                    if(badge) {
                        badge.remove();
                    }
                }
            });
        }

        // Inicializar tooltips de Bootstrap si es necesario
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        const tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
        
        // Configurar y lanzar el tour de IntroJS
        document.getElementById('startTourBtn').addEventListener('click', function() {
            introJs().setOptions({
                nextLabel: 'Siguiente',
                prevLabel: 'Anterior',
                skipLabel: 'Saltar',
                doneLabel: 'Terminar',
                tooltipClass: 'shadow-lg',
                highlightClass: 'introjs-highlight',
                exitOnEsc: true,
                exitOnOverlayClick: true,
                showStepNumbers: false,
                keyboardNavigation: true,
                showButtons: true,
                showBullets: true,
                showProgress: false,
                scrollToElement: true,
                overlayOpacity: 0.5,
                position: 'bottom'
            }).start();
        });
        
        // Iniciar automáticamente el tour si es la primera visita
        if(localStorage.getItem('dashboardTourCompleted') !== 'true') {
            setTimeout(() => {
                introJs().start();
                localStorage.setItem('dashboardTourCompleted', 'true');
            }, 1000);
        }
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app-modern', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\nueva aseguradora\ipw\resources\views/pages/documentos.blade.php ENDPATH**/ ?>