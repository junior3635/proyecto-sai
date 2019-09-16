<?php

namespace App\Http\Controllers\api;

use App\Persona;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PersonasController extends Controller
{
	public function index()
    {
    	return Persona::orderBy('id','DESC')->get();
	}
}
