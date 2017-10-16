<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => 'required|max:255',
            'dataNasc' => 'required|date',
            'email' => 'required|email',
            'sexo' => 'required',
            'cpf' => 'required|max:14',
            'rg' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'Favor informar o NOME',
            'dataNasc.required' => 'Favor informar a DATA DE NASCIMENTO',
            'email.required' => 'Favor informar o EMAIL',
            'sexo.required' => 'Favor informar o SEXO',
            'cpf.required' => 'Favor informar o CPF',
            'rg.required' => 'Favor informar o RG',
            'email.email' => 'Formato de email inválido!',
        ];
    }
}
