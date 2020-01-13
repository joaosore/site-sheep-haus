@extends('../layouts.app')

@section('content')
<div class="container">
	<div class="flex-center position-ref full-height">
		<div class="content centralizar bloco-adm">
			<section class="adm-unico-bloco">
				<header class="adm-breadcrumb">MATCHES</header>
			</section>
			<section class="adm-unico-bloco">
				<section class="adm-matches">
					<a href="{{ route('property.update', [$property->id.'/edit/#perfil-macth']) }}" class="link">Configurações do macth</a>
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
</div>



@endsection
