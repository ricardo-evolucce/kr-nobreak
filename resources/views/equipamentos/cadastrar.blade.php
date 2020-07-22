@extends('layout')

@section('cabecalho')
Equipamentos
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
 


<form method="post" action="/equipamentos/cadastrar">
		@csrf
		<div class="row">
	        <div class="col col-3">
	            <label for="marca">Marca</label>
	            <!--<input type="text" class="form-control" name="modelo" id="modelo">-->
	            <select class="form-control" name="marca_id" id="marca">
	            	@foreach ($marcas as $marca)
	            		<option value="{{$marca->id}}">{{$marca->nome}}</option>
	            	@endforeach
	            </select>
	        </div>
	        <div class="col col-3">
	        	<label for="modelo">Modelo</label>
	        	<select class="form-control" name="modelo_id" id="modelo">
	        		@foreach ($modelos as $modelo)
	        			<option value="{{$modelo->id}}">{{$modelo->nome}}</option>
	        		@endforeach
	        	</select>

	        </div>
	        <div class="col col-6">
	        	<label for="num_serie">Número de série</label>
	        	<input class="form-control" type="text" name="num_serie">

	        </div>
	    </div>
        <button class="btn btn-primary">Cadastrar</button>
        </form>
@endsection