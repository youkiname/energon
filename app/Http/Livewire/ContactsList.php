<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Employee;

class ContactsList extends Component
{

    public $searchQuery = "";
    public $employees = [];

    public function mount()
    {
        $this->employees = Employee::limit(30)->get();
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
        if(!$this->searchQuery) {
            $this->employees = Employee::limit(30)->get();
            return;
        }
        $searchTerm = '%' . $this->searchQuery . '%';
        $employees = Employee::
        whereRaw("UPPER(first_name) LIKE ?", [mb_strtoupper($searchTerm)])
        ->orWhereRaw("UPPER(last_name) LIKE ?", [mb_strtoupper($searchTerm)])
        ->orWhereRaw("UPPER(patronymic) LIKE ?", [mb_strtoupper($searchTerm)])
        ->orWhereHas('phones', function($q) use ($searchTerm) { 
            $q->where('phone', 'like', $searchTerm);
        })
        ->orWhereHas('emails', function($q) use ($searchTerm) { 
            $q->where('email', 'like', $searchTerm);
        })
        ->limit(30);
         
        $this->employees = $employees->get();
    }
}
