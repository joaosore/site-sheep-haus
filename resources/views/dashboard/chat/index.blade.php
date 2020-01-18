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

