@props(['route', 'icon', 'label'])

@php
    $active = request()->routeIs($route);
@endphp

<a href="{{ route($route) }}"
   class="flex items-center gap-3 px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200
          {{ $active ? 'bg-blue-100 text-blue-700' : 'text-gray-700 hover:bg-gray-100 hover:text-blue-600' }}">
    <i class="{{ $icon }} text-lg"></i>
    <span class="sidebar-label">{{ $label }}</span>
    
</a>
