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
    return view('app');
});

//Rotas Aluno
Route::resource('alunos', 'AlunosController');
Route::post('alunos/store','AlunosController@store');
Route::get('alunos/edit/{id}','AlunosController@edit');
Route::put('alunos/update/{id}','AlunosController@update');
Route::delete('alunos/delete/{id}','AlunosController@destroy');
Route::get('alunos/filtro','AlunosController@filter');
Route::post('alunos/filtro','AlunosController@filter');
Route::get('alunos/certificado','AlunosController@certificado');

//Rotas Cursos
Route::resource('cursos', 'CursosController');
Route::post('cursos/store','CursosController@store');
Route::delete('cursos/delete/{id}','CursosController@destroy');
Route::get('cursos/edit/{id}','CursosController@edit');
Route::put('cursos/update/{id}','CursosController@update');

//Rotas Certificados
Route::resource('certificados', 'CertificadosController');
Route::post('certificados/store','CertificadosController@store');
Route::get('certificados/edit/{id}','CertificadosController@edit');
Route::put('certificados/update/{id}','CertificadosController@update');
Route::delete('certificados/delete/{id}','CertificadosController@destroy');
Route::get('certificados/relatorio/alunos','CertificadosController@relatorioAlunos');
Route::get('certificados/relatorio/cursos','CertificadosController@relatorioCursos');
