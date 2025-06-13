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
    Schema::table('notificaciones', function (Illuminate\Database\Schema\Blueprint $table) {
        $table->dropForeign(['user_id']); // Si tenía clave foránea
        $table->dropColumn('user_id');
    });
}

public function down()
{
    Schema::table('notificaciones', function (Illuminate\Database\Schema\Blueprint $table) {
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
    });
}

};
