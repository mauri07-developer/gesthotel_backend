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
            $table->unsignedBigInteger('floor_id')->after('room_id');
            $table->foreign('floor_id')->references('floor_id')->on('floors');
            $table->unsignedInteger('type_room_id')->after('floor_id');
            $table->foreign('type_room_id')->references('type_room_id')->on('type_rooms');
            $table->unsignedBigInteger('user_inserted')->after('price');
            $table->foreign('user_inserted')->references('user_id')->on('users');
            $table->unsignedBigInteger('user_edit')->after('user_inserted');
            $table->foreign('user_edit')->references('user_id')->on('users');
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
