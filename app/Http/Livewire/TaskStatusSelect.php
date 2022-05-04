<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Illuminate\Support\Facades\Auth;

use App\Models\TaskStatus;
use App\Models\TaskClosingRequest;


class TaskStatusSelect extends Component
{

    public $statuses = [];
    public $closingStatusId = 4;

    protected $listeners = [
        'changeTaskStatus' => 'onChangeStatus',
    ];

    public function mount($task)
    {
        $this->statuses = TaskStatus::all();
        $this->task = $task;
    }

    public function render()
    {
        return view('livewire.task-status-select');
    }

    public function onChangeStatus($id) {
        if($id == $this->closingStatusId && !(Auth::user()->isMainManager())) {
            $this->createTaskClosingRequest();
            return;
        }
        $this->task->task_status_id = intval($id);
        $this->task->save();
    }

    private function createTaskClosingRequest() {
        TaskClosingRequest::create([
            'task_id' => $this->task->id,
            'manager_id' => Auth::user()->id,
        ]);
    }
}
