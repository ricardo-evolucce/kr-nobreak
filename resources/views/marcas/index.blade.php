@extends('layout')


@section('cabecalho')

Marcas

@endsection

@section('conteudo')




@if(!empty($mensagem))
<div class="alert alert-success">
{{ $mensagem }}
</div>
@endif

<a href="{{ route('cadastrarMarca') }}" class="btn btn-primary">Cadastrar</a>

<ul class="list-group">
		@foreach ($marcas as $marca)
			<li class="list-group-item d-flex justify-content-between align-items-center">
				{{ $marca->nome }}
				<form method="post" action="/marcas/remover/{{$marca->id}}"
					onsubmit="return confirm('Confirma remoção de {{$marca->nome}} ?')"
				>
					@csrf
					@method('DELETE')
					<button class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>
				</form>

			</li>
		@endforeach
</ul>

@endsection


