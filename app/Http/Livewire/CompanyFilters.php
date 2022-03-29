<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CompanyStatus;

class CompanyFilters extends Component
{
    public $letters = [];
    public $statuses = [];
    public $searchValue = "";

    public function mount()
    {
        $this->letters = mb_str_split('АБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯ');
        $this->statuses = CompanyStatus::all();
    }

    public function render()
    {
        return view('livewire.company-filters');
    }

    public function updatedSearchValue($value) {
        $this->emit('changeSearchValue', $value);
    }
}
