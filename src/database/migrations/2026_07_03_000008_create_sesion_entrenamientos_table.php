<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // creacion tabla "sesion_entrenamiento"
        Schema::create('sesion_entrenamiento', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_plan')->constrained()->references('id')->on('plan_entrenamiento')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nombre', 100);
            $table->string('descripcion', 255);
            $table->boolean('completada')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sesion_entrenamiento');
    }
};
