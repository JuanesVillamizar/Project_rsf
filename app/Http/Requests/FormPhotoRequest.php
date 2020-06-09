<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormPhotoRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|min:3|max:255',
            'description' => 'required|min:5|max:255',
            'photo' => 'required',
            'isVisible' => ''
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'titulo',
            'description' => 'descriccion',
            'photo' => 'foto',
        ];
    }
}
