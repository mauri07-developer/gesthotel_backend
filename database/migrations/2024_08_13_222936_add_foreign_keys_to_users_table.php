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
            $table->unsignedInteger('company_id')->after('user_id');
            $table->unsignedInteger('rol_id')->after('user_id');

            /**  Llaves foráneas **/
            $table-> foreign('rol_id')->references('rol_id')->on('roles');
            $table-> foreign('company_id')->references('company_id')->on('companies');
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
