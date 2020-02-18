<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="api_chats_url" content="{{ route('api.chats') }}">

    <title>{{ config('app.name', 'Sheep Haus') }}</title>

    <!-- Favicons -->
    <link href="{{ asset('images/logo-sheep-haus-element.png') }}" rel="icon">
    <link href="{{ asset('images/logo-sheep-haus-element.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="{{ asset('css/style.css') }}" /> --}}
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
@guest
<body class="site-body">
@else
<body class="site-body user-logged">
@endguest  
    @include('../auth.login')
    
    <!-- Root element of PhotoSwipe. Must have class pswp. -->
    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

        <!-- Background of PhotoSwipe. 
            It's a separate element as animating opacity is faster than rgba(). -->
        <div class="pswp__bg"></div>

        <!-- Slides wrapper with overflow:hidden. -->
        <div class="pswp__scroll-wrap">

            <!-- Container that holds slides. 
                PhotoSwipe keeps only 3 of them in the DOM to save memory.
                Don't modify these 3 pswp__item elements, data is added later on. -->
            <div class="pswp__container">
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
            </div>

            <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
            <div class="pswp__ui pswp__ui--hidden">

                <div class="pswp__top-bar">

                    <!--  Controls are self-explanatory. Order can be changed. -->

                    <div class="pswp__counter"></div>

                    <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

                    <button class="pswp__button pswp__button--share" title="Share"></button>

                    <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

                    <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

                    <!-- Preloader demo https://codepen.io/dimsemenov/pen/yyBWoR -->
                    <!-- element will get class pswp__preloader--active when preloader is running -->
                    <div class="pswp__preloader">
                        <div class="pswp__preloader__icn">
                        <div class="pswp__preloader__cut">
                            <div class="pswp__preloader__donut"></div>
                        </div>
                        </div>
                    </div>
                </div>

                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                    <div class="pswp__share-tooltip"></div> 
                </div>

                <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
                </button>

                <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
                </button>

                <div class="pswp__caption">
                    <div class="pswp__caption__center"></div>
                </div>

            </div>

        </div>

    </div>

    <header class="site-header">
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col col-1">
                        <div class="site-logo">
                            <h1>
                                <a class="navbar-brand" href="{{ url('/') }}">
                                    <img src="{{ asset('images/logo-sheep-haus-element.png') }}" alt="{{ config('app.name', 'Sheep Haus') }}" class="img-fluid" />
                                </a>
                            </h1>
                        </div>
                    </div>

                    <div class="col col-11">
                        
                        <nav id="nav-menu-container ">
                            <ul class="nav float-right">

                                @guest
                                    <li class="nav-item dropdown">
                                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ __('general.tenho_imovel') }}</a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="{{route('home')}}">{{ __('general.divulgar') }}</a></li>
                                            <li><a class="dropdown-item" href="{{route('home')}}">{{ __('general.match_moradores') }}</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ __('general.sou_aluno') }}</a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="{{route('home')}}">{{ __('general.match_imoveis') }}</a></li>
                                            <li><a class="dropdown-item" href="{{route('home')}}">{{ __('general.amigos') }}</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ __('general.sou_prestador_servico') }}</a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="{{route('home')}}">{{ __('general.anunciar') }}</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item menu-active">
                                        <button class="btn btn-success btn-sm btn-padding" data-toggle="modal" data-target="#login">{{ __('general.entrar') }}</button>                            
                                    </li>
                                    @if (Route::has('register'))
                                        <!-- <li class="lista-item">
                                            <a class="registro" href="{{ route('register') }}">{{ __('Register') }}</a>
                                        </li> -->
                                    @endif
                                @else

                                    @if(Auth::user()->function == 'M')
                                        <li class="nav-item">
                                            <a href="{{ route('SeggestedProperties') }}" class="nav-link">{{ __('general.imoveis_sugeridos') }}</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('SuggestedVacancies') }}" class="nav-link">{{ __('general.vagas_sugeridas') }}</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('property.index') }}" class="nav-link">{{ __('general.meu_imovel') }}</a>
                                        </li>
                                    @endif

                                    @if(Auth::user()->function == 'P')
                                        <li class="nav-item">
                                            <a href="{{ route('property.create') }}" class="nav-link"><i class="fa fa-plus"></i> {{ __('general.novo_imovel') }}</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('properties') }}" class="nav-link">{{ __('general.meus_imoveis') }}</a>
                                        </li>
                                    @endif

                                    <li class="nav-item dropdown">
                                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }}</a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="{{ route('dashboard') }}">{{ __('general.dashboard') }}</a></li>
                                            <li><a class="dropdown-item" href="{{ route('profile') }}">{{ __('general.perfil') }}</a></li>
                                            {{-- <li><a class="dropdown-item" href="{{ route('chats') }}">Mensagens</a></li> --}}
                                            <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('general.sair') }}</a>
        
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form></li>                                                                        
                                        </ul>
                                    </li>
                                @endguest  
                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ App::getLocale() }}</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{Request::url()}}?locale=pt">pt</a></li>
                                        <li><a class="dropdown-item" href="{{Request::url()}}?locale=en">en</a></li>
                                        <li><a class="dropdown-item" href="{{Request::url()}}?locale=es">es</a></li>
                                    </ul>
                                </li>                  
                            </ul>
                        </nav><!-- #nav-menu-container -->

                    </div>
                </div>
            </div>
        </div>
    </header><!-- #header -->

    <div id="app">
        <main>
            @yield('content')
        </main>
        {{-- <footer class="fixed-footer site-footer">
            <div class="container">
                <section>
                    <!-- <div class="bs-example"> -->
                        <ul class="list-inline pull-right;" style="margin-left: 32rem;">
                            <li class="list-inline-item"><a href="#" class="nav-item nav-link disabled"><b>Tenho imóvel</b></a>
                                <ul>
                                    <li><a href="#">Divulgar</a></li>
                                    <li><a href="#">Match moradores</a></li>
                                    <li><a href="#"><b>Anunciar imóvel</b></a></li>
                                </ul>
                            </li>
                            <li class="list-inline-item" style="margin-left: 5rem;"><a href="#" class="nav-item nav-link disabled"><b>Sou aluno</b></a>
                                <ul>
                                    <li><a href="#">Match imóveis</a><li>
                                    <li><a href="#">Amigos</a><li>
                                    <li><a href="#"><b>Procurar vagas</b></a></li>
                                </ul> 
                            </li>
                            <li class="list-inline-item" style="margin-left: 5rem;"><a href="#" class="nav-item nav-link disabled"><b>Prestador de serviço</b></a>
                                <ul>
                                    <li><a href="#">Anunciar</a></li>
                                    <li><a href="#"></a></li><br>
                                    <li><a href="#"><b>Anunciar serviços</b></a></li>
                                </ul>                                
                            </li>                              
                        </ul>
                    <!-- </div> -->
                </section>
                <section>
                    <nav class="navbar navbar-expand-md">
                        <div class="collapse navbar-collapse" id="navbarCollapse">
                            <div class="navbar-nav">
                                <a href="#" class="nav-item nav-link">Termos de uso</a>
                                <a href="#" class="nav-item nav-link" style="margin-left: 15rem;">&copy; {{date('Y')}} Todos os direitos reservados</a>
                            </div>
                            <div class="navbar-nav ml-auto">
                                <a href="#" class="nav-item nav-link disabled">Follow</a>
                                <a href="#" target="_blank" style="margin-top: 0.5rem;"><i class="fab fa-facebook"></i></a>
                                <a href="#" target="_blank" style="margin-top: 0.5rem; margin-left: 0.75rem;"><i class="fab fa-twitter"></i></a>
                            </div>
                        </div>
                    </nav>
                </section>
            </div>
        </footer> --}}
		<footer class="rodape">
			<div class="centralizar">
				<nav class="menu--rodape">
					<section class="menu--linguagem" id="navbarSupportedContent">
						<a class="logo" href="{{ url('/') }}">
							<figure>
                                <img src="{{ asset('images/logo-sheep-haus.png') }}" alt="{{ config('app.name', 'Sheep Haus') }}" class="img-fluid" />
							</figure>
						</a>
						<div class="dropdown">
							<div class="botao-dropdown">{{ __('general.idioma') }}</div>
							<input type="checkbox" id="dropdown">
							<ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{Request::url()}}?locale=pt">pt</a></li>
                                <li><a class="dropdown-item" href="{{Request::url()}}?locale=en">en</a></li>
                                <li><a class="dropdown-item" href="{{Request::url()}}?locale=es">es</a></li>
							</ul>
						</div>
					</section>
					<section class="menu--itens" id="navbarSupportedContent">
						<ul class="menu--itens_lista">
							<li class="lista-item">
								<p>{{ __('general.tenho_imovel') }}</p>
								<ul class="sub_menu--itens_lista">
									<li class="sub-lista-item">
										<a href="{{route('home')}}">{{ __('general.anunciar') }}</a>
									</li>
									<li class="sub-lista-item">
										<a href="{{route('home')}}">{{ __('general.match_moradores') }}</a>
									</li>
								</ul>
							</li>
							<li class="lista-item">
								<p>{{ __('general.sou_aluno') }}</p>
								<ul class="sub_menu--itens_lista">
									<li class="sub-lista-item">
										<a href="{{route('home')}}">{{ __('general.match_imoveis') }}</a>
									</li>
									<li class="sub-lista-item">
										<a href="{{route('home')}}">{{ __('general.amigos') }}</a>
									</li>
								</ul>
							</li>
							<li class="lista-item">
								<p>{{ __('general.sou_prestador_servico') }}</p>
								<ul class="sub_menu--itens_lista">
									<li class="sub-lista-item">
										<a href="{{route('home')}}">{{ __('general.anunciar') }}</a>
									</li>
								</ul>
							</li>
						</ul>
					</section>					
				</nav>
            </div>
            
			<div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <section>
                            <nav class="navbar navbar-expand-md">
                                <div class="collapse navbar-collapse" id="navbarCollapse">
                                    <div class="navbar-nav">
                                        <a href="/termos" class="nav-item nav-link">{{ __('general.termos_uso') }}</a>
                                        <a href="#" class="nav-item nav-link" style="margin-left: 10rem;">&copy; {{date('Y')}} {{ __('general.direitos_reservados') }}</a>
                                    </div>
                                    <div class="navbar-nav ml-auto">
                                        <a href="#" class="nav-item nav-link disabled" style="margin-left: 10rem;">{{ __('general.siga') }}</a>
                                        <a href="https://facebook.com" target="_blank" style="margin-top: 0.5rem;"><i class="fab fa-facebook"></i></a>
                                        <a href="https://twitter.com" target="_blank" style="margin-top: 0.5rem; margin-left: 0.75rem;"><i class="fab fa-twitter"></i></a>
                                    </div>
                                </div>
                            </nav>
                        </section>
                    </div>
                </div>
            </div>
		</footer>
    </div>
</body>
</html>
