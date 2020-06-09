<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormPersonRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'cc' => 'required|min:7|max:15',
            'name' => 'required|min:3',
            'lastName' => 'required|min:5',
            'phone' => 'required|numeric',
            'email' => 'required|email',
        ];
    }

    public function attributes()
    {
        return [
            'cc' => 'cedula',
            'name' => 'nombre',
            'lastName' => 'apellido',
            'phone' => 'telefono',
            'email' => 'correo electronico',
        ];
    }
}
