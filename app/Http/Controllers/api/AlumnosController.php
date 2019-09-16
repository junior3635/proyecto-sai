<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Alumno;
class AlumnosController extends Controller
{
    public function index()
    {
        return Alumno::with('representante.persona')
        ->with('persona')
        ->get();
    }
}
