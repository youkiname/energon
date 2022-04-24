<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CompanyStatus;

class CompanyStatusSelect extends Component
{
    public $statuses = [];

    protected $listeners = [
        'changeCompanyStatus' => 'onChangeStatus',
    ];

    public function mount($company)
    {
        $this->statuses = CompanyStatus::all();
        $this->company = $company;
    }

    public function render()
    {
        return view('livewire.company-status-select');
    }

    public function onChangeStatus($id) {
        $this->company->company_status_id = intval($id);
        $this->company->save();
    }
}
