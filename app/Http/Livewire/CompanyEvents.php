<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Event;
use App\Models\EventType;

class CompanyEvents extends Component
{
    public $company = null;
    public $events = [];
    public $eventTypes = [];

    public $selectedTypeId = 0;
    public $beginDate = '';
    public $endDate = '';

    protected $listeners = [
        'changeEventType' => 'changeEventType',
        'changeDateRange' => 'changeDateRange',
    ];

    public function mount($company)
    {
        $this->company = $company;
        $this->eventTypes = EventType::all();
        $this->users = User::all();
        $this->refreshEvents();
    }

    public function render()
    {
        return view('livewire.company-events');
    }

    public function changeEventType($id) {
        $this->selectedTypeId = intval($id);
        $this->refreshEvents();
    }

    public function changeDateRange($range) {
        $this->beginDate = $range['begin'] ?? '';
        $this->endDate = $range['end'] ?? '';
        $this->refreshEvents();
    }

    private function refreshEvents() {
        $this->events = Event::where('event_type_id', $this->selectedTypeId);
        if ($this->selectedTypeId == 0) {
            $this->events = Event::where('event_type_id', '>', 0);
        }
        if ($this->beginDate) {
            $this->events = $this->events->where('created_at', '>=', $this->beginDate);
        }
        if ($this->endDate) {
            $this->events = $this->events->where('created_at', '<=', $this->endDate);
        }
        $this->events = $this->events->where('company_id', $this->company->id)
                        ->orderBy('created_at', 'DESC')->get();
    }
}
