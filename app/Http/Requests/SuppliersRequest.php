<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SuppliersRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['max:45', 'regex:/^[A-Za-záéíóúÁÉÍÓÚñÑ\s]+$/'],
            'company_name' =>  ['max:45', 'regex:/^[A-Za-záéíóúÁÉÍÓÚñÑ0-9\s.]+$/'],
            'city' => ['max:20', 'regex:/^[A-Za-záéíóúÁÉÍÓÚñÑ\s]+$/'],
            'state' => ['max:20', 'regex:/^[A-Za-záéíóúÁÉÍÓÚñÑ\s]+$/'],
            'country' => ['max:20', 'regex:/^[A-Za-záéíóúÁÉÍÓÚñÑ\s]+$/'],
            'phone' => ['string', 'min:10', 'regex:/^([0-9])*$/'], //validación solo para números
            'site_web' => ['required', 'regex:/(.*)(\.[\w\-]+)+[\#?]?.*$/'],
            'business_email' => ['required', 'regex:/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}/'],
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'nombre',
            'company_name' => 'razón social',
            'city' => 'ciudad',
            'state' => 'estado',
            'country' => 'país',
            'phone' => 'teléfono',
            'site_web' => 'sitio web',
            'business_email' => 'correo comercial',
        ];
    }

    public function messages()
    {
        return [
            'name.max' => 'Nombre demasiado largo.',
            'name.regex' => 'Este campo no debe incluir números.',
            'company_name.max' => 'Nombre demasiado largo.',
            'company_name.regex' => 'Este campo no debe incluir números.',
            'city.max' => 'Nombre demasiado largo.',
            'city.regex' => 'Este campo no debe incluir números.',
            'state.max' => 'Nombre demasiado largo.',
            'state.regex' => 'Este campo no debe incluir números.',
            'country.max' => 'Nombre demasiado largo.',
            'country.regex' => 'Este campo no debe incluir números.',
            'email.regex' => 'Correo no válido.',
            'email.regex' => 'Sitio web no válido.',
            'email.regex' => 'Correo no válido.',
        ];
    }
}
