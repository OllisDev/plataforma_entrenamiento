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
        Schema::create('entrenamiento', function (Blueprint $table) {
            $table->id();
            //claves foraneas
            $table->unsignedBigInteger('id_ciclista')->nullable(false);
            $table->unsignedBigInteger('id_bicicleta')->nullable(false);
            $table->unsignedBigInteger('id_sesion')->nullable(true);


            $table->dateTime('fecha')->nullable(false);
            $table->time('duracion')->nullable(false);
            $table->decimal('kilometros', 6, 2)->nullable(false);
            $table->string('recorrido', 150)->nullable(false);

            $table->integer('pulso_medio')->nullable();
            $table->integer('pulso_max')->nullable();
            $table->integer('potencia_media')->nullable();
            $table->integer('potencia_normalizada')->nullable(false);
            $table->decimal('velocidad_media', 5, 2)->nullable(false);
            $table->decimal('puntos_estres_tss', 6, 2)->nullable();
            $table->decimal('factor_intensidad_if', 4, 3)->nullable();
            $table->integer('ascenso_metros')->nullable();
            $table->string('comentario', 255)->nullable();

            $table->foreign('id_ciclista')
                ->references('id')
                ->on('ciclista')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('id_bicicleta')
                ->references('id')
                ->on('bicicleta')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('id_sesion')
                ->references('id')
                ->on('sesion_entrenamiento')
                ->onDelete('set null')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entrenamiento');
    }
};
