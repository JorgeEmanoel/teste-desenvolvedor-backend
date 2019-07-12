<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\PedidoStoreRequest as StoreRequest;
use App\Http\Requests\PedidoUpdateRequest as UpdateRequest;

use App\Cliente;
use App\Produto;
use App\Pedido;

use Session;
use Auth;
use Carbon\Carbon;

class PedidoController extends Controller
{
    public function __construct ()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pedidos = Pedido::all();

        return view('pedidos.index', compact('pedidos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $clientes = Cliente::all();
        $produtos = Produto::all();

        return view('pedidos.create', compact('clientes', 'produtos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $pedido = Pedido::create($request->all());

        Session::flash('success', 'Pedido cadastrado com sucesso para o cliente '.$pedido->cliente->nome.'.');

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $pedido = Pedido::find($id);

        if (!$pedido) {

            Session::flash('danger', 'Não encontramos nenhum pedido com o ID especificado. Tente novamente com um ID válido ;)');
            return redirect()->back();

        }

        return view('pedidos.show', compact('pedido'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $pedido = Pedido::find($id);

        if (!$pedido) {

            Session::flash('danger', 'Não encontramos nenhum pedido com o ID especificado. Tente novamente com um ID válido ;)');
            return redirect()->back();

        }

        $clientes = Cliente::all();
        $produtos = Produto::all();

        return view('pedidos.show', compact('pedido', 'clientes', 'produtos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $pedido = Pedido::find($id);

        if (!$pedido) {

            Session::flash('danger', 'Não encontramos nenhum pedido com o ID especificado. Tente novamente com um ID válido ;)');
            return redirect()->back();

        }

        $pedido->update($request->all());

        Session::flash('success', 'Dados do pedido atualizados com sucesso.');

        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $pedido = Pedido::find($id);

        if (!$pedido) {

            Session::flash('danger', 'Não encontramos nenhum pedido com o ID especificado. Tente novamente com um ID válido ;)');
            return redirect()->back();

        }

        $pedido->delete();

        Session::flash('success', 'O pedido foi deletado com sucesso.');

        return redirect()->back();

    }
}
