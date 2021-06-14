<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cita', function (Blueprint $table) {
            $table->id('id_cita');
            $table->unsignedBigInteger('id_agenda');
            $table->unsignedBigInteger('id_usuario');
            $table->date('fecha');
            $table->unsignedBigInteger('id_horario');

            $table->foreign("id_agenda")->references("id_agenda")->on("agenda");
            $table->foreign("id_usuario")->references("id_usuario")->on("paciente");
            $table->foreign("id_horario")->references("id_horario")->on("horario");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cita');
    }
}
