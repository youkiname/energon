<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\EmployeePhoneType;

class EmployeeForm extends Component
{
    public $phoneTypes = [];

    public function __construct()
    {
        $this->phoneTypes = EmployeePhoneType::all();
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
