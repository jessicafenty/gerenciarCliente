<?php

namespace App\Http\Controllers;

use App\Cidade;
use App\Cliente;
use App\Endereco;
use App\Estado;
use App\Http\Requests\EnderecoRequest;
use App\Pais;
use Illuminate\Http\Request;

class EnderecoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::paginate(5);
        return view('endereco.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pais = Pais::all();
        $clientes = Cliente::all();
        return view('endereco.create', compact('pais', 'clientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EnderecoRequest $request)
    {
        $cliente = Cliente::find($request->input('clientes'));
        $cidade = Cidade::find($request->input('cidade'));
        $endereco = new Endereco();
        $endereco->logradouro = $request->input('logradouro');
        $endereco->bairro = $request->input('bairro');
        $endereco->numero = $request->input('numero');
        $endereco->cep = $request->input('cep');
        $endereco->complemento = $request->input('complemento');
        $endereco->pontoRef = $request->input('pontoRef');
        $endereco->cliente()->associate($cliente);
        $endereco->cidade()->associate($cidade);
        $endereco->save();
        return redirect('/endereco/'.$cliente->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $enderecos = Endereco::where('idCliente','=',$id)->get();
        $cliente = Cliente::findOrFail($id);
        return view('endereco.show', compact('enderecos', 'cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $endereco = Endereco::find($id);
        $clientes = Cliente::all();
        $pais = Pais::all();
        $estado = Estado::all();
        $cidade = Cidade::all();
        return view('endereco.edit', compact('endereco','clientes', 'pais', 'estado', 'cidade'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EnderecoRequest $request, $id)
    {
        $cliente = Cliente::find($request->input('clientes'));
        $cidade = Cidade::find($request->input('cidade'));
        $endereco = Endereco::findOrFail($id);
        $endereco->cliente()->associate($cliente);
        $endereco->cidade()->associate($cidade);
        $endereco->update($request->all());
        return redirect('/endereco/'.$cliente->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $endereco =  Endereco::findOrFail($id);
        $endereco->delete();
        return redirect('/endereco');
    }
}
