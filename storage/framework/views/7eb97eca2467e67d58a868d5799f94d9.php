<?php $__env->startSection('title', 'Mi Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-4 md:space-y-8" data-intro="Bienvenido a tu panel de control" data-step="1">
    <!-- Estadísticas - Versión móvil compacta -->
    <div class="lg:hidden">
        <div class="grid grid-cols-2 gap-3">
            <!-- Tarjeta formularios móvil -->
            <div class="bg-white p-3 rounded-lg shadow border-l-2 border-blue-500">
                <div class="flex items-center gap-2">
                    <div class="p-2 rounded-full bg-blue-50 text-blue-500">
                        <i class="ri-file-list-3-line text-lg"></i>
                    </div>
                    <div class="overflow-hidden">
                        <p class="text-xs font-medium text-gray-500 truncate">Formularios</p>
                        <h3 class="text-lg font-bold text-gray-800"><?php echo e($formularios->count()); ?></h3>
                    </div>
                </div>
            </div>

            <!-- Tarjeta pendientes móvil -->
            <div class="bg-white p-3 rounded-lg shadow border-l-2 border-yellow-500">
                <div class="flex items-center gap-2">
                    <div class="p-2 rounded-full bg-yellow-50 text-yellow-500">
                        <i class="ri-folder-warning-line text-lg"></i>
                    </div>
                    <div class="overflow-hidden">
                        <p class="text-xs font-medium text-gray-500 truncate">Pendientes</p>
                        <h3 class="text-lg font-bold text-gray-800"><?php echo e($formularios->where('estado', 'pendiente')->count()); ?></h3>
                    </div>
                </div>
            </div>

            <!-- Tarjeta pólizas móvil -->
            <div class="bg-white p-3 rounded-lg shadow border-l-2 border-green-500">
                <div class="flex items-center gap-2">
                    <div class="p-2 rounded-full bg-green-50 text-green-500">
                        <i class="ri-shield-check-line text-lg"></i>
                    </div>
                    <div class="overflow-hidden">
                        <p class="text-xs font-medium text-gray-500 truncate">Pólizas</p>
                        <h3 class="text-lg font-bold text-gray-800"><?php echo e($formularios->where('estado', 'finalizado')->count()); ?></h3>
                    </div>
                </div>
            </div>

            <!-- Botón nuevo formulario solo en móviles -->
            <div class="bg-white p-3 rounded-lg shadow border-l-2 border-blue-300 flex items-center justify-center">
                <a href="#" class="flex items-center justify-center w-full h-full text-blue-500">
                    <i class="ri-add-line text-lg mr-1"></i>
                    <span class="text-xs font-medium">Nuevo</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Estadísticas - Versión escritorio -->
    <div class="hidden lg:grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Tarjeta formularios -->
        <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl border-l-4 border-blue-500" 
             data-intro="Total de formularios completados" data-step="3">
            <div class="flex items-center gap-5">
                <div class="p-3 rounded-full bg-blue-50 text-blue-500">
                    <i class="ri-file-list-3-line text-2xl"></i>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Formularios Completados</p>
                    <h3 class="text-2xl font-bold text-gray-800"><?php echo e($formularios->count()); ?></h3>
                    <p class="text-xs text-gray-400 mt-1">Último: <?php echo e($formularios->last()?->created_at->diffForHumans() ?? 'N/A'); ?></p>
                </div>
            </div>
        </div>

        <!-- Tarjeta pendientes -->
        <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl border-l-4 border-yellow-500" 
             data-intro="Documentos pendientes de revisión" data-step="4">
            <div class="flex items-center gap-5">
                <div class="p-3 rounded-full bg-yellow-50 text-yellow-500">
                    <i class="ri-folder-warning-line text-2xl"></i>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Documentos Pendientes</p>
                    <h3 class="text-2xl font-bold text-gray-800"><?php echo e($formularios->where('estado', 'pendiente')->count()); ?></h3>
                    <p class="text-xs text-gray-400 mt-1">Requieren atención</p>
                </div>
            </div>
        </div>

        <!-- Tarjeta pólizas -->
        <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl border-l-4 border-green-500" 
             data-intro="Pólizas emitidas correctamente" data-step="5">
            <div class="flex items-center gap-5">
                <div class="p-3 rounded-full bg-green-50 text-green-500">
                    <i class="ri-shield-check-line text-2xl"></i>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Pólizas Emitidas</p>
                    <h3 class="text-2xl font-bold text-gray-800"><?php echo e($formularios->where('estado', 'finalizado')->count()); ?></h3>
                    <p class="text-xs text-gray-400 mt-1">Completados con éxito</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Listado de formularios -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden" data-intro="Listado completo de tus formularios" data-step="6">
        <!-- Encabezado -->
        <div class="bg-gradient-to-r from-blue-500 to-blue-600 px-4 py-3 md:px-6 md:py-4">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-3">
                <h3 class="text-base md:text-lg font-semibold text-white flex items-center gap-2">
                    <i class="ri-file-check-line"></i> Mis Formularios
                </h3>
                <div class="relative w-full md:w-auto" data-intro="Busca formularios específicos" data-step="7">
                    <input type="text" placeholder="Buscar..." 
                           class="w-full md:w-64 pl-9 pr-4 py-2 rounded-full text-sm bg-blue-400 bg-opacity-20 text-white placeholder-blue-100 focus:outline-none focus:ring-2 focus:ring-blue-200">
                    <i class="ri-search-line absolute left-3 top-2.5 text-blue-100"></i>
                </div>
            </div>
        </div>

        <!-- Cuerpo -->
        <div class="p-4 md:p-6">
            <?php if($formularios->isEmpty()): ?>
                <div class="text-center py-8 md:py-12" data-intro="Cuando no tengas formularios" data-step="8">
                    <div class="mx-auto w-16 h-16 md:w-24 md:h-24 bg-gray-100 rounded-full flex items-center justify-center mb-3 md:mb-4">
                        <i class="ri-inbox-line text-2xl md:text-3xl text-gray-400"></i>
                    </div>
                    <h4 class="text-gray-500 font-medium mb-1 md:mb-2 text-sm md:text-base">No hay formularios completados</h4>
                    <p class="text-gray-400 text-xs md:text-sm mb-3 md:mb-4">Comienza completando tu primer formulario</p>
                    <a href="#" class="inline-flex items-center px-3 py-1.5 md:px-4 md:py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors text-sm">
                        <i class="ri-add-line mr-1 md:mr-2"></i> Nuevo Formulario
                    </a>
                </div>
            <?php else: ?>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-4 py-2 md:px-6 md:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                <th scope="col" class="px-4 py-2 md:px-6 md:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha</th>
                                <th class="px-4 py-2 md:px-6 md:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipo</th>
                                <th scope="col" class="px-4 py-2 md:px-6 md:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                                <th scope="col" class="px-4 py-2 md:px-6 md:py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider" 
                                    data-intro="Acciones disponibles" data-step="9">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <?php $__currentLoopData = $formularios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $formulario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-4 py-3 md:px-6 md:py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">#<?php echo e($formulario->id); ?></div>
                                    </td>
                                    <td class="px-4 py-3 md:px-6 md:py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-700"><?php echo e($formulario->created_at->format('d/m/Y')); ?></div>
                                        <div class="text-xs text-gray-400"><?php echo e($formulario->created_at->diffForHumans()); ?></div>
                                    </td>
                                    <td class="px-4 py-3 md:px-6 md:py-4 whitespace-nowrap">
                                    <?php
                                        $tipo = $formulario->tipo_proceso ?? null;

                                        if ($tipo) {
                                            $etiqueta = ucfirst($tipo);
                                            $color = $tipo === 'cumplimiento' ? 'bg-green-100 text-green-700' : 'bg-blue-100 text-blue-700';
                                        } elseif ($formulario instanceof \App\Models\FormularioCumplimiento) {
                                            $etiqueta = 'Cumplimiento';
                                            $color = 'bg-green-100 text-green-700';
                                        } else {
                                            $etiqueta = 'Médico';
                                            $color = 'bg-blue-100 text-blue-700';
                                        }
                                    ?>
                                    <span class="px-2 py-0.5 md:px-3 md:py-1 rounded-full text-xs font-semibold <?php echo e($color); ?>">
                                        <?php echo e($etiqueta); ?>

                                    </span>
                                   </td>

                                    <td class="px-4 py-3 md:px-6 md:py-4 whitespace-nowrap">
                                        <?php
                                            $estadoColor = match ($formulario->estado) {
                                                'pendiente' => 'bg-gray-100 text-gray-800',
                                                'en_revisión' => 'bg-yellow-100 text-yellow-800',
                                                'aprobado' => 'bg-green-100 text-green-800',
                                                'rechazado' => 'bg-red-100 text-red-800',
                                                'finalizado' => 'bg-blue-100 text-blue-800',
                                                'proceso_pago' => 'bg-cyan-100 text-cyan-800',
                                                default => 'bg-gray-100 text-gray-600',
                                            };
                                        ?>
                                        <span class="px-2 py-0.5 md:px-3 md:py-1 rounded-full text-xs font-semibold <?php echo e($estadoColor); ?> inline-flex items-center">
                                            <?php if($formulario->estado === 'pendiente'): ?>
                                                <i class="ri-time-line mr-1"></i>
                                            <?php elseif($formulario->estado === 'en_revisión'): ?>
                                                <i class="ri-search-eye-line mr-1"></i>
                                            <?php elseif($formulario->estado === 'aprobado'): ?>
                                                <i class="ri-checkbox-circle-line mr-1"></i>
                                            <?php elseif($formulario->estado === 'rechazado'): ?>
                                                <i class="ri-close-circle-line mr-1"></i>
                                            <?php elseif($formulario->estado === 'finalizado'): ?>
                                                <i class="ri-shield-check-line mr-1"></i>
                                            <?php elseif($formulario->estado === 'proceso_pago'): ?>
                                                <i class="ri-money-dollar-circle-line mr-1"></i>
                                            <?php endif; ?>
                                            <?php echo e(ucfirst(str_replace('_', ' ', $formulario->estado))); ?>

                                        </span>
                                    </td>
                                    <td class="px-4 py-3 md:px-6 md:py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <div class="flex justify-end space-x-2 md:space-x-3">

                                                <?php
                                                    $esCumplimiento = $formulario->tipo_proceso === 'cumplimiento';
                                                    $rutaDocumentos = $esCumplimiento
                                                        ? route('documentos.cumplimiento', $formulario->id)
                                                        : route('documentos.por_formulario', $formulario->id);
                                                ?>


                                            <!-- Subir documentos -->
                                           <a href="<?php echo e($rutaDocumentos); ?>" 
                                            class="text-blue-500 hover:text-blue-700 transition-colors"
                                            data-tooltip="Subir documentos"
                                            data-intro="Sube documentos para este formulario" data-step="10">
                                            <i class="ri-upload-2-line text-base md:text-lg"></i>
                                            </a>

                                            <!-- Ver observaciones -->
                                            <a href="<?php echo e(route('observaciones.por_formulario', $formulario->id)); ?>" 
                                               class="text-cyan-500 hover:text-cyan-700 transition-colors"
                                               data-tooltip="Ver observaciones"
                                               data-intro="Revisa observaciones sobre este formulario" data-step="11">
                                                <i class="ri-chat-3-line text-base md:text-lg"></i>
                                            </a>

                                            <!-- Modal de pago mejorado -->
                                                <?php if($formulario->estado === 'proceso_pago'): ?>
                                                <div x-data="{ 
                                                    showPagoModal: false,
                                                    activeTab: 'instrucciones',
                                                    copied: false,
                                                    fileUploaded: <?php echo e($formulario->constancia_pago_path ? 'true' : 'false'); ?>,
                                                    filePreview: null,
                                                    fileName: ''
                                                }" class="inline-block">
                                                    <!-- Botón para abrir modal -->
                                                    <button @click="showPagoModal = true"
                                                            class="text-green-500 hover:text-green-700 transition-colors"
                                                            data-tooltip="Información de pago"
                                                            data-intro="Detalles del proceso de pago" data-step="12">
                                                        <i class="ri-bank-card-line text-base md:text-lg"></i>
                                                    </button>

                                                    <!-- Modal -->
                                                    <div x-show="showPagoModal" x-cloak x-transition
                                                        class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 p-2 sm:p-4">
                                                        <div @click.away="showPagoModal = false"
                                                            class="bg-white rounded-xl shadow-xl w-full max-w-3xl max-h-[90vh] overflow-y-auto">
                                                            <!-- Encabezado -->
                                                            <div class="bg-blue-600 text-white px-4 py-3 sm:px-6 sm:py-4 rounded-t-xl flex justify-between items-center">
                                                                <h2 class="text-base sm:text-lg font-semibold flex items-center gap-2">
                                                                    <i class="ri-bank-card-line"></i> 
                                                                    <span class="truncate">Pago - Formulario #<?php echo e($formulario->id); ?></span>
                                                                </h2>
                                                                <button @click="showPagoModal = false"
                                                                        class="text-white hover:text-blue-200 text-xl sm:text-2xl transition-colors">
                                                                    &times;
                                                                </button>
                                                            </div>

                                                            <!-- Pestañas -->
                                                            <div class="border-b border-gray-200">
                                                                <nav class="flex -mb-px overflow-x-auto">
                                                                    <button @click="activeTab = 'instrucciones'"
                                                                            :class="{'border-blue-500 text-blue-600': activeTab === 'instrucciones', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': activeTab !== 'instrucciones'}"
                                                                            class="whitespace-nowrap py-3 px-4 border-b-2 font-medium text-xs sm:text-sm">
                                                                        <i class="ri-information-line mr-1 sm:mr-2"></i> Instrucciones
                                                                    </button>
                                                                    <button @click="activeTab = 'pago'"
                                                                            :class="{'border-blue-500 text-blue-600': activeTab === 'pago', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': activeTab !== 'pago'}"
                                                                            class="whitespace-nowrap py-3 px-4 border-b-2 font-medium text-xs sm:text-sm">
                                                                        <i class="ri-money-dollar-circle-line mr-1 sm:mr-2"></i> Pago
                                                                    </button>
                                                                    <button @click="activeTab = 'constancia'"
                                                                            :class="{'border-blue-500 text-blue-600': activeTab === 'constancia', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': activeTab !== 'constancia'}"
                                                                            class="whitespace-nowrap py-3 px-4 border-b-2 font-medium text-xs sm:text-sm">
                                                                        <i class="ri-upload-cloud-line mr-1 sm:mr-2"></i> Constancia
                                                                    </button>
                                                                </nav>
                                                            </div>

                                                            <!-- Contenido de pestañas -->
                                                            <div class="p-3 sm:p-4 md:p-6">
                                                                <!-- Pestaña Instrucciones -->
                                                                <div x-show="activeTab === 'instrucciones'" x-transition>
                                                                    <div class="space-y-3 sm:space-y-4">
                                                                        <div class="bg-blue-50 border-l-4 border-blue-500 p-3 sm:p-4 rounded-r-lg">
                                                                            <h3 class="font-medium text-blue-800 flex items-center gap-2 text-sm sm:text-base">
                                                                                <i class="ri-alert-line"></i> Importante
                                                                            </h3>
                                                                            <p class="text-xs sm:text-sm text-blue-700 mt-1">
                                                                                Complete el proceso de pago y suba su constancia para continuar con la emisión de su póliza.
                                                                            </p>
                                                                        </div>

                                                                        <?php if($formulario->instrucciones_pago): ?>
                                                                        <div>
                                                                            <h3 class="font-medium text-gray-700 mb-1 sm:mb-2 text-sm sm:text-base">Pasos para realizar el pago:</h3>
                                                                            <div class="bg-gray-50 p-3 sm:p-4 rounded-lg prose-sm max-w-none">
                                                                                <?php echo nl2br(e($formulario->instrucciones_pago)); ?>

                                                                            </div>
                                                                        </div>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>

                                                                <!-- Pestaña Datos de Pago -->
                                                                <div x-show="activeTab === 'pago'" x-transition>
                                                                    <div class="space-y-3 sm:space-y-4">
                                                                        <?php if($formulario->monto_pago): ?>
                                                                        <div class="bg-white border border-gray-200 rounded-lg p-3 sm:p-4 shadow-sm">
                                                                            <h3 class="font-medium text-gray-700 mb-1 text-sm sm:text-base">Monto a Pagar:</h3>
                                                                            <p class="text-xl sm:text-2xl md:text-3xl font-bold text-blue-600">
                                                                                $<?php echo e(number_format($formulario->monto_pago, 2)); ?>

                                                                            </p>
                                                                            <p class="text-xs text-gray-500 mt-1">Incluye todos los impuestos aplicables</p>
                                                                        </div>
                                                                        <?php endif; ?>

                                                                        <?php if($formulario->link_pago): ?>
                                                                        <div>
                                                                            <h3 class="font-medium text-gray-700 mb-1 sm:mb-2 text-sm sm:text-base">Enlace de Pago:</h3>
                                                                            <div class="flex items-center gap-2 bg-gray-50 p-2 sm:p-3 rounded-lg border border-gray-200">
                                                                                <a href="<?php echo e($formulario->link_pago); ?>" target="_blank" 
                                                                                class="text-blue-600 hover:underline break-all flex-1 text-xs sm:text-sm">
                                                                                    <i class="ri-external-link-line mr-1"></i>
                                                                                    <?php echo e($formulario->link_pago); ?>

                                                                                </a>
                                                                                <button @click="copyToClipboard('<?php echo e($formulario->link_pago); ?>')" 
                                                                                        class="text-gray-500 hover:text-blue-600 p-1 rounded-full"
                                                                                        x-data="{ copied: false }"
                                                                                        @click="copied = true; setTimeout(() => copied = false, 2000)"
                                                                                        title="Copiar enlace">
                                                                                    <i class="ri-file-copy-line text-sm"></i>
                                                                                    <span x-show="copied" class="text-xs text-green-600 ml-1">Copiado!</span>
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                        <?php endif; ?>

                                                                        <?php if($formulario->comprobante_pago_path): ?>
                                                                        <div>
                                                                            <h3 class="font-medium text-gray-700 mb-1 sm:mb-2 text-sm sm:text-base">Comprobante de Pago:</h3>
                                                                            <a href="<?php echo e($formulario->comprobante_pago_path); ?>" target="_blank"
                                                                            class="inline-flex items-center px-3 py-1.5 sm:px-4 sm:py-2 bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 transition-colors border border-blue-100 text-xs sm:text-sm">
                                                                                <i class="ri-file-pdf-line mr-1 sm:mr-2"></i> Ver comprobante
                                                                            </a>
                                                                        </div>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>

                                                                <!-- Pestaña Subir Constancia -->
                                                                <div x-show="activeTab === 'constancia'" x-transition>
                                                                    <div class="space-y-3 sm:space-y-4">
                                                                        <?php if($formulario->constancia_pago_path): ?>
                                                                        <div class="bg-green-50 border-l-4 border-green-500 p-3 sm:p-4 rounded-r-lg">
                                                                            <h3 class="font-medium text-green-800 flex items-center gap-2 text-sm sm:text-base">
                                                                                <i class="ri-checkbox-circle-line"></i> Constancia ya subida
                                                                            </h3>
                                                                            <p class="text-xs sm:text-sm text-green-700 mt-1">
                                                                                Ya has subido tu constancia de pago. Puedes verla o subir una nueva si es necesario.
                                                                            </p>
                                                                        </div>

                                                                        <div>
                                                                            <h3 class="font-medium text-gray-700 mb-1 sm:mb-2 text-sm sm:text-base">Constancia Actual:</h3>
                                                                            <a href="<?php echo e($formulario->constancia_pago_path); ?>" target="_blank"
                                                                            class="inline-flex items-center px-3 py-1.5 sm:px-4 sm:py-2 bg-green-50 text-green-600 rounded-lg hover:bg-green-100 transition-colors border border-green-100 mb-3 sm:mb-4 text-xs sm:text-sm">
                                                                                <i class="ri-eye-line mr-1 sm:mr-2"></i> Ver constancia
                                                                            </a>
                                                                        </div>
                                                                        <?php endif; ?>

                                                                        <div>
                                                                            <h3 class="font-medium text-gray-700 mb-1 sm:mb-2 text-sm sm:text-base">
                                                                                <?php if($formulario->constancia_pago_path): ?>
                                                                                    Subir Nueva Constancia
                                                                                <?php else: ?>
                                                                                    Subir Constancia de Pago
                                                                                <?php endif; ?>
                                                                            </h3>
                                                                            
                                                                            <form action="<?php echo e(route('formulario.subir-constancia', $formulario->id)); ?>" 
                                                                                method="POST" 
                                                                                enctype="multipart/form-data" 
                                                                                class="space-y-3 sm:space-y-4"
                                                                                x-data="{ isUploading: false }"
                                                                                @submit="isUploading = true">
                                                                                <?php echo csrf_field(); ?>
                                                                                
                                                                                <div class="flex items-center justify-center w-full">
                                                                                    <label for="dropzone-file-<?php echo e($formulario->id); ?>" class="flex flex-col items-center justify-center w-full h-28 sm:h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition-colors">
                                                                                        <template x-if="!filePreview && !fileUploaded">
                                                                                            <div class="flex flex-col items-center justify-center pt-4 pb-5 sm:pt-5 sm:pb-6">
                                                                                                <i class="ri-upload-cloud-line text-2xl sm:text-3xl text-gray-400 mb-1 sm:mb-2"></i>
                                                                                                <p class="mb-1 sm:mb-2 text-xs sm:text-sm text-gray-500">
                                                                                                    <span class="font-semibold">Haz clic para subir</span>
                                                                                                </p>
                                                                                                <p class="text-2xs sm:text-xs text-gray-500">PDF, JPG o PNG (MAX. 5MB)</p>
                                                                                            </div>
                                                                                        </template>
                                                                                        <template x-if="filePreview">
                                                                                            <div class="p-3 sm:p-4 text-center">
                                                                                                <i class="ri-file-text-line text-2xl sm:text-3xl text-blue-500 mb-1 sm:mb-2"></i>
                                                                                                <p class="text-xs sm:text-sm font-medium text-gray-700 truncate w-full px-2" x-text="fileName"></p>
                                                                                                <p class="text-2xs sm:text-xs text-gray-500 mt-1">Listo para subir</p>
                                                                                            </div>
                                                                                        </template>
                                                                                        <template x-if="fileUploaded && !filePreview">
                                                                                            <div class="p-3 sm:p-4 text-center">
                                                                                                <i class="ri-checkbox-circle-line text-2xl sm:text-3xl text-green-500 mb-1 sm:mb-2"></i>
                                                                                                <p class="text-xs sm:text-sm font-medium text-gray-700">Constancia ya subida</p>
                                                                                            </div>
                                                                                        </template>
                                                                                        <input id="dropzone-file-<?php echo e($formulario->id); ?>" 
                                                                                            type="file" 
                                                                                            name="documento" 
                                                                                            accept=".pdf,.jpg,.jpeg,.png" 
                                                                                            class="hidden"
                                                                                            @change="
                                                                                                fileName = $event.target.files[0].name;
                                                                                                filePreview = true;
                                                                                                fileUploaded = false;
                                                                                            ">
                                                                                    </label>
                                                                                </div>

                                                                                <div class="flex justify-between items-center">
                                                                                    <div class="text-2xs sm:text-xs text-gray-500">
                                                                                        Formatos aceptados: PDF, JPG, PNG (Máx. 5MB)
                                                                                    </div>
                                                                                    <button type="submit"
                                                                                            class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1.5 sm:px-4 sm:py-2 rounded-lg flex items-center text-xs sm:text-sm"
                                                                                            :disabled="isUploading">
                                                                                        <span x-show="!isUploading">Subir constancia</span>
                                                                                        <span x-show="isUploading">Subiendo...</span>
                                                                                        <i class="ri-upload-line ml-1 sm:ml-2" x-show="!isUploading"></i>
                                                                                        <i class="ri-loader-4-line animate-spin ml-1 sm:ml-2" x-show="isUploading"></i>
                                                                                    </button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Pie del modal -->
                                                            <div class="bg-gray-50 px-4 py-2 sm:px-6 sm:py-3 rounded-b-xl border-t border-gray-200 flex flex-col sm:flex-row justify-between items-center gap-2">
                                                                <div class="text-xs sm:text-sm text-gray-500">
                                                                    <i class="ri-time-line mr-1"></i> Estado actual: 
                                                                    <span class="font-medium"><?php echo e(ucfirst(str_replace('_', ' ', $formulario->estado))); ?></span>
                                                                </div>
                                                                <button @click="showPagoModal = false"
                                                                        class="px-3 py-1.5 sm:px-4 sm:py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors text-xs sm:text-sm">
                                                                    Cerrar
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php endif; ?>
                                                <!-- Ver constancia si está disponible -->
                                                <?php if($formulario->constancia_pago_path): ?>
                                                    <a href="<?php echo e($formulario->constancia_pago_path); ?>"
                                                    target="_blank"
                                                    class="text-indigo-500 hover:text-indigo-700 transition-colors"
                                                    data-tooltip="Ver constancia de pago">
                                                        <i class="ri-file-search-line text-base md:text-lg"></i>
                                                    </a>
                                                <?php endif; ?>

                                            <!-- Ver póliza -->
                                            <?php if($formulario->estado === 'finalizado' && $formulario->poliza_path): ?>
                                                <a href="<?php echo e($formulario->poliza_path); ?>" 
                                                   target="_blank"
                                                   class="text-gray-500 hover:text-gray-700 transition-colors"
                                                   data-tooltip="Ver póliza"
                                                   data-intro="Descarga tu póliza finalizada" data-step="13">
                                                    <i class="ri-file-paper-2-line text-base md:text-lg"></i>
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>

                <!-- Paginación -->
                <?php if($formularios->hasPages()): ?>
                <div class="px-4 py-3 md:px-6 md:py-4 bg-gray-50 border-t border-gray-200" data-intro="Navega entre tus formularios" data-step="14">
                    <?php echo e($formularios->links()); ?>

                </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Menú flotante para móviles -->
