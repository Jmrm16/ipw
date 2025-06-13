<?php $__env->startSection('title', 'Mi Perfil'); ?>

<?php $__env->startSection('content'); ?>
<div class="profile-container">

    <!-- Contenido Principal -->
    <main class="main-content">
        <!-- Tarjeta de Perfil -->
        <div class="profile-card"
        data-intro="Esta es la informacion de tu perfil." 
        data-step="1">
            
            <!-- Encabezado con gradiente y avatar -->
            <div class="profile-header bg-gradient-to-r from-indigo-600 to-blue-700 shadow-md">
                <div class="avatar-container">
                    <div class="avatar shadow">
                        <i class="ri-user-3-fill"></i>
                    </div>
                    <div>
                        <h1 class="profile-title">Mi Perfil</h1>
                        <p class="text-sm opacity-80">Bienvenido de nuevo, <?php echo e($usuario->name); ?></p>
                    </div>
                </div>
            </div>

            <!-- Cuerpo del perfil -->
            <div class="profile-body">
                <!-- Información Personal -->
                <section class="profile-section">
                    <h2 class="section-title">
                        <i class="ri-information-line"></i> Datos Personales
                    </h2>
                    <div class="info-grid">
                        <div class="info-item">
                            <div class="info-icon">
                                <i class="ri-user-line"></i>
                            </div>
                            <div class="info-content">
                                <label>Nombre Completo</label>
                                <p><?php echo e($usuario->name); ?></p>
                            </div>
                        </div>

                        <div class="info-item">
                            <div class="info-icon">
                                <i class="ri-mail-line"></i>
                            </div>
                            <div class="info-content">
                                <label>Correo Electrónico</label>
                                <p><?php echo e($usuario->email); ?></p>
                            </div>
                        </div>

                        <?php if(isset($usuario->telefono)): ?>
                        <div class="info-item">
                            <div class="info-icon">
                                <i class="ri-phone-line"></i>
                            </div>
                            <div class="info-content">
                                <label>Teléfono</label>
                                <p><?php echo e($usuario->telefono); ?></p>
                            </div>
                        </div>
                        <?php endif; ?>

                        <?php if(isset($usuario->role)): ?>
                        <div class="info-item">
                            <div class="info-icon">
                                <i class="ri-shield-user-line"></i>
                            </div>
                            <div class="info-content">
                                <label>Rol</label>
                                <p><?php echo e(ucfirst($usuario->role)); ?></p>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </section>

                <!-- Acciones -->
                <section class="profile-actions">
                    <h2 class="section-title">
                        <i class="ri-settings-3-line"></i> Acciones Rápidas
                    </h2>
                    <div class="action-buttons"
                            data-intro="Estas son las acciones que puedes realizar con tu perfil." 
                            data-step="2">
                    
                        
                        <a href="<?php echo e(route('perfil.edit')); ?>" class="btn-edit">
                            <i class="ri-edit-2-line"></i> Editar Perfil
                        </a>
                        <a href="<?php echo e(route('perfil.password')); ?>" class="btn-change-password">
                            <i class="ri-lock-password-line"></i> Cambiar Contraseña
                        </a>
                    </div>
                </section>
            </div>
        </div>
    </main>
</div>

<style>
    .profile-container {
        display: flex;
        min-height: 100vh;
        background: linear-gradient(to bottom, #f0f4f8, #ffffff);
    }
    .main-content {
        flex: 1;
        padding: 2rem;
    }
    .profile-card {
        background: white;
        border-radius: 1rem;
        box-shadow: 0 15px 25px rgba(0,0,0,0.1);
        overflow: hidden;
    }
    .profile-header {
        padding: 2.5rem 2rem;
        color: white;
    }
    .avatar-container {
        display: flex;
        align-items: center;
        gap: 1.5rem;
    }
    .avatar {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background-color: rgba(255, 255, 255, 0.2);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.5rem;
        border: 2px solid white;
    }
    .profile-title {
        font-size: 1.75rem;
        font-weight: 600;
    }
    .profile-body {
        padding: 2rem;
        margin-top: -2rem;
    }
    .section-title {
        font-size: 1.25rem;
        font-weight: 600;
        color: #374151;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    .info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1.25rem;
    }
    .info-item {
        display: flex;
        gap: 1rem;
        padding: 1rem;
        background: #f1f5f9;
        border-left: 4px solid #3b82f6;
        border-radius: 0.5rem;
        transition: 0.2s;
    }
    .info-item:hover {
        background: #e2e8f0;
        transform: translateY(-2px);
    }
    .info-icon {
        font-size: 1.5rem;
        color: #3b82f6;
    }
    .info-content label {
        font-size: 0.875rem;
        color: #64748b;
    }
    .info-content p {
        font-size: 1rem;
        font-weight: 500;
        color: #1e293b;
    }
    .profile-actions {
        margin-top: 2.5rem;
    }
    .action-buttons {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
    }
    .btn-edit, .btn-change-password {
        padding: 0.75rem 1.25rem;
        border-radius: 8px;
        font-weight: 500;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        text-decoration: none;
    }
    .btn-edit {
        background: #3b82f6;
        color: white;
    }
    .btn-edit:hover {
        background: #2563eb;
    }
    .btn-change-password {
        background: white;
        color: #3b82f6;
        border: 1px solid #3b82f6;
    }
    .btn-change-password:hover {
        background: #eff6ff;
    }
    @media (max-width: 768px) {
        .main-content {
            padding: 1rem;
        }
        .avatar-container {
            flex-direction: column;
            text-align: center;
        }
        .info-grid {
            grid-template-columns: 1fr;
        }
        .action-buttons {
            flex-direction: column;
        }
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const tourKey = "formularioDashboardTourVisto";

        if (!localStorage.getItem(tourKey) && mostrarTourDesdeServidor) {
            introJs()
                .setOptions({
                    nextLabel: 'Siguiente',
                    prevLabel: 'Anterior',
                    skipLabel: 'Saltar',
                    doneLabel: 'Finalizar'
                })
                .start()
                .oncomplete(() => localStorage.setItem(tourKey, true))
                .onexit(() => localStorage.setItem(tourKey, true));
        }
    });
</script>





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

<?php echo $__env->make('layouts.app-modern', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\nueva aseguradora\ipw\resources\views/pages/perfil.blade.php ENDPATH**/ ?>