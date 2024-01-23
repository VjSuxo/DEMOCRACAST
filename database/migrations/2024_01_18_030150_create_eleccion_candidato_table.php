<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEleccionCandidatoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eleccion_candidato', function (Blueprint $table) {
            $table->id();
            $table->integer('nroCartelera')->nullable();
            $table->integer('cantVotos')->default(0)->nullable();
            $table->foreignId('eleccion_id')->constrained('elecciones');
            $table->foreignId('persona_id')->constrained('personas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eleccion_candidato');
    }
};
