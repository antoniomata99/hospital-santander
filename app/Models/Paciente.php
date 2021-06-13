<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{

    use HasFactory;

    protected $table = 'paciente';

    public $incrementing = false;
    protected $primaryKey = 'id_usuario';

    // Relacion uno a uno tabla Paciente con tabla Usuario
    public function usuario(){

        return $this->hasOne('App\Models\Usuario', 'id_usuario', 'id_usuario');
    }

    // Relacion uno a muchos de la tabla Paciente con la tabla Remision
    public function remision(){

        return $this->hasMany('App\Models\Remision', 'id_usuario', 'id_usuario');
    }

    // Relacion uno a muchos de la tabla Paciente con la tabla Cita
    public function cita(){

        return $this->hasMany('App\Models\Cita', 'id_usuario', 'id_usuario');
    }
}
