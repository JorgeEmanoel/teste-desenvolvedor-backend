<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{ env('APP_NAME') }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Gerência
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePedidos" aria-expanded="true" aria-controls="collapsePedidos">
            <i class="fas fa-fw fa-chart-line"></i>
            <span>Pedidos</span>
        </a>
        <div id="collapsePedidos" class="collapse" aria-labelledby="headingPedidos" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
                <a class="collapse-item" href="{{ route('pedidos.index') }}">
                    <i class="fa fa-eye"></i> Visão geral
                </a>
                <a class="collapse-item" href="{{ route('pedidos.create') }}">
                    <i class="fa fa-plus"></i> Novo pedido
                </a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProdutos" aria-expanded="true" aria-controls="collapseProdutos">
            <i class="fas fa-fw fa-boxes"></i>
            <span>Produtos</span>
        </a>
        <div id="collapseProdutos" class="collapse" aria-labelledby="headingProdutos" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                {{-- <h6 class="collapse-header">Custom Utilities:</h6> --}}
                <a class="collapse-item" href="{{ route('produtos.index') }}">
                    <i class="fa fa-eye"></i> Visão geral
                </a>
                <a class="collapse-item" href="{{ route('produtos.create') }}">
                    <i class="fa fa-plus"></i> Novo produto
                </a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseClientes" aria-expanded="true" aria-controls="collapseClientes">
            <i class="fas fa-fw fa-users"></i>
            <span>Clientes</span>
        </a>
        <div id="collapseClientes" class="collapse" aria-labelledby="headingClientes" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                {{-- <h6 class="collapse-header">Custom Utilities:</h6> --}}
                <a class="collapse-item" href="{{ route('clientes.index') }}">
                    <i class="fa fa-eye"></i> Visão geral
                </a>
                <a class="collapse-item" href="{{ route('clientes.create') }}">
                    <i class="fa fa-plus"></i> Cadastrar
                </a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    {{-- <hr class="sidebar-divider"> --}}

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
