<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;

    //Relación uno a muchos de la tabla Horario con la tabla Cita

    public function cita(){
        return $this->hasMany('App\Models\Horario', 'id_horario', 'id_horario');
    }
}
