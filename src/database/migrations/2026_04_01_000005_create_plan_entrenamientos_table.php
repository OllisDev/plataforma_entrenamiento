<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // creacion tabla "plan_entrenamiento"
        Schema::create('plan_entrenamiento', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_ciclista')->constrained()->references('id')->on('ciclista')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nombre', 100)->nullable(false);
            $table->string('descripcion', 255);
            $table->timestamp('fecha_inicio')->nullable(false);
            $table->timestamp('fecha_fin')->nullable(false);
            $table->string('objetivo', 100);
            $table->boolean('activo')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plan_entrenamiento');
    }
};
