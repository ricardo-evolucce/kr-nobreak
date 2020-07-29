@extends('layout')

@section('cabecalho')

	Histórico do equipamento

		@section('equipamento')
			<h5>Marca: {{$equipamento->id}} | Modelo: {{$equipamento->modelo_id}}</h5>
			<h5>N° de série: {{$equipamento->num_serie}}</h5>
			

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

<form action="/historicos/cadastrar" method="post">
	@csrf
		<div class="row align-items-center">
			<div class="col col-3">
				<label for="data">Data</label>
				<input type="date" class="form-control" name="data" id="data">
			</div>
			<div class="col col-7">
				<label for="descricao">Descrição</label>
				<input type="text" class="form-control" name="descricao" id="descricao">
			
			</div>
			<div class="col col-2">
				<label for="descricao">Ação</label>
				<button class="form-control btn btn-primary" id="cadastrar">Cadastrar</button>
			</div>
			<input type="hidden" name="equipamento_id" value="{{$equipamento->id}}">
		</div>

</form>

<table class="table mt-5">
	<thead>
		<tr>
			<th scope="col">Data</th>
			<th scope="col">Descrição</th>
		</tr>
	</thead>

	<tbody>
		@foreach($historicos as $historico)
			<tr>
				<th scope="row">
					{{$historico->data->format('d/m/Y')}}
				</th>
				<td>
					<span id="historico-{{$historico->id}}">{{$historico->descricao}}</span>
					<div class="input-group w-50" hidden id="input-historico-{{ $historico->id }}">
            			<input type="text" class="form-control" value="{{ $historico->descricao }}">
            			<div class="input-group-append">
                			<button class="btn btn-primary" onclick="editarSerie({{ $historico->id }})">
                    			<i class="fas fa-check"></i>
                			</button>
                			@csrf
            			</div>
        			</div>
					<button class="btn btn-info btn-sm" onclick="toggleInput({{$historico->id}})"><i class="fas fa-edit"></i></button>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>

<script>
	function toggleInput(historicoId){
		document.getElementById('input-historico-${historicoId}')
		.removeAttribute('hidden');
		document.getElementById('historico-${historicoId}').hidden = true;
	}


@endsection