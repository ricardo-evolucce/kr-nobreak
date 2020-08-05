<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Marca;
use App\Modelo;
use App\Historico;
class Equipamento extends Model
{
	protected $fillable = ['marca_id', 'modelo_id', 'numero_serie', 'potencia', 'fator_potencia', 'tensao_entrada',
	'tensao_saida', 'numero_nfe', 'observacoes', 'inicio_garantia', 'fim_garantia'];

	protected $dates = ['inicio_garantia'];


	public function marca()
	{
		return $this->belongsTo(Marca::class);
	}

	public function modelo()
	{
		return $this->belongsTo(Modelo::class);
	}

	public function historicos(){
		return $this->hasMany(Historico::class);
	}
}

?>