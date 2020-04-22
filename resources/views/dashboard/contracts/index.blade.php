@extends('../layouts.app')

@section('content')
<div class="">
 
  @foreach($dados as $key => $dado)
    
    <div>
    <br />
    <br />
    <br />
    <br />
    </div>
    <div>
      <h1>Imóvel alugado</h1>
      <img src="{{ asset('images/'.$dado->property->galleries[0]->src) }}" alt="Sheep Haus">
       <br />
      {{$dado->property->name}} <br />
      {{$dado->property->description}} <br />
      R$ {{$dado->property->mensalidade}} - {{$dado->property->property_size}}M² - {{$dado->property->number_of_bathrooms}} VAGAS <br />
    </div>

    <div>
     <br />
      <h1>Informações do Locador</h1>
       {{$dado->locador->name}} {{$dado->locador->last_name}} <br />
       {{$dado->locador->telephone}} <br />
       {{$dado->locador->cell_phone}} <br />
       {{$dado->locador->email}} <br />
    </div>

    <div>
     <br />
      <h1>Dados do contrato</h1>
       Valor do Caução R$ {{$dado->property->caucao}} <br />
       Valor da Mensalidade R$ {{$dado->property->mensalidade}} <br />
       Dia de vencimento {{$dado->property->data_vencimento}} <br />
       Forma de Pagamento: Tranferencia Bancaria <br />
       <br /> Constrato assinado - via do proprietário: <br />
        http://127.0.0.1:8000/pdf/{{$dado->contract->locator_pdf}}
        @if($dado->user->function === 'P')
          {{ Form::open(array('route' => ['contract.upload.file', $dado->contract->id], 'method' => 'post', 'enctype' => 'multipart/form-data')) }}
            {{ Form::file('pdf') }}
            <div class="bloco-unico-formulario">
              {{ Form::submit('Upload',['class'=>'botao-formulario-padrao']) }}
            </div>
          {{ Form::close() }}
        @endif
       <br /> Constrato assinado - via do aluno: <br />
        http://127.0.0.1:8000/pdf/{{$dado->contract->tenant_pdf}}
        @if($dado->user->function === 'M')
          {{ Form::open(array('route' => ['contract.upload.file', $dado->contract->id], 'method' => 'post', 'enctype' => 'multipart/form-data')) }}
            {{ Form::file('pdf') }}
            <div class="bloco-unico-formulario">
              {{ Form::submit('Upload',['class'=>'botao-formulario-padrao']) }}
            </div>
          {{ Form::close() }}
        @endif
    </div>

    <div>
     <br />
      <h1>Fluxo de pagamentos do contrato</h1>
    </div>

  @endforeach
</div>

@endsection
