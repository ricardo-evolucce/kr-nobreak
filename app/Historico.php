<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Equipamento;

class Historico extends Model{

	protected $fillable = ['equipamento_id', 'data', 'descricao'];

	protected $dates = ['data'];

	public function equipamento(){
		return $this->belongsTo(Equipamento::class);
	}


}


?>