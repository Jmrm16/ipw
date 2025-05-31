<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('formularios_medicos', function (Blueprint $table) {
            if (!Schema::hasColumn('formularios_medicos', 'pdf_path')) {
                $table->string('pdf_path')->nullable();
            }
        });
    }

    public function down()
    {
        Schema::table('formularios_medicos', function (Blueprint $table) {
            if (Schema::hasColumn('formularios_medicos', 'pdf_path')) {
                $table->dropColumn('pdf_path');
            }
        });
    }
};
