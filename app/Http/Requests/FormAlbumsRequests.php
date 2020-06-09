<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormAlbumsRequests extends FormRequest
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
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'titulo',
            'description' => 'descriccion'
        ];
    }
}
