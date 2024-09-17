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
        Schema::table('boxes', function (Blueprint $table) {
            //add column id_company
            $table->unsignedInteger('id_company')->after('id_box');
            $table->foreign('id_company')->references('id_company')->on('companies');
        });

        Schema::table('services', function (Blueprint $table) {
            //add column id_company
            $table->unsignedBigInteger('id_user_inserted')->after('id_service');
            $table->foreign('id_user_inserted')->references('id_user')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('boxes', function (Blueprint $table) {
            //drop column
            $table->dropForeign(['id_company']);
            $table->dropColumn('id_company');

        });

        Schema::table('services', function (Blueprint $table) {
            //drop column
            $table->dropForeign(['id_user_inserted']);
            $table->dropColumn('id_user_inserted');

        });
    }
};
