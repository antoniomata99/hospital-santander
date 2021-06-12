<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Remision extends Model
{
    use HasFactory;

    // Relacion uno a muchos (inversa) de la tabla Especialidad con la tabla Remision
    public function especialidad(){

        return $this->belongsTo('App\Models\Especialidad', 'id_especialidad', 'id_especialidad');
    }

    // Relacion uno a muchos (inversa) de la tabla Paciente con la tabla Remision
    public function paciente(){

        return $this->belongsTo('App\Models\Paciente', 'id_usuario', 'id_usuario');
    }
}
