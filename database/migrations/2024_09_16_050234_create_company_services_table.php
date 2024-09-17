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
        Schema::create('company_services', function (Blueprint $table) {
            $table->increments('id_company_service');
            $table->unsignedInteger('id_company');
            $table->foreign('id_company')->references('id_company')->on('companies');
            $table->unsignedBigInteger('id_service');
            $table->foreign('id_service')->references('id_service')->on('services');
            $table->string('comment')->nullable();
            $table->decimal('price',10,2);
            $table->integer('state')->default(1)->comment('1->activo 2 ->inactivo');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_services');
    }
};
