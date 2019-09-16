<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
/////
Route::get('/personas', 'PersonasController@index')->name('alumnos');
Route::post('/personas', 'PersonasController@store');
Route::get('/personas/show/{id}', 'PersonasController@show');
Route::post('/personas/update/{id}', 'PersonasController@update');
/////
Route::get('/alumnos', 'AlumnosController@index')->name('alumnos');
Route::post('/alumnos', 'AlumnosController@store');
Route::get('/alumnos/show/{id}', 'AlumnosController@show');
Route::post('/alumnos/update/{id}', 'AlumnosController@update');
/////
Route::get('/profesores', 'ProfesoresController@index')->name('profesores');
Route::post('/profesores', 'ProfesoresController@store');
Route::get('/profesores/show/{id}', 'ProfesoresController@show');
Route::post('/profesores/update/{id}', 'ProfesoresController@update');
/////
Route::get('/representantes', 'RepresentanteController@index')->name('representantes');
Route::post('/representantes', 'RepresentanteController@store');
Route::get('/representantes/show/{idpersona}', 'RepresentanteController@show');
Route::post('/representantes/update/{idpersona}', 'RepresentanteController@update');
/////
Route::get('/inscripciones', 'InscripcionesController@index')->name('inscripciones');
Route::post('/inscripciones', 'InscripcionesController@store');
Route::get('/inscripciones/show/{id}', 'InscripcionesController@show');
Route::post('/inscripciones/update/{id}', 'InscripcionesController@update');
/////
Route::get('/secciones', 'SeccionController@index')->name('secciones');
Route::post('/secciones', 'SeccionController@store');
Route::get('/secciones/show/{id}', 'SeccionController@show');
Route::post('/secciones/update/{id}', 'SeccionController@update');
/////
Route::get('/periodos', 'PeriodoController@index')->name('periodos');
Route::post('/periodos', 'PeriodoController@store');
Route::get('/periodos/show/{id}', 'PeriodoController@show');
Route::post('/periodos/update/{id}', 'PeriodoController@update');
/////
Route::get('/medidas', 'MedidasController@index')->name('medidas');
Route::post('/medidas', 'MedidasController@store');
Route::get('/medidas/show/{id}', 'MedidasController@show');
Route::post('/medidas/update/{id}', 'MedidasController@update');
/////
Route::get('/pdf/constancia/inscripcion/{id}', 'ReporteController@inscripcion');
