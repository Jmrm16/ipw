<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<?php $__env->startSection('title', 'Formulario de Responsabilidad Civil Profesional para Médicos'); ?>
<?php $__env->startSection('content'); ?>

<!-- Encabezado de la Página -->
<div class="container-fluid page-header d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5 mb-5">
    <h1 class="display-4 text-white mb-3 mt-0 mt-lg-5">Poliza de responsabilidad civil para profecioanles de la salud</h1>
    <div class="d-inline-flex text-white">
        <p class="m-0"><a class="text-white" href="<?php echo e(url('/')); ?>">Inicio</a></p>
        <p class="m-0 px-2">/</p>
        <p class="m-0">Formulario</p>
    </div>
</div>

<div class="container mt-5">
    <div class="card shadow p-4">
        <h2 class="text-center mb-4">Complete sus Datos</h2>
        <?php if(Auth::check()): ?>
    <div class="alert alert-success text-center">
        Usuario autenticado: <?php echo e(Auth::user()->name); ?>

    </div>
<?php else: ?>
    <div class="alert alert-danger text-center">
        No estás autenticado. Algunos datos pueden no guardarse correctamente.
    </div>
<?php endif; ?>

<form action="<?php echo e(route('formulario.store')); ?>" method="POST">
   
    <?php echo csrf_field(); ?>

    <!-- Fecha, Ciudad y Sucursal -->
    <div class="mb-3">
        <label class="form-label">Fecha:</label>
        <input type="text" class="form-control" name="fecha" value="<?php echo e(date('Y-m-d')); ?>" readonly>
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
    <label>Tipo de Solicitud:</label>
    <select name="tipo_solicitud">
        <option value="VINCULACION">VINCULACIÓN</option>
        <option value="RENOVACION">RENOVACIÓN</option>
        <option value="ACTUALIZACION">ACTUALIZACIÓN</option>
    </select><br><br>


    <!-- Clase de Vinculación -->
        <div class="row">
        <div class="col-md-6">
            <label class="form-label">Clase de vinculacion:</label>
            <input type="text" class="form-control" name="clase_vinculacion" value="TOMADOR" readonly>
        </div>

    </div>



    <!-- Información Personal -->
    <div class="row">
        <div class="col-md-6">
            <label class="form-label">Primer Apellido:</label>
            <input type="text" class="form-control" name="primer_apellido" required>
        </div>
        <div class="col-md-6">
            <label class="form-label">Segundo Apellido:</label>
            <input type="text" class="form-control" name="segundo_apellido" >
        </div>
    </div>

    <div class="mb-3">
        <label class="form-label">Nombre:</label>
        <input type="text" class="form-control" name="nombres" required>
    </div>

    <!-- Tipo de Documento y Número de Identificación -->
    <div class="row">
        <div class="col-md-6">
            <label class="form-label">Tipo de Documento:</label>
            <select class="form-select" name="tipo_documento" required>
                <option value="C.C.">Cédula de Ciudadanía</option>
                <option value="C.E.">Cédula de Extranjería</option>
                <option value="NUIP">NUIP</option>
                <option value="T.I.">Tarjeta de Identidad</option>
                <option value="PASAPORTE">Pasaporte</option>
            </select>
        </div>
        <div class="col-md-6">
            <label class="form-label">Número de Identificación:</label>
            <input type="text" class="form-control" name="numero_identificacion" required>
        </div>
    </div>

    <!-- Fecha de Expedición y Lugar de Expedición -->
    <div class="row">
        <div class="col-md-6">
            <label class="form-label">Fecha de Expedición:</label>
            <input type="date" class="form-control" name="fecha_expedicion" required>
        </div>
        <div class="col-md-6">
            <label class="form-label">Lugar de Expedición:</label>
            <input type="text" class="form-control" name="lugar_expedicion" required>
        </div>
    </div>

    <!-- Fecha de Nacimiento y Lugar de Nacimiento -->
    <div class="row">
        <div class="col-md-6">
            <label class="form-label">Fecha de Nacimiento:</label>
            <input type="date" class="form-control" name="fecha_nacimiento" required>
        </div>
        <div class="col-md-6">
            <label class="form-label">Lugar de Nacimiento:</label>
            <input type="text" class="form-control" name="lugar_nacimiento" required>
        </div>
    </div>

    <!-- Nacionalidad 1 y Nacionalidad 2 -->
    <div class="row">
        <div class="col-md-6">
            <label class="form-label">Nacionalidad 1:</label>
            <input type="text" class="form-control" name="nacionalidad_1" required>
        </div>
        <div class="col-md-6">
            <label class="form-label">Nacionalidad 2:</label>
            <input type="text" class="form-control" name="nacionalidad_2">
        </div>
    </div>

    <!-- Email y Celular -->
    <div class="row">
        <div class="col-md-6">
            <label class="form-label">Email:</label>
            <input type="email" class="form-control" name="email" required>
        </div>
        <div class="col-md-6">
            <label class="form-label">Celular:</label>
            <input type="text" class="form-control" name="celular" required>
        </div>
    </div>

