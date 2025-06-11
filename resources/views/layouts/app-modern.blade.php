<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Panel IPW')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind y Remixicon -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet">
</head>
<body class="bg-gray-50 font-sans text-gray-800">

<div class="grid grid-cols-[auto_1fr] min-h-screen transition-all duration-300" id="layout">
    <!-- Sidebar -->
    <aside id="sidebar" class="bg-white w-64 transition-all duration-300 shadow-md flex flex-col">
        <div class="p-6 border-b">
            <h1 class="text-xl font-bold text-primary">IPW</h1>
            <p class="text-sm text-gray-500 mt-1">{{ Auth::user()->name }}</p>
        </div>

        <nav class="p-4 space-y-1 flex-1">
            <x-nav-link route="dashboard" icon="home-5" label="Inicio" />
            <x-nav-link route="perfil.show" icon="user-line" label="Perfil" />
            <x-nav-link route="documentos.index" icon="folder-line" label="Documentos" />
        </nav>

        <form method="POST" action="{{ route('logout') }}" class="p-4 border-t">
            @csrf
            <button class="w-full flex items-center justify-center gap-2 py-2 px-4 text-red-500 border border-red-200 rounded hover:bg-red-50 transition">
                <i class="ri-logout-box-r-line"></i> Salir
            </button>
        </form>
    </aside>

    <!-- Contenido principal -->
    <div class="flex flex-col overflow-hidden">
        <header class="h-16 px-6 flex items-center justify-between bg-white border-b shadow-sm">
            <button id="sidebarToggle" class="text-gray-600 hover:text-primary focus:outline-none">
                <i class="ri-menu-line text-2xl"></i>
            </button>
            <h2 class="text-lg font-semibold">@yield('title', 'Panel')</h2>
        </header>

        <main class="flex-1 overflow-y-auto p-6 bg-gray-50">
            @yield('content')
        </main>
    </div>
</div>

<script>
    const sidebar = document.getElementById('sidebar');
    const layout = document.getElementById('layout');
    const toggle = document.getElementById('sidebarToggle');

    toggle.addEventListener('click', () => {
        sidebar.classList.toggle('w-64');
        sidebar.classList.toggle('w-20');

        // Si el ancho cambia, también podrías agregar clases a los íconos o texto si deseas esconder el texto en modo colapsado
    });
</script>

</body>
</html>
