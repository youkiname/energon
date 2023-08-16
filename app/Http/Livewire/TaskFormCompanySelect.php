<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Company;
use Illuminate\Database\Eloquent\Builder;

class TaskFormCompanySelect extends Component
{
    public $companies = [];
    public $ssnValue = "";

    public function mount()
    {
        $this->refreshCompanies();
    }

    public function refreshCompanies() {
        $query = Company::where('target_user_id', auth()->user()->id);
        if ($this->ssnValue) {
            $searchTerm = '%' . $this->ssnValue . '%';
            $query = Company::where(function (Builder $query) use ($searchTerm) {
                $query->whereRaw("UPPER(name) LIKE ?", [mb_strtoupper($searchTerm)])
                      ->orWhereRaw("ssn LIKE ?", [$searchTerm]);
            });
        }

        $this->companies = $query->get();
    }

    public function render()
    {
        return view('livewire.task-form-company-select');
    }
}
