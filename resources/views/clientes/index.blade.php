@extends('layouts.app')

@section('title', 'Dashboard')
@section('desc', 'Visualize as principais informações sobre pedidos, clientes e produtos.')

@section('content')

    <ul class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fas fa-fw fa-tachometer-alt"></i> Dashboard</a></li>
        <li><i class="fa fa-users"></i> Clientes</li>
    </ul>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Clientes</h1>
        <a href="#modal-cliente-create" data-toggle="modal" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Novo cliente
        </a>
    </div>

    <div class="modal fade" id="modal-cliente-create">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Novo cliente</h4>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('clientes.store') }}" class="form" method="post">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('nome') ? ' has-error has-feedback' : '' }}">
                            <label for="i_addcliente-nome" class="form-control-label">Nome:</label>
                            <input type="text" name="nome" class="form-control" id="i_addcliente-nome" maxlength="100" value="{{ old('nome') }}">

                            @if ($errors->has('nome'))
                                <div class="help-block">{{ $errors->first('nome') }}</div>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error has-feedback' : '' }}">
                            <label for="i_addcliente-email" class="form-control-label">E-mail:</label>
                            <input type="email" name="email" class="form-control" id="i_addcliente-email" value="{{ old('email') }}">

                            @if ($errors->has('email'))
                                <div class="help-block">{{ $errors->first('email') }}</div>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('cpf') ? ' has-error has-feedback' : '' }}">
                            <label for="i_addcliente-cpf" class="form-control-label">CPF:</label>
                            <input type="cpf" name="cpf" class="form-control mask" data-pattern="000.000.000-00" id="i_addcliente-cpf" value="{{ old('cpf') }}">

                            @if ($errors->has('cpf'))
                                <div class="help-block">{{ $errors->first('cpf') }}</div>
                            @endif
                        </div>

                        <hr>

                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            Cancelar <i class="fa fa-times"></i>
                        </button>
                        <button type="submit" class="btn btn-success">
                            Salvar <i class="fa fa-save"></i>
                        </button>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="card border-bottom-primary shadow h-100 py-2">
        <div class="card-body">
            <form action="{{ route('clientes.index') }}">
                {{ csrf_field() }}

                <div class="row">
                    <div class="form-group col">
                        <label for="i_filtro-nome" class="input-group-addon">Nome:</label>
                        <input type="text" id="i_filtro-nome" name="nome" value="{{ isset($filtro) ? $filtro->nome : '' }}" placeholder="Todos">
                    </div>

                    <div class="form-grop col">
                        <label for="i_filtro-email" class="input-group-addon">E-mail:</label>
                        <input type="text" id="i_filtro-email" name="email" value="{{ isset($filtro) ? $filtro->email : '' }}" placeholder="Todos">
                    </div>

                    <div class="form-group col">
                        <label for="i_filtro-cpf" class="input-group-addon">CPF:</label>
                        <input type="text" id="i_filtro-cpf" name="cpf" value="{{ isset($filtro) ? $filtro->cpf : '' }}" placeholder="Todos">
                    </div>

                    <div class="form-group col">
                        <label class="input-group-addon">&nbsp;</label>
                        <button type="submit" class="btn btn-sm btn-success form-control" name="filtro" value="true">
                            <i class="fa fa-search"></i> Filtrar
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>

    <hr>

    <div class="card shadow h-100 py-2">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover dataTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>E-mail</th>
                            <th>Cadastro</th>
                            <th>Pedidos</th>
                            <th>Ação</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($clientes as $cliente)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <a href="{{ route('clientes.show', $cliente->id) }}">
                                        {{ $cliente->nome }}
                                    </a>
                                </td>
                                <td class="mask" data-mask="000.000.000-00">{{ $cliente->cpf }}</td>
                                <td>
                                    <a href="mailto:{{ $cliente->email }}" target="_blank">{{ $cliente->email }}</a>
                                </td>
                                <td>
                                    <small>
                                        {{ $cliente->created_at->format('d/m/Y') }} às {{ $cliente->created_at->format('H:i') }}
                                    </small>
                                </td>
                                <td>{{ $cliente->pedidos->count() }}</td>
                                <td>
                                    <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-xs btn-primary round"><i class="fa fa-edit"></i></a>
                                    <a href="#modal-cliente-{{ $cliente->id }}-delete" data-toggle="modal" class="btn btn-xs btn-danger round"><i class="fa fa-trash"></i></a>

                                    <div class="modal fade" id="modal-cliente-{{ $cliente->id }}-delete">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Deseja realmente apagar o cliente "<strong>{{ $cliente->nome }}</strong>"</h4>

                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        <span class="sr-only">Close</span>
                                                    </button>
                                                </div>

                                                <div class="modal-footer">
                                                    <form action="{{ route('clientes.destroy', $cliente->id) }}" method="post">
                                                        {{ csrf_field() }}
                                                        {{ method_field("DELETE") }}

                                                        <button type="button" data-dismiss="modal" class="btn btn-secondary">
                                                            Cancelar <i class="fa fa-times"></i>
                                                        </button>

                                                        <button type="submit" class="btn btn-danger">
                                                            <i class="fa fa-trash"></i> Deletar o cliente e todo o seu histórico
                                                        </button>
                                                    </form>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <script>
        @if ($errors->has('nome') || $errors->has('email') || $errors->has('cpf'))
            $('#modal-cliente-create').modal('show');
        @endif
    </script>
@endsection
