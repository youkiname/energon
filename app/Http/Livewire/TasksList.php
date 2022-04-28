<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use App\Models\Task;
use App\Models\TaskStatus;

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
        $this->statuses = TaskStatus::all();
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
        $tasks['Завершенные'] = $this->getCompletedTasks();
        $this->tasks = $tasks;
    }

    private function getTasksByDate($date) {
        $tasks = Task::where('date', $date)->where("task_status_id", "!=", 4);
        if ($this->companyId) {
            $tasks = $tasks->where('company_id', $this->companyId);
        }
        $tasks = $this->applyRolePermissions($tasks);
        $tasks = $tasks->get();
        return $tasks;
    }

    private function getCompletedTasks() {
        $tasks = Task::where("task_status_id", "=", 4);
        if ($this->companyId) {
            $tasks = $tasks->where('company_id', $this->companyId);
        }
        $tasks = $this->applyRolePermissions($tasks);
        $tasks = $tasks->get();
        return $tasks;
    }

    private function applyRolePermissions($query) {
        // обычный менеджер может просматривать только свои задачи или которые ему назначили
        $user = Auth::user();
        if ($user->role->id == 3) {
            return $query->whereRaw('(creator_id = ? OR target_user_id = ?)', [$user->id, $user->id]);
        }
        return $query;
    }
}
