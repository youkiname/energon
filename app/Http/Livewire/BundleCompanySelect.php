<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Company;
use Illuminate\Support\Facades\DB;

class BundleCompanySelect extends Component
{
    public $companies = [];
    public $currentCompany = [];
    public $searchValue = "";

    public function mount($currentCompany)
    {
        // Выбрать все компании, которые ещё не связаны с текущей.
        $bundleSelect = 'not exists (select 1 from company_bundles where company_bundles.a_company_id = companies.id AND company_bundles.b_company_id = ?)';
        $this->companies = Company::where('id', '!=', $currentCompany->id)
        ->whereRaw($bundleSelect, [$currentCompany->id])
        ->get();

        $this->currentCompany = $currentCompany;
    }

    public function render()
    {
        return view('livewire.bundle-company-select');
    }
}
