<?php
namespace App\Helpers;
use App\{Equipamento, Historico};

class RemovedorDeEquipamento
{
	public function removerEquipamento(int $equipamento_id)
	{
		$equipamento = Equipamento::find($equipamento_id);
		$num_serie = $equipamento->num_serie;
		$equipamento->historicos->each(function (Historico $historico){
			$historico->delete();
	});
	$equipamento->delete();

	return $equipamento->num_serie;

	}
}
?>