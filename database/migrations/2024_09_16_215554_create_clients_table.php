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
            $table->bigIncrements('client_id');
            $table->unsignedBigInteger('juridical_people_id');
            $table->unsignedBigInteger('natural_people_id');
            $table->string('email');
            $table->string('phone');
            $table->integer('state')->default(1);
            $table->timestamps();
            $table->softDeletes();

            /** Llave foránea correspondiente a la tabla JURIDICAL PERSON **/

            $table-> foreign('juridical_people_id')->references('juridical_people_id')->on('juridical_people');

            /** Llave foránea correspondiente a la tabla NATURAL PERSON **/

            $table-> foreign('natural_people_id')->references('natural_people_id')->on('natural_people');

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
