<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormContactUsRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'lastName' => 'required',
            'age' => 'required|numeric|digits:2',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            'problem' => 'required',
            'message' => 'required|max:250',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'nombre',
            'lastName' => 'apellido',
            'age' => 'edad',
            'phone' => 'telefono',
            'email' => 'correo',
            'problem' => 'situacion',
            'message' => 'mensaje',
        ];
    }
}
