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
						<span class="bread-child">{{ __('general.matches') }}</span>
					</h3>
				</header>
			</div>
            <div class="col-md-6">
            </div>
		</div>

		<div class="row">

			<!-- BODY -->
			<div class="col-md-12">

				<div class="card">
					<div class="card-header">
						<div class="row">
							<div class="col-md-6">
								<h4 class="card-title"><i class="fa fa-check"></i> {{ __('general.matches') }}</h4>
							</div>
						</div>
                    </div>
                    
					<div class="card-body">
						<section class="adm-matches">
							<div class="bloco-menu">
								<a href="{{ route('properties') }}" class="link">Meus Imóveis</a>
							</div>
							<header class="titulo-matches">
								<h1 class="titulo">Moradores compatíveis</h1>
							</header>
		
							@foreach ($users as $user)
							<section class="bloco-quarto">
								<header class="titulo-matches">
									<h1 class="titulo">{{ $user->name }}</h1>
								</header>
		
		
									@if(!in_array($user->id, $alerts))
		
										{{ Form::open(array('route' => 'alert.store', 'method' => 'post')) }}
										{{ Form::hidden('property_id', $property) }}
										{{ Form::hidden('user_id', $user->id) }}
										<div class="links">
										{{ Form::submit('Match') }}
										</div>
										{{ Form::close() }}
		
									@endif
							</section>
							@endforeach
						</section>
                    </div>
				</div>

			</div>
			<!-- BODY -->

		</div>
	</div>
</div>



@endsection
