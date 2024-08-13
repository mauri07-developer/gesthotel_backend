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
        Schema::table('users', function (Blueprint $table) {
            /** Creación de columnas **/
            $table->unsignedInteger('id_rol');
            $table->unsignedInteger('id_company');
        
            /**  Llaves foráneas **/
            $table-> foreign('id_rol')->references('id_rol')->on('roles');
            $table-> foreign('id_company')->references('id_company')->on('companies');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Eliminar las claves foráneas
            $table->dropForeign(['id_rol']);
            $table->dropForeign(['id_company']);

            // Eliminar las columnas
            $table->dropColumn('id_rol');
            $table->dropColumn('id_company');
        });
    }
};
