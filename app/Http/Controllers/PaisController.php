<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaisRequest;
use App\Pais;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class PaisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$pais = Pais::paginate(5);
        $pais = Pais::all();
        return view('pais.index', compact('pais'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('pais.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaisRequest $request)
    {
        $arquivo = Input::file('bandeira');
        $form = $request->all();
        $form['bandeira'] = (string)Image::make($arquivo)->encode('data-url');
        //return var_dump($form);

        Pais::create($form);
        return redirect('pais');
//        if ($request->hasFile('inputBandeira'))
//        {
//            echo "ok";
//        }else{
//            echo "erro";
//        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pais = Pais::findOrFail($id);



        return view('pais.show', compact('pais'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pais = Pais::findOrFail($id);

        return view('pais.edit', compact('pais'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PaisRequest $request, $id)
    {
        $pais = Pais::find($id);
        $pais->nome = $request->nome;
        $pais->sigla = $request->sigla;

        if(isset($request->bandeira)){
            $arquivo = Input::file('bandeira');
            $pais->bandeira = (string)Image::make($arquivo)->encode('data-url');
        }
        $pais->save();
        Session::flash('mensagem', 'País atualizado com sucesso!');
        return redirect('/pais');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pais =  Pais::findOrFail($id);
        $pais->delete();

        return redirect('/pais');
    }
}
