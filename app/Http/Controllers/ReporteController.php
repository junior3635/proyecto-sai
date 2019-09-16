<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use PDFSnappy;
use App\Inscripcion;
use Illuminate\Http\Request;

class ReporteController extends Controller
{
    public function inscripcion($id)
    {
    	$inscripciones = Inscripcion::with('alumno.representante.persona')
        ->with('alumno.persona')
        ->with('seccion.profesor.persona')
        ->with('seccion.periodo')
        ->with('seccion.grado')
        ->where('id',$id)
        ->get();


        #$mpdf = new \Mpdf\Mpdf();
		#$mpdf->WriteHtml(view('pdf.constancia.cinscripcion'));
		#return $mpdf->Output();
        #dd($inscripciones);
        $pdf = PDFSnappy::loadView('pdf.constancia.cinscripcion',array('inscripciones' => $inscripciones ));
        	return view('pdf.constancia.cinscripcion')->with('inscripciones',$inscripciones);
            #return $pdf->stream('ConstanciaInscripcion.$id.pdf');
    }
}
