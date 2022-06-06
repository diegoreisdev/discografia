<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FaixaRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'numero' => 'required|numeric|digits_between:0,2',
            'nome_faixa' => 'required|string|min:4|max:32|unique:faixas,nome_faixa',
            'duracao' => 'required|min:4'
        ];
    }
    
    public function messages()
    {
        return [
            'numero.required' => 'Por favor, digite o número da faixa',
            'numero.digits_between' => 'O número deve ter entre 1 e 2 dígitos.',
            'numero.numeric' => 'Por favor, digite apenas números em número da música',

            'nome_faixa.required' => 'Por favor, digite o nome da faixa',
            'nome_faixa.min' => 'O nome deve ter pelo menos 4 caracteres',
            'nome_faixa.max' => 'O nome deve ter no máximo 32 caracteres',
            'nome_faixa.unique' => 'O nome da faixa já existe',

            'duracao.required' => 'Por favor, digite a duração da faixa',
            'duracao.min' => 'A duração deve ter pelo menos 4 caracteres',

        ];
    }
}
