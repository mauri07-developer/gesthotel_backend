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
            $table->unsignedInteger('company_id')->after('box_id');
            $table->foreign('company_id')->references('company_id')->on('companies');
        });

        Schema::table('services', function (Blueprint $table) {
            //add column company_id
            $table->unsignedBigInteger('user_inserted_id')->after('service_id');
            $table->foreign('user_inserted_id')->references('user_id')->on('users');
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
