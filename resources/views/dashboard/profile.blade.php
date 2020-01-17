@extends('../layouts.app')

@section('content')
<div class="dashboard-page pt-page">
	<div class="container">

		<div class="row">
			<div class="col-md-12">
				<header class="titulo--padrao">
					<h2 class="titulo">Perfil</h2>
				</header>
			</div>
		</div>

		<div class="flex-center position-ref full-height">
			<div class="content centralizar bloco-adm">

				<section class="adm-primeiro-bloco">
					<section class="adm-republica">
						<section class="bloco-meio">
								{{ Form::open(array('route' => 'profile', 'method' => 'put', 'enctype' => 'multipart/form-data')) }}
							<header class="adm-republica_topo">
								<figure style="background-image: url('/avatar/{{ $user->avatar }}')"></figure>
								<div class="separador-texto">
									<h1 class="titulo">{{ $user->name }}</h1>
									<h2 class="subtitulo">({{ $user->gender }})</h2>
								</div>
							</header>
								<section class="formulario--cadastro adm">
									<div class="bloco-unico-formulario">
										{{ Form::text('name', $user->name, array('class' => 'input-padrao','placeholder' => 'NOME')) }}
									</div>
									<div class="bloco-unico-formulario">
										{{ Form::text('last_name', $user->last_name, array('class' => 'input-padrao','placeholder' => 'SOBRENOME')) }}
									</div>
									<div class="bloco-unico-formulario">
										{{ Form::text('email', $user->email, array('class' => 'input-padrao','placeholder' => 'E-MAIL'), ['readonly']) }}
									</div>
									<div class="bloco-unico-formulario">
										{{ Form::text('university_id', $user->university_id, array('class'=> 'input-padrao','placeholder' => 'UNIVERSIDADE', 'id' => 'college_id', 'data-route' => route('CollegeAutocomplete'))) }}
									</div>
									<div class="bloco-unico-formulario">
										{{ Form::text('course_id', $user->course_id, array('class'=> 'input-padrao', 'placeholder'=> 'CURSO', 'id' => 'course_id', 'data-route' => route('CourseAutocomplete'))) }}
									</div>
									@if($user->function === null)
									<div class="bloco-unico-formulario">
										{{ Form::select('function', array('class'=> 'select-padrao', null => 'Selecione', 'M' => 'Morador', 'P' => 'Proprietário', 'S' => 'Prestador de serviços')) }}
									</div>
									@endif
									@if($user->gender === null)
									<div class="bloco-unico-formulario">
										{{ Form::select('gender', array('class'=> 'select-padrao',null => 'Selecione', 'M' => 'Masculino', 'F' => 'Feminino', 'O' => 'Outros'), $user->gender) }}
									</div>
									@endif
									<div class="bloco-unico-formulario">
										{{ Form::text('telephone', $user->telephone, array('class' => 'input-padrao','placeholder' => 'TELEFONE')) }}
									</div>
									<div class="bloco-unico-formulario">
										{{ Form::text('cell_phone', $user->cell_phone, array('class' => 'input-padrao','placeholder' => 'CELULAR')) }}
									</div>
									<div class="bloco-unico-formulario">
										{{ Form::text('birthday', $user->birthday, array('class' => 'input-padrao')) }}
									</div>
									{{ Form::file('image') }}
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
									{{ Form::submit('Salvar') }}
									{{ Form::close() }}
								</section>
						</section>
						<section class="bloco-meio">
							<div class="preferencias">
								<header>
									<h1 class="titulo">PREFERÊNCIAS</h1>
								</header>
								<ul class="lista-preferencias">
									@foreach ($habits as $habit)
										@if(!in_array($habit->id, $mhabits_id))
											{{ Form::open(array('route' => 'm_habit.store', 'method' => 'post')) }}

											{{ Form::hidden('user_id', $user->id) }}
											{{ Form::hidden('habit_id', $habit->id) }}

											{{ Form::label('name', $habit->name) }}

											{{ Form::submit('+') }}

											{{ Form::close() }}
										@else
											{{ Form::open(array('route' => 'm_habit.destroy', 'method' => 'delete')) }}

											{{ Form::hidden('user_id', $user->id) }}
											{{ Form::hidden('habit_id', $habit->id) }}

											{{ Form::label('name', $habit->name) }}

											{{ Form::submit('x') }}

											{{ Form::close() }}
										@endif
									@endforeach
								</ul>
							</div>

						</section>
					</section>
				</section>
				<section class="adm-segundo-bloco">
					<!-- aqui vem as mini mensagems -->
					<section class="mensagens">
						<header class="titulo-mensagens">
							<i data-fonte="" class="icone-mensagens">M</i>
							<h1 class="titulo">MENSAGENS</h1>
							<a href=""><i data-fonte="" class="icone-mensagens">3</i></a>
						</header>
						<ul class="lista-mensagens">
							<li class="mensagens-item">
								<a href="">
									<header class="item-titulo">
										<h3 class="titulo-nome">Adriano</h3>
									</header>
									<p class="texto">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam?</p>
									<footer class="item-rodape">
										<p class="item-data">10/10/10</p>
										<p class="item-hora">10:10</p>
									</footer>
								</a>
							</li>
							<li class="mensagens-item">
								<a href="">
									<header class="item-titulo">
										<h3 class="titulo-nome">Adriano</h3>
									</header>
									<p class="texto">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam?</p>
									<footer class="item-rodape">
										<p class="item-data">10/10/10</p>
										<p class="item-hora">10:10</p>
									</footer>
								</a>
							</li>
							<li class="mensagens-item">
								<a href="">
									<header class="item-titulo">
										<h3 class="titulo-nome">Adriano</h3>
									</header>
									<p class="texto">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam?</p>
									<footer class="item-rodape">
										<p class="item-data">10/10/10</p>
										<p class="item-hora">10:10</p>
									</footer>
								</a>
							</li>
						</ul>
						<div class="links">
							<a href=""><i data-fonte="" class="icone-links">M</i><p>MENSAGEM NOVA</p></a>
							<a href=""><i data-fonte="" class="icone-links">M</i><p>ME ALERTE</p></a>
						</div>
					</section>
					<section class="anunciar-vaga">
						<a href="" class="bt-anunciar"><i data-fonte="" class="icone-anunciar">M</i>ANUNCIAR VAGA</a>
					</section>

					<!-- Aqui vem as mini mensagem -->
				</section>
				<section class="adm-terceiro-bloco">
					<!-- aqui vem os serviços -->
					<section class="servicos">
						<header class="titulo-servicos">
							<i data-fonte="" class="icone-servicos">M</i>
							<h1 class="titulo">SERVIÇOS ÚTEIS</h1>
						</header>
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
						<div class="links">
							<a href="">MAIS SERVIÇOS</a>
							<a href="">ANUCIAR</a>
						</div>
					</section>

					<!-- Aqui vem os serviços -->
				</section>
			</div>
		</div>
	</div>
</div>
@endsection
