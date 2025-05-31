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
        Schema::table('formularios_medicos', function (Blueprint $table) {
            $table->text('constancia_pago_path')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('formularios_medicos', function (Blueprint $table) {
            $table->dropColumn('constancia_pago_path');
        });
    }
};
