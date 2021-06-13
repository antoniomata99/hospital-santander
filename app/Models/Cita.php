<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    protected $table = 'cita';

    //Relacion uno a muchos (inversa) de la tabla Pacientes con la tabla Citas
    public function paciente(){

        return $this->belongsTo('App\Models\Paciente', 'id_usuario', 'id_usuario');
    }

    //Relacion uno a mucho (inversa) de la tabla Agenda con la tabla Citas

    public function agenda(){

        return $this->belongsTo('App\Models\Agenda', 'id_agenda', 'id_agenda');
    }
}
