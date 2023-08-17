<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TaskController;

use App\Models\TaskStatus;
use App\Models\Notification;
use App\Models\TaskClosingRequest;


class TaskStatusSelect extends Component
{

    public $statuses = [];
    public $closingStatusId = 4;
    public $showConfirmInfo = false;

    protected $listeners = [
        'changeTaskStatus' => 'onChangeStatus',
    ];

    public function mount($task)
    {
        $this->statuses = TaskStatus::all();
        $this->task = $task;
        $this->showConfirmInfo = $this->isWaitingConfirmation();
    }

    public function render()
    {
        return view('livewire.task-status-select');
    }

    public function onChangeStatus($id) {
        if($id == $this->closingStatusId && !(Auth::user()->isMainManager())) {
            return (new TaskController)->closeCompany($this->task);
        }
        $this->task->task_status_id = intval($id);
        $this->task->save();
    }

    private function isWaitingConfirmation() {
        $request = TaskClosingRequest::where('task_id', $this->task->id)
        ->first();
        return $request;
    }
}