<div class="fixed bottom-4 right-4 z-40 lg:hidden">

    
    <div id="mobileActionsMenu" class="hidden absolute bottom-16 right-0 w-48 bg-white rounded-lg shadow-xl border border-gray-200 p-2 space-y-2">
        <a href="#" class="flex items-center px-3 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-md">
            <i class="ri-file-edit-line mr-2 text-blue-500"></i> Nuevo Formulario
        </a>
        <a href="<?php echo e(route('documentos.index')); ?>" class="flex items-center px-3 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-md">
            <i class="ri-folder-upload-line mr-2 text-blue-500"></i> Subir Documentos
        </a>
        <a href="<?php echo e(route('perfil.show')); ?>" class="flex items-center px-3 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-md">
            <i class="ri-user-settings-line mr-2 text-blue-500"></i> Mi Perfil
        </a>
    </div>
</div>

<!-- Estilos CSS -->
<style>
    [data-tooltip] {
        position: relative;
        cursor: pointer;
    }
    [data-tooltip]:hover::after {
        content: attr(data-tooltip);
        position: absolute;
        bottom: 100%;
        left: 50%;
        transform: translateX(-50%);
        background-color: #333;
        color: white;
        padding: 0.25rem 0.5rem;
        border-radius: 0.25rem;
        font-size: 0.75rem;
        white-space: nowrap;
        z-index: 10;
    }
    
    /* IntroJS personalizado */
    .introjs-helperLayer {
        background-color: rgba(255,255,255,0.5);
        border: 2px solid #3b82f6;
    }
    .introjs-tooltip {
        min-width: 300px;
        max-width: 400px;
        border-radius: 0.5rem;
        font-family: 'Inter', sans-serif;
    }
    .introjs-tooltip-header {
        background-color: #3b82f6;
        color: white;
        padding: 0.75rem 1rem;
        border-radius: 0.5rem 0.5rem 0 0;
    }
    .introjs-tooltiptext {
        padding: 1rem;
        color: #374151;
    }
    .introjs-tooltipbuttons {
        border-top: 1px solid #e5e7eb;
        padding: 0.75rem 1rem;
        display: flex;
        justify-content: space-between;
    }
    .introjs-button {
        padding: 0.5rem 1rem;
        border-radius: 0.375rem;
        background-color: #3b82f6;
        color: white;
        border: none;
        cursor: pointer;
        font-size: 0.875rem;
        transition: background-color 0.2s;
    }
    .introjs-button:hover {
        background-color: #2563eb;
    }
    .introjs-skipbutton {
        background-color: transparent;
        color: #6b7280;
    }
    .introjs-skipbutton:hover {
        color: #4b5563;
    }
    .introjs-bullets ul li a {
        width: 8px;
        height: 8px;
    }
    .introjs-bullets ul li a.active {
        background-color: #3b82f6;
    }
    
    /* Estilos para el modal */
    [x-cloak] { display: none !important; }
    .modal-overlay {
        background-color: rgba(0, 0, 0, 0.5);
    }
    
    /* Scroll personalizado para móviles */
    @media (max-width: 640px) {
        table {
            display: block;
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }
    }
