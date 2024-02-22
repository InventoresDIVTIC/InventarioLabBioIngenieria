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
                'code' => ['max:9', 'min:5', 'unique:users,code'],
                'email' => ['required', 'email', 'unique:users,email', 'regex:/(.*)@alumnos.udg.mx|@administrativos.udg.mx|@academicos.udg.mx$/i'],
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
            'code.max' => 'El código debe tener máximo 9 caracteres.',
            'code.min' => 'El código debe tener mínimo 5 caracteres.',
            'code.unique' => 'El código ya ha sido registrado.',
            'email.regex' => 'El correo debe ser Institucional UDG.',
            'email.unique' => 'El correo ya ha sido registrado.',
            'password.min' => 'Debe tener al menos 8 caracteres.',
            'password.max' => 'Debe tener máximo 16 caracteres.',
            'password_confirmation.min' => 'Debe tener al menos 8 caracteres.',
            'password_confirmation.max' => 'Debe tener máximo 16 caracteres.',
        ];
    }
}