<!-- Departamento -->
<div class="mb-3">
    <label class="form-label">Departamento:</label>
    <select class="form-select" id="departamento" name="departamento" required>
        <option value="">Seleccione un departamento</option>
        <!-- Se llena dinámicamente con JS -->
    </select>
</div>

<!-- Ciudad/Municipio -->
<div class="mb-3">
    <label class="form-label">Ciudad o Municipio:</label>
    <select class="form-select" id="ciudad_residencia" name="ciudad_residencia" required>
        <option value="">Seleccione un municipio</option>
        <!-- Se llena dinámicamente con JS -->
    </select>
</div>

<!-- Dirección -->
<div class="mb-3">
    <label class="form-label">Dirección:</label>
    <input type="text" class="form-control" name="direccion" required>
</div>


    <!-- Título Profesional, Otorgado Por y Fecha de Graduación -->
    <div class="mb-3">
        <div class="d-flex align-items-center mb-1">
          <label class="form-label mb-0">Título Profesional:</label>
          <button class="btn btn-sm btn-outline-info ms-2 p-0 border-0" type="button" data-bs-toggle="modal" data-bs-target="#modalTituloProfesional">
            <i class="bi bi-info-circle"></i>
          </button>
        </div>
        <input type="text" class="form-control" name="titulo_profesional" required>
      </div>
      
      <!-- Modal para Título Profesional -->
      <div class="modal fade" id="modalTituloProfesional" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header bg-light p-3">
              <h5 class="modal-title fs-6">Información sobre Título Profesional</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-3">
              <p>Ingrese el nombre completo del título obtenido al finalizar sus estudios:</p>
              
              <ul class="mb-3">
                <li><strong>Ejemplos válidos:</strong></li>
                <li>Médico General</li>
                <li>Auxiliar de Enfermería</li>
                <li>Especialización en Pediatría</li>
                <li>Técnico en Radiología</li>
              </ul>
              
              <div class="alert alert-warning p-2 small">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                Debe coincidir exactamente con el nombre en su diploma o acta de grado.
              </div>
            </div>
            <div class="modal-footer bg-light p-2 justify-content-start">
              <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Entendido</button>
            </div>
          </div>
        </div>
      </div>

    <div class="mb-3">
        <label class="form-label">Otorgado Por (Entidad que otorgó el diploma):</label>
        <input type="text" class="form-control" name="otorgado_por" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Fecha de Graduación:</label>
        <input type="date" class="form-control" name="fecha_graduacion" required>
    </div>


    <div class="mb-3">
        <div class="d-flex align-items-center mb-1">
          <label class="form-label mb-0">No. Registro Profesional:</label>
          <button class="btn btn-sm btn-outline-info ms-2 p-0 border-0" type="button" data-bs-toggle="modal" data-bs-target="#modalRegistroProfesional">
            <i class="bi bi-info-circle"></i>
          </button>
        </div>
        <input type="text" class="form-control" name="registro_profecional" required>
      </div>
      
      <!-- Modal para Registro Profesional -->
      <div class="modal fade" id="modalRegistroProfesional" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header bg-light p-3">
              <h5 class="modal-title fs-6">Información sobre Registro Profesional</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-3">
              <p>El número de registro profesional es el numero asignado en el RETHUS (Acto Administrativo).</p>
              
              <div class="alert alert-info p-2 mt-2 small">
                <i class="bi bi-info-circle-fill me-2"></i>
                Ejemplo: 12345
              </div>
              
              <p class="small text-muted mb-0">Este número valida su autorización para ejercer la profesión en Colombia.</p>
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
        <i class="bi bi-info-circle"></i>
    </button>
