<?php

namespace App\Http\Requests\parteners;

use Illuminate\Foundation\Http\FormRequest;

class CreateParteners extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'image' => 'nullable',
            'name' => 'required',
        ];
    }
}
