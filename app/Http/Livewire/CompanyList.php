<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Company;

class CompanyList extends Component
{
    public $companies = [];
    public $statusId = 0;
    public $searchValue = "";

    private $allStatusId = 0;

    protected $listeners = [
        'changeStatusId' => 'changeStatusId',
        'changeSearchValue' => 'changeSearchValue',
    ];

    public function mount()
    {
        $this->companies = Company::all();
    }

    public function render()
    {
        return view('livewire.company-list');
    }

    public function refreshCompanies() {
        $searchTerm = '%' . $this->searchValue . '%';
        $sqlQuery = Company::whereRaw("UPPER(name) LIKE ?", [mb_strtoupper($searchTerm)]); 

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
}
