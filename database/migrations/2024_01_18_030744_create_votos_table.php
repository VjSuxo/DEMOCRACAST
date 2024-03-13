<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('votos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(); // Relación con User
            $table->foreignId('eleccion_id')->constrained('elecciones'); // Relación con Eleccion
            $table->foreignId('eleccion_candidato_id')->nullable()->constrained('eleccion_candidato'); // Relación con Eleccion Candidato
            $table->integer('nroVotos');
            // Otros campos relacionados con Voto
            $table->boolean('tipoVoto');
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
        Schema::dropIfExists('votos');
    }
};
