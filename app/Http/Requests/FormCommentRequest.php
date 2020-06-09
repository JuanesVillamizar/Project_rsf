<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormCommentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'comment' => 'required|max:250',
            'set_id' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'comment' => 'comentario'
        ];
    }
}
