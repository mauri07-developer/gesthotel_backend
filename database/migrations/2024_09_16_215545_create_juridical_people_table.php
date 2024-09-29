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
        Schema::create('juridical_people', function (Blueprint $table) {
            $table->bigIncrements('juridical_people_id');
            $table->string('ruc');
            $table->string('social_razon');
            $table->string('address');
            $table->integer('state')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('juridical_people');
    }
};
