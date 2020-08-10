@extends('layout')


@section('cabecalho')

	Equipamentos
	@section('pagina')
	Exibindo todos
	@endsection

@endsection

@section('conteudo')

@if(!empty($mensagem))
<div class="alert alert-success">
{{ $mensagem }}
</div>
@endif

<table id="table" class="table table-striped table-bordered" style="width: 100%">
	<thead>
		<tr>
			<th>Marca</th>
			<th>Modelo</th>
			<th>N° de série</th>
			<th>Ações</th>
		
		</tr>
	</thead>
	<tbody>
		@foreach ($equipamentos as $equipamento)
			<tr>
				<td>{{$equipamento->marca->nome}}</td>
				<td>{{$equipamento->modelo->nome}}</td>
				<td>{{$equipamento->numero_serie}}</td>
				<td><span class="d-flex">
						<a href="{{route('exibirEquipamento', $equipamento->id)}}" class="btn btn-info btn-xs mr-1">
							<i class="fas fa-external-link-alt" title="Editar"></i>
						</a>

						<a href="{{route('exibirHistoricosEquipamento', $equipamento->id)}}" class="btn btn-info btn-xs mr-1">
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
	</tbody>
</table>



<script type="text/javascript">
    $(document).ready( function () {
    $('#table').DataTable({
    	"language": {
                "lengthMenu": "_MENU_ registros por página",
            "zeroRecords": "Nada encontrado.",
            "info": "Página _PAGE_ de _PAGES_",
            "infoEmpty": "Nada encontrado.",
            "infoFiltered": "(Filtrando de um total de _MAX_)",
            "search": "Pesquisar",
            "paginate": {
            	"next": ">",
            	"previous": "<"
            }

           }
    });
} );
  </script>

@endsection


