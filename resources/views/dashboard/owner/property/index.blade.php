@extends('../layouts.app')

@section('content')
<section class="bloco-lista">
	<div class="centralizar">
		<header class="titulo--padrao">
			<h1 class="titulo">Meu imóveis</h1>
		</header>
		<section class="lista-linha">
			<header class="linha--topo">
				<p class="topo--info">Minha lista</p>
			</header>
			@foreach ($properties as $property)
			<div href="" class="bloco-quarto item-imovel">
				{{ Form::open(array('route' => 'property.destroy', 'method' => 'delete')) }}
				{{ Form::submit('X') }}
				  {{ Form::hidden('property_id', $property->id) }}

				  @foreach ($property->galeries as $key => $item)
					@if($key === 0)
					<figure  class="img-imovel">
						 <img src="/images/{{ $item->src }}" alt="" style="background-image: url('images/baners/imovel_1.jpg')">
					</figure>
					@endif
				  @endforeach
				  <header class="titulo-imovel">
					  <h2>{{ $property->description }}</h2>
				  </header>
				  <p class="texto">Residentes: {{ $property->number_of_residents }}</p>
				  <p class="texto">Banheiros: {{ $property->number_of_bathrooms }}</p>
				  <footer class="info-item">
					  <a class="valor-imovel"  href="{{ route('property.edit', $property->id ) }}">
						Editar
					  </a>
					{{ Form::close() }}

					<a class="metragem-imovel"href="{{ route('match_property', [$property->id]) }}">
					  Ver Matchs
					</a>

					<a class="vaga-imovel" href="{{ route('alert.index', [$property->id]) }}">
					  Dar Matchs
					</a>
  				</footer>
			</div>
			@endforeach
		</section>
	</div>
</section>

@endsection
