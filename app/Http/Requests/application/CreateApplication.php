<?php

namespace App\Http\Requests\application;

use Illuminate\Foundation\Http\FormRequest;

class CreateApplication extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'image' => 'nullable',
            'title' => 'required',
            'description' => 'required',
        ];
    }
}
