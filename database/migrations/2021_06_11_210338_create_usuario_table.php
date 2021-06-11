<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->id('id_usuario');
            $table->string('tipo_documento',10);
            $table->string('numero_documento',50);
            $table->string('nombre_usuario',100);
            $table->string('contrasena',100);
            $table->string('correo',100);
            $table->string('telefono',20);
            $table->unsignedBigInteger('id_perfil');

            $table->foreign("id_perfil")->references("id_perfil")->on("perfil");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuario');
    }
}
