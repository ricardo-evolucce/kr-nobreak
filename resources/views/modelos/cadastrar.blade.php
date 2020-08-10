@extends('layout')

@section('cabecalho')
	Modelos
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

<form method="post" action="{{ route('cadastrarModelo') }}">
	@csrf
	<div class="row mb-2">
		<div class="col col-3">
			<label for="">Marca</label>
			<select name="marca_id" class="form-control">
				@foreach($marcas as $marca)
				<option value="{{$marca->id}}">{{$marca->nome}}</option>
				@endforeach
			</select>
		</div>
        <div class="col col-9">
            <label for="modelo">Modelo</label>
            <input type="text" class="form-control" name="nome" id="modelo">
        </div>
    </div>
        <button class="btn btn-primary">Cadastrar</button>
</form>
@endsection