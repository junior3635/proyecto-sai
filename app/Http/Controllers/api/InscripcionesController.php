<?php

namespace App\Http\Controllers\api;

use App\Inscripcion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InscripcionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Inscripcion::
        // leftJoin('seccions','inscripcions.idseccion','=','seccions.id')
        // ->leftJoin('profesors','seccions.idprofesor','=','profesors.id')
        // ->leftJoin('personas','profesors.idpersona','=','personas.id')
        // ->leftJoin('alumnos','inscripcions.idalum','=','alumnos.id')
        // ->leftJoin('periodo_academicos','seccions.idperiodo','=','periodo_academicos.id')
        // ->leftJoin('grados','seccions.gradosecc','=','grados.id')
        // ->get()->toJson();

        return Inscripcion::with('alumno.representante.persona')
        ->with('alumno.persona')
        ->with('seccion.profesor.persona')
        ->with('seccion.periodo')
        ->with('seccion.grado')
        ->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
