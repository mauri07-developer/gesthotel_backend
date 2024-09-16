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
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id_client');
            $table->unsignedBigInteger('id_juridical_people');
            $table->unsignedBigInteger('id_natural_people');
            $table->string('email');
            $table->string('phone');
            $table->integer('state')->default(1);
            $table->timestamps();
            $table->softDeletes();
            
            /** Llave foránea correspondiente a la tabla JURIDICAL PERSON **/

            $table-> foreign('id_juridical_people')->references('id_juridical_people')->on('juridical_people');

            /** Llave foránea correspondiente a la tabla NATURAL PERSON **/

            $table-> foreign('id_natural_people')->references('id_natural_people')->on('natural_people');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
