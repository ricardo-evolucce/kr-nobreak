@extends('layout')

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

          	<div class="row align-items-center">
          		<div class="col col-12">
					<p class="media-body pb-3 mb-0  lh-125">
			        	<strong class="d-block text-gray-dark">Observações internas:</strong>
			    		{{$equipamento->observacoes_internas}}
          			</p>
          		</div>
			
          		
       
          	</div>


			

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

<form action="{{ Route('cadastrarHistoricoEquipamento') }}" method="post" class="no-print">
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
					<span class="d-flex no-print">
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