</style>

<!-- Scripts JavaScript -->
<?php $__env->startSection('scripts'); ?>
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.10.5/dist/cdn.min.js" defer></script>
<script src="https://cdn.jsdelivr.net/npm/intro.js@7.0.1/minified/intro.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intro.js@7.0.1/minified/introjs.min.css">

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Control del menú flotante móvil
        const mobileActionsButton = document.getElementById('mobileActionsButton');
        const mobileActionsMenu = document.getElementById('mobileActionsMenu');
        
        mobileActionsButton.addEventListener('click', function(e) {
            e.stopPropagation();
            mobileActionsMenu.classList.toggle('hidden');
        });
        
        document.addEventListener('click', function(e) {
            if (!mobileActionsMenu.contains(e.target) && e.target !== mobileActionsButton) {
                mobileActionsMenu.classList.add('hidden');
            }
        });

        // Función para copiar al portapapeles
        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(function() {
                console.log('Copiado al portapapeles: ' + text);
            }, function(err) {
                console.error('Error al copiar: ', err);
            });
        }

        // Configuración del tour
        function configurarTour() {
            introJs().setOptions({
                nextLabel: 'Siguiente →',
                prevLabel: '← Anterior',
                skipLabel: 'Saltar tour',
                doneLabel: 'Terminar',
                exitOnEsc: true,
                exitOnOverlayClick: false,
                showStepNumbers: false,
                showBullets: true,
                showProgress: false,
                scrollToElement: true,
                overlayOpacity: 0.5,
                tooltipClass: 'custom-tooltip',
                highlightClass: 'custom-highlight'
            }).oncomplete(function() {
                localStorage.setItem('dashboardTourCompleted', 'true');
            }).onexit(function() {
                localStorage.setItem('dashboardTourCompleted', 'true');
            });
        }

        // Iniciar tour
        document.getElementById('startTourBtn')?.addEventListener('click', function() {
            configurarTour().start();
        });

        // Iniciar automáticamente si es la primera visita
        if(!localStorage.getItem('dashboardTourCompleted')) {
            setTimeout(() => {
                configurarTour().start();
            }, 1000);
        }
    });
</script>
<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app-modern', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\aseguradora\resources\views/pages/dashboard.blade.php ENDPATH**/ ?>