</div>

<!-- El modal -->
<div class="modal fade" id="modalMedicoGeneral" tabindex="-1" aria-labelledby="modalMedicoGeneralLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalMedicoGeneralLabel">Información - Otra Especialización</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                Marque esta casilla si tu profesion es:
            </div>
            <ul class="mb-3">
                <li>- AUXILIARES DE ENFERMERÍA</li>
                <li>- AUXILIAR DE LABORATORIO BÁSICO ESPECIALIZADO</li>
                <li>- AUXILIAR DE RADIOLOGÍA E IMAGENOLOGÍA</li>
                <li>- AUXILIARES DE DIFERENTES ÁREAS MÉDICAS</li>
                <li>- FONOAUDIÓLOGO</li>
                <li>- HIGIENISTA ORAL Y ODONTÓLOGOS SIN ESPECIALIDAD</li>
                <li>- NUTRICIONISTA</li>
                <li>- TECNICOS EN ATENCIÓN INICIAL RESOLUCION O REMISIÓN DE PACIENTES EN URGENCIAS TRIAGE</li>
              </ul>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
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

    <!-- Posee Equipos -->
    <div class="mb-3">
        <label class="form-label">Posee Uno o Varios de los SIguientes Equipos:</label>
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
    

    <!-- Alojar Pacientes Durante Tratamiento -->
    <div class="mb-3">
        <label class="form-label">Existe la Posibilidad de Alojar a los Pacientes Durante Tratamiento:</label>
        <div>
            <input type="radio" name="alojar_pacientes" value="SI" required> SI
            <input type="radio" name="alojar_pacientes" value="NO"> NO
        </div>

    </div>

    <!-- Tratamiento Solo Ambulatorio -->
    <div class="mb-3">
        <label class="form-label">Tratamiento de Pacientes es Solo Ambulatorio:</label>
        <div>
            <input type="radio" name="tratamiento_ambulatorio" value="SI" required> SI
            <input type="radio" name="tratamiento_ambulatorio" value="NO"> NO
        </div>

    </div>

    <!-- Otros Riesgos -->
    <div class="mb-3">
        <label class="form-label">Existen Otros Riesgos (Laboratorios, Farmacias, etc.):</label>
        <div>
            <input type="radio" name="otros_riesgos" value="SI" required> SI
            <input type="radio" name="otros_riesgos" value="NO"> NO
        </div>
        <div id="detalles_otros_riesgos" style="display: none;">
            <label class="form-label">Detalles:</label>
            <input type="text" class="form-control" name="detalles_otros_riesgos">
        </div>
    </div>

    <!-- Ejercicio Exclusivo en Consultorio -->
    <div class="mb-3">
        <label class="form-label">Ejercicio de las Actividades Profecionales Exclusivamente en el Consultorio Arriba indicado:</label>
        <div>
            <input type="radio" name="ejercicio_exclusivo" value="SI" required> SI
            <input type="radio" name="ejercicio_exclusivo" value="NO"> NO
        </div>
    </div>

    <!-- Prestación de Servicios en Otras Instituciones -->
    <div class="mb-3">
        <label class="form-label">Prestación de Servicios  Profecionales Tambien en Otras Instituciones de Salud o Empresa:</label>
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

    <!-- Ejercicio Bajo Relación Laboral -->
    <div class="mb-3">
        <label class="form-label">Ejercicio profesional bajo relación laboral con una institución de salud, una empresa o cualquier entidad pública o privada, incluyendo médicos particulares:</label>
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

    <!-- Ejercicio en Otras Ocasiones -->
    <div class="mb-3">
        <label class="form-label">Ejercicio de las actividades profesionales también en otras ocasiones: ejemplo consultorio propio y/o otra clínica, etc.</label>
        <div>
            <input type="radio" name="ejercicio_otras_ocasiones" value="SI" required> SI
            <input type="radio" name="ejercicio_otras_ocasiones" value="NO"> NO
        </div>
        <div id="detalles_ejercicio_otras_ocasiones" style="display: none;">
            <label class="form-label">Detalles:</label>
            <input type="text" class="form-control" name="detalles_ejercicio_otras_ocasiones">
        </div>
    </div>

    <!-- Reclamación de Responsabilidad Civil en los Últimos 5 Años -->
    <div class="mb-3">
        <label class="form-label">Ha tenido alguna reclamación de responsabilidad civil profesional durante los últimos cinco (5) años:</label>
        <div>
            <input type="radio" name="reclamacion_responsabilidad" value="SI" required> SI
            <input type="radio" name="reclamacion_responsabilidad" value="NO"> NO
        </div>
        <div id="detalles_reclamacion_responsabilidad" style="display: none;">
            <label class="form-label">Detalles:</label>
            <input type="text" class="form-control" name="detalles_reclamacion_responsabilidad">
        </div>
    </div>

    <!-- Circunstancia que Pudiese Comprometer Responsabilidad Civil -->
    <div class="mb-3">
        <label class="form-label">Tiene conocimiento de alguna circunstancia que pudiese comprometer su responsabilidad civil profesional:</label>
        <div>
            <input type="radio" name="circunstancia_responsabilidad" value="SI" required> SI
            <input type="radio" name="circunstancia_responsabilidad" value="NO"> NO
        </div>
        <div id="detalles_circunstancia_responsabilidad" style="display: none;">
            <label class="form-label">Detalles:</label>
            <input type="text" class="form-control" name="detalles_circunstancia_responsabilidad">
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
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_info_seguro_label">Información sobre el Seguro</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                 Debe colocar la información de la póliza anterior.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>





    <!-- Rehusada o Cancelada Póliza de Responsabilidad Civil -->
    <div class="mb-3">
        <label class="form-label">Le ha sido rehusada o cancelada la póliza de responsabilidad civil profesional por alguna compañía de seguros:</label>
        <div>
            <input type="radio" name="rehusada_cancelada_poliza" value="SI" required> SI
            <input type="radio" name="rehusada_cancelada_poliza" value="NO"> NO
        </div>
        <div id="detalles_rehusada_cancelada_poliza" style="display: none;">
            <label class="form-label">Detalles:</label>
            <input type="text" class="form-control" name="detalles_rehusada_cancelada_poliza">
        </div>
    </div>

