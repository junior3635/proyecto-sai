<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
    protected $fillable = [
         'id',
         'grado',
         'descripcion',


    ];

    public function grado()
    {
        return $this->belongsTo('App\Seccion');
    }
}
