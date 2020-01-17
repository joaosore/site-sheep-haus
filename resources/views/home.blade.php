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
                            <h2 class="card-title">Dê match e more com quem<br/>combina com você</h2>
                            <br />
                            <a href="#" class="btn btn-lg btn-danger btn-padding" data-toggle="modal" data-target="#login">Acesse para encontrar repúblicas</a>
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
                        <h1 class="titulo">Monte e gerencie sua própria república</h1>
                    </header>
                    <div class="bloco-terco">
                        <figure class="icone--monte">
                            <img src="images/home/monte-icon-01.png" alt="" />
                            <div class="bubble"></div>
                        </figure>
                        <header class="titulo--bloco">
                            <h3 class="sub-titulo">Encontre o melhor lugar com o filtro inteligente</h3>
                        </header>
                        <p class="texto">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis delectus fuga ducimus error eveniet.</p>
                    </div>
                    <div class="bloco-terco">
                        <figure class="icone--monte">
                                <img src="images/home/monte-icon-02.png" alt="" />
                            <div class="bubble"></div>
                        </figure>
                        <header class="titulo--bloco">
                            <h3 class="sub-titulo">Envie mensagens para os moradores</h3>
                        </header>
                        <p class="texto">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis delectus fuga ducimus error eveniet.</p>
                    </div>
                    <div class="bloco-terco">
                        <figure class="icone--monte">
                                <img src="images/home/monte-icon-03.png" alt="" />
                            <div class="bubble"></div>
                        </figure>
                        <header class="titulo--bloco">
                            <h3 class="sub-titulo">Ache moradores com o melhor perfil para a casa</h3>
                        </header>
                        <p class="texto">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis delectus fuga ducimus error eveniet.</p>
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
