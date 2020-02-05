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
						<div class="row">
							<div class="col-md-6">
								<h4 class="card-title"><i class="fa fa-home"></i> {{ __('general.imoveis_sugeridos') }}</h4>
							</div>
							<div class="col-md-6">
								<ul class="nav nav-upper float-right">
									<li class="nav-item">
										<a class="nav-link active" href="{{ route('SeggestedProperties') }}"><i class="fa fa-list"></i><br />{{ __('general.lista') }}</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="{{ route('SeggestedPropertiesMap') }}"><i class="fa fa-map"></i><br />{{ __('general.mapa') }}</a>
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

								<ul class="nav nav-pills" id="propertiesTab" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" data-toggle="tab" href="#sugeridos" role="tab">
											<i class="fa fa-home"></i> Sugeridos
										</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#curtidos" role="tab">
											<i class="fa fa-heart"></i> Curtidos
										</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#matches" role="tab">
											<i class="fa fa-check"></i> Matches
										</a>
									</li>
								</ul>

							</div>
						</div>

						<div class="row">

							<div class="tab-content" id="propertiesTab">

								<!-- SUGERIDOS TAB -->
								<div class="tab-pane show fade active" role="tabpanel" id="sugeridos">
									<div class="row">
										@foreach ($properties as $property)
											@if(!in_array($property->id ,$match))
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
															<span class="badge badge-success">{{ __('general.curtido') }}!</span>
														@endif
														@if(!in_array($property->id ,$match))
															{{ Form::open(array('route' => 'match', 'method' => 'post')) }}
																{{ Form::hidden('property_id', $property->id) }}
																{{ Form::hidden('user_id', $property->user_id) }}
																<div class="links">
																	{{ Form::submit('CURTIR', ['class' => 'btn btn-sm btn-secondary btn-block']) }}
																</div>
															{{ Form::close() }}
														@endif
													</div>
												</div>
											@endif
										@endforeach

										@if(sizeof($properties) == 0)
											<div class="col-md-12">
												<br />
												<p>{{ __('general.nenhum_imovel_sugerido') }}</p>
												<br /><br /><br />
											</div>
										@endif
									</div>
								</div>
								<!-- SUGERIDOS TAB -->

								<!-- CURTIDOS TAB -->
								<div class="tab-pane show fade" id="curtidos" role="tabpanel">
									<div class="row">
										@foreach ($properties as $property)
											@if(in_array($property->id ,$match))
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
															<span class="badge badge-success">{{ __('general.imovel') }} {{ __('general.curtido') }}</span>
													</div>
												</div>
											@endif
										@endforeach

										@if(sizeof($properties) == 0)
											<div class="col-md-12">
												<br />
												<p>{{ __('general.nenhum_imovel_sugerido') }}</p>
												<br /><br /><br />
											</div>
										@endif
									</div>
								</div>
								<!-- CURTIDOS TAB -->

								<!-- MATCHES TAB -->
								<div class="tab-pane show fade" id="matches" role="tabpanel">
									<div class="row">
										<div class="col-md-12">
											<p>Matches aba</p>
										</div>

										@if(sizeof($properties) == 0)
											<div class="col-md-12">
												<br />
												<p>{{ __('general.nenhum_imovel_sugerido') }}</p>
												<br /><br /><br />
											</div>
										@endif
									</div>
								</div>
								<!-- MATCHES TAB -->

								{{-- <!-- MATCHES TAB -->
								<div class="tab-pane show fade" id="settings" role="tabpanel">
									<div class="row">
										<div class="col-md-12">
											<p>Config. do Match</p>
										</div>
									</div>
								</div>
								<!-- MATCHES TAB --> --}}

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
