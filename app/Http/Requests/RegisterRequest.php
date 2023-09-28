<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;


class RegisterRequest extends FormRequest
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
                'name' => ['max:45', 'regex:/^[A-Za-záéíóúÁÉÍÓÚñÑ\s]+$/'],
                'lastname' => ['max:45', 'regex:/^[A-Za-záéíóúÁÉÍÓÚñÑ\s]+$/'],
                'code' => 'max:9|min:5',
                'email' => ['required', 'email', 'regex:/(.*)@alumnos.udg.mx|@academicos.udg.mx$/i'],
                'password' => ['required', 'max:16', 'min:8', 'confirmed', Password::defaults()],
        ];
    }

    public function atributes()
    {
        return [
            "password" => "contraseña"
        ];
    }

    public function messages()
    {
        return [
            'name.max' => 'Nombre demasiado largo.',
            'name.regex' => 'Este campo no debe incluir números.',
            'lastname.max' => 'Apellidos demasiado largos.',
            'lastname.regex' => 'Este campo no debe incluir números.',
            'code.max' => 'El Código debe tener máximo 9 caracteres.',
            'code.min' => 'El Código debe tener mínimo 5 caracteres.',
            'email.regex' => 'El correo debe ser Institucional UDG.',
            'password.min' => 'Debe tener almenos 8 caracteres.',
            'password.max' => 'Debe tener maximo 16 caracteres.',
            'password_confirmation.min' => 'Debe tener almenos 8 caracteres.',
            'password_confirmation.max' => 'Debe tener maximo 16 caracteres.',
        ];
    }
}

