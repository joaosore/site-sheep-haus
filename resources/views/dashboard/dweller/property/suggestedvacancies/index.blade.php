@extends('../layouts.app')

@section('content')

  @foreach ($vacancies as $vacancy)
  <div>
    @foreach ($vacancy->galeries as $key => $item)
      @if($key === 0)
        <img src="/images/{{ $item->src }}" alt="" style="width: 100px; height: 100px">
      @endif
    @endforeach
    <br />
    <b>Titulo</b> {{ $vacancy->title }}
    <br />
    <b>Descrição</b> {{ $vacancy->description }}
    <br />
    <b>Data de Entrada</b> {{ $vacancy->entrance }}
    <br />
    <b>Data de Saida</b> {{ $vacancy->exit }}
    <br />
    <b>Valor</b> {{ $vacancy->value }}
    @if(!in_array($vacancy->id, $matches))
      {{ Form::open(array('route' => 'v_match', 'method' => 'post')) }}
          {{ Form::hidden('vacancy_id', $vacancy->id) }}
          {{ Form::submit('Macth') }}
      {{ Form::close() }}
    @endif
  </div>
  @endforeach

@endsection

