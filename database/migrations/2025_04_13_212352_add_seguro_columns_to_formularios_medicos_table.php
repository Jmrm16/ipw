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
        Schema::table('formularios_medicos', function (Blueprint $table) {
            $table->string('compania_seguros')->nullable();
            $table->string('vigencia_poliza')->nullable();
            $table->string('limite_asegurado')->nullable();
        });
    }
    
    public function down(): void
    {
        Schema::table('formularios_medicos', function (Blueprint $table) {
            $table->dropColumn(['compania_seguros', 'vigencia_poliza', 'limite_asegurado']);
        });
    }    
};
