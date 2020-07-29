<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\HistoricosController;
use App\Http\Requests\EquipamentosFormRequest;

use App\Marca;
use App\Modelo;
use App\Equipamento;
use App\Historico;

use App\Helpers\RemovedorDeEquipamento;



class EquipamentosController extends Controller
{
	public function index(){

		$equipamentos = Equipamento::query()->orderBy('updated_at')->get();	

		return view('equipamentos.index', compact('equipamentos'));
	}

	public function create(){

		$marcas = Marca::query()->orderBy('nome')->get();
		$modelos = Modelo::query()->orderBy('nome')->get();

		return view('equipamentos.cadastrar', compact('marcas', 'modelos'));
	}

	public function store(EquipamentosFormRequest $request){
		$equipamento = Equipamento::create($request->all());

		$request->session()
		->flash('mensagem',
		"Equipamento {$equipamento->num_serie} adicionado com sucesso.");

		return redirect()->route('listarEquipamentos');
		
	}


	public function destroy(Request $request, RemovedorDeEquipamento $removedorDeEquipamento)
	{

		$num_serie = $removedorDeEquipamento->removerEquipamento($request->id);

		$request->session()
		->flash('mensagem',
		'Equipamento ($num_serie) removido com sucesso');

		return redirect()->route('listarEquipamentos');

	}


}



?>