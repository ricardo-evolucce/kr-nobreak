<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Equipamentos</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('js/bootstrap-4.1.3-dist/css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('DataTables/datatables.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('icons/css/all.css') }}">

    
    <script type="text/javascript" src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('DataTables/datatables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap-4.1.3-dist/js/bootstrap.min.js') }}"></script>
    



</head>

<body>
	<div class="container">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('listarEquipamentos')}}">Início </a>
                    </li>
                    <li class="nav-item dropdown">
                       <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Estoque <span class="sr-only">(current)</span>
                       </a>
                       <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                              
                              <a class="dropdown-item" href="{{route('cadastrarEquipamento')}}">Cadastrar</a>
                              <a class="dropdown-item" href="{{route('listarEquipamentos')}}">Exibir todos</a>
                          
                        </div>
                    </li>
                </ul>
          </div>
        </nav>

		<div class="jumbotron py-2">
			<h4>@yield('cabecalho')</h4>
            @yield('equipamento')
        </div>
		@yield('conteudo')
	</div>
</body>
</html>