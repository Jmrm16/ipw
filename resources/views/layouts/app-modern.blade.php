<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Panel IPW')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind + RemixIcon -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet">
    <!-- Head (CSS) -->
    <link rel="stylesheet" href="https://unpkg.com/intro.js/minified/introjs.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <style>
        .sidebar-collapsed .sidebar-label {
            display: none;
        }
    </style>
</head>
<body class="bg-gray-50 font-sans text-gray-800">

<div class="flex h-screen">

    <!-- Sidebar -->
    <aside id="sidebar" class="bg-white w-64 transition-all duration-300 shadow-md flex flex-col">
<a href="{{ url('/') }}" title="Ir a Inicio">
    <div class="p-5 border-b border-gray-100 flex items-center gap-3">
        {{-- Logo de la empresa --}}
        <div class="bg-blue-500 p-2 rounded-lg">
            <img src="https://firebasestorage.googleapis.com/v0/b/spotify-clone-db93c.firebasestorage.app/o/logoB.png?alt=media&token=79427397-a113-4f70-ad28-30646f37feee" alt="Logo IPW" class="h-8 w-8 object-contain">
        </div>
        <div class="flex flex-col overflow-hidden">
            <h1 class="text-lg font-bold text-gray-800 sidebar-label">IPW</h1>
            <p class="text-xs text-gray-500 mt-1 sidebar-label truncate">{{ Auth::user()->name }}</p>
        </div>
    </div>
</a>


        <!-- Menú -->
        <nav class="p-3 space-y-1 flex-1">
            <x-nav-link route="dashboard" icon="ri-home-5-line" label="Inicio" />
            <x-nav-link route="perfil.show" icon="ri-user-line" label="Perfil" />
            <x-nav-link route="documentos.index" icon="ri-folder-line" label="Documentos" />
        </nav>

        <!-- Logout -->
        <form method="POST" action="{{ route('logout') }}" class="p-4 border-t border-gray-100">
            @csrf
            <button class="w-full flex items-center justify-center gap-2 py-2 px-4 text-red-500 hover:bg-red-50 rounded-lg transition-all duration-200">
                <i class="ri-logout-box-r-line"></i>
                <span class="sidebar-label">Salir</span>
            </button>
        </form>
    </aside>

    <!-- Main -->
    <div class="flex-1 flex flex-col overflow-hidden">
<header class="h-16 px-6 flex items-center justify-between bg-white border-b shadow-sm sticky top-0 z-40">
   
    <div class="flex items-center gap-4">
        <button id="sidebarToggle" class="text-gray-600 hover:text-blue-500 focus:outline-none transition-colors">
            <i class="ri-menu-line text-2xl"></i>
        </button>
        <h2 class="text-lg font-semibold">@yield('title', 'Panel')</h2>
    </div>


    {{-- 🔔 Botón de notificaciones --}}
    <div class="relative">
        <button id="notificacionesBtn"
                class="relative p-2 rounded-full bg-white shadow hover:bg-blue-50 transition z-50">
            <i class="ri-notification-3-line text-2xl text-blue-600"></i>
            @if($notificaciones->where('leida', false)->count() > 0)
                <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full px-1.5 py-0.5">
                    {{ $notificaciones->where('leida', false)->count() }}
                </span>
            @endif
        </button>

        <!-- Dropdown modal -->
        <div id="notificacionesModal"
             class="hidden absolute top-12 right-0 w-96 bg-white rounded-lg shadow-lg ring-1 ring-gray-200 z-40">
            <div class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-t-lg flex items-center gap-2">
                <i class="ri-notification-3-line"></i> Notificaciones
            </div>
            <ul class="max-h-80 overflow-y-auto divide-y">
                @forelse($notificaciones as $n)
                    <li class="p-3 hover:bg-gray-50 {{ $n->leida ? 'text-gray-500' : 'text-gray-800 font-semibold' }}">
                        <div class="flex items-start gap-2">
                            <i class="ri-information-line text-blue-500 mt-1"></i>
                            <div>
                                <p>{{ $n->mensaje }}</p>
                                <div class="text-xs text-gray-400">{{ \Carbon\Carbon::parse($n->created_at)->diffForHumans() }}</div>
                            </div>
                        </div>
                    </li>
                @empty
                    <li class="p-3 text-center text-gray-500">No tienes notificaciones</li>
                @endforelse
            </ul>
        </div>
    </div>
</header>


        <main class="flex-1 overflow-y-auto p-6">
            @yield('content')
        </main>
    </div>
</div>

<script>
    const sidebar = document.getElementById('sidebar');
    const toggle = document.getElementById('sidebarToggle');

    toggle.addEventListener('click', () => {
        sidebar.classList.toggle('w-64');
        sidebar.classList.toggle('w-20');
        sidebar.classList.toggle('sidebar-collapsed');
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
            fetch("{{ route('notificaciones.marcar-leidas') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
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







<button onclick="introJs().start()"
        class="fixed bottom-6 right-6 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-full shadow-lg z-50">
    <i class="ri-question-line mr-1"></i> Tour
</button>



<script src="https://unpkg.com/intro.js/minified/intro.min.js"></script>


</body>
</html>
