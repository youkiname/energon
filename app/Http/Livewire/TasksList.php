<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use App\Models\Task;

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
        $dates = $dates->groupBy('date')->orderBy('date', "DESC")->get();

        $today = date("Y-m-d");
        $tasks = [
            'Сегодня' => $this->getTasksByDate($today)
        ];

        foreach($dates as $date) {
            if ($date->date == $today) {
                continue;
            }
            $dailyTasks = $this->getTasksByDate($date->date);
            if(!$dailyTasks->isEmpty()) {
                $humanDate = Carbon::create($date->date)->toFormattedDateString();
                $tasks[$humanDate] = $dailyTasks;
            }
        };
        $this->tasks = $tasks;
    }

    private function getTasksByDate($date) {
        $tasks = Task::where('date', $date);
        if ($this->companyId) {
            $tasks = $tasks->where('company_id', $this->companyId);
        }
        $tasks = $this->applyRolePermissions($tasks);
        $tasks = $tasks->get();
        return $tasks;
    }

    private function applyRolePermissions($query) {
        // обычный менеджер может просматривать только свои задачи
        $user = Auth::user();
        if ($user->role->id == 3) {
            return $query->where('creator_id', $user->id);
        }
        return $query;
    }
}
