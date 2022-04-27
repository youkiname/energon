<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

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
        $this->refreshCompanies();
    }

    public function render()
    {
        return view('livewire.company-list');
    }

    public function changeStatusId($id) {
        $this->statusId = intval($id);
        $this->refreshCompanies();
    }

    public function changeSearchValue($value) {
        $this->searchValue = $value;
        $this->refreshCompanies();
    }

    private function refreshCompanies() {
        $searchTerm = '%' . $this->searchValue . '%';
        $sqlQuery = Company::whereRaw("UPPER(name) LIKE ?", [mb_strtoupper($searchTerm)]); 

        if ($this->statusId != $this->allStatusId) {
            $sqlQuery = $sqlQuery->where('company_status_id', $this->statusId);
        }
        $sqlQuery = $this->applyRolePermissions($sqlQuery);
        $this->companies = $sqlQuery->orderBy('name', 'ASC')->get();
    }


    private function applyRolePermissions($query) {
        // обычный менеджер может просматривать только своих контрагентов
        $user = Auth::user();
        if ($user->role->id == 3) {
            return $query->where('creator_id', $user->id);
        }
        return $query;
    }
}
