@extends('layouts.app')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

@section('title', 'Formulario de Responsabilidad Civil Profesional para Médicos')
@section('content')

<!-- Encabezado de la Página -->
<div class="container-fluid page-header d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5 mb-5">
    <h1 class="display-4 text-white mb-3 mt-0 mt-lg-5">Poliza de responsabilidad civil para profesionales de la salud</h1>
    <div class="d-inline-flex text-white">
        <p class="m-0"><a class="text-white" href="{{ url('/') }}">Inicio</a></p>
        <p class="m-0 px-2">/</p>
        <p class="m-0">Formulario</p>
    </div>
</div>

<div class="container mt-5">
    <div class="card shadow p-4">
        <h2 class="text-center mb-4">Complete sus Datos</h2>
        @if(Auth::check())
        <div class="alert alert-success text-center">
            Usuario autenticado: {{ Auth::user()->name }}
        </div>
        @else
        <div class="alert alert-danger text-center">
            No estás autenticado. Algunos datos pueden no guardarse correctamente.
        </div>
        @endif

        <form action="{{ route('formulario.store') }}" method="POST">
            @csrf

            <!-- Fecha, Ciudad y Sucursal -->
            <div class="mb-3">
                <label class="form-label">Fecha:</label>
                <input type="text" class="form-control" name="fecha" value="{{ date('Y-m-d') }}" readonly>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label class="form-label">Ciudad:</label>
                    <input type="text" class="form-control" name="ciudad" value="MAICAO" readonly>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Sucursal:</label>
                    <input type="text" class="form-control" name="sucursal" value="SANTA MARTA" readonly>
                </div>
            </div>
            
            <!-- Tipo de Proceso -->
            <input type="hidden" name="tipo_proceso" value="poliza medica">

<!-- Tipo de Solicitud -->
<div class="mb-3">
    <label class="form-label d-flex align-items-center">
        Tipo de Solicitud:
        <button type="button" class="btn btn-sm btn-outline-info ms-2 p-0 border-0" data-bs-toggle="modal" data-bs-target="#modalTipoSolicitud">
            <i class="bi bi-info-circle"></i> Más información
        </button>
    </label>
    <select class="form-select" name="tipo_solicitud" required>
        <option value="VINCULACION">VINCULACIÓN</option>
        <option value="RENOVACION">RENOVACIÓN</option>
        <option value="ACTUALIZACIÓN">ACTUALIZACIÓN</option>
    </select>
</div>

<!-- Modal para Tipo de Solicitud -->
<div class="modal fade" id="modalTipoSolicitud" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-light p-3">
        <h5 class="modal-title fs-6">Información sobre Tipo de Solicitud</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-3">
        <p>Seleccione el tipo de solicitud que corresponde:</p>
        <ul>
          <li><strong>VINCULACIÓN:</strong> Si es la primera vez que adquiere esta póliza</li>
          <li><strong>RENOVACIÓN:</strong> Si ya ha tenido esta póliza anteriormente y desea renovarla</li>
          <li><strong>ACTUALIZACIÓN:</strong> Si necesita actualizar los datos de su póliza existente</li>
        </ul>
        <!-- VIDEO MÁS GRANDE -->
        <div style="width:100%;max-width:700px;margin:auto;">
          <iframe
            width="100%"
            height="350"
            style="border-radius: 12px;"
            src="https://www.youtube.com/embed/LWHHJcaQiH4"
            title="Tipo solicitud"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen
          ></iframe>
        </div>
      </div>
      <div class="modal-footer bg-light p-2 justify-content-start">
        <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Entendido</button>
      </div>
    </div>
  </div>
</div>


            <!-- Clase de Vinculación -->
            <div class="row">
                <div class="col-md-6">
                    <label class="form-label d-flex align-items-center">
                        Clase de vinculación:
                        <button type="button" class="btn btn-sm btn-outline-info ms-2 p-0 border-0" data-bs-toggle="modal" data-bs-target="#modalClaseVinculacion">
                            <i class="bi bi-info-circle"></i> Más información
                        </button>
                        
                    </label>
                    <input type="text" class="form-control" name="clase_vinculacion" value="TOMADOR" readonly>
                </div>
            </div>

            <!-- Modal para Clase de Vinculación -->
            <div class="modal fade" id="modalClaseVinculacion" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-light p-3">
                            <h5 class="modal-title fs-6">Información sobre Clase de Vinculación</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>El tomador es la persona que contrata el seguro y asume las obligaciones derivadas del contrato, como el pago de la prima.</p>
                        </div>
                        <div class="modal-footer bg-light p-2 justify-content-start">
                            <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Entendido</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Información Personal -->
            <div class="row">
                <div class="col-md-6">
                    <label class="form-label d-flex align-items-center">
                        Primer Apellido:
                        <button type="button" class="btn btn-sm btn-outline-info ms-2 p-0 border-0" data-bs-toggle="modal" data-bs-target="#modalPrimerApellido">
                            <i class="bi bi-info-circle"></i> Más información
                        </button>
                    </label>
                    <input type="text" class="form-control" name="primer_apellido" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Segundo Apellido:</label>
                    <input type="text" class="form-control" name="segundo_apellido">
                </div>
            </div>

            <!-- Modal para Primer Apellido -->
            <div class="modal fade" id="modalPrimerApellido" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-light p-3">
                            <h5 class="modal-title fs-6">Información sobre Primer Apellido</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Ingrese su primer apellido tal como aparece en su documento de identidad.</p>
                        </div>
                        <div class="modal-footer bg-light p-2 justify-content-start">
                            <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Entendido</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label d-flex align-items-center">
                    Nombres:
                    <button type="button" class="btn btn-sm btn-outline-info ms-2 p-0 border-0" data-bs-toggle="modal" data-bs-target="#modalNombres">
                        <i class="bi bi-info-circle"></i> Más información
                    </button>
                </label>
                <input type="text" class="form-control" name="nombres" required>
            </div>

            <!-- Modal para Nombres -->
            <div class="modal fade" id="modalNombres" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-light p-3">
                            <h5 class="modal-title fs-6">Información sobre Nombres</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Ingrese sus nombres completos tal como aparecen en su documento de identidad.</p>
                        </div>
                        <div class="modal-footer bg-light p-2 justify-content-start">
                            <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Entendido</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tipo de Documento y Número de Identificación -->
            <div class="row">
                <div class="col-md-6">
                    <label class="form-label d-flex align-items-center">
                        Tipo de Documento:
                        <button type="button" class="btn btn-sm btn-outline-info ms-2 p-0 border-0" data-bs-toggle="modal" data-bs-target="#modalTipoDocumento">
                            <i class="bi bi-info-circle"></i> Más información
                        </button>
                    </label>
                    <select class="form-select" name="tipo_documento" required>
                        <option value="C.C.">Cédula de Ciudadanía</option>
                        <option value="C.E.">Cédula de Extranjería</option>
                        <option value="NUIP">NUIP</option>
                        <option value="T.I.">Tarjeta de Identidad</option>
                        <option value="PASAPORTE">Pasaporte</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label d-flex align-items-center">
                        Número de Identificación:
                        <button type="button" class="btn btn-sm btn-outline-info ms-2 p-0 border-0" data-bs-toggle="modal" data-bs-target="#modalNumeroIdentificacion">
                            <i class="bi bi-info-circle"></i> Más información
                        </button>
                    </label>
                    <input type="text" class="form-control" name="numero_identificacion" required>
                </div>
            </div>

            <!-- Modal para Tipo de Documento -->
            <div class="modal fade" id="modalTipoDocumento" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-light p-3">
                            <h5 class="modal-title fs-6">Información sobre Tipo de Documento</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Seleccione el tipo de documento de identidad con el que se va a registrar:</p>
                            <ul>
                                <li><strong>C.C.:</strong> Cédula de Ciudadanía</li>
                                <li><strong>C.E.:</strong> Cédula de Extranjería</li>
                                <li><strong>NUIP:</strong> Número Único de Identificación Personal</li>
                                <li><strong>T.I.:</strong> Tarjeta de Identidad</li>
                                <li><strong>PASAPORTE:</strong> Pasaporte</li>
                            </ul>
                        </div>
                        <div class="modal-footer bg-light p-2 justify-content-start">
                            <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Entendido</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal para Número de Identificación -->
            <div class="modal fade" id="modalNumeroIdentificacion" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-light p-3">
                            <h5 class="modal-title fs-6">Información sobre Número de Identificación</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Ingrese su número de documento de identidad sin puntos ni comas.</p>
                            <div class="alert alert-warning p-2 small">
                                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                                Asegúrese de ingresar correctamente su número de identificación.
                            </div>
                        </div>
                        <div class="modal-footer bg-light p-2 justify-content-start">
                            <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Entendido</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Fecha de Expedición y Lugar de Expedición -->
            <div class="row">
                <div class="col-md-6">
                    <label class="form-label d-flex align-items-center">
                        Fecha de Expedición:
                        <button type="button" class="btn btn-sm btn-outline-info ms-2 p-0 border-0" data-bs-toggle="modal" data-bs-target="#modalFechaExpedicion">
                            <i class="bi bi-info-circle"></i> Más información
                        </button>
                    </label>
                    <input type="date" class="form-control" name="fecha_expedicion" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label d-flex align-items-center">
                        Lugar de Expedición:
                        <button type="button" class="btn btn-sm btn-outline-info ms-2 p-0 border-0" data-bs-toggle="modal" data-bs-target="#modalLugarExpedicion">
                            <i class="bi bi-info-circle"></i> Más información
                        </button>
                    </label>
                    <input type="text" class="form-control" name="lugar_expedicion" required>
                </div>
            </div>

            <!-- Modal para Fecha de Expedición -->
            <div class="modal fade" id="modalFechaExpedicion" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-light p-3">
                            <h5 class="modal-title fs-6">Información sobre Fecha de Expedición</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Ingrese la fecha en que fue expedido su documento de identidad.</p>
                        </div>
                        <div class="modal-footer bg-light p-2 justify-content-start">
                            <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Entendido</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal para Lugar de Expedición -->
            <div class="modal fade" id="modalLugarExpedicion" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-light p-3">
                            <h5 class="modal-title fs-6">Información sobre Lugar de Expedición</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Ingrese la ciudad y departamento donde fue expedido su documento de identidad.</p>
                            <p><strong>Ejemplo:</strong> Bogotá D.C.</p>
                        </div>
                        <div class="modal-footer bg-light p-2 justify-content-start">
                            <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Entendido</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Fecha de Nacimiento y Lugar de Nacimiento -->
            <div class="row">
                <div class="col-md-6">
                    <label class="form-label d-flex align-items-center">
                        Fecha de Nacimiento:
                        <button type="button" class="btn btn-sm btn-outline-info ms-2 p-0 border-0" data-bs-toggle="modal" data-bs-target="#modalFechaNacimiento">
                            <i class="bi bi-info-circle"></i> Más información
                        </button>
                    </label>
                    <input type="date" class="form-control" name="fecha_nacimiento" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label d-flex align-items-center">
                        Lugar de Nacimiento:
                        <button type="button" class="btn btn-sm btn-outline-info ms-2 p-0 border-0" data-bs-toggle="modal" data-bs-target="#modalLugarNacimiento">
                            <i class="bi bi-info-circle"></i> Más información
                        </button>
                    </label>
                    <input type="text" class="form-control" name="lugar_nacimiento" required>
                </div>
            </div>

            <!-- Modal para Fecha de Nacimiento -->
            <div class="modal fade" id="modalFechaNacimiento" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-light p-3">
                            <h5 class="modal-title fs-6">Información sobre Fecha de Nacimiento</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Ingrese su fecha de nacimiento tal como aparece en su documento de identidad.</p>
                        </div>
                        <div class="modal-footer bg-light p-2 justify-content-start">
                            <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Entendido</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal para Lugar de Nacimiento -->
            <div class="modal fade" id="modalLugarNacimiento" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-light p-3">
                            <h5 class="modal-title fs-6">Información sobre Lugar de Nacimiento</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Ingrese la ciudad y departamento donde nació.</p>
                            <p><strong>Ejemplo:</strong> Barranquilla, Atlántico</p>
                        </div>
                        <div class="modal-footer bg-light p-2 justify-content-start">
                            <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Entendido</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Nacionalidad 1 y Nacionalidad 2 -->
            <div class="row">
                <div class="col-md-6">
                    <label class="form-label d-flex align-items-center">
                        Nacionalidad 1:
                        <button type="button" class="btn btn-link btn-sm p-0 ms-2 text-info" data-bs-toggle="modal" data-bs-target="#modalNacionalidad1">
                            <i class="bi bi-info-circle"></i>
                        </button>
                    </label>
                    <input type="text" class="form-control" name="nacionalidad_1" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Nacionalidad 2:</label>
                    <input type="text" class="form-control" name="nacionalidad_2">
                </div>
            </div>

