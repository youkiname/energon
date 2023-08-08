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
    public $taskExpireStatus = "current";
    public $tasks = [];

    protected $listeners = [
        'changeTaskDateFilter' => 'onChangeTaskDateFilter',
        'changeTaskExpireStatus' => 'onChangeTaskExpireStatus',
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

    public function onChangeTaskExpireStatus($newStatus) {
        $this->taskExpireStatus = $newStatus;
        $this->refreshTasks();
    }

    private function refreshTasks() {
        $tasks = [];
        $today = date("Y-m-d");

        $dates = DB::table('tasks')
                ->select('date');
        if ($this->selectedDate) {
            $dates = $dates->where('date', $this->selectedDate);
            $humanDate = $this->getHumanDate($this->selectedDate);
            $tasks = [
                $humanDate => $this->getTasksByDate($this->selectedDate)
            ];
        } else {
            // $tasks = [
            //     'Сегодня' => $this->getTasksByDate($today)
            // ];
        }
        $dates = $dates->groupBy('date')->orderBy('date', "ASC")->get();

        foreach($dates as $date) {
            // if ($date->date == $today) {
            //     continue;
            // }
            $dailyTasks = $this->getTasksByDate($date->date);
            if(!$dailyTasks->isEmpty()) {
                $humanDate = $this->getHumanDate($date->date);
                $tasks[$humanDate] = $dailyTasks;
            }
        };
        $this->tasks = $tasks;
    }

    private function getTasksByDate($date) {
        $query = Task::where('date', $date);
        if ($this->companyId) {
            $query = $query->where('company_id', $this->companyId);
        }
        $query = $this->applyTaskExpireStatus($query);
        $query = $this->applyRolePermissions($query);
        return $query->get();
    }

    private function applyRolePermissions($query) {
        // обычный менеджер может просматривать только свои задачи или которые ему назначили
        $user = Auth::user();
        if ($user->role->id == 3) {
            return $query->whereRaw('(creator_id = ? OR target_user_id = ?)', [$user->id, $user->id]);
        }
        return $query;
    }

    private function applyTaskExpireStatus($query) {
        $today = date("Y-m-d");
        if ($this->taskExpireStatus == "current") {
            return $query->whereRaw("concat(date, concat(' ', start_time)) >= NOW()")->where("task_status_id", "!=", 4);
        } else if ($this->taskExpireStatus == "expired") {
            return $query->whereRaw("concat(date, concat(' ', start_time)) < NOW()")->where("task_status_id", "!=", 4);
        }
        // completed
        return $query->where("task_status_id", "=", 4);
    }

    private function getHumanDate($date) {
        return Carbon::create($date)->toFormattedDateString();
    }
}
