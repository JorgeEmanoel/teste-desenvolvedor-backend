@extends('layouts.app')

@section('title', 'Editar - '.$cliente->nome)
@section('desc', 'Editar as informações do cliente '.$cliente->nome)

@section('head')
<link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker3.min.css') }}">
@endsection

@section('content')

    <ul class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fas fa-fw fa-tachometer-alt"></i> Dashboard</a></li>
        <li><a href="{{ route('clientes.index') }}"><i class="fa fa-users"></i> Clientes</a></li>
        <li><i class="fa fa-eye"></i> {{ $cliente->nome }}</li>
    </ul>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ $cliente->nome }}</h1>
    </div>

    <div class="modal fade" id="modal-pedidos-create">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Novo pedido</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('pedidos.store') }}" class="form" method="post">
                        {{ csrf_field() }}

                        <input type="hidden" name="cliente_id" value="{{ $cliente->id }}">

                        <div class="form-group">
                            <label for="i_addpedido-produto_id" class="form-control-label">Produto:</label>
                            <select class="form-control" name="produto_id" id="i_addpedido-produto_id" required>
                                @foreach (range('a', 'z') as $letra)
                                    <optgroup label="{{ strtoupper($letra) }}">
                                        @foreach (App\Produto::whereRaw('LOWER(nome) like \''. $letra.'%\'')->get() as $produto)
                                            <option value="{{ $produto->id }}">{{ $produto->nome }}</option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label for="i_addpedido-quantidade" class="form-control-label">Quantidade:</label>
                                <input type="number" class="form-control" id="i_addpedido-quantidade" required min="1" value="{{ old('quantidade', 1) }}">
                            </div>

                            <div class="form-group col">
                                <label for="i_addpedido-data" class="form-control-label">Data de Entrega:</label>
                                <input type="text" class="form-control datepicker" id="i_addpedido-data" placeholder="dd/mm/aaaa" data-date-min-day="0d">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                <label for="i_addpedido-desconto" class="form-control-label">Desconto (opcional):</label>
                                <input type="number" class="form-control mask" data-pattern="000.000,00" id="i_addpedido-desconto" placeholder="000.000,00">
                            </div>
                        </div>

                        <hr>

                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">
                            Cancelar <i class="fa fa-times"></i>
                        </button>

                        <button type="submit" class="btn btn-sm btn-success">
                            Salvar <i class="fa fa-save"></i>
                        </button>

                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="row">
        <div class="col-lg-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <p>{{ $cliente->nome }}</p>
                    <p>E-mail: <a href="mailto:{{ $cliente->email }}" target="_blank">{{ $cliente->email }}</a></p>
                    <p>CPF: <strong>{{ $cliente->cpf }}</strong></p>

                    <div class="btn-group btn-group-justified">
                        <a href="#modal-pedidos-create" class="btn btn-sm btn-success" data-toggle="modal">
                            Novo pedido <br>
                            <i class="fa fa-plus"></i>
                        </a>

                        <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-sm btn-primary">
                            Editar dados <br>
                            <i class="fa fa-edit"></i>
                        </a>
                    </div>

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
                                <th>Status</th>
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
                                            {{ $pedido->produto->nome }}
                                        </a>
                                    </td>
                                    <td>
                                        @if ($pedido->status == 0)
                                            <div class="badge badge-default">Em aberto</div>
                                        @endif

                                        @if ($pedido->status == 1)
                                            <div class="badge badge-success">Aprovado</div>
                                        @endif

                                        @if ($pedido->status == 2)
                                            <div class="badge badge-danger">Cancelado</div>
                                        @endif
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
    <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
    <script>
        $('.datepicker').datepicker({
            todayHighlight: true,
        });
    </script>
@endsection
