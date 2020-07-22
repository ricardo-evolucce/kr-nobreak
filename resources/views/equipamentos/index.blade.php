@extends('layout')


@section('cabecalho')

Equipamentos

@endsection

@section('conteudo')

<a href="/equipamentos/cadastrar" class="btn btn-dark mb-2">Cadastrar</a>

<ul class="list-group">
		@foreach ($equipamentos as $equipamento)
			<li class="list-group-item d-flex justify-content-between align-items-center"> {{$equipamento->marca_id}}
				<span class="d-flex">
					<a href="/equipamentos/{{$equipamento->id}}" class="btn btn-info btn-sm mr-1">
						<i class="fas fa-external-link-alt"></i>
					</a>

					<a href="/historicos/exibir/{{$equipamento->id}}" class="btn btn-info btn-sm mr-1">
						<i class="fas fa-history" alt="Histórico" title="Histórico"></i>
					</a>

					<form method="post" action="/equipamentos/remover/{{$equipamento->id}}">
						@csrf
						@method('DELETE')
						<button class="btn btn-danger">Apagar</button>
					</form>

				</span>


			</li>
		@endforeach
</ul>

@endsection


