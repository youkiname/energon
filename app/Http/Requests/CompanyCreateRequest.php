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

            'employee_position' => ['required'],
            'employee_first_name' => ['required'],
            'employee_last_name' => ['required'],
            'employee_phones.*' => ["required", "string", "min:1"],
            'employee_emails.*' => ["required", "string", "min:1"],
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

            'employee_position.required' => 'Должность сотрудника обязательна',
            'employee_first_name.required' => 'Имя сотрудника обязательно',
            'employee_last_name.required' => 'Фамилия сотрудника обязательна',
            'employee_phones.*.required' => 'Сотрудник должен иметь хотя бы один номер телефона',
            'employee_emails.*.required' => 'Сотрудник должен иметь хотя бы один номер email',
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
