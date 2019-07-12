@extends('layouts.app')

@section('title', 'Editar - '.$cliente->nome)
@section('desc', 'Editar as informações do cliente '.$cliente->nome)

@section('content')

    <ul class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fas fa-fw fa-tachometer-alt"></i> Dashboard</a></li>
        <li><a href="{{ route('clientes.index') }}"><i class="fa fa-users"></i> Clientes</a></li>
        <li><i class="fa fa-eye"></i> {{ $cliente->nome }}</li>
    </ul>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ $cliente->nome }}</h1>
        <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-sm btn-primary">
            <i class="fa fa-edit"></i> Editar dados cadastrais
        </a>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <p>{{ $cliente->nome }}</p>
                    <p>E-mail: <a href="mailto:{{ $cliente->email }}" target="_blank">{{ $cliente->email }}</a></p>
                    <p>CPF: <strong>{{ $cliente->cpf }}</strong></p>
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
