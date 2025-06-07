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
<div id="chatbot-button" style="position: fixed; bottom: 20px; left: 20px; z-index: 9999;">
    <button class="btn btn-success rounded-circle shadow" style="width: 60px; height: 60px;" onclick="openChatbotModal()">
        <i class="fab fa-whatsapp fa-lg"></i>
    </button>
</div>

<!-- Botón flotante del chatbot -->
<div style="position: fixed; bottom: 20px; left: 20px; z-index: 9999;">
    <button class="btn btn-success rounded-circle shadow" style="width: 60px; height: 60px;" onclick="openChatbotModal()">
        <i class="fas fa-robot fa-lg"></i>
    </button>
</div>

<!-- Modal del Chatbot -->
<!-- Modal del Chatbot -->
<div class="modal fade" id="chatbotModal" tabindex="-1" aria-labelledby="chatbotModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width: 400px; margin: auto; margin-top: 10vh;">
        <div class="modal-content shadow-lg border-0 rounded-4">
            <div class="modal-header bg-success text-white rounded-top-4">
                <h5 class="modal-title"><i class="fas fa-robot me-2"></i> IPW Bot</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>

            <div class="modal-body p-3" id="chatbot-messages" style="max-height: 500px; overflow-y: auto; background-color: #f8f9fa;">
                <div class="d-flex align-items-start mb-2">
                    <div class="bg-light rounded p-2 shadow-sm text-dark">
                        🤖 Hola, ¿en qué puedo ayudarte hoy?
                    </div>
                </div>
            </div>

            <div class="modal-footer border-0 p-2 bg-white rounded-bottom-4">
                <div class="input-group">
                    <input type="text" id="chatbotInput" class="form-control rounded-start-pill border-end-0" placeholder="Escribe tu mensaje...">
                    <button class="btn btn-success rounded-end-pill" onclick="sendChatbotMessage()">Enviar</button>
                </div>
                <div class="w-100 text-end mt-1">
                    <button class="btn btn-sm btn-link text-muted" onclick="resetChatbot()">⟳ Reiniciar conversación</button>
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
    }
    function resetChatbot() {
    const container = document.getElementById('chatbot-messages');
    container.innerHTML = `<div class="alert alert-light">🤖 Hola, ¿en qué puedo ayudarte hoy?</div>`;
}

function sendChatbotMessage() {
    const input = document.getElementById('chatbotInput');
    const message = input.value.trim();
    const container = document.getElementById('chatbot-messages');

    if (!message) return;

    // Mostrar mensaje del usuario (alineado a la derecha)
    container.innerHTML += `
        <div class="d-flex justify-content-end mb-2">
            <div class="bg-success text-white rounded p-2 shadow-sm">
                ${message}
            </div>
        </div>`;
    container.scrollTop = container.scrollHeight;

    input.value = '';
    input.disabled = true;

    // Indicador de "escribiendo..."
    const loadingMsgId = `loading-${Date.now()}`;
    container.innerHTML += `
        <div class="d-flex justify-content-start mb-2" id="${loadingMsgId}">
            <div class="bg-light rounded p-2 shadow-sm text-muted fst-italic">
                Escribiendo...
            </div>
        </div>`;
    container.scrollTop = container.scrollHeight;

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
            <div class="d-flex justify-content-start mb-2">
                <div class="bg-light rounded p-2 shadow-sm text-dark">
                    ${respuesta.replace(/\n/g, '<br>')}
                </div>
            </div>`;

        // Si no entiende la pregunta, sugiere WhatsApp
        if (respuesta.includes('no pude') || respuesta.includes('no estoy seguro')) {
            container.innerHTML += `
                <div class="text-center mb-2">
                    <a href="https://wa.me/573001234567" target="_blank" class="btn btn-sm btn-outline-success">
                        Chatear por WhatsApp
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
            <div class="d-flex justify-content-start mb-2">
                <div class="bg-danger text-white rounded p-2 shadow-sm">
                    ⚠️ Error al conectar con el asistente.
                </div>
            </div>`;
        input.disabled = false;
    });
}
</script>


</html>
<?php /**PATH C:\xampp\htdocs\nueva aseguradora\ipw\resources\views/layouts/app.blade.php ENDPATH**/ ?>