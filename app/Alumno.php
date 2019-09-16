<?php

namespace App;
use Inscripcion;
use Representante;
use Persona;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $fillable = [
         'id',
         'idpersona',
         'condicionalum' ,
         'procedenciaalum',
         'idrepresentante',

    ];


    public function representante()
    {
        return $this->hasOne('App\Representante','id','idrepresentante');
    }
    public function persona()
    {
        return $this->hasOne('App\Persona','id','idpersona');
    }
    public function inscripcion()
    {
        return $this->belongsTo('App\Inscripcion');
    }
    
}
