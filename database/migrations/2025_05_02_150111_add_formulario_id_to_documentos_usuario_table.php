<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('documentos_usuario', function (Blueprint $table) {
            $table->unsignedBigInteger('formulario_medico_id')->nullable()->after('user_id');
            $table->foreign('formulario_medico_id')->references('id')->on('formularios_medicos')->onDelete('cascade');
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('documentos_usuario', function (Blueprint $table) {
            //
        });
    }
};