<!-- Modal para Nacionalidad 1 -->
<div class="modal fade" id="modalNacionalidad1" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-light p-3">
        <h5 class="modal-title fs-6">Información sobre Nacionalidad</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-3">
        <p>Ingrese su nacionalidad principal.</p>
        <div class="alert alert-info p-2 mt-2 small">
          <i class="bi bi-info-circle-fill me-2"></i>
          <strong>Ejemplo:</strong> Colombiano
        </div>
        <!-- VIDEO MÁS GRANDE -->
        <div style="width:100%;max-width:700px;margin:auto;">
          <iframe
            width="100%"
            height="350"
            style="border-radius: 12px;"
            src="https://www.youtube.com/embed/kInCQaKORBc"
            title="Tipo solicitud"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen
          ></iframe>
        </div>
      </div>
      <div class="modal-footer bg-light p-2 justify-content-start">
        <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Entendido</button>
      </div>
    </div>
  </div>
</div>


            <!-- Email y Celular -->
            <div class="row">
                <div class="col-md-6">
                    <label class="form-label d-flex align-items-center">
                        Email:
                        <button type="button" class="btn btn-link btn-sm p-0 ms-2 text-info" data-bs-toggle="modal" data-bs-target="#modalEmail">
                            <i class="bi bi-info-circle"></i>
                        </button>
                    </label>
                    <input type="email" class="form-control" name="email" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label d-flex align-items-center">
                        Celular:
                        <button type="button" class="btn btn-link btn-sm p-0 ms-2 text-info" data-bs-toggle="modal" data-bs-target="#modalCelular">
                            <i class="bi bi-info-circle"></i>
                        </button>
                    </label>
                    <input type="text" class="form-control" name="celular" required>
                </div>
            </div>

            <!-- Modal para Email -->
            <div class="modal fade" id="modalEmail" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-light p-3">
                            <h5 class="modal-title fs-6">Información sobre Email</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Ingrese una dirección de correo electrónico válida donde podamos contactarlo.</p>
                            <p><strong>Ejemplo:</strong> nombre@dominio.com</p>
                        </div>
                        <div class="modal-footer bg-light p-2 justify-content-start">
                            <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Entendido</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal para Celular -->
            <div class="modal fade" id="modalCelular" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-light p-3">
                            <h5 class="modal-title fs-6">Información sobre Celular</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Ingrese su número de celular incluyendo el código de área.</p>
                            <p><strong>Ejemplo:</strong> 3001234567</p>
                        </div>
                        <div class="modal-footer bg-light p-2 justify-content-start">
                            <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Entendido</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Departamento -->
            <div class="mb-3">
                <label class="form-label d-flex align-items-center">
                    Departamento:
                    <button type="button" class="btn btn-link btn-sm p-0 ms-2 text-info" data-bs-toggle="modal" data-bs-target="#modalDepartamento">
                        <i class="bi bi-info-circle"></i>
                    </button>
                </label>
                <select class="form-select" id="departamento" name="departamento" required>
                    <option value="">Seleccione un departamento</option>
                    <!-- Se llena dinámicamente con JS -->
                </select>
            </div>

            <!-- Modal para Departamento -->
            <div class="modal fade" id="modalDepartamento" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-light p-3">
                            <h5 class="modal-title fs-6">Información sobre Departamento</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Seleccione el departamento donde reside actualmente.</p>
                        </div>
                        <div class="modal-footer bg-light p-2 justify-content-start">
                            <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Entendido</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Ciudad/Municipio -->
            <div class="mb-3">
                <label class="form-label d-flex align-items-center">
                    Ciudad o Municipio:
                    <button type="button" class="btn btn-link btn-sm p-0 ms-2 text-info" data-bs-toggle="modal" data-bs-target="#modalCiudadResidencia">
                        <i class="bi bi-info-circle"></i>
                    </button>
                </label>
                <select class="form-select" id="ciudad_residencia" name="ciudad_residencia" required>
                    <option value="">Seleccione un municipio</option>
                    <!-- Se llena dinámicamente con JS -->
                </select>
            </div>

            <!-- Modal para Ciudad/Municipio -->
            <div class="modal fade" id="modalCiudadResidencia" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-light p-3">
                            <h5 class="modal-title fs-6">Información sobre Ciudad/Municipio</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Seleccione la ciudad o municipio donde reside actualmente.</p>
                        </div>
                        <div class="modal-footer bg-light p-2 justify-content-start">
                            <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Entendido</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Dirección -->
            <div class="mb-3">
                <label class="form-label d-flex align-items-center">
                    Dirección:
                    <button type="button" class="btn btn-link btn-sm p-0 ms-2 text-info" data-bs-toggle="modal" data-bs-target="#modalDireccion">
                        <i class="bi bi-info-circle"></i>
                    </button>
                </label>
                <input type="text" class="form-control" name="direccion" required>
            </div>

            <!-- Modal para Dirección -->
            <div class="modal fade" id="modalDireccion" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-light p-3">
                            <h5 class="modal-title fs-6">Información sobre Dirección</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Ingrese su dirección completa incluyendo calle, carrera, número, barrio, etc.</p>
                            <p><strong>Ejemplo:</strong> Calle 123 #45-67, Barrio El Prado</p>
                        </div>
                        <div class="modal-footer bg-light p-2 justify-content-start">
                            <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Entendido</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Título Profesional -->
            <div class="mb-3">
                <div class="d-flex align-items-center mb-1">
                    <label class="form-label mb-0">Título Profesional:</label>
                    <button class="btn btn-sm btn-outline-info ms-2 p-0 border-0" type="button" data-bs-toggle="modal" data-bs-target="#modalTituloProfesional">
                        <i class="bi bi-info-circle"></i> Más información
                    </button>
                </div>
                <input type="text" class="form-control" name="titulo_profesional" required>
            </div>
            

            <!-- Modal para Título Profesional -->
            <div class="modal fade" id="modalTituloProfesional" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg"><!-- Grande y centrado -->
                <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title fs-6">Información sobre Título Profesional</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Ingrese el nombre completo del título obtenido al finalizar sus estudios:</p>
                    <ul class="mb-3">
                    <li><strong>Ejemplos válidos:</strong></li>
                    <li>Medicina General</li>
                    <li>Auxiliar de Enfermería</li>
                    <li>Enfermera Jefe</li>
                    <li>Odontología</li>
                    <li>Anestesiología</li>
                    <li>Fisioterapia</li>
                    <li>Ginecobstetricia</li>
                    <li>Pediatría</li>
                    <li>Psicología</li>
                    <li>Medicina Interna</li>
                    <li>Cirujano General</li>
                    <li>Ortopedia</li>
                    <li>Bacteriología</li>
                    <li>Oftalmología</li>
                    </ul>
                    <div class="alert alert-warning p-2 small mb-3">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    Debe coincidir exactamente con el nombre en su diploma.
                    </div>
                    <!-- Video grande -->
                    <div style="width:100%;max-width:700px;margin:auto;">
                    <iframe
                        width="100%"
                        height="350"
                        style="border-radius: 12px;"
                        src="https://www.youtube.com/embed/QtL-G6AF_1g" 
                        title="Guía Título Profesional"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen
                    ></iframe>
                    </div>
                </div>
                <div class="modal-footer bg-light p-2 justify-content-start">
                    <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Entendido</button>
                </div>
                </div>
            </div>
            </div>


            <!-- Otorgado Por -->
            <div class="mb-3">
                <label class="form-label d-flex align-items-center">
                    Otorgado Por (Entidad que otorgó el diploma):
                    <button type="button" class="btn btn-link btn-sm p-0 ms-2 text-info" data-bs-toggle="modal" data-bs-target="#modalOtorgadoPor">
                        <i class="bi bi-info-circle"></i>
                    </button>
                </label>
                <input type="text" class="form-control" name="otorgado_por" required>
            </div>

                <!-- Modal para Otorgado Por -->
                <div class="modal fade" id="modalOtorgadoPor" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                    <div class="modal-header bg-light p-3">
                        <h5 class="modal-title fs-6">Información sobre Entidad que Otorgó el Diploma</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Ingrese el nombre completo de la universidad o institución educativa que le otorgó el título profesional.</p>
                        <p><strong>Ejemplo:</strong> Universidad Nacional de Colombia</p>
                        <!-- Video grande -->
                        <div style="width:100%;max-width:700px;margin:auto;">
                        <iframe
                            width="100%"
                            height="350"
                            style="border-radius: 12px;"
                            src="https://www.youtube.com/embed/6OCwpsafCBU"
                            title="Entidad que Otorgó el Diploma"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen
                        ></iframe>
                        </div>
                    </div>
                    <div class="modal-footer bg-light p-2 justify-content-start">
                        <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Entendido</button>
                    </div>
                    </div>
                </div>
                </div>

            <!-- Fecha de Graduación -->
            <div class="mb-3">
                <label class="form-label d-flex align-items-center">
                    Fecha de Graduación:
                    <button type="button" class="btn btn-link btn-sm p-0 ms-2 text-info" data-bs-toggle="modal" data-bs-target="#modalFechaGraduacion">
                        <i class="bi bi-info-circle"></i>
                    </button>
                </label>
                <input type="date" class="form-control" name="fecha_graduacion" required>
            </div>

            <!-- Modal para Fecha de Graduación -->
            <div class="modal fade" id="modalFechaGraduacion" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-light p-3">
                            <h5 class="modal-title fs-6">Información sobre Fecha de Graduación</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Ingrese la fecha en que obtuvo su título profesional.</p>
                        </div>
                        <div class="modal-footer bg-light p-2 justify-content-start">
                            <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Entendido</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- No. Registro Profesional -->
            <div class="mb-3">
                <div class="d-flex align-items-center mb-1">
                    <label class="form-label mb-0">No. Registro Profesional:</label>
                    <button class="btn btn-sm btn-outline-info ms-2 p-0 border-0" type="button" data-bs-toggle="modal" data-bs-target="#modalRegistroProfesional">
                        <i class="bi bi-info-circle"></i> Más información
          </button>
        </div>
        <input type="text" class="form-control" name="registro_profecional" required>
      </div>
      
      <!-- Modal para Registro Profesional -->
