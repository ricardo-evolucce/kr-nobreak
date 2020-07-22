<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\ModelosFormRequest;
use App\Modelo;




class ModelosController extends Controller
{
	public function index(){
		$modelos = Modelo::query()->orderBy('nome')->get();


		return view('modelos.index', compact('modelos'));
	}

	public function create(){
		return view('modelos.cadastrar');
	}

	public function store(ModelosFormRequest $request){
		$modelo = Modelo::create($request->all());

		$request->session()
		->flash('mensagem',
		"Modelo {$modelo->nome} cadastrado com sucesso."
			);

		return redirect()->route('listarModelos');
	}
}