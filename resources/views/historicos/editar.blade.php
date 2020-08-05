@extends('layout')

@section('cabecalho')

	Histórico do equipamento

		@section('equipamento')
			<h6>Marca: {{$equipamento->id}} | Modelo: {{$equipamento->modelo_id}}</h6>
			<h6>N° de série: {{$equipamento->num_serie}}</h6>
			

		@endsection

@endsection



@section('conteudo')

@if ($errors->any())
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif

<form action="{{route('editarHistoricoEquipamento')}}" method="post">
	@csrf
		<div class="row align-items-center">
			<div class="col col-3">
				<label for="data">Data do evento</label>
				<input type="date" class="form-control" name="data" id="data" value="{{$historico->data->format('Y-m-d')}}">
			</div>

			<div class="col col-3">
				<label for="data_proxima_preventiva">Próxima preventiva</label>
				<input type="date" name="data_proxima_preventiva" class="form-control" value="{{$historico->data_proxima_preventiva->format('Y-m-d')}}">
			</div>
			<div class="col col-4">
				<label for="tipo_manutencao">Tipo Manutenção</label>
				<select name="tipo_manutencao" class="form-control">
					<option value="1">Preventiva</option>
					<option value="2">Corretiva</option>
				</select>
			</div>
			
			<input type="hidden" name="id" value="{{$historico->id}}">
			<input type="hidden" name="equipamento_id" value="{{$historico->equipamento_id}}">
		</div>

		<div class="row align-items-center">
			<div class="col col-10">
				<label for="descricao">Serviços Executados</label>
				<input type="text" name="descricao" class="form-control" value="{{$historico->descricao}}">
			</div>

			<div class="col col-2">
				<label for="descricao">.</label>
				<button class="form-control btn btn-primary" id="cadastrar">Atualizar</button>
			</div>
		</div>

</form>




@endsection