@extends('layout')


@section('cabecalho')

	Marcas
	@section('pagina')
	Exibindo todas
	@endsection
@endsection



@section('conteudo')




@if(!empty($mensagem))
<div class="alert alert-success">
{{ $mensagem }}
</div>
@endif

<ul class="list-group">
		@foreach ($marcas as $marca)
			<li class="list-group-item d-flex justify-content-between align-items-center">
				<span id="nome-marca-{{ $marca->id }}">{{ $marca->nome }}</span>

		        <div class="input-group w-50" hidden id="input-nome-marca-{{ $marca->id }}">
		            <input type="text" class="form-control" value="{{ $marca->nome }}">
		            <div class="input-group-append">
		                <button class="btn btn-primary" onclick="editarMarca({{ $marca->id }})">
		                    <i class="fas fa-check"></i>
		                </button>
		                @csrf
		            </div>
		        </div>

				<span class="d-flex">
					<button class="btn btn-info btn-sm mr-1" onclick="toggleInput({{$marca->id}})">
						<i class="fas fa-edit"></i>
					</button>

					<form method="post" action="/marcas/remover/{{$marca->id}}"
						onsubmit="return confirm('Confirma remoção de {{$marca->nome}} ?')"
					>
						@csrf
						@method('DELETE')
						<button class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>
					</form>
				</span>

			</li>
		@endforeach
</ul>


<script>
function toggleInput(marca_id) {
    const nomeMarcaEl = document.getElementById(`nome-marca-${marca_id}`);
    const inputMarcaEl = document.getElementById(`input-nome-marca-${marca_id}`);
    if (nomeMarcaEl.hasAttribute('hidden')) {
        nomeMarcaEl.removeAttribute('hidden');
        inputMarcaEl.hidden = true;
    } else {
        inputMarcaEl.removeAttribute('hidden');
        nomeMarcaEl.hidden = true;
    }
}

function editarMarca(marca_id){

	let formData = new FormData();

	const nome = document
	.querySelector(`#input-nome-marca-${marca_id} > input`)
	.value;

	const token = document.querySelector('input[name="_token"]').value;
	

	formData.append('nome', nome);
	formData.append('_token', token);


	const url = `/marcas/${marca_id}/editaNome`;

	fetch(url, {
		body: formData,
		method: 'POST'
	}).then(() => {
		toggleInput(marca_id);
		document.getElementById(`nome-marca-${marca_id}`).textContent = nome;
	}

	);
	
}


</script>

@endsection


