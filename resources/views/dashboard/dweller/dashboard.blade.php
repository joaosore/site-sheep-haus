@extends('../layouts.app')

@section('content')
<div class="dashboard-page pt-page">
	<div class="container">

		<div class="row">
			<div class="col-md-12">
				<header class="titulo--padrao titulo--padrao--breadcrumb">
					<h3 class="titulo">
						<span class="bread-child">Dashboard</a>
					</h3>
				</header>
			</div>
		</div>

		{{-- <div class="row">
			<div class="col-md-6">
			</div>

			<div class="col-md-3">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">MENSAGENS <span class="badge badge-primary">5</span></h5>
					</div>

					<section class="mensagens">
						<ul class="lista-mensagens"></ul>
					</section>
					<section class="anunciar-vaga">
						<a href="" class="bt-anunciar"><i data-fonte="" class="icone-anunciar">M</i>ANUNCIAR VAGA</a>
					</section>
				</div>
			</div>

			<div class="col-md-3">
			</div>
		</div> --}}

		<div class="flex-center position-ref full-height">
			<div class="content centralizar bloco-adm">
				
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

						<div id="mini-message-list" style="max-height: 300px; overflow: overlay; padding-right: 20px;"></div>
						
						<a href="{{ route('chats') }}" class="btn btn-block btn-sm btn-info">Todas as mensagens</a>
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
</div>
@endsection
