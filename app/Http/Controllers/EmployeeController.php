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
            'position' => ['required', 'string'],
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'patronymic' => ['required', 'string'],
        ]);

        $employee->position = $request->position;
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->patronymic = $request->patronymic;

        $this->updateContacts($request, $employee);
        $employee->save();


        return redirect()->route('companies.show', ['company' => $employee->company])->with([
            'success' => 'Сотрудник успешно изменен.'
        ]);
    }

    public function store(Request $request) {
        $company = Company::find($request->input('company_id'));
        $employee = Employee::create([
            'company_id' => $company->id,
            'position' => $request->employee_position,
            'first_name' => $request->employee_first_name,
            'last_name' => $request->employee_last_name,
            'patronymic' => $request->employee_patronymic,
        ]);

        foreach($request->input('employee_phone') as $key => $phone) {
            EmployeePhone::create([
                'company_id' => $company->id,
                'employee_id' => $employee->id,
                'phone' => $phone,
            ]);
        }

        foreach($request->input('employee_email') as $key => $email) {
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
        $employee->delete();
        return redirect()->route('companies.show', ['company' => $company]);
    }

    private function updateContacts(Request $request, Employee $employee) {
        $this->updatePhones($request, $employee);
        $this->updateEmails($request, $employee);
    }

    private function updatePhones(Request $request, Employee $employee) {
        $employee->deletePhones();
        if (!$request->input('phone')) {
            return;
        }
        foreach($request->input('phone') as $key => $phone) {
            EmployeePhone::create([
                'company_id' => $employee->company->id,
                'employee_id' => $employee->id,
                'phone' => $phone,
            ]);
        }
    }

    private function updateEmails(Request $request, Employee $employee) {
        $employee->deleteEmails();
        if (!$request->input('email')) {
            return;
        }
        foreach($request->input('email') as $key => $email) {
            EmployeeEmail::create([
                'company_id' => $employee->company->id,
                'employee_id' => $employee->id,
                'email' => $email,
            ]);
        }
    }
}