<!-- Modal para Registro Profesional -->
<div class="modal fade" id="modalRegistroProfesional" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg"><!-- Cambié a modal-lg -->
    <div class="modal-content">
      <div class="modal-header bg-light p-3">
        <h5 class="modal-title fs-6">Información sobre Registro Profesional</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-3">
        <p>
          El número de registro profesional es el número asignado en el RETHUS (Acto Administrativo) o número de la resolución o número de la tarjeta profesional.
        </p>
        <div class="alert alert-info p-2 mt-2 small">
          <i class="bi bi-info-circle-fill me-2"></i>
          Ejemplo: 12345
        </div>
        <p class="small text-muted mb-3">
          Este número valida su autorización para ejercer la profesión en Colombia.
        </p>
        
        <!-- VIDEO MÁS GRANDE -->
        <div style="width:100%;max-width:700px;margin:auto;">
          <iframe
            width="100%"
            height="350"
            style="border-radius: 12px;"
            src="https://www.youtube.com/embed/BBgZi_xCvU8"
            title="Guía Registro Profesional"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen
          ></iframe>
        </div>
      </div>
      <div class="modal-footer bg-light p-2 justify-content-start">
        <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Entendido</button>
      </div>
    </div>
  </div>
</div>



<!-- Especialización Practicada -->
<div class="mb-3">
    <label class="form-label">Especialización Practicada:</label>
    <div style="display: flex; flex-direction: column;">
        <label>
            <input type="checkbox" name="especializaciones" value="Anestesiólogo" class="especializacion-check">
            Anestesiólogo, Ginecobstetra, Ginecólogo
        </label>
        <label>
            <input type="checkbox" name="especializaciones" value="Especialista_en_Cirugía" class="especializacion-check">
            Especialista en Cirugía, Ortopedia, Urología, Oftalmología, Radiología
        </label>
<!-- Tu botón -->
<div class="mb-3 d-flex align-items-center">
    <div class="form-check">
        <input class="form-check-input especializacion-check" type="checkbox" name="especializaciones" value="Médico_General" id="medicoGeneral">
        <label class="form-check-label" for="medicoGeneral">
            Médico General, Otra Especialización
        </label>
    </div>
    <button class="btn btn-sm btn-outline-info ms-2 p-0 border-0" type="button" data-bs-toggle="modal" data-bs-target="#modalMedicoGeneral">
        <i class="bi bi-info-circle"></i> Más información
    </button>
</div>

<!-- Modal para Otra Especialización -->
<div class="modal fade" id="modalMedicoGeneral" tabindex="-1" aria-labelledby="modalMedicoGeneralLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg"><!-- modal-lg para más ancho -->
    <div class="modal-content">
      <div class="modal-header bg-light p-3">
        <h5 class="modal-title" id="modalMedicoGeneralLabel">Información - Otra Especialización</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        <p>Marque esta casilla si su profesión es:</p>
        <ul class="mb-3">
          <li>- AUXILIARES DE ENFERMERÍA</li>
          <li>- AUXILIAR DE LABORATORIO BÁSICO ESPECIALIZADO</li>
          <li>- AUXILIAR DE RADIOLOGÍA E IMAGENOLOGÍA</li>
          <li>- AUXILIARES DE DIFERENTES ÁREAS MÉDICAS</li>
          <li>- FONOAUDIÓLOGO</li>
          <li>- HIGIENISTA ORAL Y ODONTÓLOGOS SIN ESPECIALIDAD</li>
          <li>- NUTRICIONISTA</li>
          <li>- TÉCNICOS EN ATENCIÓN INICIAL, RESOLUCIÓN O REMISIÓN DE PACIENTES EN URGENCIAS (TRIAGE)</li>
        </ul>
        <!-- Si en algún momento quieres agregar video, puedes copiar aquí el iframe igual que en los otros modales -->
       
        <div style="width:100%;max-width:700px;margin:auto;">
          <iframe
            width="100%"
            height="350"
            style="border-radius: 12px;"
            src="https://www.youtube.com/embed/_4COR5anqqE"
            title="Video de ejemplo"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen
          ></iframe>
        </div>
       
      </div>
      <div class="modal-footer bg-light p-2 justify-content-start">
        <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Entendido</button>
      </div>
    </div>
  </div>
</div>

        <label>
            <input type="checkbox" name="especializaciones" value="Odontología" class="especializacion-check">
            Odontología, Ortodoncia
        </label>
    </div>
    </div>
    


    <!-- Ejercicio Privado Por Cuenta Propia -->
    <div class="mb-3">
        <label class="form-label">Ejercicio Privado Por Cuenta Propia. Sin relacion laboral con una institucion de salud 
        o Cualquier Empresa, Sea Particular o Publica
        </label>
        <button class="btn btn-sm btn-outline-info ms-2 p-0 border-0" type="button" data-bs-toggle="modal" data-bs-target="#modalEjercicioPrivado">
            <i class="bi bi-info-circle"></i>
        </button>
        <div>
            <input type="radio" name="ejercicio_privado" value="SI" required> SI
            <input type="radio" name="ejercicio_privado" value="NO"> NO
        </div>
        <div id="detalles_ejercicio_privado" style="display: none;">
            <label class="form-label">Ubicaion del consultorio:</label>
            <input type="text" class="form-control" name="ubicacion_consultorio">
            <label class="form-label">Número y especialización médica o paramédica de los empleados</label>
            <input type="text" class="form-control" name="Numero_especialización">
        </div>
    </div>
<!-- Modal para Ejercicio Privado -->
<div class="modal fade" id="modalEjercicioPrivado" tabindex="-1" aria-labelledby="modalEjercicioPrivadoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg"><!-- Ajustado ancho y centrado -->
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title fs-6" id="modalEjercicioPrivadoLabel">Información - Ejercicio Privado</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <p>
                    Hace referencia a los contratos por prestación de servicios profesionales.
                </p>
                <!-- Si algún día quieres agregar un video informativo, aquí puedes agregar el iframe igual que en los otros modales: -->
                
                <div style="width:100%;max-width:700px;margin:auto;">
                  <iframe
                    width="100%"
                    height="350"
                    style="border-radius: 12px;"
                    src="https://www.youtube.com/embed/tI3qMlM-KqY"
                    title="Información Ejercicio Privado"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen
                  ></iframe>
                </div>
              
            </div>
            <div class="modal-footer bg-light p-2 justify-content-start">
                <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Entendido</button>
            </div>
        </div>
    </div>
</div>


    <!-- Posee Equipos -->
    <div class="mb-3">
        <label class="form-label">Posee Uno o Varios de los SIguientes Equipos:</label>
        <button class="btn btn-sm btn-outline-info ms-2 p-0 border-0" type="button" data-bs-toggle="modal" data-bs-target="#modalPoseeEquipos">
            <i class="bi bi-info-circle"></i>
        </button>

        <div style="display: flex; flex-direction: column;">
            <label>
                <input type="hidden" name="equipo_radiografia" value="NO">
                <input type="checkbox" name="equipo_radiografia" value="SI">
                Radiografía con fines de diagnóstico
            </label>
    
            <label>
                <input type="hidden" name="equipo_rayos_x" value="NO">
                <input type="checkbox" name="equipo_rayos_x" value="SI">
                Equipos de rayos X para terapéutica
            </label>
    
            <label>
                <input type="hidden" name="equipo_tomografia" value="NO">
                <input type="checkbox" name="equipo_tomografia" value="SI">
                Equipos de tomografías por ordenador – Scanner
            </label>
    
            <label>
                <input type="hidden" name="equipo_laser" value="NO">
                <input type="checkbox" name="equipo_laser" value="SI">
                Equipos de generación de rayos láser
            </label>
    
            <label>
                <input type="hidden" name="equipo_medicina_nuclear" value="NO">
                <input type="checkbox" name="equipo_medicina_nuclear" value="SI">
                Equipos de medicina nuclear
            </label>
        </div>
    </div>
<!-- Modal para Posee Equipos -->
<div class="modal fade" id="modalPoseeEquipos" tabindex="-1" aria-labelledby="modalPoseeEquiposLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg"><!-- ancho y centrado -->
    <div class="modal-content">
      <div class="modal-header bg-light p-3">
        <h5 class="modal-title" id="modalPoseeEquiposLabel">Información - Posee Equipos</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        <p>
          Esta pregunta se refiere a si usted posee equipos médicos especializados, como radiografías, tomografías, láser, entre otros.
        </p>
        <!-- Si algún día deseas poner un video explicativo, puedes agregar el iframe aquí, igual que en otros modales -->
       
        <div style="width:100%;max-width:700px;margin:auto;">
          <iframe
            width="100%"
            height="350"
            style="border-radius: 12px;"
            src="https://www.youtube.com/embed/IcjftRtzk3s"
            title="Video explicativo"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen
          ></iframe>
        </div>
      
      </div>
      <div class="modal-footer bg-light p-2 justify-content-start">
        <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Entendido</button>
      </div>
    </div>
  </div>
</div>


    <!-- Alojar Pacientes Durante Tratamiento -->
    <div class="mb-3">
        <label class="form-label">Existe la Posibilidad de Alojar a los Pacientes Durante Tratamiento:</label>
                <button class="btn btn-sm btn-outline-info ms-2 p-0 border-0" type="button" data-bs-toggle="modal" data-bs-target="#modalAlojarPacientes">
            <i class="bi bi-info-circle"></i> Más información
        </button>
        <div>
            <input type="radio" name="alojar_pacientes" value="SI" required> SI
            <input type="radio" name="alojar_pacientes" value="NO"> NO
        </div>

    </div>
<!-- Modal para Alojar Pacientes -->
<div class="modal fade" id="modalAlojarPacientes" tabindex="-1" aria-labelledby="modalAlojarPacientesLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-light p-3">
        <h5 class="modal-title" id="modalAlojarPacientesLabel">Información - Alojar Pacientes</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        <p>
          Esta pregunta se refiere a si en el área donde usted trabaja quedan pacientes hospitalizados.
        </p>
        <!-- VIDEO INFORMATIVO -->
        <div style="width:100%;max-width:700px;margin:auto;">
          <iframe
            width="100%"
            height="350"
            style="border-radius: 12px;"
            src="https://www.youtube.com/embed/a6UtRqnNqlo" 
            title="Información Alojar Pacientes"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen
          ></iframe>
        </div>
      </div>
      <div class="modal-footer bg-light p-2 justify-content-start">
        <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Entendido</button>
      </div>
    </div>
  </div>
</div>


    <!-- Tratamiento Solo Ambulatorio -->
    <div class="mb-3">
        <label class="form-label">Tratamiento de Pacientes es Solo Ambulatorio:</label>
         <button class="btn btn-sm btn-outline-info ms-2 p-0 border-0" type="button" data-bs-toggle="modal" data-bs-target="#modalTratamientoAmbulatorio">
            <i class="bi bi-info-circle"></i> Más información
        </button>
        <div>
            <input type="radio" name="tratamiento_ambulatorio" value="SI" required> SI
            <input type="radio" name="tratamiento_ambulatorio" value="NO"> NO
        </div>
       

    </div>
