@extends('layout')

@section('cabecalho')
	Marcas
	@section('pagina')
	Cadastrar
	@endsection

@endsection

@section('conteudo')

@if($errors->any())
	<div class="alert alert-danger">
		<ul>
			@foreach($errors->all() as $error)
			<li>{{$error}}</li>
			@endforeach
		</ul>
	</div>
@endif

<form method="post" action="cadastrar">
		@csrf
        <div class="form-group">
            <label for="nome">Nome da marca</label>
            <input type="text" class="form-control" name="nome" id="nome">
        </div>

        <button class="btn brn-primary">Cadastrar</button>
</form>
@endsection