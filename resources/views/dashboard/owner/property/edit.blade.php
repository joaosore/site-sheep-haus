@extends('../layouts.app')

@section('content')
<section class="bloco--cadastro-imovel">
	<div class="centralizar">
			<section class="formulario--cadastro">
				<header class="cadastro-titulo">
					<div class="icones">
						<i data-font="" class="icone-formulario">M</i>
						<i data-font="" class="icone-formulario">M</i>
						<i data-font="" class="icone-formulario">M</i>
						<i data-font="" class="icone-formulario">M</i>
					</div>
					<h1 class="titulo">Como é seu imóvel</h1>
				</header>
				
				<div class="bloco-meio-formulario">
					{{ Form::open(array('route' => ['property.put', $property->id], 'method' => 'PUT')) }}
					{{ Form::text('name', $property->name, array('class' => 'input-padrao','placeholder' => 'NOME')) }}
				</div>
				<div class="bloco-meio-formulario">
					{{ Form::select('type', array(null => 'Tipo de imovel', 'A' => 'Apartamento', 'C' => 'Casa'),$property->type,['class'=>'select-padrao']) }}
				</div>
				<div class="bloco-unico-formulario">
					{{ Form::text('description', $property->description, array('class' => 'input-padrao', 'placeholder' => 'DESCRIÇÂO')) }}
				</div>
				<div class="bloco-unico-formulario">
					@if(is_array($property->characteristics_id))
					@foreach ($characteristics as $valor)
						@if(in_array($valor, $property->characteristics_id))
							<label for="$valor" class="label-check-button">
								{{ Form::checkbox('characteristics_id[]', $valor, true) }} {{$valor}}
							</label>
						@else
							<label for="$valor" class="label-check-button">
								{{ Form::checkbox('characteristics_id[]', $valor) }} {{$valor}}
							</label>
						@endif
					@endforeach
					@else
						@foreach ($characteristics as $valor)
							<label for="$valor" class="label-check-button">
								{{ Form::checkbox('characteristics_id[]', $valor) }} {{$valor}}
							</label>
						@endforeach
					@endif
				</div>
				<div class="bloco-quarto-formulario">
						{{ Form::text('number_of_bedrooms', $property->number_of_bedrooms,array('class'=>'input-padrao','placeholder'=>'Nº DE QUARTOS')) }}
				</div>
				<div class="bloco-quarto-formulario">
						{{ Form::text('number_of_bathrooms', $property->number_of_bathrooms,array('class'=>'input-padrao','placeholder'=>'Nº DE BANHEIROS')) }}
				</div>
				<div class="bloco-quarto-formulario">
						{{ Form::text('number_of_residents', $property->number_of_residents, array('class'=>'input-padrao','placeholder'=>'Nº DE MORADORES')) }}
				</div>
				<div class="bloco-quarto-formulario">
						{{ Form::text('property_size', $property->property_size ,array('class'=>'input-padrao','placeholder'=>'TAMANHO IMÓVEL')) }}
						<span>Ex: 72m²</span>
				</div>
				<div class="bloco-unico-formulario">
					{{ Form::submit('Salvar',['class'=>'botao-formulario-padrao']) }}
				</div>
						{{ Form::close() }}
			</section>
			<section class="formulario--cadastro">
				<header class="cadastro-titulo">
					<div class="icones">
						<i data-font="" class="icone-formulario">M</i>
						<i data-font="" class="icone-formulario">M</i>
						<i data-font="" class="icone-formulario">M</i>
						<i data-font="" class="icone-formulario">M</i>
					</div>
					<h1 class="titulo">Como é seu imóvel</h1>
				</header>
				<div class="bloco-meio-formulario">
					<div id="map" style="width: 100%; height: 280px"></div>
				</div>
				<div class="bloco-meio-formulario localizacao">
					{{ Form::open(array('route' => ['property.put', $property->id], 'method' => 'put')) }}
					{{ Form::hidden('lng', $property->lng, array('id' => 'lng')) }}
			        {{ Form::hidden('lat', $property->lat, array('id' => 'lat')) }}
					{{ Form::text('address', $property->address, array('class'=>'input-padrao','placeholder'=>'ENDEREÇO','id' => 'autocomplete')) }}
					{{ Form::text('cep', $property->cep, array('class'=>'input-padrao','placeholder'=>'CEP','id' => 'postal_code')) }}
					{{ Form::text('state', $property->state, array('class'=>'input-padrao','placeholder'=>'ESTADO','id' => 'administrative_area_level_1')) }}
					{{ Form::text('district', $property->district, array('class'=>'input-padrao','placeholder'=>'BAIRRO')) }}
					{{ Form::text('city', $property->city, array('class'=>'input-padrao','placeholder'=>'CIDADE','id' => 'locality')) }}
					{{ Form::text('number', $property->number, array('class'=>'input-padrao','placeholder'=>'NÚMERO','id' => 'street_number')) }}
					{{ Form::text('country', $property->country, array('class'=>'input-padrao','placeholder'=>'PAÍS','id' => 'country')) }}

				</div>
				<div class="bloco-unico-formulario">
					{{ Form::submit('Salvar',['class'=>'botao-formulario-padrao']) }}
				</div>
				{{ Form::close() }}
			</section>

		<section class="formulario--cadastro">
				<header class="cadastro-titulo">
					<div class="icones">
						<i data-font="" class="icone-formulario">M</i>
						<i data-font="" class="icone-formulario">M</i>
						<i data-font="" class="icone-formulario">M</i>
						<i data-font="" class="icone-formulario">M</i>
					</div>
					<h1 class="titulo">Como é seu imóvel</h1>
				</header>
				<div class="bloco-unico-formulario">
					@foreach ($galleries as $gallery)
					{{ Form::open(array('class'=>'cadastro-galeria','route' => 'property-image', 'method' => 'delete')) }}
						{{ Form::hidden('property_id', $property->id) }}
						{{ Form::hidden('id', $gallery->id) }}
						<figure class="cadastro-galeria_imagem">
							<img src="/images/{{ $gallery->src }}" alt="" style="width: 100px; height: 100px">
							{{ Form::submit('X',['class'=>'botao-excluir_imagem']) }}
						</figure>
					{{ Form::close() }}
					@endforeach
					{{ Form::open(array('class'=>'botao-escolha_imagem','route' => 'property-image', 'method' => 'post', 'enctype' => 'multipart/form-data')) }}

						{{ Form::hidden('property_id', $property->id) }}
						{{ Form::file('image') }}
						<br />

				</div>
				<div class="bloco-unico-formulario">
					{{ Form::submit('Salvar',['class'=>'botao-formulario-padrao']) }}
				</div>
				{{ Form::close() }}
			</section>
		<section id="perfil-Match" class="formulario--cadastro">
				<header class="cadastro-titulo">
					<div class="icones">
						<i data-font="" class="icone-formulario">M</i>
						<i data-font="" class="icone-formulario">M</i>
						<i data-font="" class="icone-formulario">M</i>
						<i data-font="" class="icone-formulario">M</i>
					</div>
					<h1 class="titulo">Perfil desejado para moradores</h1>
				</header>
				<div class="bloco-unico-formulario">
					@foreach ($habits as $habit)
			            @if(!in_array($habit->id, $ihabits_id))
			                {{ Form::open(array('class'=>'label-add','route' => 'i_habit.store', 'method' => 'post')) }}

			                {{ Form::hidden('property_id', $property->id) }}
			                {{ Form::hidden('habit_id', $habit->id) }}
								{{ Form::label('name', $habit->name) }}
				                {{ Form::submit('+', ['class'=>'add-padrao']) }}

			                {{ Form::close() }}
			            @else
			                {{ Form::open(array('class'=>'label-add','route' => 'i_habit.destroy', 'method' => 'delete')) }}

			                {{ Form::hidden('property_id', $property->id) }}
			                {{ Form::hidden('habit_id', $habit->id) }}

			                {{ Form::label('name', $habit->name) }}

			                {{ Form::submit('-',['class'=>'remove-padrao']) }}

			                {{ Form::close() }}
			            @endif
			        @endforeach
				</div>
				<div class="bloco-unico-formulario">
					{{ Form::submit('Salvar',['class'=>'botao-formulario-padrao']) }}
				</div>
			</section>
		<section class="formulario--cadastro">
				<header class="cadastro-titulo">
					<div class="icones">
						<i data-font="" class="icone-formulario">M</i>
						<i data-font="" class="icone-formulario">M</i>
						<i data-font="" class="icone-formulario">M</i>
						<i data-font="" class="icone-formulario">M</i>
					</div>
					<h1 class="titulo">Contas do imóvel</h1>
				</header>
				<div class="bloco-terco-formulario">
					{{ Form::open(array('route' => 'property-account', 'method' => 'post')) }}

					{{ Form::hidden('property_id', $property->id) }}
					<div class="pos-span">
						{{ Form::text('name',null,['class'=>'input-padrao','placeholder'=>'NOME DA CONTA']) }}
						<span>Ex: Aluguel</span>
					</div>
					<div class="pos-span">
						{{ Form::text('value',null,['class'=>'input-padrao','placeholder'=>'NOME DA CONTA']) }}
						<span>Ex: R$ 300,50</span>
					</div>
					{{ Form::label('duedate', 'DATA DE VENCIMENTO',['class'=>'label-texto']) }}
					{{ Form::text('duedate',null,['class'=>'input-data','placeholder'=>'NOME DA CONTA']) }}
					<div class="contas-adicionar">
					{{ Form::submit('Salvar',['class'=>'bt-adicionar']) }}
				</div>
				</div>
				{{ Form::close() }}
				<div class="bloco-terco-formulario localizacao">

				</div>
				<div class="bloco-terco-formulario">
					<ul class="formulario-contas-lista">
						<li class="contas-item">
							@foreach ($accounts as $account)
						    {{ Form::open(array('route' => 'property-account', 'method' => 'delete')) }}
						        {{ Form::hidden('property_id', $property->id) }}
						        {{ Form::hidden('id', $account->id) }}
						        <div>
						            {{ $account->name }}
						            {{ $account->value }}
						            {{ $account->duedate }}
						        </div>
						        {{ Form::submit('X',['class'=>'remove-padrao']) }}
						    {{ Form::close() }}
						    @endforeach
						</li>
					</ul>
				</div>
				<div class="bloco-unico-formulario">
					{{ Form::submit('Salvar',['class'=>'botao-formulario-padrao']) }}
				</div>
			</section>
		@if ($errors->any())
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	    @endif

	</div>
</section>

@endsection
