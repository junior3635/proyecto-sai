<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $fillable = [
        'id',
        'cedula',
        'nombres',
        'apellidos',
        'fechnacimiento',
        'lugnacimiento',
        'sexo',
        'telefono',
        'celular',
        'direccion',
        'correo'

    ];

    public function representante()
    {
        return $this->belongsTo('App\Representante');
    }
    public function profesor()
    {
        return $this->belongsTo('App\Profesor');
    }
    public function alumno()
    {
        return $this->belongsTo('App\Alumno');
    }
}
