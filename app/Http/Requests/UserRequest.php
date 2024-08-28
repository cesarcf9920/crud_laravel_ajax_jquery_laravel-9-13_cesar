<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Validation\Rule;

class UserRequest extends Request
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return   [ 
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'street' => 'required',
                'lat' => 'required',
                'lng' => 'required',
            ];
    }
    
    public function messages()
    {
        return [
            'name.required' => 'Debe de ingresar en nombre',
            'email.required' => 'Debe ingresar el email',
            'phone.required'  => 'Debe ingresar el número telefónico',
            'street.required'  => 'Debe ingresar la calle',
            'lat.required'  => 'Debe ingresar la latitud',
            'lng.required'  => 'Debe ingresar la longitud',
        ];
    }
    

}