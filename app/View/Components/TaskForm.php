<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\User;
use App\Models\TaskStatus;
use App\Models\Company;

class TaskForm extends Component
{

    public $companyId;
    public $previousTask;
    public $users;
    public $statuses;

    public function __construct($companyId=null, $previousTask=null)
    {
        $this->companyId = $companyId;
        $this->previousTask = $previousTask;
        $this->users = User::where('deleted_at', NULL)->get();
        $this->statuses = TaskStatus::all();
    }

    public function render()
    {
        return view('components.task-form');
    }
}
