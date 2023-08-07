<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CompanyStatus;
use App\Models\CompanyType;
use App\Models\User;

class CompanyFilters extends Component
{
    public $letters = [];
    public $statuses = [];
    public $managers = [];
    public $companyTypes = [];
    public $searchValue = "";
    public $regionValue = "";

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
}
