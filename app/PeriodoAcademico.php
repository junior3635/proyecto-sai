<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PeriodoAcademico extends Model
{
    protected $fillable = [
         'id',
         'periodo',
         'ano',
         'descripcionperiodo',

    ];
    public function seccion()
    {
        return $this->belongsTo('App\Seccion');
    }
}
