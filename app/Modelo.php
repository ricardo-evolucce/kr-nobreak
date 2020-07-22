<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Equipamento;
use App\Marca;

class Modelo extends Model{
	public $timestamps = false;
	protected $fillable = ['nome'];

	public function equipamentos(){
		return $this->hasMany(Equipamento::class);
	}

	public function marca(){
		return $this->belongsTo(Marca::class);
	}
}
?>