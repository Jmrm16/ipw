@extends('layouts.app-modern')

@section('title', 'Documentos Cumplimiento')

@section('content')
<div class="p-6">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-blue-700 flex items-center gap-2">
            <i class="ri-folder-upload-line text-3xl"></i>
            Documentos para Cumplimiento Contractual
        </h1>
    </div>

    <div class="bg-yellow-50 border border-yellow-200 text-yellow-800 p-4 rounded-lg mb-6">
        Asegúrate de subir todos los documentos requeridos para validar tu solicitud de póliza de cumplimiento.
    </div>

    @php
        $documentosCumplimiento = [
            'contrato' => 'Contrato firmado',
            'cedula_representante' => 'Cédula del Representante Legal',
            'camara_comercio' => 'Cámara de Comercio / Personería Jurídica',
            'rut_actualizado' => 'RUT Actualizado',
            'estados_financieros' => 'Estados Financieros con Notas y Tarjeta Profesional del Contador',
            'experiencia_certificada' => 'Experiencia Certificada / Actas / Contratos Similares',
        ];

        $renderCard = function ($tipo, $label) use ($formulario, $documentos) {
            return view('components.documento-card', compact('tipo', 'label', 'formulario', 'documentos'))->render();
        };
    @endphp

    <div class="mb-10">
        <h2 class="text-xl font-semibold text-gray-800 mb-4 border-b pb-2 flex items-center gap-2">
            <i class="ri-archive-line"></i> Documentos Requeridos para Empresas o Personas Jurídicas
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @foreach ($documentosCumplimiento as $tipo => $label)
                {!! $renderCard($tipo, $label) !!}
            @endforeach
        </div>
    </div>
</div>
@endsection
