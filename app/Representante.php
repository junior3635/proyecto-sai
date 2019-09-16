<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Representante extends Model
{
    protected $fillable = [
    	'id',
        'idpersona',
        'parentesco',

    ];

    public function persona()
    {
        return $this->hasOne('App\Persona','id','idpersona');
    }
}
