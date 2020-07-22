@extends('layout')

@section('cabecalho')
Modelos
@endsection

@section('conteudo')
<form method="post" action="\modelos\cadastrar">
	@csrf
        <div class="form-group">
            <label for="modelo">Modelo</label>
            <input type="text" class="form-control" name="modelo" id="modelo">
        </div>

        <button class="btn btn-primary">Cadastrar</button>
        </form>
@endsection