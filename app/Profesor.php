<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    protected $fillable = [
        'id',
        'idpersona',

    ];
    public function persona()
    {
        return $this->hasOne('App\Persona','id','idpersona');
    }
}
