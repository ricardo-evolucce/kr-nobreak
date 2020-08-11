<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\ModelosFormRequest;
use App\Modelo;
use App\Marca;




class ModelosController extends Controller
{


		public function __construct()
	{
		$this->middleware('auth');
	}



	
	public function index(Request $request){
		$marcas = Marca::query()->orderBy('nome')->get();
		$modelos = Modelo::query()->orderBy('nome')->get();

		$mensagem = $request->session()->get('mensagem');


		return view('modelos.index', compact('marcas', 'modelos', 'mensagem'));
	}

	public function create(){

		$marcas = Marca::query()->orderBy('nome')->get();
		$modelos = Modelo::query()->orderBy('nome')->get();


		return view('modelos.cadastrar', compact('marcas', 'modelos'));
	}

	public function store(ModelosFormRequest $request){
		$modelo = Modelo::create($request->all());

		$request->session()
		->flash('mensagem',
		"Modelo '{$modelo->nome}' cadastrado com sucesso."
			);

		return redirect()->route('listarModelos');
	}


	public function destroy(Request $request){

		$modelo = Modelo::find($request->id);


		Modelo::destroy($request->id);
		$request->session()
		->flash('mensagem' , "Modelo '{$modelo->nome}' apagado com sucesso.");

		return redirect()->route('listarModelos');
	}


	public function editaNome(Request $request){
		$novoNome = $request->nome;
		$modelo = Modelo::find($request->id);
		$modelo->nome = $novoNome;
		$modelo->save();

	}
}