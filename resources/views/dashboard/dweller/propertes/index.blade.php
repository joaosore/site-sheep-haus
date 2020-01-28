@extends('../layouts.app')

@section('content')
<div class="dashboard-page pt-page">
	<div class="container">

		<div class="row">
			<div class="col-md-12">
				<header class="titulo--padrao titulo--padrao--breadcrumb">
					<div style="height: 10px;"></div>
					<h3 class="titulo">
						<a href="{{route('dashboard')}}">Home</a> > 
						<span class="bread-child">Matches</a> > 
						<span class="bread-child">{{ __('general.imoveis_sugeridos') }}</a>
					</h3>
				</header>
			</div>
		</div>

		<div class="row">

			<!-- MATCHES -->
			<div class="col-md-12">

				<div class="card">
					<div class="card-header">
						<h4 class="card-title"><i class="fa fa-home"></i> {{ __('general.imoveis_sugeridos') }}</h4>
					</div>
					<div class="card-body">
						<div class="row">

							@foreach ($properties as $property)
								<div class="col-md-3 box-imovel box box-solid box-default">
									<div class="box-header with-border">
										@foreach ($property->galeries as $key => $item)
											@if($key === 0)
												<img class="image img-fluid" src="{{ asset('/images/'.$item->src) }}"></img>
											@endif
										@endforeach
										<h3 class="box-title">{{ $property->name }}</h3>                        
									</div>

									<div class="box-body">
										<span class="info-box-text info-box-text--resumo">{{ $property->description }}</span>
										<div class="more-info">
											<b class="info-box-number">R$ {{ number_format($property->account->SUM('value'), 2, ',', '.') }}</b>
											<b class="info-box-number"> - {{ $property->property_size }} m²</b>
										</div>
										<div style="height: 8px;"></div>
									</div>

									<div class="box-footer">
										@if(in_array($property->id ,$match))
											<span class="badge badge-success">Match enviado!</span>
										@endif
										@if(!in_array($property->id ,$match))
											{{ Form::open(array('route' => 'match', 'method' => 'post')) }}
												{{ Form::hidden('property_id', $property->id) }}
												{{ Form::hidden('user_id', $property->user_id) }}
												<div class="links">
													{{ Form::submit('DAR MATCH', ['class' => 'btn btn-sm btn-secondary btn-block']) }}
												</div>
											{{ Form::close() }}
										@endif
									</div>
								</div>
							@endforeach

							@if(sizeof($properties) == 0)
								<div class="col-md-12">
									<br />
									<p>Nenhum imóvel sugerido por enquanto...</p>
									<br /><br /><br />
								</div>
							@endif

						</div>
					</div>
				</div>

			</div>
			<!-- MATCHES -->

		</div>
		
		{{-- <div class="flex-center position-ref full-height">
			<div class="content centralizar bloco-adm">
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
		</div> --}}

	</div>
	<div style="height: 20px;"></div>
</div>

@endsection
