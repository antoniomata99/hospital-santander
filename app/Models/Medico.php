<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;

    // Relacion uno a uno de la tabla Medico con la tabla Usuario
    public function usuario(){

        return $this->hasOne('App\Models\Usuario', 'id_usuario', 'id_usuario');
    }

    // Relación uno a muchos (inversa) de la tabla Agenda con la tabla Médico
    public function agenda(){

        return $this->belongsTo('App\Models\Agenda', 'id_agenda', 'id_agenda');
    }
}
