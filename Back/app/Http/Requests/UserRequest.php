<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\User;


class UserRequest extends FormRequest
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
        if ($this->isMethod('post')) {
            return [
                'name' => 'required|alpha',
                'email' => 'required|email|unique:users',
                'dateOfBirth' => 'required|date',
                'gender' => 'required|alpha|max:1',
                'isTenant' => 'required|boolean',
                'registrationDate' => 'required|date',
                'password' =>'required|string|min:6|max:16',
                'college' => 'string',
            ];
        }
        if ($this->isMethod('put')) {
            return [
                'name' => 'alpha',
                'email' => 'email|unique:users',
                'dateOfBirth' => 'date',
                'gender' => 'alpha|max:1',
                'isTenant' => 'boolean',
                'registrationDate' => 'date',
                'password' =>'string|min:6|max:16',
                'college' => 'string',
            ];
        }
    }

    public function messages() {
        return [
            'name.alpha' => 'O nome só pode conter letras',
            'email.email' => 'insira um email valido',
            'email.unique' => 'Este email ja foi cadastrado',
            'dateOfBirth.date' => 'data invalida',
            'password.min' => 'a senha deve conter pelo menos 6 caracteres',
            'password.max' => 'a senha deve conter no maximo 16 caracteres',
        ];
    }

    protected function failedValidation(Validator $validator) {
        throw new HttpResponseException(response()->json($validator->errors(),422));
    }
}
