<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Sheep Haus') }}</title>

    <!-- Favicons -->
    <link href="img/favicon.png" rel="icon">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <style>
        .field-icon {
            float: right;
            margin-left: -30px;
            margin-top: -25px;
            position: relative;
            z-index: 2;
        }
    </style>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('css/icons/font-awesome.css') }}" rel="stylesheet">
</head>
<body>
	@include('../auth.login')

    <header id="header">
        <div class="container-fluid" style="background: rgb(169, 7, 7);">

            <div id="logo" class="pull-left">
                <h1><a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name', 'Sheep Haus') }}</a></h1>
            </div>

            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li class="nav-item dropdown"><a href="#">Tenho imóvel</a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-item"><a href="{{route('home')}}">Divulgar</a></li>
                            <li class="dropdown-item"><a href="{{route('home')}}">Match moradores</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Sou aluno</a>
                        <ul>
                            <li><a href="{{route('home')}}">Match imóveis</a></li>
                            <li><a href="{{route('home')}}">Amigos</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Prestador Serviços</a>
                        <ul>
                            <li><a href="{{route('home')}}">Anunciar</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{route('home')}}">Procurar vaga</a>
                    </li>
                    <li>
                        <a href="{{route('home')}}">Anunciar Serviços</a>
                    </li>
                    <li>
                        <a href="{{route('home')}}">Anunciar vaga</a>
                    </li>
                    <li><a href="#">BR</a>
                        <ul>
                            <li><a href="{{Request::url()}}?locale=en">BR</a></li>
                            <li><a href="{{Request::url()}}?locale=pt-BR">EN</a></li>
                            <li><a href="{{Request::url()}}?locale=es">ES</a></li>
                        </ul>
                    </li>
                    @guest
                        <li class="menu-active">
                            <button class="btn btn-danger" data-toggle="modal" data-target="#login">{{ __('Login') }}</button>                            
                        </li>
                        @if (Route::has('register'))
                            <!-- <li class="lista-item">
                                <a class="registro" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li> -->
                        @endif
                    @else
                        <!-- <li><a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><span class="caret"></span></a> -->
                        <li><a href="#">{{ Auth::user()->name }} <span class="caret"></span></a>
                            <ul>
                                <li><a href="{{ route('dashboard') }}" class="dropdown-item">Dashboard</a></li>
                                <li><a href="{{ route('profile') }}" class="dropdown-item">Profile</a></li>
                                <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form></li>                                                                        
                            </ul>
                        </li>
                    @endguest                    
                </ul>
            </nav><!-- #nav-menu-container -->
        </div>
    </header><!-- #header -->

    <div id="app">
        <main>
            @yield('content')
        </main>
		<footer class="rodape">
			<div class="centralizar">
				<nav class="menu--rodape">
					<section class="menu--linguagem" id="navbarSupportedContent">
						<a class="logo" href="{{ url('/') }}">
							<figure>
								<img src="images/icones/logo_completa.png" alt="">
							</figure>
						</a>
						<div class="dropdown">
							<div class="botao-dropdown">BR</div>
							<input type="checkbox" id="dropdown">
							<ul class="dropdown-menu">
								<li><a href="">EN</a></li>
								<li><a href="">BR</a></li>
								<li><a href="">ES</a></li>
							</ul>
						</div>
					</section>
					<section class="menu--itens" id="navbarSupportedContent">
						<ul class="menu--itens_lista">
							<li class="lista-item">
								<p>Tenho imóvel</p>
								<ul class="sub_menu--itens_lista">
									<li class="sub-lista-item">
										<a href="{{route('home')}}">Divulgar</a>
									</li>
									<li class="sub-lista-item">
										<a href="{{route('home')}}">Match moradores</a>
									</li>
								</ul>
							</li>
							<li class="lista-item">
								<p>Sou aluno</p>
								<ul class="sub_menu--itens_lista">
									<li class="sub-lista-item">
										<a href="{{route('home')}}">Match imóveis</a>
									</li>
									<li class="sub-lista-item">
										<a href="{{route('home')}}">Amigos</a>
									</li>
								</ul>
							</li>
							<li class="lista-item">
								<p>Prestador Serviços</p>
								<ul class="sub_menu--itens_lista">
									<li class="sub-lista-item">
										<a href="{{route('home')}}">Anunciar</a>
									</li>
								</ul>
							</li>
							<li class="lista-item">
								<a href="{{route('home')}}">Procurar vaga</a>
							</li>
							<li class="lista-item">
								<a href="{{route('home')}}">Anunciar Serviços</a>
							</li>
							<li class="lista-item">
								<a href="{{route('home')}}">Anunciar vaga</a>
							</li>
						</ul>
					</section>
					<section class="menu--base">
						<nav class="base-menu">
							<ul class="base-lista">
								<li class="base-itens"><a href="">Sobre</a></li>
								<li class="base-itens"><a href="">Contato</a></li>
								<li class="base-itens"><a >Termo</a></li>
							</ul>
							<div class="copyright">
								<p class="texto">
									© {{date('Y')}} @lang('general.terms')
								</p>
							</div>
							<div class="compartilhar">
								<p class="texto">Follow</p>
								<a href=""><i class="icone facebook" data-fonte="&#xf09a;"></i></a>
								<a href=""><i class="icone twitter" data-fonte="&#xf099;"></i></a>
							</div>
						</nav>
					</section>
				</nav>
			</div>
		</footer>
    </div>
</body>
</html>
