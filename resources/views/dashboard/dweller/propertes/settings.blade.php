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
                        <span class="bread-child">{{ __('general.ajustes') }}</a>
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
								<h4 class="card-title"><i class="fa fa-sliders-h"></i> {{ __('general.ajustes') }}</h4>
							</div>
							<div class="col-md-6">
								<ul class="nav nav-upper float-right">
									<li class="nav-item">
										<a class="nav-link" href="{{ route('SeggestedProperties') }}"><i class="fa fa-list"></i><br />{{ __('general.lista') }}</a>
									</li>
									<li class="nav-item">
									  <a class="nav-link" href="{{ route('SeggestedPropertiesMap') }}"><i class="fa fa-map"></i><br />{{ __('general.mapa') }}</a>
									</li>
									<li class="nav-item">
										<a class="nav-link active" href="{{ route('SeggestedPropertiesSettings') }}"><i class="fa fa-sliders-h"></i><br />{{ __('general.config') }}</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="card-body">

						<div class="row">
							<div class="col-md-4">
                                {{ Form::open(array('route' => 'SeggestedPropertiesSettingsSave', 'method' => 'post')) }}
                                <div class="form-group">
                                    <label>Deseja morar com quantas pessoas</label>
                                    {{ Form::number('sozinho', null, array('class' => 'form-control', 'placeholder' => '0 - 20')) }}
                                </div>
                                <div class="form-group">
                                    <label>
                                        {{ Form::checkbox('piscina', null) }} 
                                        Casa com piscina
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label>
                                        {{ Form::checkbox('piscina', null) }} 
                                        Outra preferência 1
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label>
                                        {{ Form::checkbox('piscina', null) }} 
                                        Outra preferência 2
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label>
                                        {{ Form::checkbox('piscina', null) }} 
                                        Outra preferência 3
                                    </label>
                                </div>
                                
                                {{ Form::submit('Salvar', ['class' => 'btn btn-lg btn-success']) }}
                                {{ Form::close() }}
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
