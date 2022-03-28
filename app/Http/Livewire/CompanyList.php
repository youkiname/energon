<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Company;
use App\Models\CompanyStatus;

class CompanyList extends Component
{
    public $letters = [];
    public $companies = [];
    public $statuses = [];
    public $statusId = 0;
    private $allStatusId = 0;

    protected $listeners = ['changeStatusId' => 'changeStatusId'];

    public function mount()
    {
        $this->letters = mb_str_split('АБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯ');
        $this->companies = Company::all();
        $this->statuses = CompanyStatus::all();
    }

    public function render()
    {
        return view('livewire.company-list');
    }

    public function refreshCompanies() {
        if ($this->statusId == $this->allStatusId) {
            $this->companies = Company::orderBy('name', 'ASC')->get();
            return;
        }
        $this->companies = Company::where('company_status_id', $this->statusId)
        ->orderBy('name', 'ASC')
        ->get();
    }

    public function changeStatusId($id) {
        $this->statusId = intval($id);
        $this->refreshCompanies();
    }
}
