<?php

namespace App\Http\Controllers;

use App\Estado;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function getEstados(Request $request)
    {
        $pais = $request->get('pais');
        $estados = Estado::all()->where('idPais','=', $pais->id);
        return response()->json(array('estados'=> $estados), 200);
    }
}
