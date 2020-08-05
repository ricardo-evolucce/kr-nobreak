@extends('layout')

@section('cabecalho')

	Histórico do equipamento

		@section('equipamento')
			<h6>Marca: {{$marca->nome}} | Modelo: {{$modelo->nome}}</h6>
			<h6>N° de série: {{$equipamento->numero_serie}}</h6>
			

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

<form action="{{ Route('cadastrarHistoricoEquipamento') }}" method="post">
	@csrf
		<div class="row align-items-center">
			<div class="col col-3">
				<label for="data">Data do evento</label>
				<input type="date" class="form-control" name="data" id="data">
			</div>

			<div class="col col-3">
				<label for="data_proxima_preventiva">Próxima preventiva</label>
				<input type="date" name="data_proxima_preventiva" class="form-control">
			</div>
			<div class="col col-4">
				<label for="tipo_manutencao">Tipo Manutenção</label>
				<select name="tipo_manutencao" class="form-control">
					<option value="1">Preventiva</option>
					<option value="2">Corretiva</option>
				</select>
			</div>
			
			
			<input type="hidden" name="equipamento_id" value="{{$equipamento->id}}">
		</div>

		<div class="row align-items-center">
			<div class="col col-10">
				<label for="descricao">Serviços Executados</label>
				<input type="text" name="descricao" class="form-control">
			</div>

			<div class="col col-2">
				<label for="descricao">.</label>
				<button class="form-control btn btn-primary" id="cadastrar">Cadastrar</button>
			</div>
		</div>

</form>

<table class="table mt-5">
	<thead>
		<tr>
			<th scope="col">Data do evento</th>
			<th scope="col">Próxima preventiva</th>
			<th scope="col">Tipo manutenção</th>
			<th scope="col">Serviços executados</th>
			<th></th>
		</tr>
	</thead>

	<tbody>
		@foreach($historicos as $historico)
			<tr>
				<td>
					{{$historico->data->format('d/m/Y')}}
				</td>
				<td>
					{{$historico->data_proxima_preventiva->format('d/m/Y')}}
				</td>
				<td>
					{{$historico->tipo_manutencao == 1 ? 'Preventiva' : 'Corretiva'}}
				</td>
				<td>
					<span>{{$historico->descricao}}</span>
				</td>
				<td>
					<span class="d-flex">
						<a href="{{ Route('exibirHistoricoEquipamento', $historico->id) }}"><button class="btn btn-info btn-sm" title="Editar"><i class="fas fa-edit"></i></button></a>

						<form action="{{ Route('removerHistorico', $historico->id) }}" method="post">
							@csrf
							@method('DELETE')
							<button class="btn btn-danger btn-sm" title="Apagar"><i class="far fa-trash-alt"></i></button>
						</form>
					</span>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>

{{ $historicos->links() }}



@endsection