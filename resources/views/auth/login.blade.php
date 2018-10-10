@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Login</h5>
            <form class="form-signin" method="POST" action="{{ route('login') }}">
                @csrf
                <label for="inputEmail">Email</label>
                <div class="form-label-group">
                    <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email" required autofocus>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <label for="inputPassword">Senha</label>
                <div class="form-label-group">
                    <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Senha" required>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="custom-control custom-checkbox mb-3">
                    <input name="remember" type="checkbox" class="custom-control-input" id="customCheck1">
                    <label class="custom-control-label" for="customCheck1">Lembre-se</label>
                </div>
                <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Logar</button>
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    Esqueceu sua senha?
                </a>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
