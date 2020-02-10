@extends('../layouts.app')

@section('content')
<!-- cadastro do imovel aqui -->
<section class="bloco--cadastro-imovel">
<div class="centralizar">
	{{ Form::open(array('route' => 'property.store', 'method' => 'post')) }}
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
				{{ Form::text('name', null, array('class' => 'input-padrao','placeholder' => 'NOME')) }}
			</div>
			<div class="bloco-meio-formulario">
				{{ Form::select('type', array(null => 'Tipo de imovel', 'A' => 'Apartamento', 'C' => 'Casa'),null,['class'=>'select-padrao']) }}
			</div>
			<div class="bloco-unico-formulario">
				{{ Form::text('description', null, array('class' => 'input-padrao', 'placeholder' => 'DESCRIÇÂO')) }}
			</div>

			<div class="bloco-quarto-formulario">
				{{ Form::label('data_vencimento', 'Data de vecimento',['class'=>'label-texto']) }}
				{{ Form::text('data_vencimento',null,['class'=>'input-data','placeholder'=>'Data de vecimento']) }}
			</div>
			<div class="bloco-quarto-formulario">
				{{ Form::label('caucao', 'Valor do Caução',['class'=>'label-texto']) }}
				{{ Form::text('caucao',null,['class'=>'input-data','placeholder'=>'Valor do Caução']) }}
			</div>
			<div class="bloco-quarto-formulario">
				{{ Form::label('mensalidade', 'Valor da Mensalidade',['class'=>'label-texto']) }}
				{{ Form::text('mensalidade',null,['class'=>'input-data','placeholder'=>'Valor do Mensalidade']) }}
			</div>
			<div class="bloco-quarto-formulario">
			
			</div>

			<div class="bloco-quarto-formulario">
					{{ Form::text('number_of_bedrooms',null,array('class'=>'input-padrao','placeholder'=>'Nº DE QUARTOS')) }}
			</div>
			<div class="bloco-quarto-formulario">
					{{ Form::text('number_of_bathrooms',null,array('class'=>'input-padrao','placeholder'=>'Nº DE BANHEIROS')) }}
			</div>
			<div class="bloco-quarto-formulario">
					{{ Form::text('number_of_residents',null,array('class'=>'input-padrao','placeholder'=>'Nº DE MORADORES')) }}
			</div>
			<div class="bloco-quarto-formulario">
					{{ Form::text('property_size',null,array('class'=>'input-padrao','placeholder'=>'TAMANHO IMÓVEL')) }}
					<span>Ex: 72m²</span>
			</div>
			<div class="bloco-unico-formulario">
				{{ Form::submit('Salvar',['class'=>'botao-formulario-padrao']) }}
			</div>
			{{ Form::close() }}
		</section>
</div>
</section>

<!-- cadastro do imovel aqui -->
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

{{ Form::close() }}

@endsection
