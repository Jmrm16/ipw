@extends('layouts.app-modern')

@section('title', 'Documentación de Cumplimiento')

@section('content')
<div class="p-6">

    {{-- Encabezado --}}
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-sky-900 tracking-tight flex items-center gap-3">
            <i class="ri-folder-upload-line text-4xl text-sky-700"></i>
            Documentación para Validación de Cumplimiento
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

    {{-- Sección de carga --}}
    <section class="mb-12">
        <h2 class="text-2xl font-semibold text-slate-800 mb-6 flex items-center gap-2 border-b pb-2">
            <i class="ri-archive-2-line text-xl text-sky-600"></i>
            Carga de Documentos Requeridos
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach ($documentosCumplimiento as $tipo => $label)
                {!! $renderCard($tipo, $label) !!}
            @endforeach
        </div>
    </section>

</div>
@endsection
