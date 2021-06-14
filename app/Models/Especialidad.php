<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
    use HasFactory;

    protected $table = 'especialidad';

    //Relación uno a muchos de la tabla Especialidad con la tabla Remision
    public function remision(){

        return $this->hasMany('App\Models\Remision', 'id_especialidad', 'id_especialidad');
    }

    //Relación uno a muchos de la tabla Especialidad con la tabla Médico
    public function medico(){

        return $this->hasMany('App\Models\Medico', 'id_especialidad', 'id_especialidad');

    }


}