<!-- Suma Asegurada Solicitada -->
<div class="mb-3">
<label class="form-label">Suma Asegurada Solicitada:</label>
<input type="text" class="form-control" id="suma_asegurada_visible" required>
<input type="hidden" name="suma_asegurada" id="suma_asegurada_real">
</div>

<!-- Actividad Principal -->
<div class="mb-3">
    <label class="form-label">Actividad Principal:</label>
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


  

    <!-- Código CIIU -->
    <div class="mb-3">
        <label class="form-label">Código CIIU:</label>
        <input type="text" class="form-control" name="codigo_ciiu" required>
    </div>


         <!-- Sector y Tipo de Actividad -->
    <div class="mb-3">
        <label class="form-label">Sector y Tipo de Actividad:</label>
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
      </div> 

      <div class="row">
        <div class="col-md-6">
            <label class="form-label">¿Cual?:</label>
            <input type="text" class="form-control" name="cual" required>
        </div>
    </div>

      

    <!-- Ocupación y Cargo -->
    <div class="row">
        <div class="col-md-6">
            <label class="form-label">Ocupación:</label>
            <input type="text" class="form-control" name="ocupacion" required>
        </div>
        <div class="col-md-6">
            <label class="form-label">Cargo:</label>
            <input type="text" class="form-control" name="cargo" required>
        </div>
    </div>

    <!-- Empresa donde labora o trabajará -->
    <div class="mb-3">
        <label class="form-label">Empresa donde labora o trabajará:</label>
        <input type="text" class="form-control" name="empresa" required>
    </div>

    <!-- Dirección, Ciudad y Departamento de la Empresa -->
    <div class="row">
        <div class="col-md-6">
            <label class="form-label">Dirección de la Empresa:</label>
            <input type="text" class="form-control" name="direccion_empresa" required>
        </div>
        <div class="col-md-6">
            <label class="form-label">Ciudad de la Empresa:</label>
            <input type="text" class="form-control" name="ciudad_empresa" required>
        </div>
    </div>

    <div class="mb-3">
        <label class="form-label">Departamento de la Empresa:</label>
        <input type="text" class="form-control" name="departamento_empresa" required>
    </div>

    <!-- Teléfono de la Empresa (Opcional) -->
    <div class="mb-3">
        <label class="form-label">Teléfono de la Empresa (Opcional):</label>
        <input type="text" class="form-control" name="telefono_empresa">
    </div>

    <div class="mb-3">
        <label class="form-label">¿QUE TIPO DE PRODUCTO Y/O SERVICIO COMERCIALIZA? (Independientes o Comerciantes)</label>
        <input type="text" class="form-control" name="producto_servicio" required>
    </div>


