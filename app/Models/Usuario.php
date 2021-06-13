<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuario';

    //Relación uno a muchos (inversa) tabla Usuario con Tabla Perfil
    public function perfil(){

        return $this->belongsTo('App\Models\Perfil', 'id_perfil', 'id_perfil');
    }

    // Relacion uno a uno (inversa) de la tabla Medico con tabla Usuario
    public function medico(){

        return $this->belongsTo('App\Models\Medico', 'id_usario', 'id_usuario');
    }

    // Relacion uno a uno (inversa) de la tabla Paciente con tabla Usuario
    public function paciente(){

        return $this->belongsTo('App\Models\Paciente', 'id_usario', 'id_usuario');
    }
}

