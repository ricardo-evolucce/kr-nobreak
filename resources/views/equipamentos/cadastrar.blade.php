@extends('layout')

@section('menu')
@endsection

@section('cabecalho')
Equipamentos

	@section('pagina')
	Cadastrar equipamento
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
	        	<label for="numero_serie">Número de série</label>
	        	<input class="form-control" type="text" name="numero_serie">

	        </div>


	    </div>

	    <div class="row">
	    	<div class="col col-3">
	        	<label for="tensao_entrada">Tensão Entrada</label>
	        	<select class="form-control" type="text" name="tensao_entrada">
	        		<option value="1">127v</option>
	        		<option value="2">220v</option>
	        	</select>
	        </div>

	        <div class="col col-3">
	        	<label for="tensao_saida">Tensão Saída</label>
	        	<select class="form-control" type="text" name="tensao_saida">
	        		<option value="1">127v</option>
	        		<option value="2">220v</option>
	        	</select>
	        </div>

	        <div class="col col-3">
	        	<label for="potencia">Potência</label>
	        	<input type="text" name="potencia" class="form-control">
	        </div>

	         <div class="col col-3">
	        	<label for="fator_potencia">Fator Potência</label>
	        	<input type="text" name="fator_potencia" class="form-control">
	        </div>
	    </div>

	    <div class="row">
	    	<div class="col col-3">
	        	<label for="inicio_garantia">Início Garantia</label>
	        	<input type="date" name="inicio_garantia" class="form-control">
	        </div>

	        <div class="col col-3">
	        	<label for="fim_garantia">Fim Garantia</label>
	        	<select class="form-control" type="text" name="fim_garantia">
	        		<option value="1">12 meses</option>
	        		<option value="2">18 meses</option>
	        		<option value="3">24 meses</option>
	        	</select>
	        </div>

	        <div class="col col-3">
	        	<label for="numero_nfe">Número NFE</label>
	        	<input type="text" name="numero_nfe" class="form-control">
	        </div>

	    </div>

	    <div class="row">
	    	<div class="col col-12">
	    		<label for="observacoes">Observações</label>
	    		<textarea name="observacoes" class="form-control"></textarea>
	    	</div>
	    </div>

	    <div class="row">
	    	<div class="col col-12">
	    		<label for="observacoes_internas">Observações internas</label>
	    		<textarea name="observacoes_internas" class="form-control"></textarea>
	    	</div>
	    </div>

        <button class="btn btn-info mt-2">Cadastrar</button>
        </form>
@endsection