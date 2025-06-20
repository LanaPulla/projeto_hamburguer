<?php

namespace App\Http\Requests;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
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
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => $validator->errors()->first(),  //pega o primeiro erro e manda
        ], 422));
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
