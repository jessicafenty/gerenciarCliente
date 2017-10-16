<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CidadeRequest extends FormRequest
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
            'estado' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'Favor informar o NOME',
            'estado.required' => 'Favor selecionar o ESTADO',
        ];
    }
}
