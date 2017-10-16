<?php

namespace App\Http\Controllers;

use App\Cidade;
use App\Estado;
use App\Http\Requests\CidadeRequest;
use Illuminate\Http\Request;

class CidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cidade = Cidade::paginate(5);
        return view('cidade.index', compact('cidade'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estado = Estado::all();
        return view('cidade.create', compact('estado'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CidadeRequest $request)
    {
        $estado = Estado::find($request->input('estado'));
        $cidade = new Cidade();
        $cidade->nome = $request->input('nome');
        $cidade->estado()->associate($estado);
        $cidade->save();
        return redirect('/cidade');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cidade = Cidade::findOrFail($id);
        return view('cidade.show', compact('cidade'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cidade = Cidade::find($id);
        $estado = Estado::all();
        return view('cidade.edit', compact('cidade','estado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CidadeRequest $request, $id)
    {
        $estado = Estado::find($request->input('estado'));
        $cidade = Cidade::findOrFail($id);
        $cidade->estado()->associate($estado);
        $cidade->update($request->all());
        return redirect('/cidade');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cidade =  Cidade::findOrFail($id);
        $cidade->delete();

        return redirect('/cidade');
    }
}
