@extends('../layouts.app')

@section('content')
<div class="dashboard-page pt-page">
	<div class="container">

		<div class="row">
			<div class="col-md-12">
				<header class="titulo--padrao">
					<h2 class="titulo">Lista de imóveis</h2>
				</header>
			</div>
		</div>
		
		<section class="bloco-lista">
			<div class="centralizar">
				<section class="lista-linha">
					<header class="linha--topo">
						<p class="topo--info">Lista de imóveis</p>
					</header>
					@if(!empty($property))
					<div href="" class="bloco-quarto item-imovel">
						@foreach ($property->galeries as $key => $item)
						@if($key === 0)
						<figure  class="img-imovel">
							<img src="/images/{{ $item->src }}" alt="" style="width: 100px; height: 100px">
						</figure>
						@endif
						@endforeach
						<header class="titulo-imovel">
							<h2>{{ $property->name }}</h2>
						</header>
					<p class="texto">{{ $property->description }}</p>
					<footer class="info-item">
							<a href="{{ route('vacancies') }}" class="botao-padrao">Administrar vagas</a>
						</footer>
					</div>
					@endif
				</section>
			</div>
		</section>
	</div>
</div>

@endsection
