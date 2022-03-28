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
    public $searchValue = "";

    private $allStatusId = 0;

    protected $listeners = [
        'changeStatusId' => 'changeStatusId',
        'changeSearchValue' => 'changeSearchValue',
    ];

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
        $searchTerm = '%' . $this->searchValue . '%';
        $sqlQuery = Company::whereRaw("UPPER(name) LIKE ?", ['%' . mb_strtoupper($searchTerm) . '%']); 

        if ($this->statusId != $this->allStatusId) {
            $sqlQuery = $sqlQuery->where('company_status_id', $this->statusId);
        }

        $this->companies = $sqlQuery->orderBy('name', 'ASC')->get();
    }

    public function changeStatusId($id) {
        $this->statusId = intval($id);
        $this->refreshCompanies();
    }

    public function changeSearchValue($value) {
        $this->searchValue = $value;
        $this->refreshCompanies();
    }

    public function updatedSearchValue($value) {
        $this->refreshCompanies();
    }
}
