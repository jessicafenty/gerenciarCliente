<?php

namespace App\Http\Controllers;

use App\Cidade;
use App\Estado;


class AjaxController extends Controller
{
    public function getEstados($id)
    {
        $estados = Estado::select('id', 'nome')->where('idPais','=',$id)->get();
        return response()->json(json_encode($estados));
    }
    public function getCidades($id)
    {
        $cidades = Cidade::select('id', 'nome')->where('idEstado','=',$id)->get();
        return response()->json(json_encode($cidades));
    }
}
