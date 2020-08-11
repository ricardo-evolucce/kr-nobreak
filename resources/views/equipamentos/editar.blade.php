@extends('layout')

@section('opcoes_menu')


      <li class="nav-item active">
        <a class="nav-link" href="{{route('listarEquipamentos')}}">Início </a>
      </li>
    
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Equipamentos <span class="sr-only">(current)</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="{{route('cadastrarEquipamento')}}">Cadastrar</a>
          <a class="dropdown-item" href="{{route('listarEquipamentos')}}">Mostrar todos</a>
          
        </div>
      </li>
  


@endsection

@section('cabecalho')
Equipamentos
	@section('pagina')
	Editar equipamento N° Série: {{$equipamento->numero_serie}}
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
 


<form action="{{route('editarEquipamento')}}" method="post">
		<input type="hidden" name="id" value="{{$equipamento->id}}">
		
		@csrf
	
		<div class="row">
	        <div class="col col-3">
	            <label for="marca_id">Marca</label>
	            <!--<input type="text" class="form-control" name="modelo" id="modelo">-->
	            <select class="form-control" name="marca_id" id="marca_id">
	          		@foreach ($marcas as $marca)
	          		{
	          			<option value="{{$marca->id}}" {{$marca->id == $equipamento->marca_id ? 'selected' : ''}}>{{$marca->nome}}</option>
	          		}
	          		@endforeach
	       
	            </select>
	        </div>
	        <div class="col col-3">
	        	<label for="modelo">Modelo</label>
	        	<select class="form-control" name="modelo_id" id="modelo">
	        		@foreach ($modelos as $modelo)
	        		{
	        			<option value="{{$modelo->id}}" 
	        				{{$modelo->id == $equipamento->modelo_id ? 'selected' : ''}}>
	        				{{$modelo->nome}}
	        			</option>
	        		}
	        		@endforeach
	        		
	        
	        	</select>

	        </div>
	        <div class="col col-6">
	        	<label for="numero_serie">Número de série</label>
	        	<input class="form-control" type="text" name="numero_serie" value="{{$equipamento->numero_serie}}">

	        </div>


	    </div>

	    <div class="row">
	    	<div class="col col-3">
	        	<label for="tensao_entrada">Tensão Entrada</label>
	        	<select class="form-control" type="text" name="tensao_entrada">
	        		@foreach(array_values($tensoes) as $i => $value){
	        		<option value="{{$i}}" {{$i==$equipamento->tensao_entrada ? 'selected' : ''}}>{{$value}}</option>
	        		}
	        		@endforeach
	        	</select>
	        </div>

	        <div class="col col-3">
	        	<label for="tensao_saida">Tensão Saída</label>
	        	<select class="form-control" type="text" name="tensao_saida">

	        		@foreach(array_values($tensoes) as $i => $value){
	        		<option value="{{$i}}" {{$i==$equipamento->tensao_saida ? 'selected' : ''}}>{{$value}}</option>
	        		}
	        		@endforeach

	        	</select>
	        </div>

	        <div class="col col-3">
	        	<label for="potencia">Potência</label>
	        	<input type="text" name="potencia" class="form-control" value="{{$equipamento->potencia}}">
	        </div>

	         <div class="col col-3">
	        	<label for="fator_potencia">Fator Potência</label>
	        	<input type="text" name="fator_potencia" class="form-control" value="{{$equipamento->fator_potencia}}">
	        </div>
	    </div>

	    <div class="row">
	    	<div class="col col-3">
	        	<label for="inicio_garantia">Início Garantia</label>
	        	<input type="date" name="inicio_garantia" class="form-control" value="{{$equipamento->inicio_garantia->format('Y-m-d')}}">
	        </div>

	        <div class="col col-3">
	        	<label for="fim_garantia">Fim Garantia</label>
	        	<select class="form-control" type="text" name="fim_garantia">
	        		@foreach(array_values($fim_garantia) as $i => $value){
	        		<option value="{{$i}}" {{$i==$equipamento->fim_garantia ? 'selected' : ''}}>{{$value}}</option>
	        		}
	        		@endforeach
	        	</select>
	        </div>

	        <div class="col col-3">
	        	<label for="numero_nfe">Número NFE</label>
	        	<input type="text" name="numero_nfe" class="form-control" value="{{$equipamento->numero_nfe}}">
	        </div>

	    </div>

	    <div class="row">
	    	<div class="col col-12">
	    		<label for="observacoes">Observações</label>
	    		<textarea name="observacoes" class="form-control">{{$equipamento->observacoes}}</textarea>
	    	</div>
	    </div>

	    <div class="row">
	    	<div class="col col-12">
	    		<label for="observacoes_internas">Observações internas</label>
	    		<textarea name="observacoes_internas" class="form-control">{{$equipamento->observacoes_internas}}</textarea>
	    	</div>
	    </div>

        <button class="btn btn-info mt-2">Editar</button>
        </form>
@endsection