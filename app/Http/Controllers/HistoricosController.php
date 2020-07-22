<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\HistoricosFormRequest;

use App\Historico;
use App\Equipamento;

class HistoricosController extends Controller
	{
		public function show(Request $request)
		{
			$historicos = Historico::where('equipamento_id', $request->id)
			->get();

			$equipamento = Equipamento::where('id', $request->id)
			->first();

			return view('historicos.equipamento', compact('historicos', 'equipamento'));
		}

		public function store(HistoricosFormRequest $request)
		{
			$historico = Historico::create($request->all());


			return redirect()->action(
			    'HistoricosController@show', ['id' => $request->equipamento_id]
			);
		}
	}

?>