<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\MarcasFormRequest;
use App\Marca;

class MarcasController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
	}


	public function index(Request $request){

		//$marcas = Marca::all();

		$marcas = Marca::query()->orderBy('nome')->get();

		$mensagem = $request->session()->get('mensagem');

		return view('marcas.index', compact('marcas', 'mensagem'));
	}

	public function create(){
		return view('marcas.cadastrar');
	}

	public function store(MarcasFormRequest $request){

		
		$marca = Marca::create($request->all());

		$request->session()
		->flash('mensagem',
			"Marca {$marca->nome} cadastrada com sucesso."
			);

		return redirect()->route('listarMarcas');

		//pegar id cadastrado
		// $marca->id; 

	}

	public function destroy(Request $request)
	{
		Marca::destroy($request->id);
		$request->session()
			->flash
			('mensagem',
				"Marca apagada com sucesso."
			);

			return redirect()->route('listarMarcas');
	}


}