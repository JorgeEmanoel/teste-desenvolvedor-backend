@extends('layouts.site')

@section('content')
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Crie sua conta</h1>
                        </div>
                        <form class="user" method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}

                            <div class="form-group row{{ $errors->has('nome') || $errors->has('email') ? ' has-error has-feeback' : '' }}">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" name="nome" class="form-control form-control-user" id="exampleFirstName" required placeholder="Seu nome">
                                    @if ($errors->has('nome'))
                                        <div class="help-block">{{ $errors->first('nome') }}</div>
                                    @endif
                                </div>
                                <div class="col-sm-6">
                                    <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="E-mail">
                                    @if ($errors->has('email'))
                                        <div class="help-block">{{ $errors->first('email') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row{{ $errors->has('password') ? ' has-error has-feedback' : '' }}">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Crie uma senha">
                                    @if ($errors->has('password'))
                                        <div class="help-block">{{ $errors->first('password') }}</div>
                                    @endif
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" name="password_confirmation" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repita a senha criada">
                                    @if ($errors->has('password'))
                                        <div class="help-block">{{ $errors->first('password') }}</div>
                                    @endif
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Finalizar cadastro
                            </button>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="{{ route('password.email') }}">Esqueceu a senha ?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="{{ route('login') }}">Já tem uma conta ? Clique aqui para entrar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
