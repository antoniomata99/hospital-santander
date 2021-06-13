<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;

    protected $table = 'agenda';

    // Relación uno a muchos entre la tabla Agenda y la tabla Medico
    public function medico(){

        return $this->hasMany('App\Models\Medico', 'id_agenda', 'id_agenda');
    }

    //Relacion uno a mucho entre la tabla Agenda y la tabla Cita
    public function cita(){

        return $this->hasMany('App\Models\Cita', 'id_agenda', 'id_agenda');
    }
}
