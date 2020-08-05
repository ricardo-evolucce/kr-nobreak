<?php
namespace App\Helpers;
use App\{Equipamento, Historico};

class RemovedorDeEquipamento
{
	public function removerEquipamento(int $equipamento_id)
	{
		$equipamento = Equipamento::find($equipamento_id);
		$numero_serie = $equipamento->numero_serie;
		$equipamento->historicos->each(function (Historico $historico){
			$historico->delete();
	});
	$equipamento->delete();

	return $numero_serie;

	}
}
?>