<!-- Modal para Tratamiento Ambulatorio -->
<div class="modal fade" id="modalTratamientoAmbulatorio" tabindex="-1" aria-labelledby="modalTratamientoAmbulatorioLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-light p-3">
        <h5 class="modal-title" id="modalTratamientoAmbulatorioLabel">Información - Tratamiento Ambulatorio</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        <p>
          Esta pregunta se refiere a si el tratamiento de los pacientes se realiza exclusivamente de forma ambulatoria, sin hospitalización.
        </p>
        <!-- VIDEO INFORMATIVO -->
        <div style="width:100%;max-width:700px;margin:auto;">
          <iframe
            width="100%"
            height="350"
            style="border-radius: 12px;"
            src="https://www.youtube.com/embed/MejQrkW0QeI" 
            title="Información Tratamiento Ambulatorio"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen
          ></iframe>
        </div>
      </div>
      <div class="modal-footer bg-light p-2 justify-content-start">
        <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Entendido</button>
      </div>
    </div>
  </div>
</div>

<!-- Otros Riesgos -->
<div class="mb-3">
    <label class="form-label d-flex align-items-center">
        Existen Otros Riesgos (Laboratorios, Farmacias, etc.):
        <button class="btn btn-sm btn-outline-info ms-2 p-0 border-0" type="button" data-bs-toggle="modal" data-bs-target="#modalOtrosRiesgos">
            <i class="bi bi-info-circle"></i>
        </button>
    </label>
    <div>
        <input type="radio" name="otros_riesgos" value="SI" required> SI
        <input type="radio" name="otros_riesgos" value="NO"> NO
    </div>
    <div id="detalles_otros_riesgos" style="display: none;">
        <label class="form-label">Detalles:</label>
        <input type="text" class="form-control" name="detalles_otros_riesgos">
    </div>
</div>

<!-- Modal Otros Riesgos -->
<div class="modal fade" id="modalOtrosRiesgos" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg"><!-- Cambié aquí a modal-lg y centrado -->
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title fs-6">Información sobre Otros Riesgos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Indique si existen otros riesgos profesionales adicionales a su práctica principal.</p>
                <!-- Sección de video agregada -->
                <!--<div style="width:100%;max-width:700px;margin:auto;">
                    <iframe
                        width="100%"
                        height="350"
                        style="border-radius: 12px;"
                        src="https://www.youtube.com/embed/LWHHJcaQiH4" 
                        title="Información Tratamiento Ambulatorio"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen
                    ></iframe>
                </div> -->
            </div>
            <div class="modal-footer bg-light p-2 justify-content-start">
                <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Entendido</button>
            </div>
        </div>
    </div>
</div>


<!-- Ejercicio Exclusivo en Consultorio -->
<div class="mb-3">
    <label class="form-label d-flex align-items-center">
        Ejercicio de las Actividades Profesionales Exclusivamente en el Consultorio Arriba indicado:
        <button class="btn btn-sm btn-outline-info ms-2 p-0 border-0" type="button" data-bs-toggle="modal" data-bs-target="#modalEjercicioExclusivo">
            <i class="bi bi-info-circle"></i>
        </button>
    </label>
    <div>
        <input type="radio" name="ejercicio_exclusivo" value="SI" required> SI
        <input type="radio" name="ejercicio_exclusivo" value="NO"> NO
    </div>
</div>

<!-- Modal Ejercicio Exclusivo -->
<div class="modal fade" id="modalEjercicioExclusivo" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title fs-6">Información sobre Ejercicio Exclusivo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Seleccione SI si todas sus actividades profesionales se realizan únicamente en el consultorio indicado.</p>
                <!-- Sección de video agregada -->
                <!--<div style="width:100%;max-width:700px;margin:auto;">
                    <iframe
                        width="100%"
                        height="350"
                        style="border-radius: 12px;"
                        src="https://www.youtube.com/embed/LWHHJcaQiH4" 
                        title="Información Tratamiento Ambulatorio"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen
                    ></iframe>
                </div> -->
            </div>
            <div class="modal-footer bg-light p-2 justify-content-start">
                <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Entendido</button>
            </div>
        </div>
    </div>
</div>

<!-- Prestación de Servicios en Otras Instituciones -->
<div class="mb-3">
    <label class="form-label d-flex align-items-center">
        Prestación de Servicios Profesionales También en Otras Instituciones de Salud o Empresa:
        <button class="btn btn-sm btn-outline-info ms-2 p-0 border-0" type="button" data-bs-toggle="modal" data-bs-target="#modalPrestacionServicios">
            <i class="bi bi-info-circle"></i>
        </button>
    </label>
    <div>
        <input type="radio" name="prestacion_servicios" value="SI" required> SI
        <input type="radio" name="prestacion_servicios" value="NO"> NO
    </div>
    <div id="detalles_prestacion_servicios" style="display: none;">
        <label class="form-label">Nombre de la Institución:</label>
        <input type="text" class="form-control" name="nombre_institucion">
        <label class="form-label">Tipo de Servicios:</label>
        <input type="text" class="form-control" name="tipo_servicios">
        <label class="form-label">Función del Solicitante:</label>
        <input type="text" class="form-control" name="funcion_solicitante">
        <label class="form-label">Relación con la Institución:</label>
        <input type="text" class="form-control" name="relacion_institucion">
    </div>
</div>

<!-- Modal Prestación de Servicios -->
<div class="modal fade" id="modalPrestacionServicios" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title fs-6">Información sobre Prestación de Servicios</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Indique si presta servicios profesionales en otras instituciones además de su consultorio principal.</p>
                <!-- Sección de video agregada -->
                <!--<div style="width:100%;max-width:700px;margin:auto;">
                    <iframe
                        width="100%"
                        height="350"
                        style="border-radius: 12px;"
                        src="https://www.youtube.com/embed/LWHHJcaQiH4" 
                        title="Información Tratamiento Ambulatorio"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen
                    ></iframe>
                </div> -->
            </div>
            <div class="modal-footer bg-light p-2 justify-content-start">
                <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Entendido</button>
            </div>
        </div>
    </div>
</div>

<!-- Ejercicio Bajo Relación Laboral -->
<div class="mb-3">
    <label class="form-label d-flex align-items-center">
        Ejercicio profesional bajo relación laboral con una institución de salud, una empresa o cualquier entidad pública o privada, incluyendo médicos particulares:
        <button class="btn btn-sm btn-outline-info ms-2 p-0 border-0" type="button" data-bs-toggle="modal" data-bs-target="#modalEjercicioLaboral">
            <i class="bi bi-info-circle"></i>
        </button>
    </label>
    <div>
        <input type="radio" name="ejercicio_laboral" value="SI" required> SI
        <input type="radio" name="ejercicio_laboral" value="NO"> NO
    </div>
    <div id="detalles_ejercicio_laboral" style="display: none;">
        <label class="form-label">Nombre y Descripción del Empleador:</label>
        <input type="text" class="form-control" name="nombre_empleador">
        <label class="form-label">Ubicación del Centro de Trabajo:</label>
        <input type="text" class="form-control" name="ubicacion_trabajo">
        <label class="form-label">Descripción de Labores:</label>
        <input type="text" class="form-control" name="descripcion_labores">
    </div>
</div>

<!-- Modal Ejercicio Laboral -->
<div class="modal fade" id="modalEjercicioLaboral" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title fs-6">Información sobre Relación Laboral</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Indique si tiene un contrato laboral con alguna institución o empresa donde ejerce su profesión.</p>
                <!-- Sección de video agregada -->
                <!--<div style="width:100%;max-width:700px;margin:auto;">
                    <iframe
                        width="100%"
                        height="350"
                        style="border-radius: 12px;"
                        src="https://www.youtube.com/embed/LWHHJcaQiH4" 
                        title="Información Tratamiento Ambulatorio"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen
                    ></iframe>
                </div> -->
            </div>
            <div class="modal-footer bg-light p-2 justify-content-start">
                <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Entendido</button>
            </div>
        </div>
    </div>
</div>

<!-- Ejercicio en Otras Ocasiones -->
<div class="mb-3">
    <label class="form-label d-flex align-items-center">
        Ejercicio de las actividades profesionales también en otras ocasiones: ejemplo consultorio propio y/o otra clínica, etc.
        <button class="btn btn-sm btn-outline-info ms-2 p-0 border-0" type="button" data-bs-toggle="modal" data-bs-target="#modalOtrasOcasiones">
            <i class="bi bi-info-circle"></i>
        </button>
    </label>
    <div>
        <input type="radio" name="ejercicio_otras_ocasiones" value="SI" required> SI
        <input type="radio" name="ejercicio_otras_ocasiones" value="NO"> NO
    </div>
    <div id="detalles_ejercicio_otras_ocasiones" style="display: none;">
        <label class="form-label">Detalles:</label>
        <input type="text" class="form-control" name="detalles_ejercicio_otras_ocasiones">
    </div>
</div>

<!-- Modal Otras Ocasiones -->
<div class="modal fade" id="modalOtrasOcasiones" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title fs-6">Información sobre Otras Ocasiones</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Indique si ejerce su profesión en otros lugares además de su consultorio principal.</p>
                <!-- Sección de video agregada -->
                <!--<div style="width:100%;max-width:700px;margin:auto;">
                    <iframe
                        width="100%"
                        height="350"
                        style="border-radius: 12px;"
                        src="https://www.youtube.com/embed/LWHHJcaQiH4" 
                        title="Información Tratamiento Ambulatorio"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen
                    ></iframe>
                </div> -->
            </div>
            <div class="modal-footer bg-light p-2 justify-content-start">
                <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Entendido</button>
            </div>
        </div>
    </div>
</div>

<!-- Reclamación de Responsabilidad Civil en los Últimos 5 Años -->
<div class="mb-3">
    <label class="form-label d-flex align-items-center">
        Ha tenido alguna reclamación de responsabilidad civil profesional durante los últimos cinco (5) años:
        <button class="btn btn-sm btn-outline-info ms-2 p-0 border-0" type="button" data-bs-toggle="modal" data-bs-target="#modalReclamacionResponsabilidad">
            <i class="bi bi-info-circle"></i>
        </button>
    </label>
    <div>
        <input type="radio" name="reclamacion_responsabilidad" value="SI" required> SI
        <input type="radio" name="reclamacion_responsabilidad" value="NO"> NO
    </div>
    <div id="detalles_reclamacion_responsabilidad" style="display: none;">
        <label class="form-label">Detalles:</label>
        <input type="text" class="form-control" name="detalles_reclamacion_responsabilidad">
    </div>
</div>

<!-- Modal Reclamación Responsabilidad -->
<div class="modal fade" id="modalReclamacionResponsabilidad" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title fs-6">Información sobre Reclamaciones</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Indique si ha tenido reclamaciones por responsabilidad civil profesional en los últimos 5 años.</p>
                <!-- Sección de video agregada -->
                <!--<div style="width:100%;max-width:700px;margin:auto;">
                    <iframe
                        width="100%"
                        height="350"
                        style="border-radius: 12px;"
                        src="https://www.youtube.com/embed/LWHHJcaQiH4" 
                        title="Información Tratamiento Ambulatorio"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen
                    ></iframe>
                </div> -->
            </div>
            <div class="modal-footer bg-light p-2 justify-content-start">
                <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Entendido</button>
            </div>
        </div>
    </div>
