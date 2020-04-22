@extends('../layouts.app')

@section('content')
<div class="dashboard-page dashboard-proprietario-page pt-page">

	<div class="container">

		<div class="row">
			<div class="col-md-6">
				<header class="titulo--padrao titulo--padrao--breadcrumb">
					<div style="height: 10px;"></div>
					<h3 class="titulo">
						<a href="{{route('dashboard')}}">Home</a> > 
						<span class="bread-child">{{ $property->name }}</a> > 
						<span class="bread-child">Ver matchs</a>
					</h3>
				</header>
			</div>
			<div class="col-md-6">
				<a href="{{ route('property.edit', [$property->id]) }}" class="btn btn-secondary float-right">Configurações do macth</a>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Matches sugeridos</h4>
					</div>
					<div class="card-body">

						@if(sizeof($alerts) == 0)
							<div class="col-md-12">
								<br />
								<p>Nenhum match sugerido por enquanto...</p>
							</div>
						@endif

						@foreach ($alerts as $alert)
							<section class="bloco-meio">
								<header class="titulo-matches">
									<img src="/avatar/{{ $alert->avatar }}" class="float-left" style="width: 50px; height: 50px;">
									<h4 class="titulo">{{ $alert->name }}</h4>
								</header>
								
								<p class="texto">Email: <span class="texto_cinza texto-bold">{{ $alert->email }}</span></p>
	
								<p class="texto">Telefone: <span class="texto_cinza texto-bold">{{ $alert->cell_phone }}</span></p>
								@if(!in_array($alert->id, $create_alerts))
									{{ Form::open(array('route' => 'alert.store', 'method' => 'post')) }}
										{{ Form::hidden('property_id', $property->id) }}
										{{ Form::hidden('user_id', $alert->id) }}
										<div class="links">
											{{ Form::submit('Dar Match', ['class'=>'btn btn-secondary btn-sm']) }}
										</div>
									{{ Form::close() }}
								@endif
							</section>
	
						@endforeach
					</div>
				</div>
			</div>

			<div class="col-md-6">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title"><i class="fa fa-check"></i> Matchs já realizados nesse imóvel</h4>
					</div>
					<div class="card-body">

						@if(sizeof($matchs) == 0)
							<div class="col-md-12">
								<br />
								<p>Nenhum match realizado por enquanto...</p>
							</div>
						@endif

						@foreach ($matchs as $macth)
							<section class="bloco-meio">
								<header class="titulo-matches">
									<img src="/avatar/{{ $macth->avatar }}" class="float-left" style="width: 50px; height: 50px;">
									<h4 class="titulo">{{ $macth->name }}</h4>
								</header>
							
							<p class="texto">Email: <span class="texto_cinza texto-bold">{{ $macth->email }}</span></p>
		
							<p class="texto">Telefone: <span class="texto_cinza texto-bold">{{ $macth->cell_phone }}</span></p>
							@if(empty($contract))
								{{ Form::open(array('route' => 'contract', 'method' => 'post')) }}
		
								{{ Form::hidden('locator_id', $macth->id) }}
								{{ Form::hidden('property_id', $property->id) }}
								<div class="links">
									@if($tenant_interest)
									{{ Form::submit('Assinar', ['class'=>'btn btn-secondary btn-sm']) }}
									@else
									{{ Form::button('Aguardando confirmação', ['class'=>'btn btn-secondary btn-sm']) }}
									@endif
								</div>
								{{ Form::close() }}
							@else
								{{ Form::open(array('route' => 'contract', 'method' => 'delete')) }}
		
								{{ Form::hidden('locator_id', $macth->id) }}
								{{ Form::hidden('property_id', $property->id) }}
								<div class="links">
								{{ Form::submit('Cancelar', ['class'=>'btn btn-danger btn-sm']) }}
								</div>
								{{ Form::close() }}
								<a href="{{ route('page-contracts', [$contract_id]) }}">Ver contrato</a>
							@endif
							
							</section>
						@endforeach
					</div>
				</div>
			</div>
		</div>

	</div>
	<div style="height: 20px;"></div>

</div>

{{-- 
<div class="container">
	<div class="flex-center position-ref full-height">
		<div class="content centralizar bloco-adm">
			<section class="adm-unico-bloco">
				<header class="adm-breadcrumb">MATCHES</header>
			</section>
			<section class="adm-unico-bloco">
				<section class="adm-matches">
					<a href="{{ route('property.edit', [$property->id]) }}" class="link">Configurações do macth</a>
					<header class="titulo-matches">
						<h1 class="titulo">Matches Sugeridos</h1>
					</header>

					@foreach ($alerts as $alert)
						
						<section class="bloco-quarto">
							<header class="titulo-matches">
								<h1 class="titulo">{{ $alert->name }}</h1>
								<img src="/avatar/{{ $alert->avatar }}" alt="" style="width: 50px; height: 50px">
							</header>
							
							<p class="texto">Email: <span class="texto_cinza texto-bold">{{ $alert->email }}</span></p>

							<p class="texto">Telefone: <span class="texto_cinza texto-bold">{{ $alert->cell_phone }}</span></p>
							@if(!in_array($alert->id, $create_alerts))
								{{ Form::open(array('route' => 'alert.store', 'method' => 'post')) }}
									{{ Form::hidden('property_id', $property->id) }}
									{{ Form::hidden('user_id', $alert->id) }}
									<div class="links">
											{{ Form::submit('Match') }}
									</div>
								{{ Form::close() }}
							@endif
						</section>

					@endforeach
				</section>
				<section class="adm-matches">
					
					<header class="titulo-matches">
						<h1 class="titulo">Matchs já realizados nesse imóvel</h1>
					</header>

					@foreach ($matchs as $macth)
					<section class="bloco-quarto">
						<header class="titulo-matches">
							<h1 class="titulo">{{ $macth->name }}</h1>
							<img src="/avatar/{{ $macth->avatar }}" alt="" style="width: 50px; height: 50px">
						</header>
					 
					  <p class="texto">Email: <span class="texto_cinza texto-bold">{{ $macth->email }}</span></p>

					  <p class="texto">Telefone: <span class="texto_cinza texto-bold">{{ $macth->cell_phone }}</span></p>
					  @if(empty($contract))
					    {{ Form::open(array('route' => 'contract', 'method' => 'post')) }}

					    {{ Form::hidden('user_id', $macth->id) }}
					    {{ Form::hidden('property_id', $property->id) }}
						<div class="links">
					    	{{ Form::submit('Assinar') }}
						</div>
					    {{ Form::close() }}
					  @else
					    {{ Form::open(array('route' => 'contract', 'method' => 'delete')) }}

					    {{ Form::hidden('user_id', $macth->id) }}
					    {{ Form::hidden('property_id', $property->id) }}
						<div class="links">
					    {{ Form::submit('Cancelar') }}
						</div>
					    {{ Form::close() }}
					  @endif


					</section>

					@endforeach
				</section>
			</section>

		</div>
	</div>
</div> --}}



@endsection
