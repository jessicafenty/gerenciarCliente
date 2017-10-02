<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    protected $fillable = ['nome', 'idEstado'];


    public function estado(){
        return $this->belongsTo('App\Estado', 'idEstado');
    }
}
