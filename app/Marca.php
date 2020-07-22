<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Equipamento;
use App\Modelo;
class Marca extends Model
{

	public $timestamps = false;
	protected $fillable = ['nome'];

	public function equipamentos()
	{
		return $this->hasMany(Equipamento::class);
	}

	public function modelos()
	{
		return $this->hasMany(Modelo::class);
	}



}
?>