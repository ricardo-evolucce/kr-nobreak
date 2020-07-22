<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Marca;
use App\Modelo;
use App\Historico;
class Equipamento extends Model
{
	protected $fillable = ['marca_id', 'modelo_id', 'num_serie'];


	public function marca()
	{
		return $this->hasOne(Marca::class);
	}

	public function modelo()
	{
		return $this->hasOne(Modelo::class);
	}

	public function historicos(){
		return $this->hasMany(Historico::class);
	}
}

?>