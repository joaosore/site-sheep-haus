@extends('../layouts.app')
@section('content')
<div class="home-page flex-center position-ref full-height ">
	<div class="content">
        <div class="view">

            <section class="first-section">
                {{-- <div style="height: 50px;"></div> --}}
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <figure class="logo-banner">
                                <img src="{{ asset('images/logo-sheep-haus-text.png') }}" alt="Sheep Haus">
                            </figure>
                            <h2 class="card-title">{{ __('home.titulo_linha_1') }}<br/>{{ __('home.titulo_linha_2') }}</h2>
                            <br />
                            <a href="#" class="btn btn-lg btn-danger btn-padding" data-toggle="modal" data-target="#login">{{ __('home.cta_button') }}</a>
                            {{-- <form action="" class="form-inline">
                                <input class="form-control col-md-9" style="margin-right: 5px;" type="text" name="q" value="" placeholder="(__) _____-____">
                                <button type="submit" class="btn btn-danger btn-padding">Buscar</button>
                            </form> --}}
                            {{-- <br/> --}}
                            {{-- <a href="#" type="button" class="btn btn-link btn-announce text-success">ANUNCIAR VAGA</a> --}}
                        </div>
                    </div>
                </div>
            </section>

            <section class="bloco--monte">
                <div class="centralizar">
                    <header class="titulo--padrao">
                        <h1 class="titulo">{{ __('home.monte') }}</h1>
                    </header>
                    <div class="bloco-terco">
                        <figure class="icone--monte">
                            <img src="images/home/monte-icon-01.png" alt="" />
                            <div class="bubble"></div>
                        </figure>
                        <header class="titulo--bloco">
                            <h3 class="sub-titulo">{{ __('home.encontre_lugar') }}</h3>
                        </header>
                        <p class="texto">{{ __('home.encontre_lugar_text') }}</p>
                    </div>
                    <div class="bloco-terco">
                        <figure class="icone--monte">
                                <img src="images/home/monte-icon-02.png" alt="" />
                            <div class="bubble"></div>
                        </figure>
                        <header class="titulo--bloco">
                            <h3 class="sub-titulo">{{ __('home.envie_mensagens') }}</h3>
                        </header>
                        <p class="texto">{{ __('home.envie_mensagens_text') }}</p>
                    </div>
                    <div class="bloco-terco">
                        <figure class="icone--monte">
                                <img src="images/home/monte-icon-03.png" alt="" />
                            <div class="bubble"></div>
                        </figure>
                        <header class="titulo--bloco">
                            <h3 class="sub-titulo">{{ __('home.ache_moradores') }}</h3>
                        </header>
                        <p class="texto">{{ __('home.ache_moradores_text') }}</p>
                    </div>
                </div>
            </section>

            {{-- <section class="bloco--monte bloco--monte--cinza">
                <div class="centralizar">
                    <header class="titulo--padrao">
                        <h1 class="titulo">Cadastre-se abaixo ou entre com seu <a href="{{ route('login') }}">Login</a></h1>
                    </header>
                    <div class="bloco-form">
                    </div>
                </div>
            </section> --}}

        </div>
    </div>
</div>
@endsection
