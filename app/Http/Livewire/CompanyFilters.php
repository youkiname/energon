<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CompanyStatus;
use App\Models\CompanyType;
use App\Models\Company;
use App\Models\User;

class CompanyFilters extends Component
{
    public $letters = [];
    public $statuses = [];
    public $managers = [];
    public $companyTypes = [];
    public $searchValue = "";
    public $regionValue = "";

    public $checkSsnValue = "";
    public $checkSsnInfo = "";

    public function mount()
    {
        $this->letters = mb_str_split('АБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯ');
        $this->statuses = CompanyStatus::all();
        $this->companyTypes = CompanyType::all();
        $this->managers = User::where('deleted_at', NULL)->get();

    }

    public function render()
    {
        return view('livewire.company-filters');
    }

    public function updatedSearchValue($value) {
        $this->emit('changeSearchValue', $value);
    }

    public function updatedRegionValue($value) {
        $this->emit('changeRegionValue', $value);
    }

    public function checkSsn() {
        if (Company::where('ssn', $this->checkSsnValue)->count() > 0) {
            $this->checkSsnInfo = "Данный контрагент уже добавлен в систему";
        } else {
            $this->checkSsnInfo = "Данный контрагент не внесен в систему";
        }
    }
}
