<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Employee;
use App\Models\EmployeePhone;
use App\Models\EmployeeEmail;

class EmployeeController extends Controller
{
    public function edit(Employee $employee)
    {
        return view('employee.edit', ['employee' => $employee]);
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'employee_position' => ['required', 'string'],
            'employee_first_name' => ['required', 'string'],
            'employee_last_name' => ['required', 'string'],
            'employee_phones.*' => ['required', 'string'],
            'employee_emails.*' => ['required', 'string'],
        ]);

        $employee->position = $request->employee_position;
        $employee->first_name = $request->employee_first_name;
        $employee->last_name = $request->employee_last_name;
        $employee->patronymic = $request->employee_patronymic ? $request->employee_patronymic : '';

        $this->updateContacts($request, $employee);
        $employee->save();


        return redirect()->route('companies.show', ['company' => $employee->company])->with([
            'success' => 'Сотрудник успешно изменен.'
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'employee_position' => ['required', 'string'],
            'employee_first_name' => ['required', 'string'],
            'employee_last_name' => ['required', 'string'],
            'employee_phones.*' => ['required', 'string'],
            'employee_emails.*' => ['required', 'string'],
        ]);

        $company = Company::find($request->input('company_id'));
        $employee = Employee::create([
            'company_id' => $company->id,
            'position' => $request->employee_position,
            'first_name' => $request->employee_first_name,
            'last_name' => $request->employee_last_name,
            'patronymic' => $request->employee_patronymic ? $request->employee_patronymic : '',
        ]);

        foreach($request->input('employee_phones') as $key => $phone) {
            EmployeePhone::create([
                'company_id' => $company->id,
                'employee_id' => $employee->id,
                'phone' => $phone,
            ]);
        }

        foreach($request->input('employee_emails') as $key => $email) {
            EmployeeEmail::create([
                'company_id' => $company->id,
                'employee_id' => $employee->id,
                'email' => $email,
            ]);
        }
        return redirect()->route('companies.show', ['company' => $company])->with([
            'success' => 'Новый сотрудник добавлен'
        ]);
    }

    public function destroy(Employee $employee)
    {
        $company = $employee->company;
        if($company->employeesCount() == 1) {
            return redirect()->route('companies.show', ['company' => $company])
            ->withErrors(['msg' => 'Компания должна иметь хотя бы одного сотрудника']);
        }
        $employee->delete();
        return redirect()->route('companies.show', ['company' => $company]);
    }

    private function updateContacts(Request $request, Employee $employee) {
        $this->updatePhones($request, $employee);
        $this->updateEmails($request, $employee);
    }

    private function updatePhones(Request $request, Employee $employee) {
        $employee->deletePhones();
        if (!$request->input('employee_phones')) {
            return;
        }
        foreach($request->input('employee_phones') as $key => $phone) {
            EmployeePhone::create([
                'company_id' => $employee->company->id,
                'employee_id' => $employee->id,
                'phone' => $phone,
            ]);
        }
    }

    private function updateEmails(Request $request, Employee $employee) {
        $employee->deleteEmails();
        if (!$request->input('employee_emails')) {
            return;
        }
        foreach($request->input('employee_emails') as $key => $email) {
            EmployeeEmail::create([
                'company_id' => $employee->company->id,
                'employee_id' => $employee->id,
                'email' => $email,
            ]);
        }
    }
}
