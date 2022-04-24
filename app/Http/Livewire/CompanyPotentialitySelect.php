<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Potentiality;


class CompanyPotentialitySelect extends Component
{
    public $potentialities = [];

    protected $listeners = [
        'changeCompanyPotentiality' => 'onChangePotentiality',
    ];

    public function mount($company)
    {
        $this->potentialities = Potentiality::all();
        $this->company = $company;
    }

    public function render()
    {
        return view('livewire.company-potentiality-select');
    }

    public function onChangePotentiality($id) {
        $this->company->company_potentiality_id = intval($id);
        $this->company->save();
    }
}
