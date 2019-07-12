@extends('layouts.app')

@section('title', 'Editar - '.$cliente->nome)
@section('desc', 'Editar as informações do cliente '.$cliente->nome)

@section('content')

    <ul class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fas fa-fw fa-tachometer-alt"></i> Dashboard</a></li>
        <li><a href="{{ route('clientes.index') }}"><i class="fa fa-users"></i> Clientes</a></li>
        <li><a href="{{ route('clientes.show', $cliente->id) }}"><i class="fa fa-eye"></i> {{ $cliente->nome }}</a></li>
        <li><i class="fa fa-edit"></i> Editar dados cadastrais</li>
    </ul>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ $cliente->nome }} - Editar</h1>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <form action="{{ route('clientes.update', $cliente->id) }}" class="form" method="post">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="form-group{{ $errors->has('nome') ? ' has-error has-feedback' : '' }}">
                            <label for="i_addcliente-nome" class="form-control-label">Nome:</label>
                            <input type="text" name="nome" class="form-control" id="i_addcliente-nome" maxlength="100" value="{{ old('nome', $cliente->nome) }}">

                            @if ($errors->has('nome'))
                                <div class="help-block">{{ $errors->first('nome') }}</div>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error has-feedback' : '' }}">
                            <label for="i_addcliente-email" class="form-control-label">E-mail:</label>
                            <input type="email" name="email" class="form-control" id="i_addcliente-email" value="{{ old('email', $cliente->email) }}">

                            @if ($errors->has('email'))
                                <div class="help-block">{{ $errors->first('email') }}</div>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('cpf') ? ' has-error has-feedback' : '' }}">
                            <label for="i_addcliente-cpf" class="form-control-label">CPF:</label>
                            <input type="cpf" name="cpf" class="form-control mask" data-pattern="000.000.000-00" id="i_addcliente-cpf" value="{{ old('cpf', $cliente->cpf) }}">

                            @if ($errors->has('cpf'))
                                <div class="help-block">{{ $errors->first('cpf') }}</div>
                            @endif
                        </div>

                        <hr>

                        <button type="submit" class="btn btn-success">
                            Salvar <i class="fa fa-save"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        {{-- /.col-lg-4 --}}

        <div class="col-lg-8">
            <div class="card shadow h-100 py-2">
                <div class="card-header">Pedidos realizados por este cliente</div>

                <div class="card-body">
                    <table class="table table-striped table-hover dataTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Data</th>
                                <th>Entrega</th>
                                <th>Produto</th>
                                <th>Ação</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($cliente->pedidos as $pedido)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $pedido->created_at->format('d/m/Y') }} às {{ $pedido->created_at->format('H:i') }}</td>
                                    <td>{{ $pedido->data->format('d/m/Y') }} às {{ $pedido->data->format('H:i') }}</td>
                                    <td>
                                        <a href="{{ route('produtos.show', $pedido->produto->id) }}">
                                            {{ $produto->nome }}
                                        </a>
                                    </td>
                                    <td>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{-- /.col-lg-8 --}}
    </div>
@endsection

@section('footer')
    <script>
    </script>
@endsection
