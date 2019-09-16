<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/alumnos', 'api\AlumnosController@index');
Route::get('/personas', 'api\PersonasController@index');
Route::get('/representantes', 'api\RepresentantesController@index');
Route::get('/profesores', 'api\ProfesoresController@index');
Route::get('/periodos', 'api\PeriodosController@index');
Route::get('/secciones', 'api\SeccionesController@index');
Route::get('/inscripciones', 'api\InscripcionesController@index');
Route::get('/grados', 'api\GradosController@index');