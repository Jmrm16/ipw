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
  // En la migración
        Schema::table('whatsapp_clientes', function (Blueprint $table) {
            $table->string('estado')->default('inicio');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('whatsapp_clientes', function (Blueprint $table) {
            //
        });
    }
};
