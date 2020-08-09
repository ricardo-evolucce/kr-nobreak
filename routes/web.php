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
Route::get('/equipamentos/cadastrar', 'EquipamentosController@create')->name('cadastrarEquipamento');
Route::post('/equipamentos/cadastrar', 'EquipamentosController@store')->name('cadastrarEquipamento');
Route::delete('/equipamentos/remover/{id}', 'EquipamentosController@destroy')->name('removerEquipamento');
Route::get('/equipamentos/{id}', 'EquipamentosController@show')->name('exibirEquipamento');
Route::post('/equipamentos/update', 'EquipamentosController@update')->name('editarEquipamento');


Route::post('/equipamentos/historicos/cadastrar', 'HistoricosController@store')->name('cadastrarHistoricoEquipamento');
Route::get('/equipamentos/{id}/historicos/', 'HistoricosController@show')->name('exibirHistoricosEquipamento');
Route::get('/equipamentos/historico/{id}', 'HistoricosController@edit')->name('exibirHistoricoEquipamento');
Route::post('/equipamentos/historico', 'HistoricosController@update')->name('editarHistoricoEquipamento');
Route::delete('/equipamentos/historico/remover/{id}', 'HistoricosController@destroy')->name('removerHistorico');

Route::get('/historicos', 'HistoricosController@indexPublic')->name('indexHistoricoEquipamentoPublic');
Route::post('/historicos', 'HistoricosController@showPublic')->name('exibirHistoricoEquipamentoPublico');


Route::get('/modelos', 'ModelosController@index')->name('listarModelos');
Route::get('/modelos/cadastrar', 'ModelosController@create')->name('cadastrarModelo');
Route::post('modelos/cadastrar', 'ModelosController@store')->name('cadastrarModelo');

Route::get('/marcas', 'MarcasController@index')->name('listarMarcas');
Route::get('/marcas/cadastrar', 'MarcasController@create')->name('cadastrarMarca');
Route::post('/marcas/cadastrar', 'MarcasController@store')->name('cadastrarMarca');
Route::delete('/marcas/remover/{id}', 'MarcasController@destroy')->name('removerMarca');

Route::get('/', 'EquipamentosController@index'); 

Auth::routes();

Route::get('/entrar', 'EntrarController@index')->name('entrar');
Route::post('/entrar', 'EntrarController@entrar');

Route::get('/sair', function (){
	Auth::logout();

	return redirect()->route('entrar');
});

