<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyDireccionGeneralInFormulariosMedicosTable extends Migration
{
    /**
     * Ejecuta la migración.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('formularios_medicos', function (Blueprint $table) {
            // Modificar la columna direccion_general para que tenga un valor predeterminado
            $table->text('direccion_general')->default('No especificado')->change();
        });
    }

    /**
     * Revierte la migración.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('formularios_medicos', function (Blueprint $table) {
            // Revertir la columna direccion_general para no tener valor predeterminado
            $table->text('direccion_general')->default(null)->change();
        });
    }
}
