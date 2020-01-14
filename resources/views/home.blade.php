@extends('../layouts.app')
@section('content')
<div class="flex-center position-ref full-height">
	<div class="content">
        <div class="view" style="background-image: url('/images/background/scary-college-beauty-mental-balcony-window-1477109.jpg'); background-repeat: no-repeat, repeat; background-size: cover; background-position: center center;">
            <section style="height: 500px;">
                <div style="height: 50px;"></div>
                <div class="row" style="height: 5%; margin-left: 10%;">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <figure class="logo--baner">
                                    <img src="{{ asset('images/icones/logo_extensa.png') }}" alt="">
                                </figure>
                                <h2 class="card-title">Dê match e more com quem combina com você.</h2>
                                <form action="" class="form-inline">
                                    <input class="form-control col-md-10" style="margin-right: 5px;" type="text" name="q" value="" placeholder="(55)0000-0000">
                                    <button type="submit" class="btn btn-danger">Buscar</button>
                                </form>
                                <br/>
                                <button type="button" class="btn btn-primary btn-block">Anunciar vaga</button>
                                <!-- <a href="#" class="baner--anuncio">Anunciar vaga</a> -->
                            </div>
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
                            <img src="images/icones/icone_hand.png" alt="">
                            <div class="bubble"></div>
                        </figure>
                        <header class="titulo--bloco">
                            <h3 class="sub-titulo">Encontre o melhor lugar com o filtro inteligente</h3>
                        </header>
                        <p class="texto">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis delectus fuga ducimus error eveniet quo dolor ullam possimus consequuntur. Dolor?</p>
                    </div>
                    <div class="bloco-terco">
                        <figure class="icone--monte">
                            <img src="images/icones/icone_card.png" alt="">
                            <div class="bubble"></div>
                        </figure>
                        <header class="titulo--bloco">
                            <h3 class="sub-titulo">Envie mensagens para os moradores</h3>
                        </header>
                        <p class="texto">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis delectus fuga ducimus error eveniet quo dolor ullam possimus consequuntur. Dolor?</p>
                    </div>
                    <div class="bloco-terco">
                        <figure class="icone--monte">
                            <img src="images/icones/icone_magnify.png" alt="">
                            <div class="bubble"></div>
                        </figure>
                        <header class="titulo--bloco">
                            <h3 class="sub-titulo">Ache moradores com o melhor perfil para a casa</h3>
                        </header>
                        <p class="texto">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis delectus fuga ducimus error eveniet quo dolor ullam possimus consequuntur. Dolor?</p>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
