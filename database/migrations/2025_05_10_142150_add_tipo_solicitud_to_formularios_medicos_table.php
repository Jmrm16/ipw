<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('formularios_medicos', function (Blueprint $table) {
            $table->text('tipo_proceso')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('formularios_medicos', function (Blueprint $table) {
            $table->dropColumn('tipo_proceso');
        });
    }
};
