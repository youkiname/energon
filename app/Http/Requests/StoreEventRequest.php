<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => ['required', 'string', 'max:255'],
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Название не заполнено',
            'title.max' => 'Название не может превышать 255 символов',
        ];
    }
}
