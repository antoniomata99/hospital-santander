<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;

    //Relación uno a muchos tabla Perfil con tabla Usuario
    public function usuario(){

        return $this->hasMany('App\Models\Usuario', 'id_perfil', 'id_perfil');
    }

}

