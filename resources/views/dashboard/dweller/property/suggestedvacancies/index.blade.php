@extends('../layouts.app')

@section('content')
<div class="dashboard-page pt-page">
	<div class="container">

		<div class="row">
			<div class="col-md-12">
				<header class="titulo--padrao titulo--padrao--breadcrumb">
					<div style="height: 10px;"></div>
					<h3 class="titulo">
						<a href="{{route('dashboard')}}">{{ __('general.home') }}</a> > 
						<span class="bread-child">{{ __('general.matches') }}</a> > 
						<span class="bread-child">{{ __('general.vagas_sugeridas') }}</a>
					</h3>
				</header>
			</div>
		</div>

		<div class="row">

			<!-- MATCHES -->
			<div class="col-md-12">

				<div class="card">
					<div class="card-header">
						<h4 class="card-title"><i class="fa fa-home"></i> {{ __('general.vagas_sugeridas') }}</h4>
					</div>
					<div class="card-body">
						<div class="row">
							@foreach ($vacancies as $vacancy)
								<section class="bloco-quarto">
								<header class="titulo-matches">
									<h1 class="titulo">{{ $vacancy->title }}</h1>
								</header>
									@foreach ($vacancy->property->galeries as $key => $item)
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

							@if(sizeof($vacancies) == 0)
								<div class="col-md-12">
									<br />
									<p>{{ __('general.nenhuma_vaga_sugerida') }}</p>
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
		</div> --}}

	</div>
	<div style="height: 20px;"></div>
</div>
@endsection
