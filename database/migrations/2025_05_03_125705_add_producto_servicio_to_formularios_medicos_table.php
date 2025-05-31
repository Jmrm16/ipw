<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProductoServicioToFormulariosMedicosTable extends Migration
{
    public function up()
    {
        Schema::table('formularios_medicos', function (Blueprint $table) {
            $table->string('producto_servicio')->nullable()->after('empresa'); // Ajusta la posición según necesites
        });
    }

    public function down()
    {
        Schema::table('formularios_medicos', function (Blueprint $table) {
            $table->dropColumn('producto_servicio');
        });
    }
}