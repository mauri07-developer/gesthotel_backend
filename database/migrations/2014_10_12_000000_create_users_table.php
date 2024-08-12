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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id_user');
            $table->unsignedInteger('id_rol');
            $table->unsignedInteger('id_company');
            $table->string('document');
            $table->string('name');
            $table->string('last_name');
            $table->string('user');
            $table->string('password',255);
            $table->string('phone');
            $table->integer('state')->default(1);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();

            /**  Llaves foráneas **/
            $table-> foreign('id_rol')->references('id_rol')->on('roles');
            $table-> foreign('id_company')->references('id_company')->on('companies');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
