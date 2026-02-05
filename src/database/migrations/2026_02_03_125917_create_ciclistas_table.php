<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // creacion tabla "ciclista"
        Schema::create('ciclista', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable(false);
            $table->string('apellidos')->nullable(false);
            $table->timestamp('fecha_nacimiento')->nullable(false);
            $table->decimal('peso_base', 5, 2);
            $table->integer('altura_base');
            $table->string('email')->nullable(false);
            $table->string('password')->nullable(false);
        });
    }
};
