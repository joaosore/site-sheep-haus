@extends('../layouts.app')

@section('content')
<div class="dashboard-page pt-page">

	<div class="container">

		<div class="row">
			<div class="col-md-12">
				<header class="titulo--padrao titulo--padrao--breadcrumb">
					<h3 class="titulo">
						<a href="{{route('dashboard')}}">Home</a> > 
						<span class="bread-child">Perfil</a>
					</h3>
				</header>
			</div>
		</div>

		<div class="row">

			<!-- perfil -->
			<div class="col-md-3">

				<div class="card">
					<div class="card-header">
							<h4 class="card-title"><i class="fa fa-user"></i> Meu perfil:</h4>
					</div>
					<div class="card-body">

						<div class="row">
							<div class="col-md-12">

							{{ Form::open(array('route' => 'profile', 'method' => 'put', 'enctype' => 'multipart/form-data')) }}
								<header>
									<figure style="background-image: url('/avatar/{{ $user->avatar }}')"></figure>
									<h3>{{ $user->name }}</h3>
									<h4>Gênero: {{ $user->gender }}</h4>
									<br />
								</header>
								<section>
									<div class="bloco-unico-formulario">
										{{ Form::text('name', $user->name, array('class' => 'form-control','placeholder' => 'NOME')) }}
									</div>
									<div class="bloco-unico-formulario">
										{{ Form::text('last_name', $user->last_name, array('class' => 'form-control','placeholder' => 'SOBRENOME')) }}
									</div>
									<div class="bloco-unico-formulario">
										{{ Form::text('email', $user->email, array('class' => 'form-control','placeholder' => 'E-MAIL'), ['readonly']) }}
									</div>
									<div class="bloco-unico-formulario">
										{{ Form::text('university_id', $user->university_id, array('class'=> 'form-control','placeholder' => 'UNIVERSIDADE', 'id' => 'college_id', 'data-route' => route('CollegeAutocomplete'))) }}
									</div>
									<div class="bloco-unico-formulario">
										{{ Form::text('course_id', $user->course_id, array('class'=> 'form-control', 'placeholder'=> 'CURSO', 'id' => 'course_id', 'data-route' => route('CourseAutocomplete'))) }}
									</div>
									@if($user->function === null)
									<div class="bloco-unico-formulario">
										{{ Form::select('function', array('class'=> 'custom-select', null => 'Selecione', 'M' => 'Morador', 'P' => 'Proprietário', 'S' => 'Prestador de serviços')) }}
									</div>
									@endif
									@if($user->gender === null)
									<div class="bloco-unico-formulario">
										{{ Form::select('gender', array('class'=> 'custom-select', null => 'Selecione', 'M' => 'Masculino', 'F' => 'Feminino', 'O' => 'Outros'), $user->gender) }}
									</div>
									@endif
									<div class="bloco-unico-formulario">
										{{ Form::text('telephone', $user->telephone, array('class' => 'form-control m_phone_with_ddd','placeholder' => 'TELEFONE')) }}
									</div>
									<div class="bloco-unico-formulario">
										{{ Form::text('cell_phone', $user->cell_phone, array('class' => 'form-control m_sp_celphones','placeholder' => 'CELULAR')) }}
									</div>
									<div class="bloco-unico-formulario">
										{{ Form::text('birthday', $user->birthday, array('class' => 'form-control m_date')) }}
									</div>
									
									{{ Form::file('image', ['class'=>'form-control-file']) }}

									@if ($errors->any())
									<div class="alert alert-danger">
										<ul>
											@foreach ($errors->all() as $error)
												<li>{{ $error }}</li>
											@endforeach
										</ul>
									</div>
									@endif

									<br />
									<br />
									
									{{ Form::submit('Salvar', ['class'=>'btn btn-success']) }}
								{{ Form::close() }}

							</div>
						</div>

					</div>
				</div>
			</div>
			<!-- perfil -->

			<!-- PREFERENCIAS -->
			@if(Auth::user()->function != 'P')
				<div class="col-md-3">
					<div class="card">
						<div class="card-header">
							<h4 class="card-title"><i class="fa fa-asterisk"></i> Preferências</h4>
						</div>
						<div class="card-body">
							<ul class="lista-preferencias">
								@foreach ($habits as $habit)
									@if(!in_array($habit->id, $mhabits_id))
										{{ Form::open(array('route' => 'm_habit.store', 'method' => 'post')) }}

										{{ Form::hidden('user_id', $user->id) }}
										{{ Form::hidden('habit_id', $habit->id) }}

										{{ Form::label('name', $habit->name) }}

										{{ Form::submit('+', ['class'=>'btn btn-success btn-sm']) }}

										{{ Form::close() }}
									@else
										{{ Form::open(array('route' => 'm_habit.destroy', 'method' => 'delete')) }}

										{{ Form::hidden('user_id', $user->id) }}
										{{ Form::hidden('habit_id', $habit->id) }}

										{{ Form::label('name', $habit->name) }} &#10004;

										{{ Form::submit('x', ['class'=>'btn btn-danger btn-sm']) }}

										{{ Form::close() }}
									@endif
								@endforeach
							</ul>
						</div>
					</div>
				</div>
			@endif
			<!-- PREFERENCIAS -->

			<!-- MENSAGENS -->
			<div class="col-md-3">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title"><i class="fa fa-envelope"></i> Mensagens</h4>
					</div>
					<div class="card-body">
						<div id="mini-message-list" style="max-height: 460px; overflow: overlay; padding-right: 20px;"></div>
						<a href="{{ route('chats') }}" class="btn btn-sm btn-secondary">Todas as mensagens</a>
					</div>
				</div>
			</div>
			<!-- MENSAGENS -->

			<!-- SERVIÇOS -->
			<div class="col-md-3">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">
							<i class="fa fa-cog"></i> Serviços úteis {{-- <span class="badge badge-secondary">x</span> --}}
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

		<div style="height: 20px;"></div>

	</div>
</div>
@endsection
