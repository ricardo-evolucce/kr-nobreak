@extends('layout')


@section('cabecalho')

Modelos

@endsection

@section('conteudo')

<a href="/modelos/cadastrar" class="btn btn-dark mb-2">Cadastrar</a>

<ul class="list-group">
		@foreach ($modelos as $modelo)
			<li class="list-group-item"> <?= $modelo; ?></li>
		@endforeach
</ul>

@endsection


