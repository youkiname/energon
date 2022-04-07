<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;

class CompanyCreateRequest extends FormRequest
{
    protected $stopOnFirstFailure = true;

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required'],
            'ssn' => ['required', 'numeric'],
            'legal' => ['required'],
            'city' => ['required'],
            'address' => ['required'],
            'company_type' => ['sometimes', 'required', 'exists:company_types,id'],
            'company_purchase' => ['sometimes', 'required', 'exists:company_purchases,id'],
            'company_status' => ['sometimes', 'required', 'exists:company_statuses,id'],
            'company_potentiality' => ['sometimes', 'required', 'exists:potentialities,id'],

            'employee_position' => ['required', 'string'],
            'employee_first_name' => ['required', 'string'],
            'employee_last_name' => ['required', 'string'],
            'employee_phones' => ['required', 'array', 'min:1'],
            'employee_phones.*' => ['required', 'string'],
            'employee_emails' => ['required', 'array', 'min:1'],
            'employee_emails.*' => ['required', 'email:rfc'],
        ];
    }

    public function messages()
    {
        return [
            'ssn.required' => 'Неверный ИНН',
            'name.required' => 'Организация без имени',
            'city.required' => 'Город не указан',
            'address.required' => 'Адрес не указан',
            'company_type.exists' => 'Тип контрагента не зарегистрирован',
            'company_purchase.exists' => 'Тип закупки не зарегистрирован',
            'company_status.exists' => 'Статус контрагента не зарегистрирован',
            'company_potentiality.exists' => 'Потенциал не зарегистрирован',

            'employee_position.required' => 'Должность сотрудника не заполнена',
            'employee_first_name.required' => 'Имя сотрудника не заполнено',
            'employee_last_name.required' => 'Фамилия сотрудника не заполнена',
            'employee_phones.required' => 'Сотрудник должен имять хотя бы один номер телефона',
            'employee_phones.*.required' => 'Номер телефона не может быть пустым',
            'employee_emails.required' => 'Сотрудник должен имять хотя бы один email',
            'employee_emails.*.required' => 'Email не может быть пустым',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'название организации',
            'ssn' => 'ИНН',
            'city' => 'город',
            'company_type' => 'тип контрагента',
            'company_purchase' => 'тип закупки',
            'company_status' => 'статус контрагента',
            'company_potentiality' => 'потенциал',
        ];
    }
}
