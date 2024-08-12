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
        //created table bedroom - TABLA MAESTTRO - faltan columnas
        Schema::create('Rooms', function (Blueprint $table) {
            $table->comment('Habitaciones');
            $table->id('id_room');
            $table->string('name')->comment('Numero de la habitacion');
            $table->integer('availability')->comment('1->libre 2->ocupada 3->limpieza');
            $table->decimal('price',10,2)->comment('Precio general');
            $table->integer('state')->comment('1->activo 0->inactivo')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //revertir la creacion de tabla
        Schema::drop('Bedrooms');
    }
};
