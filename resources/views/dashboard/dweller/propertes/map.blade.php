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
                        <span class="bread-child">{{ __('general.imoveis_sugeridos') }}</a> > 
                        <span class="bread-child">{{ __('general.mapa') }}</a>
					</h3>
				</header>
			</div>
		</div>

		<div class="row">

			<!-- MATCHES -->
			<div class="col-md-12">

				<div class="card">
					<div class="card-header">
						<div class="row">
							<div class="col-md-6">
								<h4 class="card-title"><i class="fa fa-map"></i> {{ __('general.mapa') }}</h4>
								<p>{{ __('general.mapa_intro') }}</p>
							</div>
							<div class="col-md-6">
								<ul class="nav nav-upper float-right">
									<li class="nav-item">
										<a class="nav-link" href="{{ route('SeggestedProperties') }}"><i class="fa fa-list"></i><br />{{ __('general.lista') }}</a>
									</li>
									<li class="nav-item">
									  <a class="nav-link active" href="{{ route('SeggestedPropertiesMap') }}"><i class="fa fa-map"></i><br />{{ __('general.mapa') }}</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="{{ route('SeggestedPropertiesSettings') }}"><i class="fa fa-sliders-h"></i><br />{{ __('general.config') }}</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="card-body">

						<div class="row">
							<div class="col-md-12">

								<div class="form-group row">
									<label class="col-md-1 text-right" style="margin-top: 7px;">{{ __('general.local') }}</label>
									<input class="col-md-7 form-control" type="text" placeholder="{{ __('general.endereco') }}" />
									<label class="col-md-1 text-right" style="margin-top: 7px;">{{ __('general.raio') }}</label>
									<input class="col-md-1 form-control" type="number" placeholder="0 - 50km" />
									<div class="col-md-2">
										<a href="#" class="btn btn-secondary float-right">{{ __('general.buscar') }}</a>
									</div>
								</div>

								<div id="map-imoveis"></div>
							</div>
						</div>
					</div>
				</div>

			</div>
			<!-- MATCHES -->

		</div>

	</div>
	<div style="height: 20px;"></div>
</div>

@endsection
