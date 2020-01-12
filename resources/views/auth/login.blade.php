<style type="text/css">
	.login-form {
		/* width: 340px; */
    	margin: 5px auto;
	}
    .login-form form {
    	margin-bottom: 5px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .login-form .hint-text {
		color: #777;
		padding-bottom: 15px;
		text-align: center;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .login-btn {        
        font-size: 15px;
        font-weight: bold;
    }

    .btn-font-color {
        color: white;
    }

    .or-seperator {
        margin: 20px 0 10px;
        text-align: center;
        border-top: 1px solid #ccc;
    }
    .or-seperator i {
        padding: 0 10px;
        background: #f7f7f7;
        position: relative;
        top: -11px;
        z-index: 1;
    }
    .social-btn .btn {
        margin: 10px 0;
        font-size: 15px;
        text-align: center; 
        line-height: 24px;  
        color: #f4f4f4;     
    }
	.social-btn .btn i {
		margin: 4px 5px  0 5px;
        /* min-width: 15px; */
	}
	.input-group-addon .fa{
		font-size: 18px;
	}
</style>
<div class="modal fade" id="login">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Faça seu login ou cadastro</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>                
            </div>

            <div class="modal-body">
                <div class="login-form">
                    <form method="POST" action="{{ route('login') }}">
						@csrf                    
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" style="margin-left: 5px;" class="form-control" name="username" placeholder="E-mail" required="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" style="margin-left: 5px;" class="form-control" name="password" placeholder="Senha" required="required">
                            </div>
                        </div>        
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-block login-btn">{{ __('Login') }}</button>                            
                        </div>
                        
                        <div class="or-seperator"><i>ou</i></div>
                        
                        <div class="text-center social-btn">
                            <a href="{{ url('/auth/redirect/facebook') }}" class="btn btn-primary btn-block btn-font-color"><i class="fab fa-facebook"></i> Acessar com <b>Facebook</b></a>                           
                            <a href="{{ url('/auth/redirect/google') }}" class="btn btn-danger btn-block"><i class="fab fa-google"></i> Acessar com <b>Google</b></a>
                            <a href="{{ route('register') }}" class="btn btn-info btn-block"><i class="fas fa-envelope"></i> Cadastro por e-mail</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <div class="modal fade" id="login">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header modal-header-login">
			  <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>
			<header class="banner">
				<figure>
					<img src="https://via.placeholder.com/150" alt="">
				</figure>
			</header>
			<div class="card">
				<div class="card-body">
					<form method="POST" action="{{ route('login') }}">
						@csrf

								<input class="campo_login" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="EMAIL" value="{{ old('email') }}" required autocomplete="email" autofocus>

								@error('email')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror


								<input class="campo_login" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="SENHA" required autocomplete="current-password">

								@error('password')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror -->

						<!-- <div class="form-group row">
							<div class="col-md-6 offset-md-4">
								<div class="form-check">
									<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

									<label class="form-check-label" for="remember">
										{{ __('Remember Me') }}
									</label>
								</div>
							</div>
						</div> -->
<!-- 
						<div class="form-group row mb-0 login">
							<div class="links">
								@if (Route::has('password.request'))
									<a class="esqueci btn btn-link" href="{{ route('password.request') }}">
										{{ __('Esqueci a senha') }}
									</a>
								@endif
							</div>
							<div class="entrar">
								<button type="submit" class="btn btn-primary">{{ __('Login') }}</button>
							</div>
						</div>
					</form>
				</div>
				<section class="login-midias">
						<div class="google">
							<a href="{{ url('/auth/redirect/google') }}" class=""><i class="fa fa-google"></i> INICIAR SESSÃO COM GOOGLE</a>
						</div>
						<div class="facebook">
							<a href="{{ url('/auth/redirect/facebook') }}" class=""><i class="fa fa-facebook"></i> INICIAR SESSÃO COM FACEBOOK</a>
						</div>
						<div class="cadastro">
							<a href="{{ route('register')}}" class="">CADASTRO POR E-MAIL</a>
						</div>
				</section>
			</div>
		</div>
	</div>
</div> -->
