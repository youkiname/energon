<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyCreateRequest;
use App\Models\CompanyAwait;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Company;
use App\Models\CompanyPurchase;
use App\Models\CompanyStatus;
use App\Models\CompanyType;
use App\Models\Potentiality;
use Illuminate\Support\Facades\Auth;

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
        return view('company.index', ['companies' => Company::all()]);
    }

    public function create()
    {
        return view('company.create', $this->templateData);
    }

    public function store(Request $request)
    {
        $existedCompany = Company::where('ssn', $request->input('ssn'))->first();
        if ($existedCompany) {
            return redirect()->route('companies.create')->with(
                'error', 'Контрагент с таким ИНН уже существует'
            );
        }
        $newCompany = Company::create([
            'company_type_id' => $request->company_type,
            'company_status_id' => $request->company_status,
            'company_purchase_id' => $request->company_purchase,
            'company_potentiality_id' => $request->company_potentiality,
            'city' => $request->city,
            'legal' => $request->legal,
            'name' => $request->name,
            'ssn' => $request->ssn,
            'description' => $request->description,
            'address' => $request->address,
        ]);
        return redirect()->route('companies.show', ['company' => $newCompany])->with([
            'success' => 'Организация добавлена в список ваших контрагентов.'
        ]);
    }

    public function show(Company $company)
    {
        $this->templateData['company'] = $company;
        return view('company.show', $this->templateData);
    }

    public function edit(Company $company)
    {
        return view('company.edit', ['company' => $company]);
    }

    public function update(Request $request, Company $company)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
