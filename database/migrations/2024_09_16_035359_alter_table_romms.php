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
        //add foreing
        Schema::table('rooms', function (Blueprint $table){
            $table->unsignedBigInteger('id_floor')->after('id_room');
            $table->foreign('id_floor')->references('id_floor')->on('floors');
            $table->unsignedInteger('id_type_room')->after('id_floor');
            $table->foreign('id_type_room')->references('id_type_room')->on('type_rooms');
            $table->unsignedBigInteger('user_inserted')->after('price');
            $table->foreign('user_inserted')->references('id_user')->on('users');
            $table->unsignedBigInteger('user_edit')->after('user_inserted');
            $table->foreign('user_edit')->references('id_user')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //eliminar foreneos
        Schema::table('rooms', function (Blueprint $table){
            $table->dropForeign(['id_floor']);
            $table->dropForeign(['id_type_room']);
            $table->dropForeign(['user_inserted']);
            $table->dropForeign(['user_edit']);

            //eliminar columans
            $table->dropColumn('id_floor');
            $table->dropColumn('id_type_room');
            $table->dropColumn('user_inserted');
            $table->dropColumn('user_edit');

        });

    }
};
