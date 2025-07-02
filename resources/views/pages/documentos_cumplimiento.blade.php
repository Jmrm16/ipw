@extends('layouts.app-modern')

@section('title', 'Documentación de Cumplimiento')

@section('content')
<div class="p-6">

    {{-- Encabezado --}}
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-sky-900 tracking-tight flex items-center gap-3">
            <i class="ri-folder-upload-line text-4xl text-sky-700"></i>
             Documentación para La Expedición de póliza de cumplimiento
        </h1>
        <p class="text-gray-600 mt-2 text-base max-w-3xl">
            Adjunta todos los documentos requeridos para validar tu solicitud de póliza de cumplimiento. Asegúrate de que estén legibles, actualizados y en formato PDF o imagen (JPG, PNG).
        </p>
    </div>

    {{-- Aviso importante --}}
    <div class="bg-yellow-100/90 border-l-4 border-yellow-500 text-yellow-900 p-5 rounded-lg shadow-sm mb-8 flex items-start gap-3">
        <i class="ri-error-warning-line text-2xl mt-1"></i>
        <div>
            <p class="font-medium text-lg mb-1">Importante:</p>
            <p class="text-sm leading-relaxed">
                Los documentos deben tener vigencia no mayor a 30 días cuando aplique, y deben estar firmados y completos para continuar con el proceso.
            </p>
        </div>
    </div>

    @php
        $documentosCumplimiento = [
            'contrato' => 'Contrato firmado',
            'cedula_representante' => 'Cédula',
            'camara_comercio' => 'Cámara de Comercio o Personería Jurídica (vigencia no mayor a 30 días)',
            'rut_actualizado' => 'RUT actualizado',
            'estados_financieros' => 'Información financiera (Declaración de renta o estados financieros del año anterior)',
            'experiencia_certificada' => 'Certificados de experiencia / actas de entrega / relación de contratos similares',
            'formulario_sarlaft' => 'Formulario SARLAFT firmado',
        ];
    @endphp

    {{-- Formulario de subida masiva --}}
    <section class="mb-10">
        <h2 class="text-xl font-semibold text-slate-800 mb-4 flex items-center gap-2">
            <i class="ri-upload-cloud-line text-lg text-blue-600"></i>
            Subir Todos los Documentos de una vez
        </h2>
        <div x-data="{
            uploading: false,
            submit() {
                this.uploading = true;
                const form = this.$refs.massUploadForm;
                
                // Verificar que al menos un archivo haya sido seleccionado
                const fileInputs = form.querySelectorAll('input[type=file]');
                let hasFiles = false;
                
                fileInputs.forEach(input => {
                    if (input.files.length > 0) {
                        hasFiles = true;
                    }
                });
                
                if (!hasFiles) {
                    alert('Por favor selecciona al menos un documento para subir');
                    this.uploading = false;
                    return;
                }
                
                form.submit();
            }
        }" class="bg-white rounded-xl shadow-md p-6">
            <form x-ref="massUploadForm" action="{{ route('documentos.store', $formulario->id) }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @csrf
                @foreach ($documentosCumplimiento as $tipo => $label)
                    @php
                        $documento = $documentos->has($tipo) ? $documentos[$tipo] : null;
                        $esHeredado = $documento && is_null($documento->formulario_medico_id);
                    @endphp
                    
                    <div class="relative border rounded-lg p-3 {{ $documento ? 'border-green-500' : 'border-gray-300' }}">
                        <div class="flex justify-between items-center mb-2">
                            <label class="block text-sm font-medium text-gray-700">{{ $label }}</label>
                            @if ($documento)
                                <span class="text-xs text-green-600 bg-green-100 px-2 py-0.5 rounded-full">
                                    <i class="ri-check-line mr-1"></i> Subido
                                </span>
                            @endif
                        </div>
                        
                        <input type="file" 
                               name="archivos[{{ $tipo }}]" 
                               accept=".pdf,.jpg,.jpeg,.png" 
                               class="block w-full text-sm text-gray-500
                                      file:mr-4 file:py-2 file:px-4
                                      file:rounded-md file:border-0
                                      file:text-sm file:font-semibold
                                      file:bg-blue-50 file:text-blue-700
                                      hover:file:bg-blue-100" />
                        
                        @if ($documento)
                            <div class="mt-2 flex justify-between items-center">
                                <a href="{{ asset('storage/' . $documento->archivo) }}" 
                                   target="_blank"
                                   class="text-xs text-blue-600 hover:underline flex items-center">
                                    <i class="ri-eye-line mr-1"></i> Ver documento
                                </a>
                                <span class="text-xs text-gray-500">
                                    <i class="ri-time-line mr-1"></i>
                                    {{ \Carbon\Carbon::parse($documento->updated_at)->diffForHumans() }}
                                </span>
                            </div>
                        @endif
                    </div>
                @endforeach
                
                <div class="md:col-span-2 flex justify-end mt-4">
                    <button type="button" 
                            @click="submit"
                            :disabled="uploading"
                            class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition">
                        <template x-if="uploading">
                            <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </template>
                        <template x-if="!uploading">
                            <i class="ri-upload-cloud-line mr-2"></i>
                        </template>
                        <span x-text="uploading ? 'Subiendo...' : 'Subir documentos seleccionados'"></span>
                    </button>
                </div>
            </form>
        </div>
    </section>

    {{-- Sección de carga individual (tarjetas) --}}


</div>
@endsection