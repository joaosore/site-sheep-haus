<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRegistration extends FormRequest
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
            'function' => 'required',
            'gender' => 'required',
            'cell_phone' => 'required|numeric',
            'birthday' => 'required|date'
        ];
    }
    public function messages()
    {
        return [
            'cell_phone.required' => 'É necessário preencher o campo "Celular".',
            'function.required' => 'Selecione a sua ocupação.',
            'gender.required' => 'Selecione o seu gênero.',
            'birthday.required' => 'Preencha a sua data de nascimento, por exemplo "01/01/1994".',
            'cell_phone.numeric' => 'O campo celular deve ser peenchido apenas com números, por exemplo "+55 11 252125211.',
        ];
    }
}