<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Task;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TasksList extends Component
{
    public $selectedDate = "";
    public $companyId = null;
    public $tasks = [];

    protected $listeners = [
        'changeTaskDateFilter' => 'onChangeTaskDateFilter',
    ];


    public function mount($companyId = null)
    {
        $this->companyId = $companyId;
        $this->refreshTasks();
    }

    public function render()
    {
        return view('livewire.tasks-list');
    }

    public function onChangeTaskDateFilter($date) {
        $this->selectedDate = $date;
        $this->refreshTasks();
    }

    private function refreshTasks() {
        $dates = DB::table('tasks')
                ->select('date');
        if ($this->selectedDate) {
            $dates = $dates->where('date', $this->selectedDate);
        }
        $dates = $dates->groupBy('date')->get();

        $tasks = [];
        foreach($dates as $date) {
            $dailyTasks = Task::where('date', $date->date);
            if ($this->companyId) {
                $dailyTasks = $dailyTasks->where('company_id', $this->companyId);
            }
            $dailyTasks = $dailyTasks->get();

            if(!$dailyTasks->isEmpty()) {
                $humanDate = Carbon::create($date->date)->toFormattedDateString();
                $tasks[$humanDate] = $dailyTasks;
            }
        };
        $this->tasks = $tasks;
    }
}
