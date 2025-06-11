@php
    $documento = $documentos->has($tipo) ? $documentos[$tipo] : null;
@endphp

<div x-data="{ uploading: false, submit() { uploading = true; $refs.formularioUpload.submit(); } }"
     class="relative w-full rounded-lg border {{ $documento ? 'border-green-500' : 'border-gray-300' }}
            p-4 shadow-sm bg-white hover:shadow-md transition-all duration-300">

    {{-- Cabecera --}}
    <div class="flex items-center gap-2 mb-2 text-sm font-semibold text-gray-700">
        <i class="ri-file-text-line text-lg text-gray-500"></i>
        {{ $label }}
    </div>

    {{-- Formulario --}}
    <form x-ref="formularioUpload"
          @submit.prevent="submit"
          action="{{ route('documentos.store', $formulario->id) }}"
          method="POST"
          enctype="multipart/form-data"
          class="flex flex-col sm:flex-row items-center gap-2 w-full sm:w-auto">
        @csrf
        <input type="hidden" name="tipo" value="{{ $tipo }}">

        {{-- Input archivo --}}
        <input type="file"
               name="archivo"
               accept=".pdf,.jpg,.jpeg,.png"
               required
               class="file-input file-input-sm file-input-bordered w-full max-w-xs" />

        {{-- Botón subir --}}
        <button type="submit"
                :disabled="uploading"
                class="btn btn-sm {{ $documento ? 'btn-outline-success' : 'btn-primary' }} flex items-center gap-1">
            <template x-if="uploading">
                <svg class="animate-spin h-4 w-4 text-white" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10"
                            stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor"
                          d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                </svg>
            </template>
            <template x-if="!uploading">
                <i class="ri-upload-cloud-line"></i>
            </template>
            <span>{{ $documento ? 'Reemplazar' : 'Subir' }}</span>
        </button>

        {{-- Botón ver --}}
        @if ($documento)
            <a href="{{ asset('storage/' . $documento->archivo) }}"
               target="_blank"
               class="btn btn-sm btn-outline-secondary flex items-center justify-center"
               title="Ver Documento">
                <i class="ri-eye-line"></i>
            </a>
        @endif
    </form>

    {{-- Icono de documento subido --}}
    @if ($documento)
        <div class="absolute top-2 right-2 text-green-500">
            <i class="ri-check-double-fill text-xl"></i>
        </div>

        <div class="text-xs text-gray-400 text-right mt-2">
            <i class="ri-time-line mr-1"></i>
            Última subida: {{ \Carbon\Carbon::parse($documento->updated_at)->diffForHumans() }}
        </div>
    @endif
</div>
