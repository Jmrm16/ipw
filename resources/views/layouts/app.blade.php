<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title', 'Aseguradora-IPW')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="{{ asset('img/favicon.ico') }}" rel="icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Bootstrap 5 CSS ✅ -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- OwlCarousel CSS -->
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    @yield('styles')
</head>

<body>

    {{-- Navbar --}}
    @include('partials.navbar')

    {{-- Main content --}}
    @yield('content')
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
<div class="modal fade" id="chatbotModal" tabindex="-1" aria-labelledby="chatbotModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-scrollable modal-dialog-bottom">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title">Asistente Virtual</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body" id="chatbot-messages" style="max-height: 400px; overflow-y: auto;">
                <div class="alert alert-light">🤖 Hola, ¿en qué puedo ayudarte hoy?</div>
            </div>
            <div class="modal-footer p-2">
                <input type="text" id="chatbotInput" class="form-control me-2" placeholder="Escribe tu mensaje...">
                <button class="btn btn-success" onclick="sendChatbotMessage()">Enviar</button>
            </div>
        </div>
    </div>
</div>




    {{-- Footer --}}
    @include('partials.footer')

    <!-- Scripts -->

    <!-- jQuery ✅ (solo una vez) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- OwlCarousel -->
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Otros plugins -->
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('lib/counterup/counterup.min.js') }}"></script>

    <!-- Bootstrap Bundle JS ✅ -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JS -->
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/jquery.marquee.min.js') }}"></script>
    <script src="{{ asset('js/form-validations.js') }}"></script>

    @yield('scripts')
</body>

<script>
    function openChatbotModal() {
        const modal = new bootstrap.Modal(document.getElementById('chatbotModal'));
        modal.show();
    }

    function sendChatbotMessage() {
        const input = document.getElementById('chatbotInput');
        const message = input.value.trim();
        if (!message) return;

        const container = document.getElementById('chatbot-messages');
        container.innerHTML += `<div class="text-end mb-2"><div class="alert alert-success d-inline-block">${message}</div></div>`;
        container.scrollTop = container.scrollHeight;
        input.value = '';
        input.disabled = true;

        fetch('{{ route('api.chatbot') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ mensaje: message })
        })
        .then(res => res.json())
        .then(data => {
             console.log(data); // 👈 AGREGA ESTO
            const respuesta = data.respuesta || '🤖 Lo siento, no pude responder eso.';
            container.innerHTML += `<div class="mb-2"><div class="alert alert-light border">${respuesta.replace(/\n/g, "<br>")}</div></div>`;

            // Si quieres redirigir a WhatsApp si no entiende:
            if (respuesta.includes('no pude') || respuesta.includes('no estoy seguro')) {
                container.innerHTML += `<div class="text-center mb-2">
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
    console.error(err); // ✅ ahora sí está definida
    container.innerHTML += `<div class="alert alert-danger">Error al conectar con el asistente.</div>`;
    input.disabled = false;
});
    }
</script>


</html>
