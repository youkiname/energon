<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'employee_phones' => ['array'],
            'employee_emails' => ['array'],
            'employee_emails.*' => ['email:rfc'],
        ];
    }

    public function messages()
    {
        return [
            'employee_position.required' => 'Должность сотрудника не заполнена',
            'employee_first_name.required' => 'Имя сотрудника не заполнено',
            'employee_last_name.required' => 'Фамилия сотрудника не заполнена',
            'employee_phones.required' => 'Сотрудник должен имять хотя бы один номер телефона',
            'employee_phones.*.required' => 'Номер телефона не может быть пустым',
            'employee_emails.required' => 'Сотрудник должен имять хотя бы один email',
            'employee_emails.*.required' => 'Email не может быть пустым',
        ];
    }
}
