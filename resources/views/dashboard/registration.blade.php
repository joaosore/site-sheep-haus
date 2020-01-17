@extends('../layouts.app')

@section('content')
<div class="registration-page pt-page">

    <div class="container">
        {{ Form::open(array('route' => 'registration', 'method' => 'post')) }}
            <div class="row">
                <div class="col-md-12">
                    <header class="titulo--padrao">
                        <h1 class="titulo">Pré-cadastro</h1>
                    </header>
                </div>
            </div>

            <div class="row">
                <div class="col-md-5">

                    <div class="form-group">
                        {{ Form::label('name', 'Nome') }}
                        {{ Form::text('name', $user->name, array('class'=>'form-control') )}}
                    </div>

                    <div class="form-group">
                        {{ Form::label('last_name', 'Último Nome') }}
                        {{ Form::text('last_name', $user->last_name, array('class'=>'form-control')) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('email', 'E-mail') }}
                        {{ Form::text('email', $user->email, array('class'=>'form-control', 'readonly')) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('university_id', 'Universidade') }}
                        {{ Form::text('university_id', null, array('id' => 'college_id', 'class' => 'form-control', 'data-route' => route('CollegeAutocomplete'))) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('course_id', 'Curso') }}
                        {{ Form::text('course_id', null, array('id' => 'course_id', 'class' => 'form-control', 'data-route' => route('CourseAutocomplete'))) }}
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        {{ Form::label('function', 'Ocupação') }}
                        {{ Form::select('function', array(null => 'Selecione', 'M' => 'Morador', 'P' => 'Proprietário', 'S' => 'Prestador de serviços'), null, ['class' => 'custom-select']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('gender', 'Gênero') }}
                        {{ Form::select('gender', array(null => 'Selecione', 'M' => 'Masculino', 'F' => 'Feminino', 'O' => 'Outros'), null, ['class' => 'custom-select']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('telephone', 'Telefone') }}
                        {{ Form::text('telephone', null, array('class'=>'form-control m_phone_with_ddd', 'placeholder' => '(__) _____-____')) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('cell_phone', 'Celular') }}
                        {{ Form::text('cell_phone', null, array('class'=>'form-control m_celphone_only_numbers', 'placeholder' => '__ __ _________')) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('birthday', 'Data de nascimento') }}
                        {{ Form::text('birthday', null, array('class'=>'form-control m_date', 'placeholder' => '__/__/____')) }}
                    </div>

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
            </div>

            <div class="row">
                <div class="col-md-10"></div>
                <div class="col-md-2">
                    <br />
                    {{ Form::submit('Avançar', array('class'=>'btn btn-lg btn-success float-right')) }}
                    <br />
                    <br />
                    <br />
                    <br />
                </div>
            </div>
        {{ Form::close() }}
    </div>

</div>

@endsection