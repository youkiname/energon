<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'date' => ['required'],
            'start_time' => ['required'],
            'end_time' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Название не заполнено',
            'title.max' => 'Название не может превышать 255 символов',
            'date.required' => 'Дата не заполнена',
            'start_time.required' => 'Начальное время не заполнено',
            'end_time.required' => 'Конечное время не заполнено',
        ];
    }
}
