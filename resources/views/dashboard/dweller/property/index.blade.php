@extends('../layouts.app')

@section('content')
<div class="dashboard-page pt-page">

	<div class="container">

		<div class="row">
			<div class="col-md-12">
				<header class="titulo--padrao titulo--padrao--breadcrumb">
					<h3 class="titulo">
						<a href="{{route('dashboard')}}">{{ __('general.home') }}</a> > 
						<span class="bread-child">{{ __('general.meu_imovel') }}</a>
					</h3>
				</header>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">

					<div class="card">
						<div class="card-header">
							<h4 class="card-title"><i class="fa fa-home"></i> {{ __('general.lista_imoveis') }}</h4>
						</div>
						<div class="card-body">

							@if(!empty($property))
								<div class="item-imovel">
									@foreach ($property->galeries as $key => $item)
									@if($key === 0)
									<figure  class="img-imovel">
										<img src="/images/{{ $item->src }}" alt="" style="width: 100px; height: 100px">
									</figure>
									@endif
									@endforeach
									<header class="titulo-imovel">
										<h2>{{ $property->name }}</h2>
									</header>
								<p class="texto">{{ $property->description }}</p>
								<footer class="info-item">
										<a href="{{ route('vacancies') }}" class="botao-padrao">{{ __('general.administrar_vagas') }}</a>
									</footer>
								</div>
							@endif

						</div>
					</div>

				</div>
			</div>
		</div>

		<div style="height: 20px;"></div>
	</div>

</div>

@endsection
