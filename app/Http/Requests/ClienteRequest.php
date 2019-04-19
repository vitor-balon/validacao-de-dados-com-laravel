<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
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

    public function messages()
    {
        return array(
            'name.required' => 'O nome é obrigatório!',
            'name.min' => 'Informe no mínimo 5 caracteres!',
            'name.max' => 'Informe no máximo 100 caracteres!',
            'email.required' => 'O email é obrigatório!',
            'email.max' => 'Informe no máximo 100 caracteres!',
            'email.email' => 'Informe com um email válido!',
            'password.required' => 'A senha é obrigatória!',
            'password_confirmation.required' => 'É obrigatório confirmar a senha!',
            'profile_picture.required' => 'Escolha uma imagem!',
            'profile_picture.mimes' => 'Apenas imagens com formato png!',
            'email.unique' => 'Esse email já está cadastrado!',
            'number.required' => 'O número é obrigatório!',
            'number.num_par' => 'O número deve ser par!'
        );
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:5|max:100',
            'email' => 'sometimes|required|max:100|email|unique:users',
            'password' => 'required|max:100',
            'password_confirmation' => 'required|max:100',
            'profile_picture' => 'required|mimes:png',
            'number' => 'required|num_par'
        ];
    }
}
