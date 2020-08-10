<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Equipamentos</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('js/bootstrap-4.1.3-dist/css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('DataTables/datatables.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/icons/css/all.css') }}">

    
    <script type="text/javascript" src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('DataTables/datatables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap-4.1.3-dist/js/bootstrap.min.js') }}"></script>




</head>

<body>
	<div class="container-fluid">

        <nav class="navbar navbar-expand-md mb-2 text-light menu" style="">

          <!--<a href="/" class="navbar-brand mr-0">Brand</a> -->

          <img class="navbar-brand mr-0" src="https://static.wixstatic.com/media/423870_787a5bfbea854a439332aada448f0ef2~mv2.png/v1/fill/w_150,h_45,al_c,q_85,usm_0.66_1.00_0.01/logotipo%20krnobreak%20transparente.webp">

        


            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav mx-auto text-center">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('listarEquipamentos')}}">Início </a>
                    </li>
                    <li class="nav-item dropdown">
                       <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Equipamentos<span class="sr-only">(current)</span>
                       </a>
                       <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                              
                              <a class="dropdown-item" href="{{route('cadastrarEquipamento')}}">Cadastrar</a>
                              <a class="dropdown-item" href="{{route('listarEquipamentos')}}">Exibir todos</a>
                          
                        </div>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-danger" href="/sair">Sair</a>
                    </li>
                </ul>


          </div>
        </nav>

		<div class="py-3 text-left">
			<h2 class="lead border-bottom border-dark rounded w-25 p-2">@yield('cabecalho')</h2>
      <h6 class="w-25 p-1">@yield('pagina')</h6>
         @yield('equipamento')
    </div>
		@yield('conteudo')
	</div>
</body>
</html> 