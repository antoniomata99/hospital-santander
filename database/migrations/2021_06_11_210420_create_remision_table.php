<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRemisionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('remision', function (Blueprint $table) {
            $table->id('id_orden');
            $table->unsignedBigInteger('id_usuario_paciente');
            $table->unsignedBigInteger('id_usuario_medico');
            $table->unsignedBigInteger('id_especialidad');

            $table->foreign("id_usuario_paciente")->references("id_usuario")->on("paciente");
            $table->foreign("id_usuario_medico")->references("id_usuario")->on("medico");
            $table->foreign("id_especialidad")->references("id_especialidad")->on("especialidad");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('remision');
    }
}
