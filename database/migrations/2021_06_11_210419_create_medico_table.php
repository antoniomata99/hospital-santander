<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medico', function (Blueprint $table) {
            $table->unsignedBigInteger('id_usuario');
            $table->primary('id_usuario');
            $table->unsignedBigInteger('id_agenda');
            $table->unsignedBigInteger('id_especialidad');

            $table->foreign("id_usuario")->references("id_usuario")->on("usuario");
            $table->foreign("id_agenda")->references("id_agenda")->on("agenda");
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
        Schema::dropIfExists('medico');
    }
}
