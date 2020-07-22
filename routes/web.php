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


Route::get('/equipamentos', 'EquipamentosController@index')->name('listarEquipamentos');
Route::get('/equipamentos/cadastrar', 'EquipamentosController@create');
Route::post('/equipamentos/cadastrar', 'EquipamentosController@store');
Route::delete('/equipamentos/remover/{id}', 'EquipamentosController@destroy');
Route::get('/equipamentos/{id}');

Route::get('/modelos', 'ModelosController@index')->name('listarModelos');
Route::get('/modelos/cadastrar', 'ModelosController@create');
Route::post('modelos/cadastrar', 'ModelosController@store');

Route::get('/marcas', 'MarcasController@index')->name('listarMarcas');
Route::get('/marcas/cadastrar', 'MarcasController@create')->name('cadastrarMarca');
Route::post('/marcas/cadastrar', 'MarcasController@store');
Route::delete('/marcas/remover/{id}', 'MarcasController@destroy')->name('removerMarca');

Route::post('/historicos/cadastrar', 'HistoricosController@store');
Route::get('/historicos/exibir/{id}', 'HistoricosController@show');


Route::get('/', 'EquipamentosController@index'); 