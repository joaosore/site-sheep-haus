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
						<span class="bread-child">{{ __('general.novo') }}</span>
					</h3>
				</header>
			</div>
            <div class="col-md-6">
            </div>
		</div>

		<div class="row">

			<!-- FORM -->
			<div class="col-md-12">

				<div class="card">
					<div class="card-header">
						<div class="row">
							<div class="col-md-6">
								<h4 class="card-title"><i class="fa fa-info"></i> {{ __('general.como_e_seu_imovel') }}</h4>
							</div>
						</div>
                    </div>
                    
					<div class="card-body">

						@if ($errors->any())
						<div class="alert alert-danger">
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
						@endif

						<!-- cadastro do imovel aqui -->
						<section class="bloco--cadastro-imovel">
							<div class="centralizar">
								{{ Form::open(array('route' => 'property.store', 'method' => 'post')) }}
									<section class="formulario--cadastro">
										{{-- <header class="cadastro-titulo">
											<div class="icones">
												<i data-font="" class="icone-formulario">M</i>
												<i data-font="" class="icone-formulario">M</i>
												<i data-font="" class="icone-formulario">M</i>
												<i data-font="" class="icone-formulario">M</i>
											</div>
											<h1 class="titulo">Como é seu imóvel</h1>
										</header> --}}
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

					</div>
				</div>

			</div>
			<!-- FORM -->
		</div>

	</div>
</div>

{{ Form::close() }}

@endsection
