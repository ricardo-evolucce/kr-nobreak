@extends('layout')


@section('cabecalho')

Equipamentos

@endsection

@section('conteudo')

@if(!empty($mensagem))
<div class="alert alert-success">
{{ $mensagem }}
</div>
@endif

<table id="table">
	<thead>
		<tr>
			<td>Marca</td>
			<td>Modelo</td>
			<td>N° de série</td>
			<td>Ações</td>
		
		</tr>
	</thead>
		@foreach ($equipamentos as $equipamento)
			<tr>
				<td>{{$equipamento->marca->nome}}</td>
				<td>{{$equipamento->modelo->nome}}</td>
				<td>{{$equipamento->numero_serie}}</td>
				<td><span class="d-flex">
						<a href="{{route('exibirEquipamento', $equipamento->id)}}" class="btn btn-info btn-sm mr-1">
							<i class="fas fa-external-link-alt" title="Editar"></i>
						</a>

						<a href="{{route('exibirHistoricosEquipamento', $equipamento->id)}}" class="btn btn-info btn-sm mr-1">
							<i class="fas fa-history" alt="Histórico" title="Histórico"></i>
						</a>

						<form method="post" action="/equipamentos/remover/{{$equipamento->id}}">
							@csrf
							@method('DELETE')
							<button class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
						</form>
					</span></td>
			</tr>
		@endforeach
</table>



<script type="text/javascript">
    $(document).ready( function () {
    $('#table').DataTable();
} );
  </script>

@endsection


