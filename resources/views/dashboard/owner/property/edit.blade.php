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
						<span class="bread-child">{{ $property->name }}</span> > 
						<span class="bread-child">{{ __('general.editar') }}</span>
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
								<h4 class="card-title"><i class="fa fa-edit"></i> {{ __('general.editar_informacoes_imovel') }}</h4>
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

						<div class="row">
							<div class="col-md-12">

								<ul class="nav nav-pills" id="editTab" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" data-toggle="tab" href="#como_e_seu_imovel" role="tab">
											<i class="fa fa-info"></i> {{ __('general.como_e_seu_imovel') }}
										</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#localizacao" role="tab">
											<i class="fa fa-map"></i> {{ __('general.localizacao') }}
										</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#fotos" role="tab">
											<i class="fa fa-images"></i> {{ __('general.fotos') }}
										</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#moradores" role="tab">
											<i class="fa fa-user"></i> {{ __('general.moradores') }}
										</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#contas_imovel" role="tab">
											<i class="fa fa-money-bill"></i> {{ __('general.contas_imovel') }}
										</a>
									</li>
								</ul>

							</div>
						</div>

						<div class="row">

							<div class="tab-content" id="editTab">

								<!-- INFOS TAB -->
								<div class="tab-pane show fade active" role="tabpanel" id="como_e_seu_imovel">
									<section class="formulario--cadastro">
										<header class="cadastro-titulo">
											<h1 class="titulo">{{ __('general.como_e_seu_imovel') }}</h1>
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
						
										<div class="bloco-quarto-formulario">
											{{ Form::label('data_vencimento', 'Data de vecimento',['class'=>'label-texto']) }}
											{{ Form::text('data_vencimento',$property->data_vencimento,['class'=>'input-data','placeholder'=>'Data de vecimento']) }}
										</div>
										<div class="bloco-quarto-formulario">
											{{ Form::label('caucao', 'Valor do Caução',['class'=>'label-texto']) }}
											{{ Form::text('caucao',$property->caucao,['class'=>'input-data','placeholder'=>'Valor do Caução']) }}
										</div>
										<div class="bloco-quarto-formulario">
											{{ Form::label('mensalidade', 'Valor da Mensalidade',['class'=>'label-texto']) }}
											{{ Form::text('mensalidade',$property->mensalidade,['class'=>'input-data','placeholder'=>'Valor do Mensalidade']) }}
										</div>
										<div class="bloco-quarto-formulario">
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
								</div>
								<!-- INFOS TAB -->

								<!-- LOCAL TAB -->
								<div class="tab-pane show fade" role="tabpanel" id="localizacao">
									<section class="formulario--cadastro">
										<header class="cadastro-titulo">
											<h1 class="titulo">{{ __('general.localizacao') }}</h1>
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
								</div>
								<!-- LOCAL TAB -->

								<!-- FOTOS TAB -->
								<div class="tab-pane show fade" role="tabpanel" id="fotos">
									<section class="formulario--cadastro">
										<header class="cadastro-titulo">
											<h1 class="titulo">{{ __('general.fotos') }}</h1>
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
								</div>
								<!-- FOTOS TAB -->

								<!-- MORADORES TAB -->
								<div class="tab-pane show fade" role="tabpanel" id="moradores">
									<section id="perfil-Match" class="formulario--cadastro">
										<header class="cadastro-titulo">
											<h1 class="titulo">{{ __('general.perfil_desejado_moradores') }}</h1>
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
								</div>
								<!-- MORADORES TAB -->

								<!-- CONTAS TAB -->
								<div class="tab-pane show fade" role="tabpanel" id="contas_imovel">
									<section class="formulario--cadastro">
										<header class="cadastro-titulo">
											<h1 class="titulo">{{ __('general.contas_imovel') }}</h1>
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
								</div>
								<!-- CONTAS TAB -->

							</div>

						</div>


					</div>
				</div>

			</div>
			<!-- FORM -->
		</div>

	</div>
</div>

@endsection
