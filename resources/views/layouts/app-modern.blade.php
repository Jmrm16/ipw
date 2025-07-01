<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Panel IPW')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="theme-color" content="#3b82f6">

    <!-- Tailwind + RemixIcon -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet">
    <!-- Head (CSS) -->
    <link rel="stylesheet" href="https://unpkg.com/intro.js/minified/introjs.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <style>
        /* Estilos para el sidebar */
        .sidebar-collapsed .sidebar-label {
            display: none;
        }
        
        /* Mejoras para móviles */
        @media (max-width: 768px) {
            #sidebar {
                position: fixed;
                top: 0;
                left: -100%;
                height: 100vh;
                z-index: 50;
                transition: left 0.3s ease;
            }
            
            #sidebar.mobile-open {
                left: 0;
            }
            
            .sidebar-overlay {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: rgba(0,0,0,0.5);
                z-index: 40;
            }
            
            .sidebar-overlay.active {
                display: block;
            }
            
            /* Ajustes para el contenido principal cuando el sidebar está abierto */
            body.sidebar-open {
                overflow: hidden;
            }
        }
    </style>
</head>
<body class="bg-gray-50 font-sans text-gray-800">

<!-- Overlay para móviles -->
<div id="sidebarOverlay" class="sidebar-overlay"></div>

<div class="flex flex-col md:flex-row h-screen">

    <!-- Sidebar - Versión móvil -->
    <aside id="sidebar" class="bg-white w-64 md:w-20 lg:w-64 transition-all duration-300 shadow-md flex flex-col z-50">
        <a href="{{ url('/') }}" title="Ir a Inicio">
            <div class="p-4 md:p-3 border-b border-gray-100 flex items-center gap-3">
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
        <nav class="p-2 md:p-1 space-y-1 flex-1 overflow-y-auto">
            <x-nav-link route="dashboard" icon="ri-home-5-line" label="Inicio" />
            <x-nav-link route="perfil.show" icon="ri-user-line" label="Perfil" />
            <x-nav-link route="documentos.index" icon="ri-folder-line" label="Documentos" />
        </nav>

        <!-- Logout -->
        <form method="POST" action="{{ route('logout') }}" class="p-3 border-t border-gray-100">
            @csrf
            <button class="w-full flex items-center justify-center gap-2 py-2 px-3 text-red-500 hover:bg-red-50 rounded-lg transition-all duration-200">
                <i class="ri-logout-box-r-line"></i>
                <span class="sidebar-label">Salir</span>
            </button>
        </form>
    </aside>

    <!-- Main -->
    <div class="flex-1 flex flex-col overflow-hidden">
        <!-- Header -->
        <header class="h-16 px-4 md:px-6 flex items-center justify-between bg-white border-b shadow-sm sticky top-0 z-40">
            <div class="flex items-center gap-4">
                <!-- Botón para mostrar/ocultar sidebar en móviles -->
                <button id="sidebarToggle" class="text-gray-600 hover:text-blue-500 focus:outline-none transition-colors md:hidden">
                    <i class="ri-menu-line text-2xl"></i>
                </button>
                
                <!-- Botón para colapsar/expandir sidebar en desktop -->
                <button id="desktopSidebarToggle" class="text-gray-600 hover:text-blue-500 focus:outline-none transition-colors hidden md:block">
                    <i class="ri-menu-line text-2xl"></i>
                </button>
                
                <h2 class="text-lg font-semibold truncate max-w-xs">@yield('title', 'Panel')</h2>
            </div>

            <!-- Notificaciones -->
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
                     class="hidden absolute top-12 right-0 w-80 md:w-96 bg-white rounded-lg shadow-lg ring-1 ring-gray-200 z-40">
                    <div class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-t-lg flex items-center gap-2">
                        <i class="ri-notification-3-line"></i> Notificaciones
                    </div>
                    <ul class="max-h-80 overflow-y-auto divide-y">
                        @forelse($notificaciones as $n)
                            <li class="p-3 hover:bg-gray-50 {{ $n->leida ? 'text-gray-500' : 'text-gray-800 font-semibold' }}">
                                <div class="flex items-start gap-2">
                                    <i class="ri-information-line text-blue-500 mt-1"></i>
                                    <div class="flex-1 min-w-0">
                                        {{-- Mensaje principal --}}
                                        <p class="truncate">{{ $n->mensaje }}</p>

                                        {{-- Fecha relativa --}}
                                        <div class="text-xs text-gray-400">
                                            {{ \Carbon\Carbon::parse($n->created_at)->diffForHumans() }}
                                        </div>

                                        {{-- ✅ Contenido de la observación, si existe --}}
                                        @if(isset($n->data['contenido']))
                                            <div class="mt-1 text-sm text-gray-600 italic truncate">
                                                "{{ $n->data['contenido'] }}"
                                            </div>
                                        @endif
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

        <!-- Contenido principal -->
        <main class="flex-1 overflow-y-auto p-4 md:p-6">
            @yield('content')
        </main>
    </div>
