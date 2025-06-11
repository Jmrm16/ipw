<?php $__env->startSection('title', 'Mi Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-8">
    <!-- Botón de notificaciones y modal -->
    <div class="flex justify-end mb-4 relative">
        <!-- Botón -->
        <button id="notificacionesBtn"
                class="relative p-2 rounded-full bg-white shadow hover:bg-blue-50 transition z-50">
            <i class="ri-notification-3-line text-2xl text-blue-600"></i>
            <?php if($notificaciones->where('leida', false)->count() > 0): ?>
                <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full px-1.5 py-0.5">
                    <?php echo e($notificaciones->where('leida', false)->count()); ?>

                </span>
            <?php endif; ?>
        </button>

        <!-- Dropdown modal -->
        <div id="notificacionesModal"
             class="hidden absolute top-12 right-0 w-96 bg-white rounded-lg shadow-lg ring-1 ring-gray-200 z-40">
            <div class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-t-lg flex items-center gap-2">
                <i class="ri-notification-3-line"></i> Notificaciones
            </div>
            <ul class="max-h-80 overflow-y-auto divide-y">
                <?php $__empty_1 = true; $__currentLoopData = $notificaciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <li class="p-3 hover:bg-gray-50 <?php echo e($n->leida ? 'text-gray-500' : 'text-gray-800 font-semibold'); ?>">
                        <div class="flex items-start gap-2">
                            <i class="ri-information-line text-blue-500 mt-1"></i>
                            <div>
                                <p><?php echo e($n->mensaje); ?></p>
                                <div class="text-xs text-gray-400"><?php echo e(\Carbon\Carbon::parse($n->created_at)->diffForHumans()); ?></div>
                            </div>
                        </div>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <li class="p-3 text-center text-gray-500">No tienes notificaciones</li>
                <?php endif; ?>
            </ul>
        </div>
    </div>

    <!-- Estadísticas mejoradas -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Tarjeta de formularios -->
        <div class="bg-white p-6 rounded-xl shadow-lg transform transition-all hover:scale-[1.02] hover:shadow-xl border-l-4 border-blue-500">
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

        <!-- Tarjeta de documentos pendientes -->
        <div class="bg-white p-6 rounded-xl shadow-lg transform transition-all hover:scale-[1.02] hover:shadow-xl border-l-4 border-yellow-500">
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

        <!-- Tarjeta de pólizas -->
        <div class="bg-white p-6 rounded-xl shadow-lg transform transition-all hover:scale-[1.02] hover:shadow-xl border-l-4 border-green-500">
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

    <!-- Tarjeta de formularios mejorada -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <!-- Encabezado con gradiente -->
        <div class="bg-gradient-to-r from-blue-500 to-blue-600 px-6 py-4">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-semibold text-white flex items-center gap-3">
                    <i class="ri-file-check-line"></i> Mis Formularios
                </h3>
                <div class="relative">
                    <input type="text" placeholder="Buscar formulario..." class="pl-10 pr-4 py-2 rounded-full text-sm bg-blue-400 bg-opacity-20 text-white placeholder-blue-100 focus:outline-none focus:ring-2 focus:ring-blue-200">
                    <i class="ri-search-line absolute left-3 top-2.5 text-blue-100"></i>
                </div>
            </div>
        </div>

        <!-- Cuerpo de la tabla -->
        <div class="p-6">
            <?php if($formularios->isEmpty()): ?>
                <div class="text-center py-12">
                    <div class="mx-auto w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                        <i class="ri-inbox-line text-3xl text-gray-400"></i>
                    </div>
                    <h4 class="text-gray-500 font-medium mb-2">No hay formularios completados</h4>
                    <p class="text-gray-400 text-sm mb-4">Comienza completando tu primer formulario</p>
                    <a href="#" class="inline-flex items-center px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors">
                        <i class="ri-add-line mr-2"></i> Nuevo Formulario
                    </a>
                </div>
            <?php else: ?>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                                <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <?php $__currentLoopData = $formularios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $formulario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">#<?php echo e($formulario->id); ?></div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-700"><?php echo e($formulario->created_at->format('d/m/Y')); ?></div>
                                        <div class="text-xs text-gray-400"><?php echo e($formulario->created_at->diffForHumans()); ?></div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
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
                                        <span class="px-3 py-1 rounded-full text-xs font-semibold <?php echo e($estadoColor); ?> inline-flex items-center">
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
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <div class="flex justify-end space-x-3">
                                            <a href="<?php echo e(route('documentos.por_formulario', $formulario->id)); ?>" 
                                               class="text-blue-500 hover:text-blue-700 transition-colors"
                                               data-tooltip="Subir documentos">
                                                <i class="ri-upload-2-line text-lg"></i>
                                            </a>
                                            <a href="<?php echo e(route('observaciones.por_formulario', $formulario->id)); ?>" 
                                               class="text-cyan-500 hover:text-cyan-700 transition-colors"
                                               data-tooltip="Ver observaciones">
                                                <i class="ri-chat-3-line text-lg"></i>
                                            </a>
                                            <?php if($formulario->estado === 'proceso_pago'): ?>
                                                <a href="#" 
                                                   class="text-green-500 hover:text-green-700 transition-colors"
                                                   data-bs-toggle="modal" 
                                                   data-bs-target="#modalPago<?php echo e($formulario->id); ?>"
                                                   data-tooltip="Información de pago">
                                                    <i class="ri-bank-card-line text-lg"></i>
                                                </a>
                                            <?php endif; ?>
                                            <?php if($formulario->estado === 'finalizado' && $formulario->poliza_path): ?>
                                                <a href="<?php echo e($formulario->poliza_path); ?>" 
                                                   target="_blank"
                                                   class="text-gray-500 hover:text-gray-700 transition-colors"
                                                   data-tooltip="Ver póliza">
                                                    <i class="ri-file-paper-2-line text-lg"></i>
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
                <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">
                    <?php echo e($formularios->links()); ?>

                </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<style>
    [data-tooltip] {
        position: relative;
    }
    [data-tooltip]::after {
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
        opacity: 0;
        visibility: hidden;
        transition: all 0.2s ease;
    }
    [data-tooltip]:hover::after {
        opacity: 1;
        visibility: visible;
        bottom: calc(100% + 5px);
    }
</style>

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
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app-modern', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\aseguradora\resources\views/pages/dashboard.blade.php ENDPATH**/ ?>