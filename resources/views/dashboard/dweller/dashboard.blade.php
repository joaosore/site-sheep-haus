@extends('../layouts.app')

@section('content')
<div class="container">
	<div class="flex-center position-ref full-height">
		<div class="content centralizar bloco-adm">
			<section class="adm-unico-bloco">
				<header class="adm-breadcrumb">Dashboard</header>
			</section>
			<section class="adm-primeiro-bloco">
				<!-- aqui vem o adm de morador padrao -->

				<section class="adm-moradores">
					<div class="bloco-menu">
						<a href="{{ route('SeggestedProperties') }}" class="link">Imóveis Sugeridos</a>
						<a href="{{ route('SuggestedVacancies') }}" class="link">Vagas Sugeridas</a>
						<a href="{{ route('property.index') }}" class="link">Meu Imóvel</a>
					</div>
					<header class="titulo-contas">
						<h1 class="titulo">IMÓVEIS</h1>
						<a href="" class="adicionar"><i data-fonte="" class="icone">M</i><span> ADICIONAR MORADORES</span></a>
					</header>
					@foreach ($properties as $property)
						<section class="bloco-meio">
							<header class="adm-moradores_topo">
								@foreach ($property->galeries as $key => $item)
									@if($key === 0)
										<figure style="background-image: url('/images/{{ $item->src }}')"></figure>
									@endif
								@endforeach
								<h1 class="titulo">{{ $property->title }}</h1>
							</header>
							<p class="texto">{{ $property->description }}</p>
							<div class="info">
							<p class="valor">R$ {{ $property->account->SUM('value') }}</p>
								<p class="metragem"> {{ $property->property_size }} m²</p>
							</div>
						</section>
					@endforeach
				</section>


				<!-- aqui vem o adm de morador padrao -->
				<!-- aqui vem o adm de serviço do morador padrao -->
				<section class="adm-servicos">
					<header class="titulo-contas">
						<h1 class="titulo">VAGAS</h1>
					</header>
					<section class="adm-tipo_servico">
						<div class="servico">
							<header>
								<figure style="background-image: url('images/baners/imovel_1.jpg')"></figure>
							</header>
							<div class="links">
								<a href="" class="link editar">EDITAR</a>
								<a href="" class="link apagar">APAGAR</a>
							</div>
						</div>
						<div class="servico">
							<header>
								<figure style="background-image: url('images/baners/imovel_1.jpg')"></figure>
							</header>
							<div class="links">
								<a href="" class="link editar">EDITAR</a>
								<a href="" class="link apagar">APAGAR</a>
							</div>
						</div>
					</section>
				</section>

				<!-- aqui vem o adm de serviço do morador padrao -->
			</section>
			<section class="adm-segundo-bloco">
				<!-- aqui vem as mini mensagems -->
				<section class="mensagens">
					<header class="titulo-mensagens">
						<i data-fonte="" class="icone-mensagens">M</i>
						<h1 class="titulo">MENSAGENS</h1>
						<a href=""><i data-fonte="" class="icone-mensagens">3</i></a>
					</header>
					<ul class="lista-mensagens">
						@foreach($mensages as $key => $mensage)
							@php 
								if($mensage->to == $auth_login) {
									$item = $mensage->getUserFrom;
								} else {
									$item = $mensage->getUserTo;
								}
							@endphp
							<li class="mensagens-item">
								<a href="{{route('email.create', [$item->id, $mensage->property_id])}}">
									<header class="item-titulo">
										<h3 class="titulo-nome">{{ $item->name }}</h3>
									</header>
									<p class="texto">{{ $mensage->last_mensagem }}</p>
									<footer class="item-rodape">
										<p class="item-data">{{ date_format($mensage->updated_at, 'd/m/Y') }}</p>
										<p class="item-hora">{{ date_format($mensage->updated_at, 'H:i') }}</p>
									</footer>
								</a>
							</li>
						@endforeach
					</ul>
				</section>
				<section class="anunciar-vaga">
					<a href="" class="bt-anunciar"><i data-fonte="" class="icone-anunciar">M</i>ANUNCIAR VAGA</a>
				</section>

				<!-- Aqui vem as mini mensagem -->
			</section>
			<section class="adm-terceiro-bloco">
				<!-- aqui vem os serviços -->
				<section class="servicos">
					<header class="titulo-servicos">
						<i data-fonte="" class="icone-servicos">M</i>
						<h1 class="titulo">SERVIÇOS ÚTEIS</h1>
					</header>
					<ul class="lista-servicos">
						<li class="servicos-item">
							<a href="" class="link-servicos">
								<figure class="baner-servicos" style=""></figure>
							</a>
						</li>
						<li class="servicos-item">
							<a href="" class="link-servicos">
								<figure class="baner-servicos"></figure>
							</a>
						</li>
						<li class="servicos-item">
							<a href="" class="link-servicos">
								<figure class="baner-servicos"></figure>
							</a>
						</li>
						<li class="servicos-item">
							<a href="" class="link-servicos">
								<figure class="baner-servicos"></figure>
							</a>
						</li>
					</ul>
					<div class="links">
						<a href="">MAIS SERVIÇOS</a>
						<a href="">ANUCIAR</a>
					</div>
				</section>

				<!-- Aqui vem os serviços -->
			</section>
		</div>
	</div>
</div>
@endsection
