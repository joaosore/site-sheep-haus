@extends('../layouts.app')

@section('content')
<div class="dashboard-page pt-page">
	<div class="container">

		<div class="row">
			<div class="col-md-6">
				<header class="titulo--padrao titulo--padrao--breadcrumb">
					<div style="height: 10px;"></div>
					<h3 class="titulo">
						<a href="{{route('dashboard')}}">{{ __('general.home') }}</a> > 
						<span class="bread-child">{{ __('general.imovel') }}</span> > 
						<span class="bread-child">{{ $immobile->name }}</span>
					</h3>
				</header>
			</div>
            <div class="col-md-6">
				@if(in_array($immobile->id, $matches))
                    <span class="badge badge-success float-right"><i class="fa fa-check"></i> {{ __('general.imovel') }} {{ __('general.curtido') }}</span>
				@endif
				
				@if($immobile->user_id == Auth::user()->id)
					<a href="{{ route('property.edit', $immobile->id ) }}" class="btn btn-sm btn-secondary float-right">{{ __('general.editar') }}</a>
				@endif
            </div>
		</div>

		<div class="row">

			<!-- FOTOS -->
			<div class="col-md-7">

				<div class="card">
					{{-- <div class="card-header">
						<div class="row">
							<div class="col-md-6">
								<h4 class="card-title"><i class="fa fa-info"></i> {{ __('general.fotos') }}</h4>
							</div>
						</div>
                    </div> --}}
                    
					<div class="card-body">
                        <div class="owl-carousel owl-theme" data-slider-id="1" id="imovel-photos">
                            @foreach ($immobile->galeries as $photo)
                                <div class="item">
                                    <img class="img-fluid" src="{{ asset('/images/'.$photo->src) }}" />
                                </div>
                            @endforeach
                        </div>
                    </div>
				</div>

			</div>
			<!-- FOTOS -->

			<!-- MAPA -->
			<div class="col-md-5">

				<div class="card">
					<div class="card-header">
						<div class="row">
							<div class="col-md-12">
                                <h4 class="card-title"><i class="fa fa-map"></i> {{ __('general.localizacao') }}</h4>
                                <p>{{$immobile->address}}</p>
							</div>
						</div>
                    </div>
                    
					<div class="card-body">
                        {{-- {{$immobile->lat}}<br/>
                        {{$immobile->lng}}<br /> --}}
					    <div class="latlng-map" data-lat="{{$immobile->lat}}" data-lng="{{$immobile->lng}}"></div>
                    </div>
				</div>

			</div>
			<!-- MAPA -->

        </div>
        
        <div style="height: 30px;"></div>

		<div class="row">

			<!-- apresentacao -->
			<div class="col-md-5">

				<div class="card">
					<div class="card-header">
						<div class="row">
							<div class="col-md-6">
								<h4 class="card-title"><i class="fa fa-info"></i> {{ __('general.apresentacao') }}</h4>
							</div>
						</div>
                    </div>
                    
					<div class="card-body">
                        <h5><b>{{ $immobile->name }}</b></h5>
                        <p><b>{{ $immobile->property_size }} m²</b></p>

                        <p>{{ $immobile->description }}</p>
                        
                        @if ($immobile->mensalidade)
                            <h5><b>{{ __('general.valor') }}</b> {{ $immobile->mensalidade }}</h5>
                        @endif
                        
                        @if (sizeof($immobile->account) > 0)
                            {{-- <h5><b>{{ __('general.despesas_extras') }}</b> R$ {{ number_format($immobile->account->SUM('value'), 2, ',', '.') }}</h5> --}}
                            <h5><b>{{ __('general.despesas_extras') }}</b></h5>
                            <ul>
                                @foreach ($immobile->account as $account)
                                    <li>{{$account->name}} - R$ {{ number_format($account->value, 2, ',', '.') }}</li>
                                @endforeach
                            </ul>
                            <p>{{ __('general.total') }} R$ {{ number_format($immobile->account->SUM('value'), 2, ',', '.') }}</p>
                        @endif
                        
                        @if ($immobile->caucao)
                            <h5><b>{{ __('general.caucao') }}</b> {{ $immobile->caucao }}</h5>
                        @endif
                    </div>
				</div>

			</div>
            <!-- apresentacao -->

			<!-- SOBRES -->
			<div class="col-md-7">

				<div class="card">
					<div class="card-header">
						<div class="row">
							<div class="col-md-12">
                                <h4 class="card-title"><i class="fa fa-home"></i> {{ __('general.sobre') }} <span class="badge badge-secondary">{{ sizeof($immobile->characteristics) }}</span></h4>
                                <ul class="list-three-columns">
                                    @foreach ($immobile->characteristics as $characteristic)
                                        <li>{{$characteristic['name']}}</li>
                                    @endforeach
                                </ul>
							</div>
						</div>
                    </div>
                    
					<div class="card-body"></div>
				</div>

				<div class="card">
					<div class="card-header">
						<div class="row">
							<div class="col-md-12">
                                <h4 class="card-title"><i class="fa fa-user"></i> {{ __('general.sobre_moradores') }}</h4>
                                <ul class="list-three-columns">
                                    @foreach ($immobile->habit as $habit)
                                        <li>{{$habit}}</li>
                                    @endforeach
                                </ul>
							</div>
						</div>
                    </div>
                    
					<div class="card-body"></div>
				</div>

				<div class="card">
					<div class="card-header">
						<div class="row">
							<div class="col-md-12">
                                <h4 class="card-title"><i class="fa fa-bed"></i> {{ __('general.quartos') }} <span class="badge badge-secondary">{{ $immobile->number_of_bedrooms }}</span></h4>
							</div>
							<div class="col-md-12">
                                <h4 class="card-title"><i class="fa fa-bath"></i> {{ __('general.banheiros') }} <span class="badge badge-secondary">{{ $immobile->number_of_bathrooms }}</span></h4>
							</div>
						</div>
                    </div>
                    
					<div class="card-body"></div>
				</div>

			</div>
            <!-- SOBRES -->
            
		</div>

	</div>
	<div style="height: 20px;"></div>
</div>

@endsection
