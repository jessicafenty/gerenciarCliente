<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = ['nome', 'dataNasc', 'email', 'sexo', 'cpf', 'rg'];
    protected $guarded = 'id';
    protected $dates = ['dataNasc'];
}
