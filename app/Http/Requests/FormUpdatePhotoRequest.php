<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormUpdatePhotoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'description' => 'required|min:5|max:255',
        ];
    }

    public function attributes()
    {
        return [
            'description' => 'descriccion',
        ];
    }
}
