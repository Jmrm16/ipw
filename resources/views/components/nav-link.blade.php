@props(['route', 'icon', 'label'])

@php
    $active = request()->routeIs($route);
@endphp

<a href="{{ route($route) }}"
   class="flex items-center gap-3 px-4 py-2 rounded text-sm font-medium transition
          {{ $active ? 'bg-blue-100 text-blue-600' : 'text-gray-700 hover:bg-gray-100' }}">
    <i class="ri-{{ $icon }} text-lg"></i>
    <span>{{ $label }}</span>
</a>
