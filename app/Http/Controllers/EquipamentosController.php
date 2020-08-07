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


	public function __construct()
	{
		$this->middleware('auth');
	}



	public function index(Request $request){

		$equipamentos = Equipamento::with('modelo')->get();	

		$mensagem = $request->session()->get('mensagem');

		return view('equipamentos.index', compact('equipamentos', 'mensagem'));
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
		"Equipamento {$equipamento->numero_serie} adicionado com sucesso.");

		return redirect()->route('listarEquipamentos');
		
	}

	public function update(EquipamentosFormRequest $request){
		$numero_serie = $request->numero_serie;
		$equipamento = Equipamento::find($request->id);
		$equipamento->numero_serie = $numero_serie;
		$equipamento->marca_id = $request->marca_id;
		$equipamento->tensao_entrada = $request->tensao_entrada;
		$equipamento->tensao_saida = $request->tensao_saida;
		$equipamento->potencia = $request->potencia;
		$equipamento->fator_potencia = $request->fator_potencia;
		$equipamento->inicio_garantia = $request->inicio_garantia;
		$equipamento->fim_garantia = $request->fim_garantia;
		$equipamento->numero_nfe = $request->numero_nfe;
		$equipamento->observacoes = $request->observacoes;
		$equipamento->observacoes_internas = $request->observacoes_internas;

		$equipamento->save();

		$request->session()
		->flash('mensagem', "Equipamento N° série {$equipamento->numero_serie} atualizado com sucesso.");

		return redirect()->route('listarEquipamentos');

	}



	public function destroy(Request $request, RemovedorDeEquipamento $removedorDeEquipamento)
	{

		$num_serie = $removedorDeEquipamento->removerEquipamento($request->id);

		$request->session()
		->flash('mensagem',
		"Equipamento com N° de série {$num_serie} removido com sucesso");

		return redirect()->route('listarEquipamentos');

	}

	public function show(Request $request)
	{

		$marcas = Marca::query()->orderBy('nome')->get();
		$modelos = Modelo::query()->orderBy('nome')->get();
		$equipamento = Equipamento::find($request->id);
		$tensoes = ['', '127v', '220v'];
		$fim_garantia = ['', '12 meses', '18 meses', '24 meses'];


		return view('equipamentos.editar', ['equipamento' => $equipamento, 'tensoes' => $tensoes], compact('marcas', 'modelos', 'fim_garantia'));
	}


}



?>