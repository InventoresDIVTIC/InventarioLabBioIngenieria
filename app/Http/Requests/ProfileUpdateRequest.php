<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['string', 'max:45', 'regex:/^[A-Za-záéíóúÁÉÍÓÚñÑ\s]+$/'],
            'lastname' => ['string', 'max:45', 'regex:/^[A-Za-záéíóúÁÉÍÓÚñÑ\s]+$/'],
            'area' => ['string', 'max:45'],
            'phone' => ['string', 'max:45', 'regex:/^([0-9])*$/'], /* Está válidado SOLO para números */
            /*'photo' => ['mimes:jpg,JPG,png,PNG', 'max:2048'], 'image','max:2048' */  
        ];
    }

    public function messages()
    {
        return [
            'name.max' => 'Nombre demasiado largo.',
            'name.regex' => 'Este campo no debe incluir números.',
            'lastname.max' => 'Apellidos demasiado largos.',
            'lastname.regex' => 'Este campo no debe incluir números.',
            'area.max' => 'El campo de área es demasiado largo.',
            'phone.regex' => 'Debe ingresar un número de teléfono válido.',
            'phone.max' => 'Número de Telefono demasiado largo.',
        ];
    }
    
}
