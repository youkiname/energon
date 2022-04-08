<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Company;

class BundleCompanySelect extends Component
{
    public $companies = [];
    public $currentCompany = [];
    public $searchValue = "";

    public function mount($currentCompany)
    {
        $this->companies = Company::all();
        $this->currentCompany = $currentCompany;
    }

    public function render()
    {
        return view('livewire.bundle-company-select');
    }
}
