<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo $__env->yieldContent('title', 'Aseguradora-IPW'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="<?php echo e(asset('img/favicon.ico')); ?>" rel="icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Bootstrap 5 CSS ✅ -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- OwlCarousel CSS -->
    <link href="<?php echo e(asset('lib/owlcarousel/assets/owl.carousel.min.css')); ?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <?php echo $__env->yieldContent('styles'); ?>
</head>

<body>

    
    <?php echo $__env->make('partials.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    
    <?php echo $__env->yieldContent('content'); ?>


<!-- Botón flotante del chatbot -->
<div id="chatbot-button" style="position: fixed; bottom: 30px; right: 30px; z-index: 9999;">
    <button class="btn rounded-circle shadow-lg p-0" 
            style="width: 60px; height: 60px; background-color: #1a4b8c; border-color: #1a4b8c;"
            onclick="openChatbotModal()">
        <i class="fas fa-robot fa-lg text-white"></i>
        <span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle">
            <span class="visually-hidden">Nuevos mensajes</span>
        </span>
    </button>
</div>


<!-- Modal del Chatbot -->
<!-- Modal del Chatbot -->
    <!-- Modal del Chatbot -->
    <div class="modal fade" id="chatbotModal" tabindex="-1" aria-labelledby="chatbotModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 400px;">
            <div class="modal-content rounded-4 overflow-hidden border-0 shadow-lg">
                <!-- Header con animación de conexión -->
                <div class="modal-header bg-gradient-success text-white position-relative">
                    <div class="d-flex align-items-center w-100">
                        <div class="me-3">
                            <div class="position-relative">
                                <div class="chatbot-avatar bg-white text-success rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                    <i class="fas fa-robot"></i>
                                </div>
                                <span class="position-absolute bottom-0 end-0 p-1 bg-success border border-2 border-white rounded-circle">
                                    <span class="visually-hidden">En línea</span>
                                </span>
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <h5 class="modal-title mb-0">IPW Bot</h5>
                            <small class="d-block" id="chatbot-status">En línea • Asistente virtual IA</small>
                        </div>
                        <div class="d-flex">
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                        </div>
                    </div>
                </div>

                <!-- Cuerpo del chat -->
                <div class="modal-body p-0" style="background-color: #f0f2f5;">
                    <div id="chatbot-messages" class="p-3" style="min-height: 300px; max-height: 400px; overflow-y: auto;">
                        <!-- Mensaje de bienvenida -->
                        <div class="chat-message bot-message mb-3">
                            <div class="message-content bg-white rounded-4 p-3 shadow-sm">
                                <div class="d-flex align-items-center mb-2">
                                    <div class="chatbot-avatar-small bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 24px; height: 24px;">
                                        <i class="fas fa-robot" style="font-size: 0.7rem;"></i>
                                    </div>
                                    <small class="text-muted">IPW Bot</small>
                                </div>
                                <p class="mb-0">🤖 Hola, ¿en qué puedo ayudarte hoy?</p>
                                <small class="d-block text-end text-muted mt-1">Ahora</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer con input y acciones -->
                <div class="modal-footer border-0 p-3 bg-white">
                    <div class="w-100">
                        <div class="input-group mb-2">
                            <input type="text" id="chatbotInput" class="form-control border-0 rounded-pill shadow-sm" 
                                   placeholder="Escribe tu mensaje..." 
                                   onkeypress="if(event.key === 'Enter') sendChatbotMessage()">
                            <button class="btn btn-success rounded-circle ms-2" style="width: 40px; height: 40px;" onclick="sendChatbotMessage()">
                                <i class="fas fa-paper-plane"></i>
                            </button>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-sm btn-link text-muted" onclick="resetChatbot()">
                                <i class="fas fa-redo me-1"></i> Reiniciar conversación
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    
    <?php echo $__env->make('partials.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <!-- Scripts -->

    <!-- jQuery ✅ (solo una vez) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- OwlCarousel -->
    <script src="<?php echo e(asset('lib/owlcarousel/owl.carousel.min.js')); ?>"></script>

    <!-- Otros plugins -->
    <script src="<?php echo e(asset('lib/easing/easing.min.js')); ?>"></script>
    <script src="<?php echo e(asset('lib/waypoints/waypoints.min.js')); ?>"></script>
    <script src="<?php echo e(asset('lib/counterup/counterup.min.js')); ?>"></script>

    <!-- Bootstrap Bundle JS ✅ -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JS -->
    <script src="<?php echo e(asset('js/main.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.marquee.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/form-validations.js')); ?>"></script>

    <?php echo $__env->yieldContent('scripts'); ?>
</body>

    <script>
        function openChatbotModal() {
            const modal = new bootstrap.Modal(document.getElementById('chatbotModal'));
            modal.show();
            document.getElementById('chatbotInput').focus();
        }
        
        function resetChatbot() {
            const container = document.getElementById('chatbot-messages');
            container.innerHTML = `
                <div class="chat-message bot-message mb-3">
                    <div class="message-content bg-white rounded-4 p-3 shadow-sm">
                        <div class="d-flex align-items-center mb-2">
                            <div class="chatbot-avatar-small bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 24px; height: 24px;">
                                <i class="fas fa-robot" style="font-size: 0.7rem;"></i>
                            </div>
                            <small class="text-muted">IPW Bot</small>
                        </div>
                        <p class="mb-0">🤖 Hola, ¿en qué puedo ayudarte hoy?</p>
                        <small class="d-block text-end text-muted mt-1">Ahora</small>
                    </div>
                </div>`;
        }

        function sendChatbotMessage() {
            const input = document.getElementById('chatbotInput');
            const message = input.value.trim();
            const container = document.getElementById('chatbot-messages');

            if (!message) return;

            // Mostrar mensaje del usuario (alineado a la derecha)
            container.innerHTML += `
                <div class="chat-message user-message mb-3">
                    <div class="message-content bg-success text-white rounded-4 p-3 shadow-sm">
                        <div class="d-flex align-items-center mb-2">
                            <div class="chatbot-avatar-small bg-white text-success rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 24px; height: 24px;">
                                <i class="fas fa-user" style="font-size: 0.7rem;"></i>
                            </div>
                            <small class="text-white-50">Tú</small>
                        </div>
                        <p class="mb-0">${message}</p>
                        <small class="d-block text-end text-white-50 mt-1">Ahora</small>
                    </div>
                </div>`;
            
            container.scrollTop = container.scrollHeight;
            input.value = '';
            input.disabled = true;

            // Indicador de "escribiendo..."
            const loadingMsgId = `loading-${Date.now()}`;
            container.innerHTML += `
                <div class="chat-message bot-message mb-3" id="${loadingMsgId}">
                    <div class="message-content bg-white rounded-4 p-3 shadow-sm">
                        <div class="d-flex align-items-center mb-2">
                            <div class="chatbot-avatar-small bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 24px; height: 24px;">
                                <i class="fas fa-robot" style="font-size: 0.7rem;"></i>
                            </div>
                            <small class="text-muted">IPW Bot</small>
                        </div>
                        <div class="typing-indicator">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>`;
            
            container.scrollTop = container.scrollHeight;

            // Llamada a tu API de IA existente
            fetch('<?php echo e(route('api.chatbot')); ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                },
                body: JSON.stringify({ mensaje: message })
            })
            .then(res => res.json())
            .then(data => {
                console.log(data);

                // Eliminar "escribiendo..."
                const loadingMsg = document.getElementById(loadingMsgId);
                if (loadingMsg) loadingMsg.remove();

                const respuesta = data.respuesta || '🤖 Lo siento, no pude responder eso.';

                // Mostrar respuesta del bot
                container.innerHTML += `
                    <div class="chat-message bot-message mb-3">
                        <div class="message-content bg-white rounded-4 p-3 shadow-sm">
                            <div class="d-flex align-items-center mb-2">
                                <div class="chatbot-avatar-small bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 24px; height: 24px;">
                                    <i class="fas fa-robot" style="font-size: 0.7rem;"></i>
                                </div>
                                <small class="text-muted">IPW Bot</small>
                            </div>
                            <p class="mb-0">${respuesta.replace(/\n/g, '<br>')}</p>
                            <small class="d-block text-end text-muted mt-1">Ahora</small>
                        </div>
                    </div>`;

                // Si no entiende la pregunta, sugiere WhatsApp (como en tu versión original)
                if (respuesta.includes('no pude') || respuesta.includes('no estoy seguro')) {
                    container.innerHTML += `
                        <div class="text-center mb-2">
                            <a href="https://wa.me/573001234567" target="_blank" class="btn btn-sm btn-outline-success rounded-pill px-3">
                                <i class="fab fa-whatsapp me-1"></i> Chatear por WhatsApp
                            </a>
                        </div>`;
                }

                input.disabled = false;
                input.focus();
                container.scrollTop = container.scrollHeight;
            })
            .catch((err) => {
                console.error(err);
                const loadingMsg = document.getElementById(loadingMsgId);
                if (loadingMsg) loadingMsg.remove();

                container.innerHTML += `
                    <div class="chat-message bot-message mb-3">
                        <div class="message-content bg-danger text-white rounded-4 p-3 shadow-sm">
                            <div class="d-flex align-items-center mb-2">
                                <div class="chatbot-avatar-small bg-white text-danger rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 24px; height: 24px;">
                                    <i class="fas fa-exclamation" style="font-size: 0.7rem;"></i>
                                </div>
                                <small class="text-white-50">Error</small>
                            </div>
                            <p class="mb-0">⚠️ Error al conectar con el asistente.</p>
                            <small class="d-block text-end text-white-50 mt-1">Ahora</small>
                        </div>
                    </div>`;
                input.disabled = false;
                container.scrollTop = container.scrollHeight;
            });
        }
    </script>

    <style>
            /* Estilos personalizados para el tema azul */
    .chat-message.user-message .message-content {
        background-color: #1a4b8c !important;
        color: white;
    }
    
    .chatbot-avatar-small {
        background-color: #1a4b8c;
    }
    
    .btn-outline-primary {
        border-color: #1a4b8c;
        color: #1a4b8c;
    }
    
    .btn-outline-primary:hover {
        background-color: #1a4b8c;
        color: white;
    }



        /* Estilos para el indicador de "escribiendo" */
        .typing-indicator {
            display: inline-flex;
            padding: 8px 12px;
        }
        
        .typing-indicator span {
            height: 8px;
            width: 8px;
            margin: 0 2px;
            background-color: #6c757d;
            border-radius: 50%;
            display: inline-block;
            opacity: 0.4;
        }
        
        .typing-indicator span:nth-child(1) {
            animation: typingAnimation 1s infinite;
        }
        
        .typing-indicator span:nth-child(2) {
            animation: typingAnimation 1s infinite 0.2s;
        }
        
        .typing-indicator span:nth-child(3) {
            animation: typingAnimation 1s infinite 0.4s;
        }
        
        @keyframes typingAnimation {
            0% {
                opacity: 0.4;
                transform: translateY(0);
            }
            50% {
                opacity: 1;
                transform: translateY(-3px);
            }
            100% {
                opacity: 0.4;
                transform: translateY(0);
            }
        }
        
        /* Estilos para el gradiente del header */
        .bg-gradient-success {
            background: linear-gradient(135deg, #00a884 0%, #008069 100%);
        }
        
        /* Estilos para las burbujas de chat */
        .chat-message {
            max-width: 85%;
        }
        
        .user-message {
            margin-left: auto;
        }
        
        .bot-message {
            margin-right: auto;
        }
        
        .message-content {
            position: relative;
        }
    </style>


</html>
<?php /**PATH C:\xampp\htdocs\aseguradora\resources\views/layouts/app.blade.php ENDPATH**/ ?>