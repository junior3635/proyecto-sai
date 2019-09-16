<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Inscripcion;

class Seccion extends Model
{
    protected $fillable = [

    	'id',
    	'nomsecc',
    	'idgrado',
        'turno',
        'descripcionseccion',
    	'capacidad',
    	'idperiodo',
    	'idprofesor',

    ];
    public function profesor()
    {
        return $this->hasOne('App\Profesor','id','idprofesor');
    }
    public function periodo()
    {
        return $this->hasOne('App\PeriodoAcademico','id','idperiodo');
    }
    public function grado()
    {
        return $this->hasOne('App\Grado','id','idgrado');
    }
    public function inscripcion()
    {
        return $this->belongsTo('App\Inscripcion');
    }
    
}
