<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('formularios_medicos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('primer_apellido');
            $table->string('segundo_apellido');
            $table->string('nombres');
            $table->string('tipo_documento');
            $table->string('numero_identificacion');
            $table->date('fecha_expedicion');
            $table->string('lugar_expedicion');
            $table->date('fecha_nacimiento');
            $table->date('fecha');
            $table->string('lugar_nacimiento');
            $table->string('nacionalidad_1');
            $table->string('nacionalidad_2')->nullable();
            $table->string('email');
            $table->string('celular');
            $table->string('direccion');
            $table->string('ciudad_residencia');
            $table->string('ciudad');
            $table->string('sucursal');

            $table->string('tipo_solicitud');
            $table->string('clase_vinculacion');

            $table->string('sector_actividad');
            $table->string('cual');
            $table->string('persona_pep');
            



            $table->string('departamento');
            $table->string('titulo_profesional');
            $table->string('otorgado_por');
            $table->date('fecha_graduacion');
            $table->string('direccion_general');
            $table->string('registro_profecional');
            $table->string('especializaciones')->nullable();
            $table->json('equipos')->nullable();
            $table->string('suma_asegurada');
            $table->string('ocupacion');
            $table->string('cargo');
            $table->string('empresa');
            $table->string('actividad_principal')->nullable();
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formularios_medicos');
    }
};