</div>

<!-- Circunstancia que Pudiese Comprometer Responsabilidad Civil -->
<div class="mb-3">
    <label class="form-label d-flex align-items-center">
        Tiene conocimiento de alguna circunstancia que pudiese comprometer su responsabilidad civil profesional:
        <button class="btn btn-sm btn-outline-info ms-2 p-0 border-0" type="button" data-bs-toggle="modal" data-bs-target="#modalCircunstanciaResponsabilidad">
            <i class="bi bi-info-circle"></i>
        </button>
    </label>
    <div>
        <input type="radio" name="circunstancia_responsabilidad" value="SI" required> SI
        <input type="radio" name="circunstancia_responsabilidad" value="NO"> NO
    </div>
    <div id="detalles_circunstancia_responsabilidad" style="display: none;">
        <label class="form-label">Detalles:</label>
        <input type="text" class="form-control" name="detalles_circunstancia_responsabilidad">
    </div>
</div>

<!-- Modal Circunstancia Responsabilidad -->
<div class="modal fade" id="modalCircunstanciaResponsabilidad" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title fs-6">Información sobre Circunstancias</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Indique si conoce de alguna situación que pueda generar una reclamación por responsabilidad civil.</p>
                <!-- Sección de video agregada -->
                <!--<div style="width:100%;max-width:700px;margin:auto;">
                    <iframe
                        width="100%"
                        height="350"
                        style="border-radius: 12px;"
                        src="https://www.youtube.com/embed/LWHHJcaQiH4" 
                        title="Información Tratamiento Ambulatorio"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen
                    ></iframe>
                </div> -->
            </div>
            <div class="modal-footer bg-light p-2 justify-content-start">
                <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Entendido</button>
            </div>
        </div>
    </div>
</div>

<!-- Seguro de Responsabilidad Civil en los Últimos 5 Años -->
<div class="mb-3">
    <label class="form-label d-flex align-items-center">
        ¿Ha tenido contratados en los últimos cinco (5) años un seguro de responsabilidad civil profesional?
        <button type="button" class="btn btn-link btn-sm p-0 ms-2 text-info" data-bs-toggle="modal" data-bs-target="#modal_info_seguro">
            <i class="bi bi-info-circle"></i>
        </button>
    </label>

    <div>
        <input type="radio" name="seguro_responsabilidad" value="SI" id="seguro_si" required>
        <label for="seguro_si">Sí</label>

        <input type="radio" name="seguro_responsabilidad" value="NO" id="seguro_no">
        <label for="seguro_no">No</label>
    </div>

    <div id="detalles_seguro_responsabilidad" style="display: none; margin-top: 1rem;">
        <div class="mb-3">
            <label class="form-label">Compañía de Seguros:</label>
            <input type="text" class="form-control" name="compania_seguros" id="compania_seguros">
        </div>

        <div class="mb-3">
            <label class="form-label">Vigencia de la Póliza:</label>
            <input type="date" class="form-control" name="vigencia_poliza" id="input_vigencia_poliza">
        </div>

        <div class="mb-3">
            <label class="form-label">Límite Asegurado:</label>
            <input type="text" class="form-control" id="limite_asegurado_visible">
            <input type="hidden" name="limite_asegurado" id="limite_asegurado_real">
        </div>
    </div>
</div>

<!-- Modal de información -->
<div class="modal fade" id="modal_info_seguro" tabindex="-1" aria-labelledby="modal_info_seguro_label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title fs-6">Información sobre el Seguro</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            
            <div class="modal-body">
                <p>Si ha comprado pólizas de responsabilidad civil profesional en los ultimos 5 años responda SI</p>
                <p class="small text-muted mb-0">Debe colocar la información de la póliza anterior.</p>
                <!-- Sección de video agregada -->
                <!--<div style="width:100%;max-width:700px;margin:auto;">
                    <iframe
                        width="100%"
                        height="350"
                        style="border-radius: 12px;"
                        src="https://www.youtube.com/embed/LWHHJcaQiH4" 
                        title="Información Tratamiento Ambulatorio"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen
                    ></iframe>
                </div> -->
            </div>
            <div class="modal-footer bg-light p-2 justify-content-start">
              <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Entendido</button>
            </div>
        </div>
    </div>
</div>

<!-- Rehusada o Cancelada Póliza de Responsabilidad Civil -->
<div class="mb-3">
    <label class="form-label d-flex align-items-center">
        Le ha sido rehusada o cancelada la póliza de responsabilidad civil profesional por alguna compañía de seguros:
        <button class="btn btn-sm btn-outline-info ms-2 p-0 border-0" type="button" data-bs-toggle="modal" data-bs-target="#modalPolizaRehusada">
            <i class="bi bi-info-circle"></i>
        </button>
    </label>
    <div>
        <input type="radio" name="rehusada_cancelada_poliza" value="SI" required> SI
        <input type="radio" name="rehusada_cancelada_poliza" value="NO"> NO
    </div>
    <div id="detalles_rehusada_cancelada_poliza" style="display: none;">
        <label class="form-label">Detalles:</label>
        <input type="text" class="form-control" name="detalles_rehusada_cancelada_poliza">
    </div>
</div>

<!-- Modal Póliza Rehusada -->
<div class="modal fade" id="modalPolizaRehusada" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title fs-6">Información sobre Póliza Rehusada</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Indique si alguna aseguradora le ha rechazado o cancelado una póliza de responsabilidad civil.</p>
                <!-- Sección de video agregada -->
                <!--<div style="width:100%;max-width:700px;margin:auto;">
                    <iframe
                        width="100%"
                        height="350"
                        style="border-radius: 12px;"
                        src="https://www.youtube.com/embed/LWHHJcaQiH4" 
                        title="Información Tratamiento Ambulatorio"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen
                    ></iframe>
                </div> -->
            </div>
            <div class="modal-footer bg-light p-2 justify-content-start">
                <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Entendido</button>
            </div>
        </div>
    </div>
</div>

<!-- Suma Asegurada Solicitada -->
<div class="mb-3">
    <label class="form-label d-flex align-items-center">
        Suma Asegurada Solicitada:
        <button class="btn btn-sm btn-outline-info ms-2 p-0 border-0" type="button" data-bs-toggle="modal" data-bs-target="#modalSumaAsegurada">
            <i class="bi bi-info-circle"></i>
        </button>
    </label>
    <input type="text" class="form-control" id="suma_asegurada_visible" required>
    <input type="hidden" name="suma_asegurada" id="suma_asegurada_real">
</div>

<!-- Modal Suma Asegurada -->
<div class="modal fade" id="modalSumaAsegurada" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title fs-6">Información sobre Suma Asegurada</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Ingrese el monto de cobertura que desea contratar para su seguro.</p>
                <!-- Sección de video agregada -->
                <!--<div style="width:100%;max-width:700px;margin:auto;">
                    <iframe
                        width="100%"
                        height="350"
                        style="border-radius: 12px;"
                        src="https://www.youtube.com/embed/LWHHJcaQiH4" 
                        title="Información Tratamiento Ambulatorio"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen
                    ></iframe>
                </div>-->
            </div>
            <div class="modal-footer bg-light p-2 justify-content-start">
                <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Entendido</button>
            </div>
        </div>
    </div>
</div>

<!-- Actividad Principal -->
<div class="mb-3">
    <label class="form-label d-flex align-items-center">
        Actividad Principal:
        <button class="btn btn-sm btn-outline-info ms-2 p-0 border-0" type="button" data-bs-toggle="modal" data-bs-target="#modalActividadPrincipal">
            <i class="bi bi-info-circle"></i>
        </button>
    </label>
    <select class="form-select" name="actividad_principal" id="actividadPrincipal" required>
      <option value="">Selecciona una opción</option>
      <option value="Asalariado">Asalariado</option>
      <option value="Comerciante">Comerciante</option>
      <option value="Empleado Público">Empleado Público</option>
      <option value="Estudiante">Estudiante</option>
      <option value="Hogar">Hogar</option>
      <option value="Independiente">Independiente</option>
      <option value="Inversionista">Inversionista</option>
      <option value="Pensionado">Pensionado</option>
      <option value="Rentista">Rentista</option>
      <option value="Socio">Socio</option>
    </select>
</div>

<!-- Modal Actividad Principal -->
<div class="modal fade" id="modalActividadPrincipal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title fs-6">Información sobre Actividad Principal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Seleccione su actividad principal según su situación laboral actual.</p>
                <!-- Sección de video agregada -->

                <!--<div style="width:100%;max-width:700px;margin:auto;">
                    <iframe
                        width="100%"
                        height="350"
                        style="border-radius: 12px;"
                        src="https://www.youtube.com/embed/LWHHJcaQiH4" 
                        title="Información Tratamiento Ambulatorio"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen
                    ></iframe>
                </div>-->
            </div>
            <div class="modal-footer bg-light p-2 justify-content-start">
                <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Entendido</button>
            </div>
        </div>
    </div>
</div>

<!-- Código CIIU -->
<div class="mb-3">
    <label class="form-label d-flex align-items-center">
        Código CIIU:
        <button class="btn btn-sm btn-outline-info ms-2 p-0 border-0" type="button" data-bs-toggle="modal" data-bs-target="#modalCodigoCIIU">
            <i class="bi bi-info-circle"></i> Más información
        </button>
    </label>
    <input type="text" class="form-control" name="codigo_ciiu" required>
</div>

<!-- Modal para Código CIIU -->
<div class="modal fade" id="modalCodigoCIIU" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title fs-6">Información sobre Código CIIU</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>El Código CIIU hace referencia a los 4 números de su actividad principal en el RUT.</p>
                <!-- Sección de video agregada -->
                <!--<div style="width:100%;max-width:700px;margin:auto;">
                    <iframe
                        width="100%"
                        height="350"
                        style="border-radius: 12px;"
                        src="https://www.youtube.com/embed/LWHHJcaQiH4" 
                        title="Información Tratamiento Ambulatorio"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen
                    ></iframe>
                </div>-->
            </div>
            <div class="modal-footer bg-light p-2 justify-content-start">
                <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Entendido</button>
            </div>
        </div>
    </div>
</div>

<!-- Sector y Tipo de Actividad -->
<div class="mb-3">
    <label class="form-label d-flex align-items-center">
        Sector y Tipo de Actividad:
        <button class="btn btn-sm btn-outline-info ms-2 p-0 border-0" type="button" data-bs-toggle="modal" data-bs-target="#modalSectorActividad">
            <i class="bi bi-info-circle"></i>
        </button>
    </label>
    <select class="form-select" name="sector_actividad" id="sectorActividad" required>
      <option value="">Selecciona una opción</option>
      <option value="Agrícola">Agrícola</option>
      <option value="Alimentos">Alimentos</option>
      <option value="Campaña Política">Campaña Política</option>
      <option value="Comercio">Comercio</option>
      <option value="Construcción">Construcción</option>
      <option value="Educación">Educación</option>
      <option value="Farmacéutica">Farmacéutica</option>
      <option value="Financiero">Financiero</option>
      <option value="Industrial">Industrial</option>
      <option value="Informática">Informática</option>
      <option value="Metalmecánico">Metalmecánico</option>
      <option value="Minero y Energético">Minero y Energético</option>
      <option value="Petróleo">Petróleo</option>
      <option value="Químico">Químico</option>
      <option value="Salud">Salud</option>
      <option value="Servicios">Servicios</option>
      <option value="Servicios Financieros">Servicios Financieros</option>
      <option value="Solidario">Solidario</option>
      <option value="Telecomunicaciones">Telecomunicaciones</option>
      <option value="Textiles">Textiles</option>
      <option value="Transporte">Transporte</option>
      <option value="Turismo">Turismo</option>
      <option value="Otro">Otro, ¿cuál?</option>
    </select>

    <!-- Campo "¿Cuál?" SOLO aparece si selecciona "Otro" -->
    <div id="cual_sector_row" style="margin-top: 10px;">
        <label class="form-label">¿Cuál?:</label>
        <input type="text" class="form-control" name="cual" id="cual_sector">
    </div>
