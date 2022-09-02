<?php

namespace App\Http\Requests\Usuario;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class StoreRequest extends FormRequest
{
    
    //Se cambia a true para autorizar las validaciones
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        //Busca los name del formulario, que coinciden con el nombre de la BD en la tabla.
        return [
            'nombre1' => "required",
            'nombre2' => "required",
            'apellido1' => "required",
            'apellido2' => "required",
            'celular' => "required",
            'email' => 'required|unique:users,email,'.$this->route('users.email'),
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ];
    }

    public function messages()
    {
        return [
            'nombre1.required' => 'Es requerido el nombre 1.',
            'nombre2.required' => 'Es requerido el nombre 2.',
            'apellido1.required' => "Es requerido el apellido 1.",
            'apellido1.required' => 'Es requerido el apellido 2.',
            'celular.required' => "Es requerido el número de celular.",
            'email.integer' => 'Es requerido el email.',
            'password.required' => "Es requerido el password.",
        ];
    }
}