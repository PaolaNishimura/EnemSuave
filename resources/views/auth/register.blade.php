@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Registrar</h5>
            <form class="form-signin" method="POST" action="{{ route('register') }}">
                @csrf

                <label for="inputPassword">Nome</label>
                <div class="form-label-group">
                    <input name="name" type="text" id="inputPassword" class="form-control" placeholder="Nome" required autofocus>
                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>

                <label for="inputEmail">Email</label>
                <div class="form-label-group">
                    <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email" required >
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

                <label for="inputPassword">Confirmar Senha</label>
                <div class="form-label-group">
                    <input name="password_confirmation" type="password" id="inputPassword" class="form-control" placeholder="Confirmar Senha" required>
                    @if ($errors->has('password_confirmation'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>
                <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Registrar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
