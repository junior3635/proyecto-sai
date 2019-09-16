<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alumno;
use App\Representante;
use Illuminate\Support\Facades\Input;

class AlumnosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumnos = Alumno::join('representantes','alumnos.idrepresentante','representantes.id')->join('personas','representantes.idpersona','=','personas.id')->get();

        
        return view('registros/alumnos')->with(['alumnos'=>$alumnos]);    }

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

        $rules = [
            'idpersona' => 'required|unique:alumnos',
            'condicionalum' => 'required',
            'procedenciaalum' => 'required',
            'idrepresentante' => 'required',
        ];
        $messages = [
            'idpersona.unique' => 'Persona ya se encuentra registrada',
            'condicionalum.required' => 'Campo condicion requerido',
            'procedenciaalum.required' => 'Campo procedencia requerido',
            'idrepresentante.required' => 'Campo representante requerido',
        ];

        $this->validate($request, $rules, $messages);

        return Alumno::create([
            'idpersona' => $request['idpersona'],
            'condicionalum' => $request['condicionalum'],
            'procedenciaalum' => $request['procedenciaalum'],
            'idrepresentante' => $request['idrepresentante'],
            
        ]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Alumno::where('id',$id)->get();
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

        $rules = [
            'idpersona' => 'required',
            'condicionalum' => 'required',
            'procedenciaalum' => 'required',
            'idrepresentante' => 'required',
        ];
        $messages = [
            'idpersona.required' => 'Campo Persona requerido',
            'condicionalum.required' => 'Campo condicion requerido',
            'procedenciaalum.required' => 'Campo procedencia requerido',
            'idrepresentante.required' => 'Campo representante requerido',
        ];

        $this->validate($request, $rules, $messages);

        $dataAlumno = array(
                
            'idpersona' => $request['idpersona'],
            'condicionalum' => $request['condicionalum'],
            'procedenciaalum' => $request['procedenciaalum'],
            'idrepresentante' => $request['idrepresentante'],

                
            );
        return Alumno::where('id',$id)->update($dataAlumno);
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
