
@extends('../layouts.app')

@section('content')
<div class="dashboard-page dashboard-proprietario-page pt-page">

	<div class="container">

		<div class="row">
			<div class="col-md-6">
				<header class="titulo--padrao titulo--padrao--breadcrumb">
					{{-- <div style="height: 10px;"></div> --}}
					<h3 class="titulo">
                        <a href="{{route('dashboard')}}">{{ __('general.home') }}</a> > 
						<span class="bread-child">{{ __('general.painel_proprietario') }}</a>
					</h3>
				</header>
			</div>
			<div class="col-md-6">
				{{-- <a href="{{ route('property.create') }}" class="btn btn-success float-right">Novo imóvel</a>
				<a href="{{ route('properties') }}" class="btn btn-secondary float-right" style="margin-right: 10px;">Meus imóveis</a>
				<div style="height: 10px;"></div> --}}
			</div>
		</div>

		<div class="row">

			<!-- IMÓVEIS -->
			<div class="col-md-6">

				<div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><i class="fa fa-home"></i> {{ __('general.imoveis_anunciados') }} <span class="badge badge-secondary">{{ count($properties) }}</span></h4>
                    </div>
					<div class="card-body">

						<div class="row">
							@foreach ($properties as $property)
								<div class="col-md-6 box-imovel box box-solid box-default">
									<div class="box-header with-border">

											@foreach ($property->galeries as $key => $item)
												@if($key === 0)
													<img class="image img-fluid" src="{{ asset('/images/'.$item->src) }}"></img>
												@endif
											@endforeach

										<h3 class="box-title">{{ $property->name }}</h3>                        
									</div>
									<div class="box-body">
										<span class="info-box-text info-box-text--resumo">{{ $property->description }}</span>
										
										<div class="more-info">
											<b class="info-box-number">R$ {{ number_format($property->account->SUM('value'), 2, ',', '.') }}</b>
											<b class="info-box-number"> - {{ $property->property_size }} m²</b>
										</div>
										<div style="height: 8px;"></div>
									</div>

									<div class="box-footer">
										<div class="row">
											<div class="col-md-3"></div>
											<div class="col-md-6">
												<a href="{{ route('match_property', [$property->id]) }}" class="btn btn-sm btn-secondary btn-block">Ver matches</a>
                                                <a href="{{route('immobile.details', ['id'=> $property->id])}}" class="btn btn-sm btn-link btn-block">
                                                    {{__('general.detalhes')}}
                                                </a>
											</div>
										</div>

										<div style="height: 10px;"></div>

										<div class="row">
											<div class="col-md-12">
												<a href="#" class="btn btn-info btn-block">{{ __('general.destacar_anuncio') }}</a>
											</div>
										</div>

										<div style="height: 10px;"></div>

										<div class="row">
											<div class="col-md-6">
												<a href="{{ route('property.edit', $property->id ) }}" class="btn btn-sm btn-secondary btn-block">{{ __('general.editar') }}</a>
											</div>
											<div class="col-md-6">
												{{ Form::submit('APAGAR', ['class' => 'btn btn-sm btn-secondary btn-block']) }}
											</div>
										</div>

										{{ Form::open(array('route' => 'property.destroy', 'method' => 'delete')) }}
											{{ Form::hidden('property_id', $property->id) }}
										{!! Form::close() !!}
									</div>
								</div>
							@endforeach
						</div>

					</div>
				</div>
			</div>
			<!-- IMÓVEIS -->

			<!-- MENSAGENS -->
			<div class="col-md-3">
				<div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><i class="fa fa-envelope"></i> {{ __('general.mensagens') }} <span class="badge badge-secondary">{{ count($mensages) }}</span></h4>
                    </div>
					<div class="card-body">
						<div id="mini-message-list" style="max-height: 460px; overflow: overlay; padding-right: 20px;"></div>
						<a href="{{ route('chats') }}" class="btn btn-sm btn-secondary">{{ __('general.todas_mensagens') }}</a>
					</div>
				</div>
			</div>
			<!-- MENSAGENS -->

			<!-- SERVIÇOS -->
			<div class="col-md-3">
				<div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            <i class="fa fa-cog"></i> {{ __('general.servicos_uteis') }} <span class="badge badge-secondary">x</span>
                        </h4>
                    </div>
					<div class="card-body">

						<ul class="lista-servicos">
								<li class="servicos-item">
										<a href="" class="link-servicos">
												<figure class="baner-servicos" style=""></figure>
										</a>
								</li>
								<li class="servicos-item">
										<a href="" class="link-servicos">
												<figure class="baner-servicos"></figure>
										</a>
								</li>
								<li class="servicos-item">
										<a href="" class="link-servicos">
												<figure class="baner-servicos"></figure>
										</a>
								</li>
								<li class="servicos-item">
										<a href="" class="link-servicos">
												<figure class="baner-servicos"></figure>
										</a>
								</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- SERVIÇOS -->

		</div>

	</div>
	<div style="height: 20px;"></div>

