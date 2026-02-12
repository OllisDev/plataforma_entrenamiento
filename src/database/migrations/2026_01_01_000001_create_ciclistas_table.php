<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // creacion tabla "ciclista"
        Schema::create('ciclista', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 80)->nullable(false);
            $table->string('apellidos', 80)->nullable(false);
            $table->date('fecha_nacimiento')->nullable(false);
            $table->decimal('peso_base', 5, 2)->nullable();
            $table->integer('altura_base')->nullable();
            $table->string('email', 80)->nullable(false);
            $table->string('password', 60)->nullable(false);
            $table->rememberToken()->nullable();
        });
    }

    public function down()
    {
        Schema::table('ciclista', function ($table) {
            $table->dropColumn('remember_token');
        });
    }
};
