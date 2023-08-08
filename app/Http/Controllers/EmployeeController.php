<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEmployeeRequest;
use App\Models\Company;
use App\Models\Employee;
use App\Models\EmployeePhone;
use App\Models\EmployeeEmail;
use App\Models\EmployeePhoneType;
use App\Models\EmployeeEmailType;

class EmployeeController extends Controller
{
    public function edit(Employee $employee)
    {
        $phoneTypes = EmployeePhoneType::all();
        $emailTypes = EmployeeEmailType::all();
        return view('employee.edit', [
            'employee' => $employee, 
            'phoneTypes' => $phoneTypes,
            'emailTypes' => $emailTypes,
        ]);
    }

    public function update(StoreEmployeeRequest $request, Employee $employee)
    {
        $employee->position = $request->employee_position;
        $employee->first_name = $request->employee_first_name;
        $employee->last_name = $request->employee_last_name;
        $employee->patronymic = $request->employee_patronymic ? $request->employee_patronymic : '';

        $this->updateContacts($request, $employee);
        $employee->save();


        return redirect()->route('companies.contacts', ['company' => $employee->company])->with([
            'success' => 'Сотрудник успешно изменен.'
        ]);
    }

    public function makeMain(Employee $employee)
    {
        DB::table('employees')
            ->where('company_id', $employee->company->id)
            ->update(['is_main' => 0]);
        $employee->is_main = TRUE;
        $employee->save();
        return redirect()->route('companies.contacts', ['company' => $employee->company]);
    }

    public function store(StoreEmployeeRequest $request) {
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
                'phone_type_id' => $request->input('phone_types')[$key],
                'phone' => $phone,
            ]);
        }

        foreach($request->input('employee_emails') as $key => $email) {
            EmployeeEmail::create([
                'company_id' => $company->id,
                'employee_id' => $employee->id,
                'email_type_id' => $request->input('email_types')[$key],
                'email' => $email,
            ]);
        }
        return redirect()->route('companies.contacts', ['company' => $company])->with([
            'success' => 'Новый сотрудник добавлен'
        ]);
    }

    public function destroy(Employee $employee)
    {
        $company = $employee->company;
        if($company->employeesCount() == 1) {
            return redirect()->route('companies.contacts', ['company' => $company])
            ->withErrors(['msg' => 'Компания должна иметь хотя бы одного сотрудника']);
        }
        $employee->delete();
        return redirect()->route('companies.contacts', ['company' => $company]);
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
            if (!$phone) {
                continue;
            }
            EmployeePhone::create([
                'company_id' => $employee->company->id,
                'employee_id' => $employee->id,
                'phone_type_id' => $request->input('phone_types')[$key],
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
            if (!$email) {
                continue;
            }
            EmployeeEmail::create([
                'company_id' => $employee->company->id,
                'employee_id' => $employee->id,
                'email_type_id' => $request->input('email_types')[$key],
                'email' => $email,
            ]);
        }
    }
}