</div>
{{-- 
<div class="panel panel-default col-md-8" style="float: left; margin-right: 15px;">
    <div class="row">
        <div class="box">
            <div class="box-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="box-title">Dashboard Proprietário</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('property.create') }}" style="float: left;" class="btn btn-success pull-right">Novo anúncio</a>
                        <a href="{{ route('properties') }}" class="btn btn-info pull-right" style="margin-right: 5px;">Meus imóveis</a>
                    </div>
                </div>                        
            </div>
            
            <div class="box-body">
                <div class="row" style="margin-left: 12px;">
                    <button type="button" class="btn btn-light btn-lg disabled">
                        Imóveis anunciados <span class="badge badge-light">{{ count($properties) }}</span>
                        <span class="sr-only">unread messages</span>
                    </button>
                </div>
                
                <div style="height: 10px;"></div>

                <section class="col-md-12">
                    @foreach ($properties as $property)
                        <div class="box box-solid box-default">
                            <div class="box-header with-border">
                                <h3 class="box-title">{{ $property->name }}</h3>                        
                            </div>
                            <div class="box-body">
                                <div class="col-sm-6">
                                    <span class="info-box-text">{{ $property->description }}</span>
                                </div>
                                @foreach ($property->galeries as $key => $item)
                                    @if($key === 0)
                                        <img class="image img-thumbnail" width="80" heigth="80" src="{{ asset('/images/'.$item->src) }}"></img>
                                    @endif
                                @endforeach
                                                        
                                <div>                            
                                    <span class="info-box-number" style="float: left; margin-right: 15px;">R$ {{ number_format($property->account->SUM('value'), 2, ',', '.') }}</span>
                                    <span class="info-box-number"> {{ $property->property_size }} m²</span>
                                </div>

                                <div style="height: 10px;"></div>

                                <a href="" class="btn btn-primary btn-lg btn-block">DESTACAR ANÚNCIO</a>
                            </div>

                            <div class="box-footer"> 
                                <a href="{{ route('match_property', [$property->id]) }}" class="btn btn-info" style="float: left;">VER MATCHES</a>                       
                                {{ Form::open(array('route' => 'property.destroy', 'method' => 'delete')) }}
                                    {{ Form::submit('APAGAR', ['class' => 'btn btn-danger pull-right']) }}
                                    {{ Form::hidden('property_id', $property->id) }}
                                {!! Form::close() !!}

                                <a href="{{ route('property.edit', $property->id ) }}" class="btn btn-default pull-right" style="float: right; margin-right: 5px;">EDITAR</a>
                            </div>
                        </div>
                    @endforeach
                </section>
            </div>
            <div class="flex-center position-ref full-height">
                <div class="content centralizar bloco-adm"> 
                    
                    
                </div>
            </div>
        </div>
    </div>    
</div>

<!-- PANEL MENSAGENS -->
<div class="panel panel-default col-md-3">
   <div class="row">
        <div class="box">
            <div class="box-header">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="box-title"><i class="fa fa-envelope"></i> Mensagens <span class="badge badge-light">{{ count($mensages) }}</span>
                            <span class="sr-only">unread messages</span>
                        </h3>
                    </div>
                </div>                         
            </div>
            <div class="box-body">
                <ul class="list-group" style="max-height: 250px;overflow-y: scroll;">
                    @foreach($mensages as $key => $mensage)
                        @php 
                            if($mensage->to == $auth_login) {
                                $item = $mensage->getUserFrom;
                            } else {
                                $item = $mensage->getUserTo;
                            }
                        @endphp
                        <li class="list-group-item">
                            <a href="{{route('email.create', [$item->id, $mensage->property_id])}}">
                                <header class="item-titulo">
                                    <h3 class="titulo-nome">{{ $item->name }}</h3>
                                </header>
                                <p class="texto">{{ $mensage->last_mensagem }}</p>
                                <footer class="item-rodape">
                                    <p class="item-data">{{ date_format($mensage->updated_at, 'd/m/Y') }}</p>
                                    <p class="item-hora">{{ date_format($mensage->updated_at, 'H:i') }}</p>
                                </footer>
                            </a>
                        </li>
                    @endforeach
                </ul>     
            </div>
            <div class="box-footer">
                <a href="" class="btn btn-primary btn-lg btn-block">Anunciar vaga</a>                
            </div>
        </div>
   </div>
</div>

<!-- PANEL SERVIÇOS -->
<div class="panel panel-default col-md-3">
    <div class="row">
        <div class="box">
            <div class="box-header">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="box-title"><i class="fa fa-cogs"></i> Serviços úteis <span class="badge badge-light">{{ count($mensages) }}</span>                            </h3>
                    </div>
                </div>    
            </div>

            <div class="box-body">
                <ul class="lista-servicos">
                    <li class="servicos-item">
                        <a href="" class="link-servicos">
                            <figure class="baner-servicos" style=""></figure>
                        </a>
                    </li>
                    <li class="servicos-item">
                        <a href="" class="link-servicos">
                            <figure class="baner-servicos"></figure>
                        </a>
                    </li>
                    <li class="servicos-item">
                        <a href="" class="link-servicos">
                            <figure class="baner-servicos"></figure>
                        </a>
                    </li>
                    <li class="servicos-item">
                        <a href="" class="link-servicos">
                            <figure class="baner-servicos"></figure>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="box-footer">
                <a href="" class="btn btn-info btn-lg btn-block">Mais serviços</a>
                <a href="" class="btn btn-primary btn-lg btn-block">Anunciar</a>
            </div>
        </div>
    </div>
</div> --}}
@stop
