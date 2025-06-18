<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BurgerSaveRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
    
    public function rules(): array
    {
        return [
            'person_name'   => 'required',
            'bread_id'      => 'required',
            'meat_id'       => 'required',
        ];
    }

    public function messages()
    {
        return [
            'person_name.required'  => 'O campo Nome é obrigatório.',
            'bread_id.required'     => 'Selecionar um tipo de pão é obrigatório.',
            'meat_id.required'      => 'Selecionar um tipo de carne é obrigatório.'

        ];
    }
}
