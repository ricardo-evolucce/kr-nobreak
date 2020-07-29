<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Equipamento;

class Historico extends Model{

	protected $fillable = ['equipamento_id', 'data', 'descricao', 'tipo_manutencao', 'data_proxima_preventiva'];

	protected $dates = ['data'];

	public function equipamento(){
		return $this->belongsTo(Equipamento::class);
	}


}


?>