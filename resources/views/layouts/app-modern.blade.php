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
        /* Permite ver el texto completo de las notificaciones */
        .notificacion-mensaje {
            white-space: pre-line;
            word-break: break-word;
            display: block;
        }
    </style>
</head>
<body class="bg-gray-50 font-sans text-gray-800" x-data="{
    sidebarCollapsed: false,
    mobileSidebarOpen: false,
    notificationsOpen: false,
    markNotificationsAsRead() {
        fetch('{{ route('notificaciones.marcar-leidas') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({})
        }).then(response => {
            if(response.ok) {
                const badge = document.querySelector('.notification-badge');
                if(badge) {
                    badge.remove();
                }
            }
        });
    }
}" x-init="
    // Ajustar estado inicial del sidebar según el tamaño de pantalla
    if (window.innerWidth < 768) {
        sidebarCollapsed = false;
        mobileSidebarOpen = false;
    } else {
        // Opcional: puedes cargar el estado desde localStorage
        sidebarCollapsed = localStorage.getItem('sidebarCollapsed') === 'true';
    }
    
    // Manejar cambios de tamaño de pantalla
    window.addEventListener('resize', () => {
        if (window.innerWidth < 768) {
            mobileSidebarOpen = false;
            sidebarCollapsed = false;
        }
    });
">

<!-- Overlay para móviles -->
<div x-show="mobileSidebarOpen" @click="mobileSidebarOpen = false" 
    class="fixed inset-0 bg-black bg-opacity-50 z-40 md:hidden transition-opacity duration-300"
    x-transition:enter="ease-out duration-300"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="ease-in duration-200"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0">
</div>

<div class="flex flex-col md:flex-row h-screen overflow-hidden">

    <!-- Sidebar -->
    <aside 
        x-bind:class="{
            'translate-x-0': mobileSidebarOpen || !(window.innerWidth < 768),
            '-translate-x-full': !mobileSidebarOpen && window.innerWidth < 768,
            'md:w-20': sidebarCollapsed,
            'md:w-64': !sidebarCollapsed
        }"
        class="fixed md:relative z-50 w-64 bg-white shadow-md flex flex-col h-full transition-all duration-300 ease-in-out transform md:transform-none"
        :class="{'overflow-y-auto': mobileSidebarOpen || !sidebarCollapsed}">
        
        <a href="{{ url('/') }}" title="Ir a Inicio" class="block">
            <div class="p-4 border-b border-gray-100 flex items-center gap-3">
                <div class="bg-blue-500 p-2 rounded-lg">
                    <img src="https://firebasestorage.googleapis.com/v0/b/spotify-clone-db93c.firebasestorage.app/o/logoB.png?alt=media&token=79427397-a113-4f70-ad28-30646f37feee" alt="Logo IPW" class="h-8 w-8 object-contain">
                </div>
                <div class="flex flex-col overflow-hidden" x-show="!sidebarCollapsed || (window.innerWidth < 768)">
                    <h1 class="text-lg font-bold text-gray-800">IPW</h1>
                    <p class="text-xs text-gray-500 mt-1 truncate">{{ Auth::user()->name }}</p>
                </div>
            </div>
        </a>

        <!-- Menú -->
        <nav class="p-2 space-y-1 flex-1 overflow-y-auto">
            <x-nav-link route="dashboard" icon="ri-home-5-line" label="Inicio" :collapsed="$sidebarCollapsed ?? false" />
            <x-nav-link route="perfil.show" icon="ri-user-line" label="Perfil" :collapsed="$sidebarCollapsed ?? false" />
            <x-nav-link route="documentos.index" icon="ri-folder-line" label="Documentos" :collapsed="$sidebarCollapsed ?? false" />
        </nav>

        <!-- Logout -->
        <form method="POST" action="{{ route('logout') }}" class="p-3 border-t border-gray-100">
            @csrf
            <button class="w-full flex items-center justify-center gap-2 py-2 px-3 text-red-500 hover:bg-red-50 rounded-lg transition-all duration-200">
                <i class="ri-logout-box-r-line"></i>
                <span x-show="!sidebarCollapsed || (window.innerWidth < 768)">Salir</span>
            </button>
        </form>
    </aside>

    <!-- Main -->
    <div class="flex-1 flex flex-col overflow-hidden" 
         :class="{
             'md:ml-20': sidebarCollapsed,
             'md:ml-64': !sidebarCollapsed
         }"
         x-bind:style="window.innerWidth < 768 ? '' : {transition: 'margin-left 300ms ease-in-out'}">
        
        <!-- Header -->
        <header class="h-16 px-4 md:px-6 flex items-center justify-between bg-white border-b shadow-sm sticky top-0 z-30">
            <div class="flex items-center gap-4">
                <!-- Botón para mostrar/ocultar sidebar en móviles -->
                <button @click="mobileSidebarOpen = !mobileSidebarOpen" class="text-gray-600 hover:text-blue-500 focus:outline-none transition-colors md:hidden">
                    <i class="ri-menu-line text-2xl"></i>
                </button>
                <!-- Botón para colapsar/expandir sidebar en desktop -->
                <button @click="sidebarCollapsed = !sidebarCollapsed; localStorage.setItem('sidebarCollapsed', sidebarCollapsed)" 
                        class="text-gray-600 hover:text-blue-500 focus:outline-none transition-colors hidden md:block">
                    <i class="ri-menu-line text-2xl"></i>
                </button>
                <h2 class="text-lg font-semibold truncate max-w-xs">@yield('title', 'Panel')</h2>
            </div>

            <!-- Notificaciones -->
            <div class="relative">
                <button @click="notificationsOpen = !notificationsOpen; if(notificationsOpen) markNotificationsAsRead()"
                        class="relative p-2 rounded-full bg-white shadow hover:bg-blue-50 transition z-50">
                    <i class="ri-notification-3-line text-2xl text-blue-600"></i>
                    @if($notificaciones->where('leida', false)->count() > 0)
                        <span class="notification-badge absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full px-1.5 py-0.5">
                            {{ $notificaciones->where('leida', false)->count() }}
                        </span>
                    @endif
                </button>

                <!-- Dropdown modal -->
                <div x-show="notificationsOpen" 
                     @click.away="notificationsOpen = false"
                     class="absolute top-12 right-0 w-80 md:w-96 bg-white rounded-lg shadow-lg ring-1 ring-gray-200 z-40"
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 translate-y-1"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     x-transition:leave="transition ease-in duration-150"
                     x-transition:leave-start="opacity-100 translate-y-0"
                     x-transition:leave-end="opacity-0 translate-y-1">
                    <div class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-t-lg flex items-center gap-2">
                        <i class="ri-notification-3-line"></i> Notificaciones
                    </div>
                    @php
                        \Carbon\Carbon::setLocale('es');
                    @endphp
                    <ul class="max-h-80 overflow-y-auto divide-y">
                        @forelse($notificaciones as $n)
                            <li class="p-3 hover:bg-gray-50 {{ $n->leida ? 'text-gray-500' : 'text-gray-800 font-semibold' }}">
                                <div class="flex items-start gap-2">
                                    <i class="ri-information-line text-blue-500 mt-1"></i>
                                    <div class="flex-1 min-w-0">
                                        <p class="notificacion-mensaje">{{ $n->mensaje }}</p>
                                        <div class="text-xs text-gray-400">
                                            {{ \Carbon\Carbon::parse($n->created_at)->diffForHumans() }}
                                        </div>
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

</body>
</html>