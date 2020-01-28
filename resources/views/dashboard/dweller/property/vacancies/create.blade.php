@extends('../layouts.app')

@section('content')
<section class="bloco--cadastro-vaga">
	<div class="centralizar">

		{{ Form::open(array('route' => 'vacancy', 'method' => 'post')) }}
		{{ Form::hidden('property_id', $property) }}
		{{ Form::hidden('user_id', $user->id) }}
		<section class="formulario--cadastro">
			<header class="cadastro-titulo">
				<div class="icones">
					<i data-font="" class="icone-formulario">M</i>
					<i data-font="" class="icone-formulario">M</i>
				</div>
				<h1 class="titulo">Como é sua vaga</h1>
			</header>
			<div class="bloco-unico-formulario">
				{{ Form::text('title',null, array('class' => 'input-padrao','placeholder' => 'Titulo da Vaga')) }}
			</div>
			<div class="bloco-unico-formulario">
				{{ Form::text('description',null, array('class' => 'input-padrao','placeholder' => 'Descrição da Vaga')) }}
			</div>
			<div class="bloco-terco-formulario">
				{{ Form::text('value',null, array('class' => 'input-padrao','placeholder' => 'VALOR ALUGUEL')) }}
			</div>
			<div class="bloco-terco-formulario">
				{{ Form::text('entrance',null, array('class' => 'input-padrao','placeholder' => 'Data da entrada')) }}
			</div>
			<div class="bloco-terco-formulario">
				 {{ Form::text('exit',null,array('class' => 'input-padrao','placeholder' => 'Data de saida')) }}
			</div>
			<div class="bloco-unico-formulario">
				{{ Form::submit('Salvar',['class'=>'botao-formulario-padrao']) }}
			</div>
			
		</section>
		{{ Form::close() }}
	</div>
</section>
@endsection
