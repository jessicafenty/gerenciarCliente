<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnderecoRequest extends FormRequest
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
            'logradouro' => 'required|max:255',
            'bairro' => 'required|max:255',
            'numero' => 'required',
            'cep' => 'required|max:9',
            'complemento' => 'required|max:255',
            'pontoRef' => 'required|max:255',
            'pais' => 'required',
            'estado' => 'required',
            'cidade' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'logradouro.required' => 'Favor informar o LOGRADOURO',
            'bairro.required' => 'Favor informar a BAIRRO',
            'numero.required' => 'Favor informar o NÚMERO',
            'cep.required' => 'Favor informar o CEP',
            'complemento.required' => 'Favor informar o COMPLEMENTO',
            'pontoRef.required' => 'Favor informar o PONTO DE REFERÊNCIA',
            'pais.required' => 'Favor selecionar o PAÍS',
            'estado.required' => 'Favor selecionar o ESTADO',
            'cidade.required' => 'Favor selecionar a CIDADE',

        ];
    }
}
