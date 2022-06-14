<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlbumRequest extends FormRequest
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
        return
            [
                'nome' => "required|min:5|unique:albuns,nome,$this->album,id"
            ];
    }
    public function messages()
    {
        return
            [
                'nome.required' => 'Por favor, digite o     nome do   álbum',
                'nome.min'      => 'O   nome   do     álbum deve ter  pelo  menos 5 caracteres.',
                'nome.unique'   => 'O   nome   desse  álbum já   está sendo utilizado.'
            ];
    }
}
