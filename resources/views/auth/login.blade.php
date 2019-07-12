@extends('layouts.site')

@section('content')
    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Bem-vindo!</h1>
                                </div>
                                <form class="user" method="POST" action="{{ route('login') }}">
                                    {{ csrf_field() }}

                                    <div class="form-group{{ $errors->has('email') ? ' has-error has-feedback' : '' }}">
                                        <input type="email" class="form-control form-control-user" name="email" required id="exampleInputEmail" aria-describedby="emailHelp" placeholder="E-mail ">
                                        @if ($errors->has('email'))
                                            <div class="help-block">{{ $errors->first('email') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('password') ? ' has-error has-feedback' : '' }}">
                                        <input type="password" class="form-control form-control-user" name="password" required id="exampleInputPassword" placeholder="Password" placeholder="Sua senha">
                                        @if ($errors->has('password'))
                                            <div class="help-block">{{ $errors->first('password') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input" id="customCheck">
                                            <label class="custom-control-label" for="customCheck">Lembre de mim</label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Entrar
                                    </button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="{{ route('password.email') }}">Esqueceu a senha ?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="{{ route('register') }}">Quero criar minha conta agora</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
