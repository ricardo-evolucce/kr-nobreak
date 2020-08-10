@extends('layout')


@section('cabecalho')

	Modelos
	@section('pagina')
	Exibindo todos
	@endsection

@endsection

@section('conteudo')



@if(!empty($mensagem))
<div class="alert alert-success">
{{ $mensagem }}
</div>
@endif



<ul class="list-group">
		@foreach ($modelos as $modelo)
			<li class="list-group-item d-flex justify-content-between align-items-center">
				<span id="nome-modelo-{{ $modelo->id }}">{{ $modelo->nome }}</span>

		        <div class="input-group w-50" hidden id="input-nome-modelo-{{ $modelo->id }}">
		            <input type="text" class="form-control" value="{{ $modelo->nome }}">
		            <div class="input-group-append">
		                <button class="btn btn-primary" onclick="editarModelo({{ $modelo->id }})">
		                    <i class="fas fa-check"></i>
		                </button>
		                @csrf
		            </div>
		        </div>
		        <span class="d-flex">
		        	<button class="btn btn-info btn-sm mr-1" onclick="toggleInput({{$modelo->id}})">
						<i class="fas fa-edit"></i>
					</button>

					<form method="post" action="/modelos/remover/{{$modelo->id}}"
						onsubmit="return confirm('Confirma remoção de {{$modelo->nome}} ?')">
						@csrf
						@method('DELETE')
						<button class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>
					</form>
				</span>
			</li>
		@endforeach
</ul>



<script>
function toggleInput(modelo_id) {

    const nomeModeloEl = document.getElementById(`nome-modelo-${modelo_id}`);
    const inputModeloEl = document.getElementById(`input-nome-modelo-${modelo_id}`);
    
    if (nomeModeloEl.hasAttribute('hidden')) {
        nomeModeloEl.removeAttribute('hidden');
        inputModeloEl.hidden = true;
    } else {
        inputModeloEl.removeAttribute('hidden');
        nomeModeloEl.hidden = true;
    }
}

function editarModelo(modelo_id){

	let formData = new FormData();

	const nome = document
	.querySelector(`#input-nome-modelo-${modelo_id} > input`)
	.value;

	const token = document.querySelector('input[name="_token"]').value;
	

	formData.append('nome', nome);
	formData.append('_token', token);


	const url = `/modelos/${modelo_id}/editaNome`;

	fetch(url, {
		body: formData,
		method: 'POST'
	}).then(() => {
		toggleInput(modelo_id);
		document.getElementById(`nome-modelo-${modelo_id}`).textContent = nome;
	}

	);
	
}


</script>
@endsection


