@extends('layouts.app-modern')

@section('title', 'Documentos Requeridos')

@section('content')
<div class="p-6">
    {{-- Encabezado principal --}}
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-blue-700 flex items-center gap-2">
            <i class="ri-folder-upload-line text-3xl"></i>
            Subida de Documentos Requeridos
        </h1>
    </div>

    {{-- Instrucción general --}}
    <div class="bg-blue-50 border border-blue-200 text-blue-800 p-4 rounded-lg mb-6">
        Asegúrate de haber firmado y huellado el <strong>Formulario Médico</strong> y el <strong>Formulario SARLAFT</strong> antes de continuar.
    </div>

    {{-- Botones PDF --}}
    <div class="flex flex-wrap gap-4 mb-8">
        <a href="{{ route('formulario1.pdf', $formulario->id) }}" target="_blank"
           class="flex items-center gap-2 bg-white border border-blue-500 text-blue-600 px-4 py-2 rounded-lg hover:bg-blue-50 transition">
            <i class="ri-file-list-3-line"></i> Ver Formulario Médico
        </a>
        <a href="{{ route('formulario2.pdf', $formulario->id) }}" target="_blank"
           class="flex items-center gap-2 bg-green-100 text-green-700 border border-green-400 px-4 py-2 rounded-lg hover:bg-green-200 transition">
            <i class="ri-shield-check-line"></i> Ver Formulario SARLAFT
        </a>
    </div>

    {{-- Secciones --}}
    @php
        $formularios_firmados = [
            'formulario_sarlaft' => 'Formulario SARLAFT Firmado',
            'formulario_medico' => 'Formulario Médico Firmado',
        ];

        $documentos_generales = [
            'cedula' => 'Cédula',
            'rut' => 'RUT',
            'diploma' => 'Diploma',
            'tarjeta_profesional' => 'Tarjeta Profesional',
        ];

        $renderCard = function ($tipo, $label) use ($formulario, $documentos) {
            return view('components.documento-card', compact('tipo', 'label', 'formulario', 'documentos'))->render();
        };
    @endphp

    {{-- Formularios Firmados --}}
    <div class="mb-10">
        <h2 class="text-xl font-semibold text-gray-800 mb-4 border-b pb-2 flex items-center gap-2">
            <i class="ri-file-edit-line"></i> Formularios Firmados
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @foreach ($formularios_firmados as $tipo => $label)
                {!! $renderCard($tipo, $label) !!}
            @endforeach
        </div>
    </div>

    {{-- Documentos Generales --}}
    <div class="mb-10">
        <h2 class="text-xl font-semibold text-gray-800 mb-4 border-b pb-2 flex items-center gap-2">
            <i class="ri-archive-line"></i> Documentos Personales
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @foreach ($documentos_generales as $tipo => $label)
                {!! $renderCard($tipo, $label) !!}
            @endforeach
        </div>
    </div>
</div>
@endsection
