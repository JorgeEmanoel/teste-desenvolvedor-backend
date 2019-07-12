<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\ClienteStoreRequest as StoreRequest;
use App\Http\Requests\ClienteUpdateRequest as UpdateRequest;

use App\Cliente;

use Session;
use Auth;
use Carbon\Carbon;

class ClienteController extends Controller
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
    public function index(Request $request)
    {
        //
        $clientes = Cliente::all();
        $filtro = null;

        if ($request->filtro) {

            $clientes = Cliente::where('id', '>', -1);

            if ($request->nome)
                $clientes = $clientes->where('nome', 'like', '%'.$request->nome.'%');

            if ($request->cpf)
                $clientes = $clientes->where('cpf', 'like', '%'.$request->cpf.'%');

            if ($request->email)
                $clientes = $clientes->where('email', 'like', '%'.$request->email.'%');

            // dd($clientes);
            $clientes = $clientes->get();

            $filtro = (object) $request->all();

        }

        return view('clientes.index', compact('clientes', 'filtro'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        //
        $cliente = Cliente::create($request->all());

        Session::flash('success', 'Cliente "'. $cliente->nome .'" cadastrado com sucesso.');

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
        $cliente = Cliente::find($id);

        if (!$cliente) {

            Session::flash('danger', 'Não encontramos nenhum cliente com o ID especificado. Tente novamente utilizando um ID válido ;)');
            return redirect()->back();

        }

        return view('clientes.show', compact('cliente'));

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
        $cliente = Cliente::find($id);

        if (!$cliente) {

            Session::flash('danger', 'Não encontramos nenhum cliente com o ID especificado. Tente novamente utilizando um ID válido ;)');
            return redirect()->back();

        }

        return view('clientes.edit', compact('cliente'));

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
        $cliente = Cliente::find($id);

        if (!$cliente) {

            Session::flash('danger', 'Não encontramos nenhum cliente com o ID especificado. Tente novamente utilizando um ID válido ;)');
            return redirect()->back();

        }

        $cliente->update($request->all());

        Session::flash('success', 'Dados do cliente "'. $cliente->nome .'" atualizados com sucesso.');

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
        $cliente = Cliente::find($id);

        if (!$cliente) {

            Session::flash('danger', 'Não encontramos nenhum cliente com o ID especificado. Tente novamente utilizando um ID válido ;)');
            return redirect()->back();

        }

        $cliente->delete();

        Session::flash('success', 'Cliente "'. $cliente->nome .'" removido com sucesso.');

        return redirect()->back();
    }
}
