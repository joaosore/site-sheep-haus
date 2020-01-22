@extends('../layouts.app')

@section('content')
<div class="dashboard-page dashboard-proprietario-page pt-page">

	<div class="container">

		<div class="row">
			<div class="col-md-12">
				<header class="titulo--padrao titulo--padrao--breadcrumb">
					<div style="height: 10px;"></div>
					<h3 class="titulo">
						<a href="{{route('dashboard')}}">Home</a> > 
						<span class="bread-child">Meus imóveis</a>
					</h3>
				</header>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<section class="lista-linha row">
							@foreach ($properties as $property)
							<div class="col-md-3 box-imovel box-imovel--remove box box-solid box-default">
								{{ Form::open(array('route' => 'property.destroy', 'method' => 'delete')) }}
									{{ Form::submit('X') }}
									{{ Form::hidden('property_id', $property->id) }}

									<div class="box-header with-border">

											@foreach ($property->galeries as $key => $item)
												@if($key === 0)
													<img class="image img-fluid" src="{{ asset('/images/'.$item->src) }}"></img>
												@endif
											@endforeach

										<h3 class="box-title">{{ $property->name }}</h3>                        
									</div>
									<div class="box-body">
										<span class="info-box-text">{{ $property->description }}</span>
										
										<div class="more-info">
											<b class="info-box-number">R$ {{ number_format($property->account->SUM('value'), 2, ',', '.') }}</b>
											<b class="info-box-number"> - {{ $property->property_size }} m²</b>
										</div>

										<div class="specifications">
											<p class="texto">Residentes: {{ $property->number_of_residents }}</p>
											<p class="texto">Banheiros: {{ $property->number_of_bathrooms }}</p>
										</div>

										<div style="height: 8px;"></div>
									</div>

									<div class="box-footer">

										<div class="row">
											<div class="col-md-12">
												<a href="#" class="btn btn-info btn-block">DESTACAR ANÚNCIO</a>
											</div>
										</div>

										<div style="height: 10px;"></div>

										<div class="row">
											<div class="col-md-6">
												<a class="btn btn-sm btn-secondary btn-block metragem-imovel" href="{{ route('match_property', [$property->id]) }}">Ver matchs</a>
											</div>
											<div class="col-md-6">
												<a class="btn btn-sm btn-secondary btn-block vaga-imovel" href="{{ route('alert.index', [$property->id]) }}">Dar matchs</a>
											</div>
										</div>

									</div>
								{!! Form::close() !!}
							</div>
						@endforeach
						</section>
					</div>
				</div>
			</div>
		</div>

	</div>
	
	<div style="height: 20px;"></div>

</div>

{{-- @foreach ($properties as $property)
<div class="col-md-3 box-imovel box box-solid box-default">
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
			<a class="btn btn-block valor-imovel"  href="{{ route('property.edit', $property->id ) }}">
			Editar
			</a>
		{{ Form::close() }}

		<a class="btn btn-block metragem-imovel"href="{{ route('match_property', [$property->id]) }}">
			Ver Matchs
		</a>

		<a class="btn btn-block vaga-imovel" href="{{ route('alert.index', [$property->id]) }}">
			Dar Matchs
		</a>
		</footer>
</div>
@endforeach --}}

@endsection
