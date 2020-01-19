{{-- @foreach($emails as $key => $email)
  @php 
    if($email->to == $auth_login) {
      $user = $email->getUserFrom;
    } else {
      $user = $email->getUserTo;
    }
  @endphp
  <a href="{{route('email.create', [$user->id, $email->property_id])}}">
    <div>
      Nome: {{ $user->name }}
      Sobre nome: {{ $user->last_name }}
      Avatar: <img src="/avatar/{{ $user->avatar }}" alt="Foto de {{ $user->name }}" style="width: 30px">
      Ultima Mensagem: {{ $email->last_mensagem }}
      Data: {{ $email->updated_at }}
    </div>
  </a>
@endforeach --}}

@extends('../layouts.app')

@section('content')
<div class="chat-page pt-page">

  {{-- URLS PARA O FRONT --}}
  <input type="hidden" id="api_chats_url" value="{{ route('api.chats') }}" />
  {{-- <input type="hidden" id="api.subject_url" value="{{ route('api.subject') }}" />
  <input type="hidden" id="email.store_url" value="{{ route('email.store') }}" /> --}}
  {{-- URLS PARA O FRONT --}}

	<div class="container">

		<div class="row">
			<div class="col-md-12">
				<header class="titulo--padrao titulo--padrao--breadcrumb">
					<h3 class="titulo">
            <a href="{{route('dashboard')}}">Home</a> > 
            <span class="bread-child">Mensagens</a>
          </h3>
				</header>
			</div>
    </div>

		<div class="row">
			<div class="col-md-3 page_sidebar">
				<header class="sidebar_header">
					<h4 class="sidebar_header__titulo">Conversas <span id="chat_length"></span></h4>
				</header>
				<div class="sidebar_content">
            <div id="chat_list" class="chat_list">
              
            </div>
				</div>
      </div>
      
			<div class="col-md-9 page_content">
      </div>
    </div>
    
  </div>
</div>
@endsection