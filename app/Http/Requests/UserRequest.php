<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserRequest extends FormRequest
{
    /**
     * Determina se o usuário é autorizado para fazer essa requisição
     * 
     */
    public function authorize(): bool
    {
        return true;
    }
    
    /**
     * Manipular falha de validação e retornar uma resposta JSON com os erros de validação
     *
     * @param Validator $validator O objeto de validação que contém os erros de validação.
     * @throws Illuminate\Http\Exceptions\HttpResponseException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status' => false,
            'erros' => $validator->errors(),

        ], 422)); // O código HTTP 422 significa "Unprocessable Entity". Esse código é usado quando o servidor entende a requisição do cliente, mas não pode processá-la devido a erros de calidação no lado do servidor.
    }

    /**
     * Retorna as regras de validação para os dados do usuário
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        //Recupera o id do usuário enviado na URL
        $id_user = $this->route('user');

        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . ($id_user ? $id_user->id : null),
            'password' => 'required|min:6'
        ];
    }

    /**
     * Retorna as mensagens de erro personalizadas para as regras de validação.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Campo nome é obrigatório!',
            'email.required' => 'Campo email é obrigatório!',
            'email.eamil' => 'Necessário enviar e-mail válido!',
            'email.unique' => 'O e-mail já está cadastrado!',
            'password.required' => 'Campo senha é obrigatório!',
            'password.min' => 'A senha deve conter no mínimo :min caracteres!',
        ];


    }




}
