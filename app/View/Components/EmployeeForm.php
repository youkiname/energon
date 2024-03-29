<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\EmployeePhoneType;
use App\Models\EmployeeEmailType;

class EmployeeForm extends Component
{
    public $phoneTypes = [];
    public $emailTypes = [];

    public function __construct()
    {
        $this->phoneTypes = EmployeePhoneType::all();
        $this->emailTypes = EmployeeEmailType::all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.employee-form');
    }
}
