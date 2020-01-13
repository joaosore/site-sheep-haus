@extends('../layouts.app')

@section('content')
<div class="container">
	<div class="flex-center position-ref full-height">
		<div class="content centralizar bloco-adm">
			<section class="adm-unico-bloco">
				<header class="adm-breadcrumb">MATCHES</header>
			</section>
			<section class="adm-unico-bloco">
				<section class="adm-matches">
					<div class="bloco-menu">
						<a href="{{ route('properties') }}" class="link">Dashboard</a>
					</div>
					<header class="titulo-matches">
						<h1 class="titulo">Vagas sugeridas</h1>
					</header>

					@foreach ($vacancies as $vacancy)
						<section class="bloco-quarto">
						  <header class="titulo-matches">
							  <h1 class="titulo">{{ $vacancy->title }}</h1>
						  </header>
						    @foreach ($vacancy->galeries as $key => $item)
						      @if($key === 0)
						        <img src="/images/{{ $item->src }}" alt="" style="width: 100px; height: 100px">
						      @endif
						    @endforeach
						    <p class="texto"><span class="texto-bold">Descrição </span>{{ $vacancy->description }}</p>
						    <p class="texto"><span class="texto-bold">Data de Entrada </span>{{ $vacancy->entrance }}</p>
						    <p class="texto"><span class="texto-bold">Data de Saida</span> {{ $vacancy->exit }}</p>
						    <p class="texto"><span class="texto-bold">Valor</span> {{ $vacancy->value }}</p>
						    @if(!in_array($vacancy->id, $matches))
						      {{ Form::open(array('route' => 'v_match', 'method' => 'post')) }}
						          {{ Form::hidden('vacancy_id', $vacancy->id) }}
								  <div class="links">
						          	{{ Form::submit('Match') }}
								  </div>
						      {{ Form::close() }}
						    @endif
						</section>
					@endforeach
				</section>
			</section>

		</div>
	</div>
</div>
@endsection
