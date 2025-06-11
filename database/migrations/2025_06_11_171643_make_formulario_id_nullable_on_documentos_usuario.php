<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeFormularioIdNullableOnDocumentosUsuario extends Migration
{
    public function up()
    {
        Schema::table('documentos_usuario', function (Blueprint $table) {
            $table->unsignedBigInteger('formulario_medico_id')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('documentos_usuario', function (Blueprint $table) {
            $table->unsignedBigInteger('formulario_medico_id')->nullable(false)->change();
        });
    }
}
