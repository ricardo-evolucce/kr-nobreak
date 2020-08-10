<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\HistoricosFormRequest;

use App\Historico;
use App\Equipamento;
use App\Marca;
use App\Modelo;

class HistoricosController extends Controller
	{
		public function show(Request $request)
		{
			//$request->equipamento_id = null ? $equipamento_id = $request->id : $equipamento_id = $request->equipamento_id;

			$equipamento_id = $request->equipamento_id ?? $request->id;

			$historicos = Historico::where('equipamento_id', $equipamento_id)
			->paginate(5);

			$equipamento = Equipamento::find($equipamento_id);

			$marca = Marca::find($equipamento->marca_id);
			$modelo = Modelo::find($equipamento->modelo_id);

			return view('historicos.equipamento', compact('historicos'), ['marca'=> $marca, 'modelo' => $modelo, 'equipamento' => $equipamento]);
		}


		public function showPublic(Request $request)
		{
			$equipamento = Equipamento::where('numero_serie', $request->numero_serie)
			->first();



			$historicos = Historico::where('equipamento_id', $equipamento->id)
			->paginate(10);

			$marca = Marca::find($equipamento->marca_id);
			$modelo = Modelo::find($equipamento->modelo_id);

			return view('historicos.equipamentoPublico', compact('equipamento', 'historicos', 'marca', 'modelo'));

		}

		public function indexPublic(){

			return view('historicos.indexPublic');
		}



		public function edit(Request $request)
		{
			$historico = Historico::where('id', $request->id)
			->first();

			$equipamento = Equipamento::where('id', $historico->equipamento_id)
			->first();

			$marca = Marca::find($equipamento->marca_id);
			$modelo = Modelo::find($equipamento->modelo_id);



			return view('historicos.editar', ['historico' => $historico, 'equipamento' => $equipamento, 'marca' => $marca,
			'modelo'=> $modelo]);
		}

		public function store(HistoricosFormRequest $request)
		{
			$historico = Historico::create($request->all());


			return redirect()->action(
			    'HistoricosController@show', ['id' => $request->equipamento_id]
			);
		}

		public function destroy(Request $request){

			$historico = Historico::find($request->id);
			$equipamento_id = $historico->equipamento_id;

			Historico::destroy($request->id);

			$request->session()
			->flash('mensagem', 'Histórico apagado com sucesso.');

			return redirect()->action(
				'HistoricosController@show', ['id' => $equipamento_id]
			);
		}

		public function update(HistoricosFormRequest $request)
		{
			$historico = Historico::find($request->id);
			$historico->data = $request->data;
			$historico->data_proxima_preventiva = $request->data_proxima_preventiva;
			$historico->tipo_manutencao = $request->tipo_manutencao;
			$historico->descricao = $request->descricao;
			$historico->save();

			return redirect()->action(
				'HistoricosController@show', ['id' => $historico->equipamento_id]
			);

		}


	}

?>