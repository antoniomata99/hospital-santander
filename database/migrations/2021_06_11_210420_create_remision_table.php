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
            $table->unsignedBigInteger('id_especialidad');
            $table->unsignedBigInteger('id_usuario');

            $table->foreign("id_especialidad")->references("id_especialidad")->on("especialidad");
            $table->foreign("id_usuario")->references("id_usuario")->on("paciente");
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
