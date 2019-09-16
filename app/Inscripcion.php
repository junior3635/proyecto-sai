<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Alumno;
use App\Seccion;

class Inscripcion extends Model
{
    protected $fillable = [
         'id',
         'fecha',
         'idalum',
         'idseccion',
         'codigoinscripcion',

    ];

    public function alumno()
    {
        return $this->hasOne('App\Alumno','id','idalum');
    }
    public function seccion()
    {
        return $this->hasOne('App\Seccion','id','idseccion');
    }

}
