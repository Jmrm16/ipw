@extends('layouts.app-modern')

@section('title', 'Documentación de Cumplimiento')

@section('content')
<div class="p-6">

    {{-- Encabezado --}}
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-blue-800 flex items-center gap-2">
            <i class="ri-folder-upload-line text-3xl"></i>
            Documentación Requerida para Cumplimiento Contractual
        </h1>
    </div>

    {{-- Instrucción al usuario --}}
    <div class="bg-yellow-50 border-l-4 border-yellow-400 text-yellow-800 p-4 rounded-md shadow-sm mb-6">
        Para continuar con el proceso de validación de tu solicitud de póliza de cumplimiento, por favor adjunta todos los documentos solicitados. 
        Asegúrate de que cada archivo esté legible, actualizado y en formato PDF o imagen.
    </div>

    @php
        $documentosCumplimiento = [
            'contrato' => 'Contrato firmado',
            'cedula_representante' => 'Cédula del Representante Legal',
            'camara_comercio' => 'Cámara de Comercio o Personería Jurídica (vigencia no mayor a 30 días)',
            'rut_actualizado' => 'RUT actualizado',
            'estados_financieros' => 'Estados Financieros firmados con notas contables y tarjeta profesional del contador',
            'experiencia_certificada' => 'Certificados de experiencia / actas de entrega / relación de contratos similares',
            'formulario_sarlaft' => 'Formulario SARLAFT firmado',
        ];

        $renderCard = function ($tipo, $label) use ($formulario, $documentos) {
            return view('components.documento-card', compact('tipo', 'label', 'formulario', 'documentos'))->render();
        };
    @endphp

    {{-- Tarjetas de carga de documentos --}}
    <div class="mb-10">
        <h2 class="text-xl font-semibold text-gray-700 mb-4 border-b pb-2 flex items-center gap-2">
            <i class="ri-archive-line"></i> Carga de Documentos Requeridos
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            @foreach ($documentosCumplimiento as $tipo => $label)
                {!! $renderCard($tipo, $label) !!}
            @endforeach
        </div>
    </div>

</div>
@endsection
