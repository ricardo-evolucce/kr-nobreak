@extends('layoutPublic')

@section('cabecalho')

	Histórico do equipamento

		@section('equipamento')

			<div class="row align-items-center">
				<div class="col col-3">
					<p class="media-body pb-3 mb-0  lh-125">
			        	<strong class="d-block text-gray-dark">Marca</strong>
			    		{{$marca->nome}}
          			</p>
          		</div>
          		<div class="col col-3">
					<p class="media-body pb-3 mb-0  lh-125">
			        	<strong class="d-block text-gray-dark">Modelo</strong>
			    		{{$modelo->nome}}
          			</p>
          		</div>
          		<div class="col col-3">
					<p class="media-body pb-3 mb-0  lh-125">
			        	<strong class="d-block text-gray-dark">N° Série</strong>
			    		{{$equipamento->numero_serie}}
          			</p>
          		</div>
          		<div class="col col-3">
					<p class="media-body pb-3 mb-0  lh-125">
			        	<strong class="d-block text-gray-dark">N° NFE</strong>
			    		{{$equipamento->numero_nfe}}
          			</p>
          		</div>
          	</div>

          	<div class="row align-items-center">
				<div class="col col-3">
					<p class="media-body pb-3 mb-0  lh-125">
			        	<strong class="d-block text-gray-dark">Tensão Entrada:</strong>
			    		{{$equipamento->tensao_entrada}}
          			</p>
          		</div>
          		<div class="col col-3">
					<p class="media-body pb-3 mb-0  lh-125">
			        	<strong class="d-block text-gray-dark">Tensão Saida:</strong>
			    		{{$equipamento->tensao_saida}}
          			</p>
          		</div>
          		<div class="col col-3">
					<p class="media-body pb-3 mb-0  lh-125">
			        	<strong class="d-block text-gray-dark">Potência:</strong>
			    		{{$equipamento->potencia}}
          			</p>
          		</div>
          		<div class="col col-3">
					<p class="media-body pb-3 mb-0  lh-125">
			        	<strong class="d-block text-gray-dark">Início Garantia:</strong>
			    		{{$equipamento->inicio_garantia}}
          			</p>
          		</div>
          	</div>

          	<div class="row align-items-center">
          		<div class="col col-9">
					<p class="media-body pb-3 mb-0  lh-125">
			        	<strong class="d-block text-gray-dark">Observações:</strong>
			    		{{$equipamento->observacoes}}
          			</p>
          		</div>
				<div class="col col-3">
					<p class="media-body pb-3 mb-0  lh-125">
			        	<strong class="d-block text-gray-dark">Fim Garantia:</strong>
			    		{{$equipamento->fim_garantia}}
          			</p>
          		</div>
          		
       
          	</div>

		
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