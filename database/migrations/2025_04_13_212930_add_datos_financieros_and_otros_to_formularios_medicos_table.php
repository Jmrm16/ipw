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
            $table->string('ingresos_mensuales')->nullable();
            $table->string('otros_ingresos')->nullable();
            $table->string('concepto_otros_ingresos')->nullable();
            $table->string('egresos_mensuales')->nullable();
            $table->string('activos')->nullable();
            $table->string('pasivos')->nullable();
            $table->string('patrimonio')->nullable();
            $table->string('pep')->nullable();
            $table->string('vinculo_pep')->nullable();
            $table->string('administra_recursos_publicos')->nullable();
            $table->string('operaciones_internacionales')->nullable();
            $table->text('detalles_operaciones_internacionales')->nullable();
            $table->string('obligaciones_tributarias')->nullable();
            $table->text('detalles_obligaciones_tributarias')->nullable();
            $table->string('responsable_rut')->nullable();
            $table->string('codigo_responsabilidad')->nullable();
            $table->string('correo_dian')->nullable();
            $table->string('autorizacion_datos')->nullable();
            $table->string('intermediario')->nullable();
            $table->string('intermediario_in')->nullable();
            $table->string('direccion_in')->nullable();
            $table->string('fondos')->nullable();

            
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('formularios_medicos', function (Blueprint $table) {
            $table->dropColumn([
                'ingresos_mensuales',
                'otros_ingresos',
                'concepto_otros_ingresos',
                'egresos_mensuales',
                'activos',
                'pasivos',
                'patrimonio',
                'vinculo_pep',
                'administra_recursos_publicos',
                'operaciones_internacionales',
                'detalles_operaciones_internacionales',
                'obligaciones_tributarias',
                'detalles_obligaciones_tributarias',
                'responsable_rut',
                'codigo_responsabilidad',
                'correo_dian',
                'autorizacion_datos',
                'intermediario',
                'intermediario_in',
                'direccion_in',
                'fondos',

            ]);
        });
    }
    
};
