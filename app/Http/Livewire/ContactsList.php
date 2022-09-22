<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;

class ContactsList extends Component
{

    public $searchQuery = "";
    public $employees = [];

    public function mount()
    {
        $this->refreshContacts();
    }

    public function render()
    {
        return view('livewire.contacts-list');
    }

    public function updatedSearchQuery($value) {
        $this->refreshContacts();
    }

    private function refreshContacts() {
        $userId = Auth::user()->id;
        $searchTerm = '%' . $this->searchQuery . '%';
        $employees = Employee::
        join('companies', 'employees.company_id', '=', 'companies.id')
        ->select('employees.*', 'companies.creator_id', 'companies.target_user_id')
        ->where(function ($query) use ($searchTerm) {
            $query->whereRaw("UPPER(CONCAT(employees.first_name, ' ', employees.last_name, ' ', employees.patronymic)) LIKE ?", [mb_strtoupper($searchTerm)])
            ->orWhereHas('phones', function($q) use ($searchTerm) { 
                $q->where('phone', 'like', $searchTerm);
            })
            ->orWhereHas('emails', function($q) use ($searchTerm) { 
                $q->where('email', 'like', $searchTerm);
            });
        });
        if (!Auth::user()->isAdmin()) {
            $employees = $employees->where(function ($query) use ($userId) {
                $query->where('companies.creator_id', $userId)
                ->orWhere('companies.target_user_id', $userId);
            });
        }
        
        $this->employees = $employees->limit(30)->get();
    }
}
