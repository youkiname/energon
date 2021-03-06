<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyCreateRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\City;
use App\Models\Company;
use App\Models\CompanyBundle;
use App\Models\CompanyDetails;
use App\Models\CompanyPurchase;
use App\Models\CompanyStatus;
use App\Models\CompanyType;
use App\Models\Potentiality;
use App\Models\Employee;
use App\Models\EmployeePhone;
use App\Models\EmployeeEmail;
use App\Models\Event;
use App\Models\CompanyManagerConfirmation;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CompanyController extends Controller
{
    public $templateData = [];

    public function __construct()
    {
        $this->templateData['companyTypes'] = CompanyType::all();
        $this->templateData['companyPurchases'] = CompanyPurchase::all();
        $this->templateData['companyStatuses'] = CompanyStatus::allowed();
        $this->templateData['companyPotentialities'] = Potentiality::all();
    }

    public function index()
    {
        return view('company.index');
    }

    public function create()
    {
        return view('company.create', $this->templateData);
    }

    public function store(CompanyCreateRequest $request)
    {
        if($this->isSsnExisting($request->ssn)) {
            $this->createReassignConfirmation($request->ssn, Auth::user()->id);
            return redirect()->route('companies.create')->with([
                'success' => 'Организация уже существует. Был отправлен запрос на переназначение менеджера.'
            ]);
        }
        $newCompany = Company::create([
            'creator_id' => Auth::user()->id,
            'target_user_id' => Auth::user()->id,
            'company_type_id' => $request->company_type,
            'company_status_id' => $request->company_status,
            'company_purchase_id' => $request->company_purchase,
            'company_potentiality_id' => $request->company_potentiality,
            'city' => $request->city,
            'legal' => $request->legal,
            'name' => $request->name,
            'ssn' => $request->ssn,
            'description' => $request->description ? $request->description : '',
            'address' => $request->address,
        ]);

        CompanyDetails::create([
            'company_id' => $newCompany->id,
            'contract_number' => '',
            'specification_number' => 0,
            'request_number' => '',
            'order_number' => '',
            'order_sum' => 0,
            'manager_premium' => 0,
            'working_hours' => 0,
            'equipment_type' => ''
        ]);

        $this->storeEmployee($request, $newCompany);

        return redirect()->route('companies.show', ['company' => $newCompany])->with([
            'success' => 'Организация добавлена в список ваших контрагентов.'
        ]);
    }

    public function show(Company $company)
    {
        $this->templateData['company'] = $company;
        return view('company.show', $this->templateData);
    }

    public function contacts(Company $company)
    {
        $this->templateData['company'] = $company;
        return view('company.contacts', $this->templateData);
    }

    public function tasks(Company $company)
    {
        $this->templateData['company'] = $company;
        $this->templateData['users'] = User::all();
        return view('company.tasks', $this->templateData);
    }

    public function edit(Company $company)
    {
        $this->templateData['company'] = $company;
        $this->templateData['managers'] = User::all();
        return view('company.edit', $this->templateData);
    }

    public function update(Request $request, Company $company)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'ssn' => ['required', 'string', 'max:13'],
            'city' => ['required', 'string'],
            'address' => ['required', 'string'],
        ]);

        $company->name = $request->name;
        $company->ssn = $request->ssn;
        $company->city = $request->city;
        $company->address = $request->address;
        $company->description = $request->description ? $request->description : '';

        $company->company_type_id = $request->company_type;
        $company->company_purchase_id = $request->company_purchase;
        $company->company_status_id = $request->company_status;
        $company->company_potentiality_id = $request->company_potentiality;

        $company->target_user_id = $request->target_user_id;

        $company->save();
        $this->updateDetails($request, $company);
        $this->createEditEvent($company);

        return redirect()->route('companies.show', ['company' => $company])->with([
            'success' => 'Организация успешно изменена.'
        ]);
    }

    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('companies.index')->with([
            'success' => 'Организация успешно удалена.'
        ]);
    }

    public function bundle(Request $request)
    {
        $company = Company::find($request->a_company_id);
        $user = Auth::user();
        $status_id = $user->isMainManager() ? 2 : 1;
        CompanyBundle::create([
            "creator_id" => $user->id,
            "a_company_id" => $company->id,
            "b_company_id" => $request->b_company_id,
            "status_id" => $status_id
        ]);
        CompanyBundle::create([
            "creator_id" => $user->id,
            "b_company_id" => $company->id,
            "a_company_id" => $request->b_company_id,
            "status_id" => $status_id
        ]);
        return redirect()->route('companies.contacts', ['company' => $company]);
    }

    private function storeEmployee(Request $request, Company $company) {
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
    }

    private function updateDetails(Request $request, Company $company) {
        $updatingFields = [];
        foreach($company->details->getAttributes() as $attribute => $value) {
            if(!is_null($request->input($attribute))) {
                $updatingFields[$attribute] = $request->input($attribute);
            }
        }

        CompanyDetails::where('company_id', $company->id)
        ->update($updatingFields);
    }

    private function createEditEvent(Company $company) {
        Event::create([
            'title' => 'Изменение',
            'creator_id' => Auth::user()->id,
            'description' => 'Контрагент был отредактирован пользователем ' . Auth::user()->name,
            'company_id' => $company->id,
            'event_type_id' => 4  # тип комментарий
        ]);
    }

    private function isSsnExisting($ssn) {
        return Company::where('ssn', $ssn)->count() > 0;
    }

    private function createReassignConfirmation($ssn, $managerId) {
        $company = Company::where('ssn', $ssn)->first();
        CompanyManagerConfirmation::create([
            'company_id' => $company->id,
            'new_manager_id' => $managerId,
        ]);
    } 
}
