<?php

namespace App\Http\Controllers;

use App\Persona;
use Illuminate\Http\Request;

class PersonasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personas = Persona::get();
        return view('registros/personas')->with(['personas'=>$personas]);
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
        $rules = [
            'cedula' => 'required|unique:personas',

        ];
        $messages = [
            'cedula.unique' => 'Persona ya se encuentra registrada',

        ];

        $this->validate($request, $rules, $messages);
        return Persona::create([
            'cedula' => $request['cedula'],
            'nombres' => $request['nombres'],
            'apellidos' => $request['apellidos'],   
            'fechnacimiento' => $request['fechnacimiento'],
            'lugnacimiento' => $request['lugnacimiento'],
            'sexo' => $request['sexo'], 
            'telefono' => $request['telefono'],   
            'celular' => $request['celular'],   
            'direccion' => $request['direccion'],   
            'correo' => $request['correo'],   
                        
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
        $dataPersona = array(
                
            'cedula' => $request['cedula'],
            'nombres' => $request['nombres'],
            'apellidos' => $request['apellidos'],   
            'fechnacimiento' => $request['fechnacimiento'],
            'lugnacimiento' => $request['lugnacimiento'],
            'sexo' => $request['sexo'], 
            'telefono' => $request['telefono'],   
            'celular' => $request['celular'],   
            'direccion' => $request['direccion'],   
            'correo' => $request['correo'],
                
            );
        return Persona::where('id',$id)->update($dataPersona);
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
