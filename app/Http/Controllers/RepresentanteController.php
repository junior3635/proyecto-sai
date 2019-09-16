<?php

namespace App\Http\Controllers;

use App\Persona;
use App\Representante;
use Illuminate\Http\Request;

class RepresentanteController extends Controller
{
    public function index()
    {
        
    	$representante = Representante::get();
    	return view('registros/representantes')->with(['representante'=>$representante]);
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
        $rules = [
            'idpersona' => 'required|unique:representantes',
            'parentesco' => 'required',
        ];
        $messages = [
            'idpersona.required' => 'Campo cedula requerido',
            'idpersona.unique' => 'Ya se encuentra la cedula registrada',
            'parentesco.required' => 'Campo parentesco requerido',
        ];

        $this->validate($request, $rules, $messages);

        #$request->validate([
        #    'idpersona' => 'required|unique:representantes',
        #    'parentesco' => 'required',
        #    ]);

        $dataRepresentante = array(
            'idpersona' => $request['idpersona'],
            'parentesco' => $request['parentesco'],
                
            );
        Representante::create($dataRepresentante);
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
    public function update(Request $request, $idpersona)
    {
        $rules = [
            'idpersona' => 'required',
            'parentesco' => 'required',
        ];
        $messages = [
            'idpersona.required' => 'Campo cedula requerido',
            'parentesco.required' => 'Campo parentesco requerido',
        ];

        $this->validate($request, $rules, $messages);

        #$request->validate([
        #    'idpersona' => 'required|unique:representantes',
        #    'parentesco' => 'required',
        #    ]);

        

        $dataRepresentante = array(

            'idpersona' => $request['idpersona'],
            'parentesco' => $request['parentesco'],  
                
            );
        return Representante::where('idpersona',$idpersona)->update($dataRepresentante);
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
