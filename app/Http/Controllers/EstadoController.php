<?php

namespace App\Http\Controllers;

use App\Estado;
use App\Http\Requests\EstadoRequest;
use App\Pais;
use Illuminate\Http\Request;

class EstadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estado = Estado::paginate(5);
        return view('estado.index', compact('estado'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pais = Pais::all();
        return view('estado.create', compact('pais'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EstadoRequest $request)
    {
        $pais = Pais::find($request->input('pais'));
        $estado = new Estado();
        $estado->nome = $request->input('nome');
        $estado->sigla = $request->input('sigla');
        $estado->pais()->associate($pais);
        $estado->save();
        return redirect('/estado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estado = Estado::findOrFail($id);
        return view('estado.show', compact('estado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estado = Estado::find($id);
        $pais = Pais::all();
        return view('estado.edit', compact('estado','pais'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EstadoRequest $request, $id)
    {
        $pais = Pais::find($request->input('pais'));
        $estado = Estado::findOrFail($id);
        $estado->pais()->associate($pais);
        $estado->update($request->all());
        return redirect('/estado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estado =  Estado::findOrFail($id);
        $estado->delete();

        return redirect('/estado');
    }
}
