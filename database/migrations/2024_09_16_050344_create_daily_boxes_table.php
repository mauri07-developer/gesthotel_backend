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
        Schema::create('daily_boxes', function (Blueprint $table) {
            $table->increments('daily_box_id');
            $table->unsignedBigInteger('box_id');
            $table->foreign('box_id')->references('box_id')->on('boxes');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->timestamp('date_initial');
            $table->timestamp('date_final')->nullable();
            $table->decimal('initial',10,2)->comment('Monto con que se apertura caja');
            $table->decimal('final',10,2);
            $table->decimal('income',10,2);
            $table->decimal('expense',10,2);
            $table->decimal('deposit',10,2);
            $table->decimal('retirement',10,2);
            $table->decimal('card',10,2);
            $table->decimal('transfer',10,2);
            $table->json('details')->comment('registro de todos ingresos y egresos');
            $table->integer('state')->default(1)->comment('1->creada , 2 -> cerrada');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daily_boxes');
    }
};
