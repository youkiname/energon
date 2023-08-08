<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Company;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;


class BundleCompanySelect extends Component
{
    public $companies = [];
    public $currentCompany = [];
    public $searchValue = "";

    public function mount($currentCompany)
    {
        $this->currentCompany = $currentCompany;
        $this->refreshCompanies();
    }

    public function refreshCompanies() {
        // Выбрать все компании, которые ещё не связаны с текущей.
        $bundleSelect = 'not exists (select 1 from company_bundles where company_bundles.a_company_id = companies.id AND company_bundles.b_company_id = ?)';
        $query = Company::where('id', '!=', $this->currentCompany->id);
        if ($this->searchValue) {
            $searchTerm = '%' . $this->searchValue . '%';
            $query = Company::where(function (Builder $query) use ($searchTerm) {
                $query->whereRaw("UPPER(name) LIKE ?", [mb_strtoupper($searchTerm)])
                      ->orWhereRaw("ssn LIKE ?", [$searchTerm]);
            });
        }
        $query = $query->where('target_user_id', auth()->user()->id);
        $query = $query->whereRaw($bundleSelect, [$this->currentCompany->id]);

        $this->companies = $query->get();
    }

    public function updatedSearchValue($value) {
        $this->refreshCompanies();
    }

    public function render()
    {
        return view('livewire.bundle-company-select');
    }
}
