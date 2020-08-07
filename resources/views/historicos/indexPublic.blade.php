@extends('layoutPublic')

@section('cabecalho')

	Histórico de Equipamento

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
	
			<tr>
				<td>
					
				</td>
				<td>
					
				</td>
				<td>
					
				</td>
				<td>
					<span></span>
				</td>
				<td>
					
				</td>
			</tr>
		
	</tbody>
</table>





@endsection