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
            'login'   => 'required',
            'password'      => 'required',
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
            'login'     => 'O campo Login é obrigatório.',
            'password'  => 'O campo Senha é obrigatório.',

        ];
    }
}
