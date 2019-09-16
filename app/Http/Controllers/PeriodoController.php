<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PeriodoAcademico;

class PeriodoController extends Controller
{
    public function index()
    {
    	$periodo = PeriodoAcademico::get();
    	return view('configuraciones/periodos')->with(['periodo'=>$periodo]);
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

        

        return PeriodoAcademico::create([
            'periodo' => $request['periodo'],
            'ano' => $request['ano'],
            'descripcionperiodo' => $request['periodo'].'-'.$request['ano'], 
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
        return PeriodoAcademico::where('id',$id)->update([
            'periodo' => $request['periodo'],
            'ano' => $request['ano'],
            'descripcionperiodo' => $request['ano'].'-'.$request['periodo'], 
        ]);    }

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