</div>

<!-- Modal Sector Actividad -->
<div class="modal fade" id="modalSectorActividad" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title fs-6">Información sobre Sector</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Seleccione el sector económico al que pertenece su actividad profesional principal.</p>
                <!-- Sección de video agregada -->
                <!--<div style="width:100%;max-width:700px;margin:auto;">
                    <iframe
                        width="100%"
                        height="350"
                        style="border-radius: 12px;"
                        src="https://www.youtube.com/embed/LWHHJcaQiH4" 
                        title="Información Tratamiento Ambulatorio"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen
                    ></iframe>
                </div>-->
            </div>
            <div class="modal-footer bg-light p-2 justify-content-start">
                <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Entendido</button>
            </div>
        </div>
    </div>
</div>

<!-- Ocupación y Cargo -->
<div class="row">
    <div class="col-md-6">
        <label class="form-label d-flex align-items-center">
            Ocupación:
            <button class="btn btn-sm btn-outline-info ms-2 p-0 border-0" type="button" data-bs-toggle="modal" data-bs-target="#modalOcupacion">
                <i class="bi bi-info-circle"></i>
            </button>
        </label>
        <input type="text" class="form-control" name="ocupacion" required>
    </div>
    <div class="col-md-6">
        <label class="form-label d-flex align-items-center">
            Cargo:
            <button class="btn btn-sm btn-outline-info ms-2 p-0 border-0" type="button" data-bs-toggle="modal" data-bs-target="#modalCargo">
                <i class="bi bi-info-circle"></i>
            </button>
        </label>
        <input type="text" class="form-control" name="cargo" required>
    </div>
</div>

<!-- Modal Ocupación -->
<div class="modal fade" id="modalOcupacion" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title fs-6">Información sobre Ocupación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Ingrese su profesión u ocupación principal.</p>
                <!-- Sección de video agregada -->

                <!--<div style="width:100%;max-width:700px;margin:auto;">
                    <iframe
                        width="100%"
                        height="350"
                        style="border-radius: 12px;"
                        src="https://www.youtube.com/embed/LWHHJcaQiH4" 
                        title="Información Tratamiento Ambulatorio"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen
                    ></iframe>
                </div>-->
            </div>
            <div class="modal-footer bg-light p-2 justify-content-start">
                <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Entendido</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Cargo -->
<div class="modal fade" id="modalCargo" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title fs-6">Información sobre Cargo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Ingrese el cargo que desempeña en su trabajo principal.</p>
                <!-- Sección de video agregada -->
                <!--<div style="width:100%;max-width:700px;margin:auto;">
                    <iframe
                        width="100%"
                        height="350"
                        style="border-radius: 12px;"
                        src="https://www.youtube.com/embed/LWHHJcaQiH4" 
                        title="Información Tratamiento Ambulatorio"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen
                    ></iframe>
                </div>-->
            </div>
            <div class="modal-footer bg-light p-2 justify-content-start">
                <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Entendido</button>
            </div>
        </div>
    </div>
</div>

<!-- Empresa donde labora o trabajará -->
<div class="mb-3">
    <label class="form-label d-flex align-items-center">
        Empresa donde labora o trabajará:
        <button class="btn btn-sm btn-outline-info ms-2 p-0 border-0" type="button" data-bs-toggle="modal" data-bs-target="#modalEmpresa">
            <i class="bi bi-info-circle"></i>
        </button>
    </label>
    <input type="text" class="form-control" name="empresa" required>
</div>

<!-- Modal Empresa -->
<div class="modal fade" id="modalEmpresa" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title fs-6">Información sobre Empresa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Ingrese el nombre de la empresa o institución donde trabaja actualmente o trabajará.</p>
                <!-- Sección de video agregada -->
                <!--<div style="width:100%;max-width:700px;margin:auto;">
                    <iframe
                        width="100%"
                        height="350"
                        style="border-radius: 12px;"
                        src="https://www.youtube.com/embed/LWHHJcaQiH4" 
                        title="Información Tratamiento Ambulatorio"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen
                    ></iframe>
                </div>-->
            </div>
            <div class="modal-footer bg-light p-2 justify-content-start">
                <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Entendido</button>
            </div>
        </div>
    </div>
</div>

<!-- Dirección, Ciudad y Departamento de la Empresa -->
<div class="row">
    <div class="col-md-6">
        <label class="form-label d-flex align-items-center">
            Dirección de la Empresa:
            <button class="btn btn-sm btn-outline-info ms-2 p-0 border-0" type="button" data-bs-toggle="modal" data-bs-target="#modalDireccionEmpresa">
                <i class="bi bi-info-circle"></i>
            </button>
        </label>
        <input type="text" class="form-control" name="direccion_empresa" required>
    </div>
    <div class="col-md-6">
        <label class="form-label d-flex align-items-center">
            Ciudad de la Empresa:
            <button class="btn btn-sm btn-outline-info ms-2 p-0 border-0" type="button" data-bs-toggle="modal" data-bs-target="#modalCiudadEmpresa">
                <i class="bi bi-info-circle"></i>
            </button>
        </label>
        <input type="text" class="form-control" name="ciudad_empresa" required>
    </div>
</div>

<!-- Modal Dirección Empresa -->
<div class="modal fade" id="modalDireccionEmpresa" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title fs-6">Información sobre Dirección</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Ingrese la dirección completa de la empresa donde labora.</p>
                <!-- Sección de video agregada -->
                <!--<div style="width:100%;max-width:700px;margin:auto;">
                    <iframe
                        width="100%"
                        height="350"
                        style="border-radius: 12px;"
                        src="https://www.youtube.com/embed/LWHHJcaQiH4" 
                        title="Información Tratamiento Ambulatorio"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen
                    ></iframe>
                </div>-->
            </div>
            <div class="modal-footer bg-light p-2 justify-content-start">
                <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Entendido</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Ciudad Empresa -->
<div class="modal fade" id="modalCiudadEmpresa" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title fs-6">Información sobre Ciudad</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Ingrese la ciudad donde se encuentra ubicada la empresa.</p>
                <!-- Sección de video agregada -->
                <!--<div style="width:100%;max-width:700px;margin:auto;">
                    <iframe
                        width="100%"
                        height="350"
                        style="border-radius: 12px;"
                        src="https://www.youtube.com/embed/LWHHJcaQiH4" 
                        title="Información Tratamiento Ambulatorio"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen
                    ></iframe>
                </div>-->
            </div>
            <div class="modal-footer bg-light p-2 justify-content-start">
                <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Entendido</button>
            </div>
        </div>
    </div>
</div>

<div class="mb-3">
    <label class="form-label d-flex align-items-center">
        Departamento de la Empresa:
        <button class="btn btn-sm btn-outline-info ms-2 p-0 border-0" type="button" data-bs-toggle="modal" data-bs-target="#modalDepartamentoEmpresa">
            <i class="bi bi-info-circle"></i>
        </button>
    </label>
    <input type="text" class="form-control" name="departamento_empresa" required>
</div>

<!-- Modal Departamento Empresa -->
<div class="modal fade" id="modalDepartamentoEmpresa" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title fs-6">Información sobre Departamento</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Ingrese el departamento donde se encuentra ubicada la empresa.</p>
                <!-- Sección de video agregada -->
                <!--<div style="width:100%;max-width:700px;margin:auto;">
                    <iframe
                        width="100%"
                        height="350"
                        style="border-radius: 12px;"
                        src="https://www.youtube.com/embed/LWHHJcaQiH4" 
                        title="Información Tratamiento Ambulatorio"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen
                    ></iframe>
                </div>  -->
            </div>
            <div class="modal-footer bg-light p-2 justify-content-start">
                <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Entendido</button>
            </div>
        </div>
    </div>
</div>

<!-- Teléfono de la Empresa (Opcional) -->
<div class="mb-3">
    <label class="form-label d-flex align-items-center">
        Teléfono de la Empresa (Opcional):
        <button class="btn btn-sm btn-outline-info ms-2 p-0 border-0" type="button" data-bs-toggle="modal" data-bs-target="#modalTelefonoEmpresa">
            <i class="bi bi-info-circle"></i>
        </button>
    </label>
    <input type="text" class="form-control" name="telefono_empresa">
</div>

<!-- Modal Teléfono Empresa -->
<div class="modal fade" id="modalTelefonoEmpresa" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title fs-6">Información sobre Teléfono</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Ingrese el número de teléfono de contacto de la empresa (opcional).</p>
                <!-- Sección de video agregada -->
                <!--<div style="width:100%;max-width:700px;margin:auto;">
                    <iframe
                        width="100%"
                        height="350"
                        style="border-radius: 12px;"
                        src="https://www.youtube.com/embed/LWHHJcaQiH4" 
                        title="Información Tratamiento Ambulatorio"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen
                    ></iframe>
                </div> -->
            </div>
            <div class="modal-footer bg-light p-2 justify-content-start">
                <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Entendido</button>
            </div>
        </div>
    </div>
</div>

<!-- Producto/Servicio -->
<div class="mb-3">
    <label class="form-label d-flex align-items-center">
        ¿QUE TIPO DE PRODUCTO Y/O SERVICIO COMERCIALIZA? (Independientes o Comerciantes)
        <button class="btn btn-sm btn-outline-info ms-2 p-0 border-0" type="button" data-bs-toggle="modal" data-bs-target="#modalProductoServicio">
            <i class="bi bi-info-circle"></i>
        </button>
    </label>
    <input type="text" class="form-control" name="producto_servicio" required>
</div>

<!-- Modal Producto/Servicio -->
<div class="modal fade" id="modalProductoServicio" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title fs-6">Información sobre Producto/Servicio</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Si es independiente o comerciante, indique qué productos o servicios ofrece.</p>
                <!-- Sección de video agregada -->
                <!--<div style="width:100%;max-width:700px;margin:auto;">
                    <iframe
                        width="100%"
                        height="350"
                        style="border-radius: 12px;"
                        src="https://www.youtube.com/embed/LWHHJcaQiH4" 
                        title="Información Tratamiento Ambulatorio"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen
                    ></iframe>
                </div>  -->
            </div>
            <div class="modal-footer bg-light p-2 justify-content-start">
                <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Entendido</button>
            </div>
        </div>
    </div>
</div>

