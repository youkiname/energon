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
            $this->createTaskClosingRequest();
            return;
        }
        $this->task->task_status_id = intval($id);
        $this->task->save();
        $this->removeConfirmationRequest();
    }

    private function createTaskClosingRequest() {
        if($this->isWaitingConfirmation()) {
            return;
        }
        TaskClosingRequest::create([
            'task_id' => $this->task->id,
            'manager_id' => Auth::user()->id,
        ]);
        $this->showConfirmInfo = true;
    }

    private function isWaitingConfirmation() {
        $request = TaskClosingRequest::where('task_id', $this->task->id)
        ->first();
        return $request;
    }

    private function removeConfirmationRequest() {
        TaskClosingRequest::where('task_id', $this->task->id)
        ->delete();
        $this->showConfirmInfo = false;
    }
}