</div>

<!-- Botón de ayuda flotante -->
<button onclick="introJs().start()"
        class="fixed bottom-6 right-6 bg-blue-600 hover:bg-blue-700 text-white w-12 h-12 md:w-auto md:px-4 md:py-2 rounded-full shadow-lg z-50 flex items-center justify-center">
    <i class="ri-question-line md:mr-1"></i>
    <span class="hidden md:inline">Tour</span>
</button>

<script src="https://unpkg.com/intro.js/minified/intro.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const sidebar = document.getElementById('sidebar');
        const sidebarOverlay = document.getElementById('sidebarOverlay');
        const mobileToggle = document.getElementById('sidebarToggle');
        const desktopToggle = document.getElementById('desktopSidebarToggle');
        const body = document.body;

        // Control del sidebar en móviles
        mobileToggle.addEventListener('click', () => {
            sidebar.classList.toggle('mobile-open');
            sidebarOverlay.classList.toggle('active');
            body.classList.toggle('sidebar-open');
        });

        // Cerrar sidebar al hacer clic en el overlay
        sidebarOverlay.addEventListener('click', () => {
            sidebar.classList.remove('mobile-open');
            sidebarOverlay.classList.remove('active');
            body.classList.remove('sidebar-open');
        });

        // Control del sidebar en desktop
        desktopToggle.addEventListener('click', () => {
            sidebar.classList.toggle('w-64');
            sidebar.classList.toggle('w-20');
            sidebar.classList.toggle('sidebar-collapsed');
        });

        // Control del modal de notificaciones
        const notificacionesBtn = document.getElementById('notificacionesBtn');
        const notificacionesModal = document.getElementById('notificacionesModal');
        let modalAbierto = false;

        notificacionesBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            modalAbierto = !modalAbierto;
            
            if (modalAbierto) {
                notificacionesModal.classList.remove('hidden');
                marcarNotificacionesComoLeidas();
            } else {
                notificacionesModal.classList.add('hidden');
            }
        });

        document.addEventListener('click', function(e) {
            if (modalAbierto && !notificacionesModal.contains(e.target) && e.target !== notificacionesBtn) {
                notificacionesModal.classList.add('hidden');
                modalAbierto = false;
            }
        });

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
                    const badge = document.querySelector('.absolute.-top-1.-right-1.bg-red-500');
                    if(badge) {
                        badge.remove();
                    }
                }
            });
        }

        // Ajustar el tamaño del sidebar al cargar en móviles
        function ajustarSidebar() {
            if (window.innerWidth < 768) {
                sidebar.classList.remove('w-64', 'w-20', 'sidebar-collapsed');
            } else {
                // Estado inicial del sidebar en desktop
                sidebar.classList.add('w-64');
                sidebar.classList.remove('mobile-open', 'sidebar-collapsed');
            }
        }

        // Ejecutar al cargar y al cambiar el tamaño de la ventana
        ajustarSidebar();
        window.addEventListener('resize', ajustarSidebar);
    });
</script>

</body>
</html>