<!-- Ingresos, Egresos, Activos, Pasivos, Patrimonio -->
<div class="row">
    <div class="col-md-4">
        <label class="form-label d-flex align-items-center">
            Ingresos Mensuales:
            <button class="btn btn-sm btn-outline-info ms-2 p-0 border-0" type="button" data-bs-toggle="modal" data-bs-target="#modalIngresosMensuales">
                <i class="bi bi-info-circle"></i>
            </button>
        </label>
        <input type="text" class="form-control money" name="ingresos_mensuales" required>
    </div>
    <div class="col-md-4">
        <label class="form-label d-flex align-items-center">
            Otros Ingresos:
            <button class="btn btn-sm btn-outline-info ms-2 p-0 border-0" type="button" data-bs-toggle="modal" data-bs-target="#modalOtrosIngresos">
                <i class="bi bi-info-circle"></i>
            </button>
        </label>
        <input type="text" class="form-control money" name="otros_ingresos" id="otros_ingresos">
    </div>
    <div class="col-md-4" id="concepto_otros_ingresos_div" style="display: none;">
        <label class="form-label">Concepto de Otros Ingresos:</label>
        <input type="text" class="form-control" name="concepto_otros_ingresos" id="concepto_otros_ingresos">
    </div>
</div>

<!-- Modal Ingresos Mensuales -->
<div class="modal fade" id="modalIngresosMensuales" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title fs-6">Información sobre Ingresos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Ingrese sus ingresos mensuales promedio en moneda local.</p>
                <!-- Sección de video agregada -->
                <!--<div style="width:100%;max-width:700px;margin:auto;">
                    <iframe
                        width="100%"
                        height="350"
                        style="border-radius: 12px;"
                        src="https://www.youtube.com/embed/LWHHJcaQiH4" 
                        title="Información Tratamiento Ambulatorio"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen
                    ></iframe>
                </div>-->
            </div>
            <div class="modal-footer bg-light p-2 justify-content-start">
                <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Entendido</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Otros Ingresos -->
<div class="modal fade" id="modalOtrosIngresos" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title fs-6">Información sobre Otros Ingresos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Ingrese otros ingresos adicionales a los principales (opcional).</p>
                <!-- Sección de video agregada -->
                <!--<div style="width:100%;max-width:700px;margin:auto;">
                    <iframe
                        width="100%"
                        height="350"
                        style="border-radius: 12px;"
                        src="https://www.youtube.com/embed/LWHHJcaQiH4" 
                        title="Información Tratamiento Ambulatorio"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen
                    ></iframe>
                </div>-->
            </div>
            <div class="modal-footer bg-light p-2 justify-content-start">
                <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Entendido</button>
            </div>
        </div>
    </div>
</div>

<div class="row mt-3">
    <div class="col-md-3">
        <label class="form-label d-flex align-items-center">
            Egresos Mensuales:
            <button class="btn btn-sm btn-outline-info ms-2 p-0 border-0" type="button" data-bs-toggle="modal" data-bs-target="#modalEgresosMensuales">
                <i class="bi bi-info-circle"></i>
            </button>
        </label>
        <input type="text" class="form-control money" name="egresos_mensuales" required>
    </div>
    <div class="col-md-3">
        <label class="form-label d-flex align-items-center">
            Activos:
            <button class="btn btn-sm btn-outline-info ms-2 p-0 border-0" type="button" data-bs-toggle="modal" data-bs-target="#modalActivos">
                <i class="bi bi-info-circle"></i>
            </button>
        </label>
        <input type="text" class="form-control money" name="activos" id="activos" required>
    </div>
    <div class="col-md-3">
        <label class="form-label d-flex align-items-center">
            Pasivos:
            <button class="btn btn-sm btn-outline-info ms-2 p-0 border-0" type="button" data-bs-toggle="modal" data-bs-target="#modalPasivos">
                <i class="bi bi-info-circle"></i>
            </button>
        </label>
        <input type="text" class="form-control money" name="pasivos" id="pasivos">
    </div>
    <div class="col-md-3">
        <label class="form-label d-flex align-items-center">
            Patrimonio:
            <button class="btn btn-sm btn-outline-info ms-2 p-0 border-0" type="button" data-bs-toggle="modal" data-bs-target="#modalPatrimonio">
                <i class="bi bi-info-circle"></i>
            </button>
        </label>
        <input type="text" class="form-control" name="patrimonio" id="patrimonio" readonly>
    </div>
</div>

<!-- Modal Egresos Mensuales -->
<div class="modal fade" id="modalEgresosMensuales" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title fs-6">Información sobre Egresos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Ingrese sus gastos mensuales promedio en moneda local.</p>
                <!-- Sección de video agregada -->
                <!--<div style="width:100%;max-width:700px;margin:auto;">
                    <iframe
                        width="100%"
                        height="350"
                        style="border-radius: 12px;"
                        src="https://www.youtube.com/embed/LWHHJcaQiH4" 
                        title="Información Tratamiento Ambulatorio"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen
                    ></iframe>
                </div>-->
            </div>
            <div class="modal-footer bg-light p-2 justify-content-start">
                <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Entendido</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Activos -->
<div class="modal fade" id="modalActivos" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title fs-6">Información sobre Activos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Ingrese el valor total de sus activos (propiedades, inversiones, etc.).</p>
                <!-- Sección de video agregada -->
                <!--<div style="width:100%;max-width:700px;margin:auto;">
                    <iframe
                        width="100%"
                        height="350"
                        style="border-radius: 12px;"
                        src="https://www.youtube.com/embed/LWHHJcaQiH4" 
                        title="Información Tratamiento Ambulatorio"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen
                    ></iframe>
                </div> -->
            </div>
            <div class="modal-footer bg-light p-2 justify-content-start">
                <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Entendido</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Pasivos -->
<div class="modal fade" id="modalPasivos" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title fs-6">Información sobre Pasivos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Ingrese el valor total de sus deudas y obligaciones (opcional).</p>
                <!-- Sección de video agregada -->
                <!--<div style="width:100%;max-width:700px;margin:auto;">
                    <iframe
                        width="100%"
                        height="350"
                        style="border-radius: 12px;"
                        src="https://www.youtube.com/embed/LWHHJcaQiH4" 
                        title="Información Tratamiento Ambulatorio"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen
                    ></iframe>
                </div> -->
            </div>
            <div class="modal-footer bg-light p-2 justify-content-start">
                <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Entendido</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Patrimonio -->
<div class="modal fade" id="modalPatrimonio" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title fs-6">Información sobre Patrimonio</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Este campo se calcula automáticamente como la diferencia entre sus activos y pasivos.</p>
                <!-- Sección de video agregada -->
                <!--<div style="width:100%;max-width:700px;margin:auto;">
                    <iframe
                        width="100%"
                        height="350"
                        style="border-radius: 12px;"
                        src="https://www.youtube.com/embed/LWHHJcaQiH4" 
                        title="Información Tratamiento Ambulatorio"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen
                    ></iframe>
                </div> -->
            </div>
            <div class="modal-footer bg-light p-2 justify-content-start">
                <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Entendido</button>
            </div>
        </div>
    </div>
</div>

<!-- Vínculo Familiar con PEP -->
<div class="mb-3">
    <label class="form-label d-flex align-items-center">
        ¿Es usted una Persona Expuesta Políticamente (PEP)?:
        <button class="btn btn-sm btn-outline-info ms-2 p-0 border-0" type="button" data-bs-toggle="modal" data-bs-target="#modalPEP">
            <i class="bi bi-info-circle"></i>
        </button>
    </label>
    <div>
        <input type="radio" name="persona_pep" value="SI" required> SI
        <input type="radio" name="persona_pep" value="NO"> NO
    </div>
</div>

<!-- Modal PEP -->
<div class="modal fade" id="modalPEP" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title fs-6">Información sobre PEP</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Una Persona Expuesta Políticamente (PEP) es alguien que desempeña o ha desempeñado funciones públicas importantes.</p>
                <!-- Sección de video agregada -->
                <!--<div style="width:100%;max-width:700px;margin:auto;">
                    <iframe
                        width="100%"
                        height="350"
                        style="border-radius: 12px;"
                        src="https://www.youtube.com/embed/LWHHJcaQiH4" 
                        title="Información Tratamiento Ambulatorio"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen
                    ></iframe>
                </div> -->
            </div>
            <div class="modal-footer bg-light p-2 justify-content-start">
                <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Entendido</button>
            </div>
        </div>
    </div>
</div>

<!-- Vínculo Familiar con PEP -->
<div class="mb-3">
    <label class="form-label d-flex align-items-center">
        ¿Existe algún vínculo familiar, civil y/o asociación entre usted y una PEP?:
        <button class="btn btn-sm btn-outline-info ms-2 p-0 border-0" type="button" data-bs-toggle="modal" data-bs-target="#modalVinculoPEP">
            <i class="bi bi-info-circle"></i>
        </button>
    </label>
    <div>
        <input type="radio" name="vinculo_pep" value="SI" required> SI
        <input type="radio" name="vinculo_pep" value="NO"> NO
    </div>
</div>

<!-- Modal Vínculo PEP -->
<div class="modal fade" id="modalVinculoPEP" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title fs-6">Información sobre Vínculo PEP</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Indique si tiene algún familiar cercano o asociación con una Persona Expuesta Políticamente.</p>
                <!-- Sección de video agregada -->
                <!--<div style="width:100%;max-width:700px;margin:auto;">
                    <iframe
                        width="100%"
                        height="350"
                        style="border-radius: 12px;"
                        src="https://www.youtube.com/embed/LWHHJcaQiH4" 
                        title="Información Tratamiento Ambulatorio"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen
                    ></iframe>
                </div> -->
            </div>
            <div class="modal-footer bg-light p-2 justify-content-start">
                <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Entendido</button>
            </div>
        </div>
    </div>
</div>

<!-- Administra Recursos Públicos -->
<div class="mb-3">
    <label class="form-label d-flex align-items-center">
        ¿Por su cargo o actividad, administra recursos públicos?:
        <button class="btn btn-sm btn-outline-info ms-2 p-0 border-0" type="button" data-bs-toggle="modal" data-bs-target="#modalRecursosPublicos">
            <i class="bi bi-info-circle"></i>
        </button>
    </label>
    <div>
        <input type="radio" name="administra_recursos_publicos" value="SI" required> SI
        <input type="radio" name="administra_recursos_publicos" value="NO"> NO
    </div>
</div>

<!-- Modal Recursos Públicos -->
<div class="modal fade" id="modalRecursosPublicos" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title fs-6">Información sobre Recursos Públicos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Indique si en su trabajo maneja fondos o recursos del estado.</p>
                <!-- Sección de video agregada -->
                <!--<div style="width:100%;max-width:700px;margin:auto;">
                    <iframe
                        width="100%"
                        height="350"
                        style="border-radius: 12px;"
                        src="https://www.youtube.com/embed/LWHHJcaQiH4" 
                        title="Información Tratamiento Ambulatorio"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen
                    ></iframe>
                </div> -->
            </div>
            <div class="modal-footer bg-light p-2 justify-content-start">
                <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Entendido</button>
            </div>
        </div>
    </div>
</div>

