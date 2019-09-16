<?php

namespace App\Http\Controllers;

use App\Alumno;
use App\Inscripcion;
use App\Profesor;
use Illuminate\Http\Request;

class InscripcionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('registros/inscripciones');
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
        $ced = Alumno::with('persona')->where('id',$request['idalum'])->first();;
        (int)$cedula = $ced->persona->cedula;

        (int)$cod = '100'.$cedula.$request['idseccion'];
        $request['codigoinscripcion'] = (int)$cod;
        $rules = [
            'codigoinscripcion' => 'unique:inscripcions,codigoinscripcion',

        ];
        $messages = [
            'codigoinscripcion.unique' => 'El alumno ya se encuentra registrado en la seccion',
        ];

        $this->validate($request, $rules, $messages);

        return Inscripcion::create([
            'fecha' => $request['fecha'],
            'idalum' => $request['idalum'],
            'idseccion' => $request['idseccion'],
            'codigoinscripcion' => (int)$cod,
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
        $datosinscripcion = array(

            'idalum' => $request['idalum'],
            'fecha' => $request['fecha'],
            'idseccion' => $request['idseccion'],
            'codigoinscripcion' => $request['idalum'].$request['idseccion'],
        );

        return Inscripcion::where('id',$id)->update($datosinscripcion);
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
