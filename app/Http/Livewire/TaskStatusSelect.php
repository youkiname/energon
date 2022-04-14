<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\TaskStatus;

class TaskStatusSelect extends Component
{

    public $statuses = [];

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
        $this->task->task_status_id = intval($id);
        $this->task->save();
    }
}
