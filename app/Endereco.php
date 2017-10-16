<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $fillable = ['logradouro', 'bairro', 'numero', 'cep', 'complemento', 'pontoRef', 'idCliente', 'idCidade'];

    public function cliente(){
        return $this->belongsTo('App\Cliente', 'idCliente');
    }

    public function cidade(){
        return $this->belongsTo('App\Cidade', 'idCidade');
    }
}