<!-- Operaciones Internacionales -->
<div class="mb-3">
    <label class="form-label d-flex align-items-center">
        ¿Realiza operaciones internacionales?:
        <button class="btn btn-sm btn-outline-info ms-2 p-0 border-0" type="button" data-bs-toggle="modal" data-bs-target="#modalOperacionesInternacionales">
            <i class="bi bi-info-circle"></i>
        </button>
    </label>
    <div>
        <input type="radio" name="operaciones_internacionales" value="SI" required> SI
        <input type="radio" name="operaciones_internacionales" value="NO"> NO
    </div>
    <div id="detalles_operaciones_internacionales" style="display: none;">
        <label class="form-label">Indique:</label>
        <input type="text" class="form-control" name="detalles_operaciones_internacionales">
    </div>
</div>

<!-- Modal Operaciones Internacionales -->
<div class="modal fade" id="modalOperacionesInternacionales" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title fs-6">Información sobre Operaciones Internacionales</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Indique si realiza transacciones comerciales o financieras con el exterior.</p>
                <!-- Sección de video agregada -->

            </div>
            <div class="modal-footer bg-light p-2 justify-content-start">
                <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Entendido</button>
            </div>
        </div>
    </div>
</div>

<!-- Obligaciones Tributarias en Otro País -->
<div class="mb-3">
    <label class="form-label d-flex align-items-center">
        ¿Es usted sujeto de obligaciones tributarias en otro país o grupo de países?:
        <button class="btn btn-sm btn-outline-info ms-2 p-0 border-0" type="button" data-bs-toggle="modal" data-bs-target="#modalObligacionesTributarias">
            <i class="bi bi-info-circle"></i>
        </button>
    </label>
    <div>
        <input type="radio" name="obligaciones_tributarias" value="SI" required> SI
        <input type="radio" name="obligaciones_tributarias" value="NO"> NO
    </div>
    <div id="detalles_obligaciones_tributarias" style="display: none;">
        <label class="form-label">Indique:</label>
        <input type="text" class="form-control" name="detalles_obligaciones_tributarias">
    </div>
</div>

<!-- Modal Obligaciones Tributarias -->
<div class="modal fade" id="modalObligacionesTributarias" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title fs-6">Información sobre Obligaciones Tributarias</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Indique si debe pagar impuestos en otros países además del suyo.</p>
                <!-- Sección de video agregada -->

            </div>
            <div class="modal-footer bg-light p-2 justify-content-start">
                <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Entendido</button>
            </div>
        </div>
    </div>
</div>

<!-- Responsable del RUT -->
<div class="mb-3">
    <label class="form-label d-flex align-items-center">
        ¿Es responsable del RUT?:
        <button class="btn btn-sm btn-outline-info ms-2 p-0 border-0" type="button" data-bs-toggle="modal" data-bs-target="#modalResponsableRUT">
            <i class="bi bi-info-circle"></i>
        </button>
    </label>
    <div>
        <input type="radio" name="responsable_rut" value="SI" required> SI
        <input type="radio" name="responsable_rut" value="NO"> NO
    </div>
    <div id="detalles_responsable_rut" style="display: none;">
        <label class="form-label">Código/s de Responsabilidad:</label>
        <input type="text" class="form-control" name="codigo_responsabilidad">
        <label class="form-label">Correo Electrónico registrado en la DIAN:</label>
        <input type="email" class="form-control" name="correo_dian">
    </div>
</div>

<!-- Modal Responsable RUT -->
<div class="modal fade" id="modalResponsableRUT" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title fs-6">Información sobre Responsable RUT</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Indique si es responsable del Registro Único Tributario ante la DIAN.</p>
                <!-- Sección de video agregada -->

            </div>
            <div class="modal-footer bg-light p-2 justify-content-start">
                <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Entendido</button>
            </div>
        </div>
    </div>
</div>

<!-- Origen de fondos -->
<div class="row">
    <div class="col-md-6">
        <label class="form-label d-flex align-items-center">
            Origen de fondos:
            <button class="btn btn-sm btn-outline-info ms-2 p-0 border-0" type="button" data-bs-toggle="modal" data-bs-target="#modalOrigenFondos">
                <i class="bi bi-info-circle"></i> Más información
            </button>
        </label>
        <input type="text" class="form-control" name="fondos" required>
    </div>
</div>

<!-- Modal para Origen de Fondos -->
<div class="modal fade" id="modalOrigenFondos" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title fs-6">Información sobre Origen de Fondos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Indique el origen de sus ingresos principales (ej: salario, negocios, inversiones, etc.).</p>
                <!-- Sección de video agregada -->

            </div>
            <div class="modal-footer bg-light p-2 justify-content-start">
                <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Entendido</button>
            </div>
        </div>
    </div>
</div>

    <div class="row">
        <div class="col-md-6">
            <label class="form-label">Asi mismo, entiendase como INTERMEDIARIO DE SEGUROS:</label>
            <input type="text" class="form-control" name="intermediario" value="Ibeth Pana waffer y Cia LTDA" readonly>
        </div>
        <div class="col-md-6">
            <label class="form-label">Telefono:</label>
            <input type="text" class="form-control" name="intermediario_in" value="3008000231" readonly>
        </div>
        <div class="col-md-6">
            <label class="form-label">Direccion:</label>
            <input type="text" class="form-control" name="direccion_in" value="calle 16 # 12-100" readonly>
        </div>
    </div>


  
<!-- Autorización de Datos -->
<div class="mb-3">
    <label class="form-label">
        Autorizo expresa e inequívocamente a usar mis datos personales con fines comerciales:
    </label>
    <div>
        <input type="radio" name="autorizacion_datos" value="SI" checked required> SI
        <input type="radio" name="autorizacion_datos" value="NO"> NO
    </div>
</div>



    <!-- Botón de Envío -->
    <button type="submit" class="btn btn-primary w-100">Generar PDF</button>
    
</form>
</div>
</div>

<script>
const inputVisible = document.getElementById('suma_asegurada_visible');
const inputReal = document.getElementById('suma_asegurada_real');

inputVisible.addEventListener('input', () => {
let value = inputVisible.value.replace(/\D/g, '');
if (value) {
    inputVisible.value = new Intl.NumberFormat('es-CO').format(value);
    inputReal.value = value;
} else {
    inputVisible.value = '';
    inputReal.value = '';
}
});
</script>



<script>
const inputLimiteVisible = document.getElementById('limite_asegurado_visible');
const inputLimiteReal = document.getElementById('limite_asegurado_real');

inputLimiteVisible.addEventListener('input', () => {
let value = inputLimiteVisible.value.replace(/\D/g, '');
if (value) {
inputLimiteVisible.value = new Intl.NumberFormat('es-CO').format(value);
inputLimiteReal.value = value;
} else {
inputLimiteVisible.value = '';
inputLimiteReal.value = '';
}
});
</script>

<!-- Script para mostrar/ocultar detalles en campos de "SI/NO" -->
<script>
document.addEventListener('DOMContentLoaded', function () {
const toggleDetails = (radioName, detailsId) => {
    const radioButtons = document.querySelectorAll(`input[name="${radioName}"]`);
    const detailsDiv = document.getElementById(detailsId);

    radioButtons.forEach(radio => {
        radio.addEventListener('change', () => {
            if (radio.value === 'SI') {
                detailsDiv.style.display = 'block';
            } else {
                detailsDiv.style.display = 'none';
            }
        });
    });
};
toggleDetails('ejercicio_privado', 'detalles_ejercicio_privado');
toggleDetails('otros_riesgos', 'detalles_otros_riesgos');
toggleDetails('prestacion_servicios', 'detalles_prestacion_servicios');
toggleDetails('ejercicio_laboral', 'detalles_ejercicio_laboral');
toggleDetails('ejercicio_otras_ocasiones', 'detalles_ejercicio_otras_ocasiones');
toggleDetails('reclamacion_responsabilidad', 'detalles_reclamacion_responsabilidad');
toggleDetails('circunstancia_responsabilidad', 'detalles_circunstancia_responsabilidad');
toggleDetails('seguro_responsabilidad', 'detalles_seguro_responsabilidad');
toggleDetails('rehusada_cancelada_poliza', 'detalles_rehusada_cancelada_poliza');
toggleDetails('operaciones_internacionales', 'detalles_operaciones_internacionales');
toggleDetails('obligaciones_tributarias', 'detalles_obligaciones_tributarias');
toggleDetails('responsable_rut', 'detalles_responsable_rut');

});
</script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const checkboxes = document.querySelectorAll('.especializacion-check');
    
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', () => {
                if (checkbox.checked) {
                    checkboxes.forEach(cb => {
                        if (cb !== checkbox) cb.checked = false;
                    });
                }
            });
        });
    });
    </script>
<script>

function cleanNumber(value) {
return parseInt(value.replace(/[^0-9]/g, '')) || 0;
}

function formatCurrency(value) {
return new Intl.NumberFormat('es-CO', {
    style: 'currency',
    currency: 'COP',
    minimumFractionDigits: 0
}).format(value);
}

document.querySelectorAll('.money').forEach(input => {
input.addEventListener('input', function () {
    const num = cleanNumber(this.value);
    this.value = num ? formatCurrency(num) : '';
});
});

const activos = document.getElementById('activos');
const pasivos = document.getElementById('pasivos');
const patrimonio = document.getElementById('patrimonio');

function updatePatrimonio() {
const a = cleanNumber(activos.value);
const p = cleanNumber(pasivos.value);

if (a < p) {
    alert('⚠️ Los pasivos no pueden ser mayores que los activos.');
    pasivos.value = '';
    patrimonio.value = '';
    return;
}

patrimonio.value = formatCurrency(a - p);
}

activos.addEventListener('input', updatePatrimonio);
pasivos.addEventListener('input', updatePatrimonio);
</script>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const selectDepartamento = document.getElementById('departamento');
    const selectCiudad = document.getElementById('ciudad_residencia');

    fetch('/data/colombia.json')
        .then(res => res.json())
        .then(data => {
            // Llenar departamentos
            data.forEach(entry => {
                const option = document.createElement('option');
                option.value = entry.departamento;
                option.textContent = entry.departamento;
                selectDepartamento.appendChild(option);
            });

            // Escuchar cambios en el departamento
            selectDepartamento.addEventListener('change', () => {
                const selectedDepto = selectDepartamento.value;
                const deptoData = data.find(d => d.departamento === selectedDepto);

                // Limpiar ciudades anteriores
                selectCiudad.innerHTML = '<option value="">Seleccione un municipio</option>';

                if (deptoData && deptoData.ciudades) {
                    deptoData.ciudades.forEach(ciudad => {
                        const option = document.createElement('option');
                        option.value = ciudad;
                        option.textContent = ciudad;
                        selectCiudad.appendChild(option);
                    });
                }
            });
        })
        .catch(err => console.error('Error al cargar el archivo de departamentos:', err));
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function () {
  const otrosIngresos = document.getElementById('otros_ingresos');
  const conceptoDiv = document.getElementById('concepto_otros_ingresos_div');
  const conceptoInput = document.getElementById('concepto_otros_ingresos');

  // Mostrar u ocultar al cargar (si hay valor)
  if (otrosIngresos.value.trim() !== "") {
    conceptoDiv.style.display = 'block';
  } else {
    conceptoDiv.style.display = 'none';
    conceptoInput.value = "";
  }

  otrosIngresos.addEventListener('input', function () {
    if (this.value.trim() !== "") {
      conceptoDiv.style.display = 'block';
    } else {
      conceptoDiv.style.display = 'none';
      conceptoInput.value = "";
    }
  });
});
</script>






@endsection