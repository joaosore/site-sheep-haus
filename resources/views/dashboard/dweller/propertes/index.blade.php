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
						<h1 class="titulo">Imóveis compatíveis</h1>
					</header>

					@foreach ($properties as $property)
					<section class="bloco-quarto">
					  <header class="titulo-matches">
						  <h1 class="titulo">{{ $property->name }}</h1>
					  </header>
					      @foreach ($property->galeries as $key => $item)
					        @if($key === 0)
					          <img src="/images/{{ $item->src }}" alt="" style="width: 100px; height: 100px">
					        @endif
					      @endforeach

					     <p class="texto">{{ $property->description }}</p>
					      @if(!in_array($property->id ,$match))
					        {{ Form::open(array('route' => 'match', 'method' => 'post')) }}
					            {{ Form::hidden('property_id', $property->id) }}
					            {{ Form::hidden('user_id', $property->user_id) }}
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
