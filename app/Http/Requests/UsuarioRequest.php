<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UsuarioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
          'nome' => 'required|max:80|min:5',
          'cpf' => 'required|max:11|min:11|unique:usuarios,cpf',
          'celular' => 'required|max:15|min:10',
          'email'=> 'required|email|unique:usuarios,email',
          'password' => 'required'
        ];
    }

    public function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
            'success' => false,
            'error' => $validator->errors()
        ]));
    }
    public function messages()
    {
        return [
            'name.required' => 'O campo nome é obrigatorio',
            'nome.max' => 'o campo nome deve conter no maximo 80 caracteres',
            'nome.min' => 'o campo nome deve conter no minimo 5 caracteres',
            'cpf.required' => 'CPF obrigatorio',
            'cpf.max' => 'CPF deve conter no maximo 11 caracteres',
            'cpf.min' => 'CPF deve conter no minimo 11 caracteres',
            'cpf.unique' => 'CPF já cadastrado no sistema',
            'celular.required' => 'Celular obrigatorio',
            'celular.max' => 'celular deve conter no maximo 15 caracteres',
            'celular.min' => 'celular deve conter no minimo 10 caracteres',
            'email.required' => 'e-mail obrigatorio',
            'email.email' => 'formato de email invalido',
            'email.unique' => 'e-mail já cadastrado no sistema',
            'password.required' => 'senhas obrigatoria'

        ];
    }
}
