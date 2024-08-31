<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\Request;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return   [ 
                'name' => 'required',
                'phone' => 'required',
                'email' => 'nullable|email',
                'compañia' => 'required',
                'street' => 'required',
                'lat' => 'required',
                'lng' => 'required',
            ];
    }
    
    public function messages()
    {
        return [
            'name.required' => 'Debe de ingresar en nombre',
            'phone.required'  => 'Debe ingresar el número telefónico',
            'email.email' => 'Debe de ingresar un correo eletrónico válido',
            'compañia' => 'Debe ingresar la compañia',
            'street.required'  => 'Debe ingresar la calle',
            'lat.required'  => 'Debe ingresar la latitud',
            'lng.required'  => 'Debe ingresar la longitud',
        ];
    }
    

}