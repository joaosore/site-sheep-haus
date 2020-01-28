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
            <a href="{{route('dashboard')}}">{{ __('general.home') }}</a> > 
            <span class="bread-child">{{ __('general.mensagens') }}</a>
          </h3>
				</header>
			</div>
    </div>

		<div class="row">
			<div class="col-md-4 page_sidebar">
				<header class="sidebar_header">
					<h4 class="sidebar_header__titulo">{{ __('general.conversas') }} <span id="chat_length"></span></h4>
				</header>
				<div class="sidebar_content">
            <div id="chat_list" class="chat_list"></div>
				</div>
      </div>
      
			<div class="col-md-8 page_content">
          <div class="chat_content">
            <div id="chat_content" class="chat_content__messages"></div>
            <div class="chat_content__input">
              <div class="chat__input">
                <input type="text" id="text_message" class="chat__input__field" placeholder="{{ __('general.digite_sua_mensagem') }}" autocomplete="false" />
              </div>
              <div class="chat__send">
                <div class="chat__send__button" id="send_message">{{ __('general.enviar') }}
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448.011 448.011"><path d="M438.731 209.463l-416-192c-6.624-3.008-14.528-1.216-19.136 4.48a15.911 15.911 0 00-.384 19.648l136.8 182.4-136.8 182.4c-4.416 5.856-4.256 13.984.352 19.648 3.104 3.872 7.744 5.952 12.448 5.952 2.272 0 4.544-.48 6.688-1.472l416-192c5.696-2.624 9.312-8.288 9.312-14.528s-3.616-11.904-9.28-14.528z"/></svg>
                </div>
              </div>
            </div>
          </div>  
      </div>
    </div>
    
  </div>
</div>
@endsection