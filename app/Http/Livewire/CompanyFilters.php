<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CompanyStatus;
use App\Models\User;

class CompanyFilters extends Component
{
    public $letters = [];
    public $statuses = [];
    public $managers = [];
    public $searchValue = "";

    public function mount()
    {
        $this->letters = mb_str_split('АБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯ');
        $this->statuses = CompanyStatus::all();
        $this->managers = User::all();

    }

    public function render()
    {
        return view('livewire.company-filters');
    }

    public function updatedSearchValue($value) {
        $this->emit('changeSearchValue', $value);
    }
}