<!-- Ingresos, Egresos, Activos, Pasivos, Patrimonio -->
<div class="row">
<div class="col-md-4">
<label class="form-label">Ingresos Mensuales:</label>
<input type="text" class="form-control money" name="ingresos_mensuales" required>
</div>
<div class="col-md-4">
<label class="form-label">Otros Ingresos:</label>
<input type="text" class="form-control money" name="otros_ingresos">
</div>
<div class="col-md-4">
<label class="form-label">Concepto de Otros Ingresos:</label>
<input type="text" class="form-control" name="concepto_otros_ingresos">
</div>
</div>

<div class="row mt-3">
<div class="col-md-3">
<label class="form-label">Egresos Mensuales:</label>
<input type="text" class="form-control money" name="egresos_mensuales" required>
</div>
<div class="col-md-3">
<label class="form-label">Activos:</label>
<input type="text" class="form-control money" name="activos" id="activos" required>
</div>
<div class="col-md-3">
<label class="form-label">Pasivos:</label>
<input type="text" class="form-control money" name="pasivos" id="pasivos" required>
</div>
<div class="col-md-3">
<label class="form-label">Patrimonio:</label>
<input type="text" class="form-control" name="patrimonio" id="patrimonio" readonly>
</div>
</div>


    <!-- Vínculo Familiar con PEP -->
    <div class="mb-3">
        <label class="form-label">¿Es usted una Persona Expuesta Políticamente (PEP)?:</label>
        <div>
            <input type="radio" name="persona_pep" value="SI" required> SI
            <input type="radio" name="persona_pep" value="NO"> NO
        </div>
    </div>

    <!-- Vínculo Familiar con PEP -->
    <div class="mb-3">
        <label class="form-label">¿Existe algún vínculo familiar, civil y/o asociación entre usted y una PEP?:</label>
        <div>
            <input type="radio" name="vinculo_pep" value="SI" required> SI
            <input type="radio" name="vinculo_pep" value="NO"> NO
        </div>
    </div>

    <!-- Administra Recursos Públicos -->
    <div class="mb-3">
        <label class="form-label">¿Por su cargo o actividad, administra recursos públicos?:</label>
        <div>
            <input type="radio" name="administra_recursos_publicos" value="SI" required> SI
            <input type="radio" name="administra_recursos_publicos" value="NO"> NO
        </div>
    </div>

    <!-- Operaciones Internacionales -->
    <div class="mb-3">
        <label class="form-label">¿Realiza operaciones internacionales?:</label>
        <div>
            <input type="radio" name="operaciones_internacionales" value="SI" required> SI
            <input type="radio" name="operaciones_internacionales" value="NO"> NO
        </div>
        <div id="detalles_operaciones_internacionales" style="display: none;">
            <label class="form-label">Indique:</label>
            <input type="text" class="form-control" name="detalles_operaciones_internacionales">
        </div>
    </div>

    <!-- Obligaciones Tributarias en Otro País -->
    <div class="mb-3">
        <label class="form-label">¿Es usted sujeto de obligaciones tributarias en otro país o grupo de países?:</label>
        <div>
            <input type="radio" name="obligaciones_tributarias" value="SI" required> SI
            <input type="radio" name="obligaciones_tributarias" value="NO"> NO
        </div>
        <div id="detalles_obligaciones_tributarias" style="display: none;">
            <label class="form-label">Indique:</label>
            <input type="text" class="form-control" name="detalles_obligaciones_tributarias">
        </div>
    </div>

    <!-- Responsable del RUT -->
    <div class="mb-3">
        <label class="form-label">¿Es responsable del RUT?:</label>
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

    <div class="row">
        <div class="col-md-6">
            <label class="form-label">Origen de fondos:</label>
            <input type="text" class="form-control" name="fondos"  required>
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





<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\nueva aseguradora\ipw\resources\views/pages/formulario.blade.php ENDPATH**/ ?>