@extends('layoutPublic')

@section('cabecalho')

	Histórico do equipamento

		@section('equipamento')
			<h6>Marca: {{$marca->nome}} | Modelo: {{$modelo->nome}}</h6>
			<h6>N° de série: {{$equipamento->numero_serie}}</h6>
			

		@endsection

@endsection



@section('conteudo')

<form action="{{ Route('exibirHistoricoEquipamentoPublico') }}" method="post">
	@csrf
		

		<div class="row align-items-center">
			<div class="col col-10">
				<label for="numero_serie">Pesquisar por Número de Série</label>
				<input type="text" name="numero_serie" class="form-control">
			</div>

			<div class="col col-2">
				<label for="pesquisar">.</label>
				<button class="form-control btn btn-primary" id="pesquisar">Pesquisar</button>
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
					
				</td>
			</tr>
		@endforeach
	</tbody>
</table>

{{ $historicos->links() }}



@endsection