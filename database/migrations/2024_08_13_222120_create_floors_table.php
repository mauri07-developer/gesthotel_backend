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
        Schema::create('floors', function (Blueprint $table) {
            $table->bigIncrements('id_floor');
            $table->unsignedInteger('id_company');
            $table->string('name');
            $table->integer('level');
            $table->text('description')->nullable();
            // $table->integer('room_count');
            $table->integer('max_room');
            $table->integer('state')->default(1);
            $table->timestamps();
            /** Llave foránea correspondiente a la tabla Company **/
            $table-> foreign('id_company')->references('id_company')->on('companies');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::dropIfExists('floors');
    }
};
