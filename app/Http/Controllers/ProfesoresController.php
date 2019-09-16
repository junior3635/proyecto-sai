<?php

namespace App\Http\Controllers;
use App\Profesor;
use Illuminate\Http\Request;

class ProfesoresController extends Controller
{
    public function index()
    {
    	$profesor = Profesor::get();
    	return view('registros/profesores')->with(['profesor'=>$profesor]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Seccion::create();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataProfesor = array(
            'idpersona' => $request['idpersona'],

                
            );
        $rules = [
            'idpersona' => 'required|unique:profesors',
        ];
        $messages = [
            'idpersona.unique' => 'Profesor ya se encuentra registrado(a)',
        ];

        $this->validate($request, $rules, $messages);

        Profesor::create($dataProfesor);
        return response()->json(['sussess'=>'Done!']);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	return Seccion::where('id',$id)->get();
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
        $dataProfesor = array(
            'idpersona' => $request['idpersona'],

                
            );
        $rules = [
            'idpersona' => 'required:profesors',
        ];
        $messages = [
            'idpersona.required' => 'Campo profesor requerido',
        ];

        $this->validate($request, $rules, $messages);

        Profesor::where('id',$id)->update($dataProfesor);
        return response()->json(['sussess'=>'Done!']);
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
