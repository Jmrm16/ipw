<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Panel IPW')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind + RemixIcon -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet">
    
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
        <div class="p-5 border-b border-gray-100 flex items-center gap-3">
            <div class="bg-blue-500 text-white p-2 rounded-lg">
                <i class="ri-shield-user-line text-xl"></i>
            </div>
            <div class="flex flex-col overflow-hidden">
                <h1 class="text-lg font-bold text-gray-800 sidebar-label">IPW</h1>
                <p class="text-xs text-gray-500 mt-1 sidebar-label truncate">{{ Auth::user()->name }}</p>
            </div>
        </div>

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
            <button id="sidebarToggle" class="text-gray-600 hover:text-blue-500 focus:outline-none transition-colors">
                <i class="ri-menu-line text-2xl"></i>
            </button>
            <h2 class="text-lg font-semibold">@yield('title', 'Panel')</h2>
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

</body>
</html>
