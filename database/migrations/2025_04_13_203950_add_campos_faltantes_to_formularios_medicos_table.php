<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('formularios_medicos', function (Blueprint $table) {
            // Campos string
            $table->string('codigo_ciiu')->nullable();
            $table->string('direccion_empresa')->nullable();
            $table->string('ciudad_empresa')->nullable();
            $table->string('departamento_empresa')->nullable();
            $table->string('telefono_empresa')->nullable();
            $table->string('especialidad')->nullable();

            // Campos text (versión única de cada uno)
            $table->text('nombre_institucion')->nullable();
            $table->text('tipo_servicios')->nullable();
            $table->text('funcion_solicitante')->nullable();
            $table->text('relacion_institucion')->nullable();
            $table->text('nombre_empleador')->nullable();
            $table->text('ubicacion_trabajo')->nullable();
            $table->text('descripcion_labores')->nullable();
            $table->text('ejercicio_privado')->nullable();
            $table->text('ubicacion_consultorio')->nullable();
            $table->text('numero_especializacion')->nullable();
            $table->text('equipo_radiografia')->nullable();
            $table->text('equipo_rayos_x')->nullable();
            $table->text('equipo_tomografia')->nullable();
            $table->text('equipo_laser')->nullable();
            $table->text('equipo_medicina_nuclear')->nullable();
            $table->text('alojar_pacientes')->nullable();
            $table->text('tratamiento_ambulatorio')->nullable();
            $table->text('otros_riesgos')->nullable();
            $table->text('ejercicio_exclusivo')->nullable();
            $table->text('prestacion_servicios')->nullable();
            $table->text('ejercicio_laboral')->nullable();
            $table->text('ejercicio_otras_ocasiones')->nullable();
            $table->text('reclamacion_responsabilidad')->nullable();
            $table->text('circunstancia_responsabilidad')->nullable();
            $table->text('seguro_responsabilidad')->nullable();
            $table->text('rehusada_cancelada_poliza')->nullable();
            $table->text('detalles_alojar_pacientes')->nullable();
            $table->text('detalles_tratamiento_ambulatorio')->nullable();
            $table->text('detalles_otros_riesgos')->nullable();
            $table->text('detalles_ejercicio_otras_ocasiones')->nullable();
            $table->text('detalles_reclamacion_responsabilidad')->nullable();
            $table->text('detalles_circunstancia_responsabilidad')->nullable();
            $table->text('detalles_rehusada_cancelada_poliza')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('formularios_medicos', function (Blueprint $table) {
            $table->dropColumn([
                'codigo_ciiu', 
                'direccion_empresa', 'ciudad_empresa', 'departamento_empresa', 'telefono_empresa',
                'especialidad', 'nombre_institucion', 'tipo_servicios', 'funcion_solicitante', 
                'relacion_institucion', 'nombre_empleador', 'ubicacion_trabajo', 'descripcion_labores',
                'ejercicio_privado', 'ubicacion_consultorio', 'numero_especializacion',
                'equipo_radiografia', 'equipo_rayos_x', 'equipo_tomografia', 'equipo_laser',
                'equipo_medicina_nuclear', 'alojar_pacientes', 'tratamiento_ambulatorio',
                'otros_riesgos', 'ejercicio_exclusivo', 'prestacion_servicios', 'ejercicio_laboral',
                'ejercicio_otras_ocasiones', 'reclamacion_responsabilidad', 'circunstancia_responsabilidad',
                'seguro_responsabilidad', 'rehusada_cancelada_poliza', 'detalles_alojar_pacientes',
                'detalles_tratamiento_ambulatorio', 'detalles_otros_riesgos', 'detalles_ejercicio_otras_ocasiones',
                'detalles_reclamacion_responsabilidad', 'detalles_circunstancia_responsabilidad',
                'detalles_rehusada_cancelada_poliza'
            ]);
        });
    }
};